<?php
// P7 - Pemrosesan formulir dengan POST, validasi, session, dan PRG.
session_start();

// Data profil dari P6 (dipertahankan sebagai baseline).
$nim = "2611500062";
$namaMahasiswa = "Ringo Zareka Ramadan";
$programStudi = "TI";
$tahunAkademik = "2026/2027";
$semester = 1;
$statusAktif = true;
const NAMA_MATA_KULIAH = "Pemrograman Web Dasar";
const PROFIL_GITHUB = "Ringozareka-r";

// Nilai awal formulir.
$nilaiForm = [
    "nama" => "",
    "email" => "",
    "semester_form" => "",
    "tanggal" => "",
    "jenis_pesan" => "",
    "minat" => [],
    "prodi" => "",
    "pesan" => ""
];
$errors = [];
$hasilKirim = null;

// Memproses POST sebelum HTML dikirim ke browser.
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nilaiForm["nama"] = trim((string)($_POST["nama"] ?? ""));
    $nilaiForm["email"] = trim((string)($_POST["email"] ?? ""));
    $nilaiForm["semester_form"] = trim((string)($_POST["semester"] ?? ""));
    $nilaiForm["tanggal"] = trim((string)($_POST["tanggal"] ?? ""));
    $nilaiForm["jenis_pesan"] = trim((string)($_POST["jenis_pesan"] ?? ""));
    $nilaiForm["prodi"] = trim((string)($_POST["prodi"] ?? ""));
    $nilaiForm["pesan"] = trim((string)($_POST["pesan"] ?? ""));

    $minatMasuk = $_POST["minat"] ?? [];
    if (is_array($minatMasuk)) {
        $nilaiForm["minat"] = array_values(array_unique(array_map(
            static fn($item) => trim((string)$item),
            $minatMasuk
        )));
    } else {
        $nilaiForm["minat"] = [];
    }

    // Validasi sisi server.
    if ($nilaiForm["nama"] === "" || mb_strlen($nilaiForm["nama"]) < 3 || mb_strlen($nilaiForm["nama"]) > 50) {
        $errors[] = "Nama lengkap wajib diisi dengan panjang 3 sampai 50 karakter.";
    }

    if (!filter_var($nilaiForm["email"], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Alamat email tidak valid.";
    }

    $semesterMasuk = filter_var($nilaiForm["semester_form"], FILTER_VALIDATE_INT);
    if ($semesterMasuk === false || $semesterMasuk < 1 || $semesterMasuk > 14) {
        $errors[] = "Semester harus berupa angka bulat dari 1 sampai 14.";
    }

    $tanggalValid = false;
    if (preg_match('/^(\d{4})-(\d{2})-(\d{2})$/', $nilaiForm["tanggal"], $tanggalParts)) {
        $tanggalValid = checkdate((int)$tanggalParts[2], (int)$tanggalParts[3], (int)$tanggalParts[1]);
    }
    if (!$tanggalValid) {
        $errors[] = "Tanggal kunjungan wajib diisi dengan tanggal yang valid.";
    }

    if (!in_array($nilaiForm["jenis_pesan"], ["pertanyaan", "saran"], true)) {
        $errors[] = "Pilih jenis pesan yang tersedia.";
    }

    $minatDiizinkan = ["HTML", "CSS"];
    if (count($nilaiForm["minat"]) < 1 || count(array_diff($nilaiForm["minat"], $minatDiizinkan)) > 0) {
        $errors[] = "Pilih minimal satu topik yang tersedia (HTML atau CSS).";
    }

    if (!in_array($nilaiForm["prodi"], ["SI", "TI"], true)) {
        $errors[] = "Pilih program studi yang tersedia.";
    }

    if ($nilaiForm["pesan"] === "" || mb_strlen($nilaiForm["pesan"]) > 300) {
        $errors[] = "Pesan wajib diisi dan maksimal 300 karakter.";
    }

    // Simpan hasil/error ke session lalu alihkan ke GET (PRG).
    $_SESSION["p7_form_values"] = $nilaiForm;

    if ($errors) {
        $_SESSION["p7_form_errors"] = $errors;
        unset($_SESSION["p7_form_success"]);
    } else {
        $_SESSION["p7_form_success"] = "Form berhasil dikirim dan divalidasi oleh PHP.";
        $_SESSION["p7_form_result"] = $nilaiForm;
        unset($_SESSION["p7_form_errors"]);
    }

    header("Location: index.php");
    exit;
}

// Ambil data session setelah redirect.
if (isset($_SESSION["p7_form_values"]) && is_array($_SESSION["p7_form_values"])) {
    $nilaiForm = array_merge($nilaiForm, $_SESSION["p7_form_values"]);
}
$errors = $_SESSION["p7_form_errors"] ?? [];
$pesanSukses = $_SESSION["p7_form_success"] ?? "";
$hasilKirim = $_SESSION["p7_form_result"] ?? null;

// Escape seluruh nilai yang akan dimasukkan ke HTML.
function e($value): string {
    return htmlspecialchars((string)$value, ENT_QUOTES, "UTF-8");
}

// Flash message hanya ditampilkan sekali.
unset($_SESSION["p7_form_errors"], $_SESSION["p7_form_success"], $_SESSION["p7_form_result"]);
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Mahasiswa - P7</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <div class="header-top">
        <h1>Profil Mahasiswa</h1>
        <button class="nav-toggle" id="navToggle" type="button"
            aria-label="Buka navigasi" aria-controls="navMenu" aria-expanded="false">&#9776;</button>
    </div>
    <nav>
        <ul id="navMenu">
            <li><a href="#home">Beranda</a></li>
            <li><a href="#about">Tentang</a></li>
            <li><a href="#contact">Kontak</a></li>
        </ul>
    </nav>
</header>

<main>
    <section id="home">
        <h2>Selamat Datang</h2>
        <p>Halo, saya <strong><?= e($namaMahasiswa) ?></strong>. Saya sedang mempelajari
            <strong><?= e(NAMA_MATA_KULIAH) ?></strong> pada tahun akademik <?= e($tahunAkademik) ?>.</p>
        <img src="img/foto-profil.png" alt="Foto profil Ringo Zareka Ramadan">
    </section>

    <section id="about">
        <h2>Tentang Saya</h2>
        <article>
            <h3>Profil Singkat</h3>
            <p>Program Studi: <?= e($programStudi === "TI" ? "Teknik Informatika" : "Sistem Informasi") ?> (<?= e($programStudi) ?>)</p>
            <p>Status mahasiswa: <?= $statusAktif ? "Aktif" : "Tidak aktif" ?></p>
            <p>Semester saat ini: <?= e($semester) ?></p>
            <h3>Target Belajar</h3>
            <ol>
                <li>Memahami sintaks dasar PHP.</li>
                <li>Menggunakan variabel dan konstanta.</li>
                <li>Menerapkan operator dan percabangan.</li>
                <li>Menggunakan perulangan.</li>
                <li>Memproses formulir dengan aman.</li>
            </ol>
        </article>
    </section>

    <section id="contact">
        <h2>Kontak</h2>
        <p>Kunjungi <a target="_blank" rel="noopener noreferrer" href="https://github.com/<?= e(PROFIL_GITHUB) ?>">profil GitHub saya</a>.</p>

        <?php if ($errors): ?>
            <div class="notice notice-error" role="alert">
                <strong>Form belum dapat dikirim:</strong>
                <ul><?php foreach ($errors as $error): ?><li><?= e($error) ?></li><?php endforeach; ?></ul>
            </div>
        <?php endif; ?>

        <?php if ($pesanSukses !== ""): ?>
            <div class="notice notice-success" role="status"><?= e($pesanSukses) ?></div>
        <?php endif; ?>

        <form id="contactForm" action="index.php" method="post" novalidate>
            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input class="input-form" type="text" id="nama" name="nama" minlength="3" maxlength="50"
                    placeholder="Masukkan nama lengkap" value="<?= e($nilaiForm["nama"]) ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input class="input-form" type="email" id="email" name="email"
                    placeholder="nama@email.com" value="<?= e($nilaiForm["email"]) ?>" required>
            </div>
            <div class="form-group">
                <label for="semester">Semester</label>
                <input class="input-form" type="number" id="semester" name="semester" min="1" max="14"
                    value="<?= e($nilaiForm["semester_form"]) ?>" required>
            </div>
            <div class="form-group">
                <label for="tanggal">Tanggal Kunjungan</label>
                <input class="input-form" type="date" id="tanggal" name="tanggal"
                    value="<?= e($nilaiForm["tanggal"]) ?>" required>
            </div>
            <div class="form-group">
                <p>Jenis Pesan</p>
                <label class="choice"><input type="radio" id="pertanyaan" name="jenis_pesan" value="pertanyaan"
                    <?= $nilaiForm["jenis_pesan"] === "pertanyaan" ? "checked" : "" ?>> Pertanyaan</label>
                <label class="choice"><input type="radio" id="saran" name="jenis_pesan" value="saran"
                    <?= $nilaiForm["jenis_pesan"] === "saran" ? "checked" : "" ?>> Saran</label>
            </div>
            <div class="form-group">
                <p>Topik yang Diminati</p>
                <label class="choice"><input type="checkbox" name="minat[]" value="HTML"
                    <?= in_array("HTML", $nilaiForm["minat"], true) ? "checked" : "" ?>> HTML</label>
                <label class="choice"><input type="checkbox" name="minat[]" value="CSS"
                    <?= in_array("CSS", $nilaiForm["minat"], true) ? "checked" : "" ?>> CSS</label>
            </div>
            <div class="form-group">
                <label for="prodi">Program Studi</label>
                <select class="input-form" id="prodi" name="prodi" required>
                    <option value="">-- Pilih Program Studi --</option>
                    <option value="SI" <?= $nilaiForm["prodi"] === "SI" ? "selected" : "" ?>>Sistem Informasi</option>
                    <option value="TI" <?= $nilaiForm["prodi"] === "TI" ? "selected" : "" ?>>Teknik Informatika</option>
                </select>
            </div>
            <div class="form-group">
                <label for="pesan">Pesan</label>
                <textarea class="input-form" id="pesan" name="pesan" maxlength="300"
                    placeholder="Tulis pesan Anda" required><?= e($nilaiForm["pesan"]) ?></textarea>
            </div>
            <button type="submit">Kirim</button>
            <button type="reset">Batal</button>
            <p id="formFeedback" aria-live="polite"></p>
        </form>

        <?php if (is_array($hasilKirim)): ?>
            <div class="result-panel">
                <h3>Data Formulir yang Berhasil Diproses</h3>
                <p><strong>Nama:</strong> <?= e($hasilKirim["nama"]) ?></p>
                <p><strong>Email:</strong> <?= e($hasilKirim["email"]) ?></p>
                <p><strong>Semester:</strong> <?= e($hasilKirim["semester_form"]) ?></p>
                <p><strong>Tanggal:</strong> <?= e($hasilKirim["tanggal"]) ?></p>
                <p><strong>Jenis pesan:</strong> <?= e($hasilKirim["jenis_pesan"]) ?></p>
                <p><strong>Minat:</strong> <?= e(implode(", ", $hasilKirim["minat"])) ?></p>
                <p><strong>Program studi:</strong> <?= e($hasilKirim["prodi"]) ?></p>
                <p><strong>Pesan:</strong><br><?= nl2br(e($hasilKirim["pesan"])) ?></p>
            </div>
        <?php endif; ?>
    </section>
</main>

<footer>
    <p>&copy; <?= e(date("Y")) ?> <?= e($namaMahasiswa) ?> [<?= e($nim) ?>]</p>
</footer>
<script src="script.js"></script>
</body>
</html>
