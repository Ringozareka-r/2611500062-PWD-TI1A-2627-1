<?php
session_start();


// Memproses formulir Peminjaman dan Kontak.
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // FORMULIR PEMINJAMAN
    if (($_POST["form_type"] ?? "") === "peminjaman") {

        // Mengambil dan membersihkan input
        $namaPJ = trim((string) ($_POST["nama_penanggung_jawab"] ?? ""));
       $namaPJ = preg_replace('/\s+/', ' ', $namaPJ);

        $jenisFasilitas = trim((string) ($_POST["jenis_fasilitas"] ?? ""));
        $tanggalPinjam = trim((string) ($_POST["tanggal_peminjaman"] ?? ""));
        $durasi = trim((string) ($_POST["durasi_peminjaman"] ?? ""));
        $keperluan = trim((string) ($_POST["keperluan_peminjaman"] ?? ""));

        $daftarFasilitas = [
            "Ruang Kelas",
            "Aula",
            "Laboratorium Komputer",
            "Proyektor"
        ];

        $errorsPeminjaman = [];

        // Validasi nama
        if (strlen($namaPJ) < 3 || strlen($namaPJ) > 50) {
            $errorsPeminjaman[] = "Nama harus terdiri dari 3 sampai 50 karakter.";
        }

        // Validasi fasilitas
        if (!in_array($jenisFasilitas, $daftarFasilitas, true)) {
            $errorsPeminjaman[] = "Silakan pilih fasilitas yang tersedia.";
        }

        // Validasi tanggal
        $tanggalValid = DateTime::createFromFormat('!Y-m-d', $tanggalPinjam);

        if (
            !$tanggalValid ||
            $tanggalValid->format('Y-m-d') !== $tanggalPinjam
        ) {
            $errorsPeminjaman[] = "Tanggal peminjaman tidak valid.";
        }

        // Validasi durasi
        if (
            filter_var($durasi, FILTER_VALIDATE_INT) === false ||
            (int) $durasi < 1 ||
            (int) $durasi > 24
        ) {
            $errorsPeminjaman[] = "Durasi harus antara 1 sampai 24 jam.";
        }

        // Validasi keperluan
        if ($keperluan === "" || strlen($keperluan) > 300) {
            $errorsPeminjaman[] = "Keperluan wajib diisi maksimal 300 karakter.";
        }

        // Menyimpan data jika valid
        if (empty($errorsPeminjaman)) {

            $_SESSION["peminjaman"] = [
                "nama" => $namaPJ,
                "fasilitas" => $jenisFasilitas,
                "tanggal" => $tanggalPinjam,
                "durasi" => $durasi,
                "keperluan" => $keperluan
            ];

            $_SESSION["errors_peminjaman"] = [];

        } else {
            $_SESSION["errors_peminjaman"] = $errorsPeminjaman;
        }

        // PRG: menghindari pengiriman ulang formulir
        header("Location: index.php#peminjaman");
        exit;

    } else {

        // FORMULIR KONTAK LAMA
        $nama = trim((string) ($_POST["nama"] ?? ""));
        $email = trim((string) ($_POST["email"] ?? ""));
        $semesterForm = trim((string) ($_POST["semester"] ?? ""));
        $tanggal = trim((string) ($_POST["tanggal"] ?? ""));
        $jenisPesan = trim((string) ($_POST["jenis_pesan"] ?? ""));
        $minat = $_POST["minat"] ?? [];
        $prodi = trim((string) ($_POST["prodi"] ?? ""));
        $pesan = trim((string) ($_POST["pesan"] ?? ""));

        if (!is_array($minat)) {
            $minat = [];
        }

        $_SESSION["nama"] = $nama;
        $_SESSION["email"] = $email;
        $_SESSION["semester"] = $semesterForm;
        $_SESSION["tanggal"] = $tanggal;
        $_SESSION["jenis_pesan"] = $jenisPesan;
        $_SESSION["minat"] = $minat;
        $_SESSION["prodi"] = $prodi;
        $_SESSION["pesan"] = $pesan;

        header("Location: index.php#contact");
        exit;
    }
}


// Mengamankan data sebelum ditampilkan kembali ke halaman HTML.
// P6: PHP dasar dan pemrograman sisi peladen
// Bagian 1: Variabel dan konstanta
$nim = "2611500062";
$namaMahasiswa = "Ringo Zareka Ramadan";
$programStudi = "TI";
$tahunAkademik = "2026/2027";
$semester = 1;
$ipk = 0 ;
$statusAktif = true;
$catatanTambahan = null;

const NAMA_MATA_KULIAH = "Pemrograman Web Dasar";
const PROFIL_GITHUB = "Ringozareka-r";

// Bagian 2: Operator
$batasSemester = 8;
$sisaSemester = $batasSemester - $semester;
$semesterValid = $semester >= 1 && $semester <= $batasSemester;
$statusSemester = ($semesterValid && $statusAktif) ? "Sesuai rentang" : "Perlu diperiksa";

// Bagian 3: Percabangan if-elseif-else
if ($semester < 3) {
	$keteranganSemester = "Semester awal";
} elseif ($semester <= 6) {
	$keteranganSemester = "Semester menengah";
} else {
	$keteranganSemester = "Semester akhir";
}

$namaProdi = ($programStudi == "SI") ? "Sistem Informasi" : (($programStudi == "TI") ? "Teknik Informatika" : "Lainnya");

// Bagian 4: Percabangan switch-case-default
switch ($programStudi) {
	case "SI":
		$fokusProgramStudi = "Sistem informasi dan proses bisnis";
		break;
	case "TI":
		$fokusProgramStudi = "Komputasi dan pengembangan perangkat lunak";
		break;
	default:
		$fokusProgramStudi = "Belum ditentukan";
}
?>
<!doctype html>
<html lang="id">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Profil Mahasiswa</title>
	<link rel="stylesheet" href="style.css" />
</head>

<body>
	<header>
		<div class="header-top">
			<h1>Profil Mahasiswa</h1>

			<button
				class="nav-toggle"
				id="navToggle"
				type="button"
				aria-label="Buka navigasi"
				aria-controls="navMenu"
				aria-expanded="false">
				&#9776;
			</button>
		</div>

		<nav>
    <ul id="navMenu">
        <li><a href="#home">Beranda</a></li>
        <li><a href="#about">Tentang</a></li>
        <li><a href="#peminjaman">Peminjaman Fasilitas</a></li>
        <li><a href="#contact">Kontak</a></li>
    </ul>
</nav>
	</header>

	<main>
		<section id="home">
			<h2>Selamat Datang</h2>
			<p>Halo, saya <strong><?php echo $namaMahasiswa; ?></strong>. Saya sedang mempelajari matakuliah <strong><?php print NAMA_MATA_KULIAH; ?></strong> pada tahun akademik <?php echo $tahunAkademik; ?>.</p>

			<img src="img/foto-profil.png" alt="Foto profil Nama Mahasiswa" />
		</section>

		<section id="about">
			<h2>Tentang Saya</h2>

			<article>
				<h3>Profil Singkat</h3>
				<p>Program Studi: <?php echo $namaProdi . " (" . $programStudi . ")"; ?></p>
				<p>Fokus program studi: <?php echo $fokusProgramStudi; ?></p>
				<p>Status mahasiswa: <?php echo $statusAktif ? "Aktif" : "Tidak aktif"; ?></p>
				<p>Semester: <?php echo $semester . " (" . $keteranganSemester . ")"; ?></p>
				<p>Sisa semester hingga batas: <?php echo $sisaSemester; ?></p>
				<p>Pemeriksaan rentang semester: <?php echo $statusSemester; ?></p>
				<p>IPK: <?php echo number_format($ipk, 2, ',', '.'); ?></p>
				<p>Catatan tambahan: <?php echo $catatanTambahan === null ? "Belum ada" : $catatanTambahan; ?></p>

				<h3>Target Belajar (Perulangan for)</h3>
				<ol>
					<?php
					// Perulangan for tanpa array; materi larik dibahas pada P9.
					for ($i = 1; $i <= 5; $i++) {
						echo "<li>Target belajar ke-" . $i . ": ";
						switch ($i) {
							case 1:
								echo "Memahami sintaks dasar PHP.";
								break;
							case 2:
								echo "Menggunakan variabel dan konstanta.";
								break;
							case 3:
								echo "Menerapkan operator dan percabangan.";
								break;
							case 4:
								echo "Menggunakan perulangan for dan while.";
								break;
							default:
								echo "Belum dipetakan";
								break;
						}
						echo "</li>";
					}
					?>
				</ol>

				<h3>Semester (Perulangan while):</h3>
				<ol>
					<?php
					$nomorSemester = 1;
					while ($nomorSemester <= 3) {
						echo "<li>Semester " . $nomorSemester . "</li>";
						$nomorSemester++; // operator penugasan
					}
					?>
				</ol>
			</article>
		</section>

		
			
<section id="peminjaman">
    <h2>Permohonan Peminjaman Fasilitas Kampus</h2>

    <form id="peminjamanForm" action="index.php" method="post">
	<input type="hidden" name="form_type" value="peminjaman">

        <!-- Nama Penanggung Jawab -->
        <div class="form-group">
            <label for="nama_penanggung_jawab">
                Nama Penanggung Jawab
            </label>
            <input
                class="input-form"
                type="text"
                id="nama_penanggung_jawab"
                name="nama_penanggung_jawab"
                placeholder="Masukkan nama penanggung jawab"
                minlength="3"
                maxlength="50"
                required>
        </div>

        <!-- Jenis Fasilitas -->
        <div class="form-group">
            <label for="jenis_fasilitas">Jenis Fasilitas</label>

            <select
                class="input-form"
                id="jenis_fasilitas"
                name="jenis_fasilitas"
                required>

                <option value="">-- Pilih Fasilitas --</option>

                
<option value="Ruang Kelas">Ruang Kelas</option>
<option value="Aula">Aula</option>
<option value="Laboratorium Komputer">Laboratorium Komputer</option>
<option value="Proyektor">Proyektor</option>

            </select>
        </div>

        <!-- Fasilitas Lainnya -->
        <div class="form-group" id="fasilitasLainnyaGroup" hidden>
            <label for="fasilitas_lainnya">
                Tuliskan Fasilitas yang Dibutuhkan
            </label>
            <input
                class="input-form"
                type="text"
                id="fasilitas_lainnya"
                name="fasilitas_lainnya"
                placeholder="Contoh: Kamera, Tripod, dan lainnya"
                maxlength="100">
        </div>

        <!-- Tanggal Peminjaman -->
        <div class="form-group">
            <label for="tanggal_peminjaman">Tanggal Peminjaman</label>
            <input
                class="input-form"
                type="date"
                id="tanggal_peminjaman"
                name="tanggal_peminjaman"
                required>
        </div>

        <!-- Durasi Peminjaman -->
        <div class="form-group">
            <label for="durasi_peminjaman">
                Durasi Peminjaman (jam)
            </label>
            <input
                class="input-form"
                type="number"
                id="durasi_peminjaman"
                name="durasi_peminjaman"
                min="1"
                max="24"
                placeholder="Contoh: 3"
                required>
        </div>

        <!-- Keperluan Peminjaman -->
        <div class="form-group">
            <label for="keperluan_peminjaman">
                Keperluan Peminjaman
            </label>
            <textarea
                class="input-form"
                id="keperluan_peminjaman"
                name="keperluan_peminjaman"
                placeholder="Jelaskan tujuan peminjaman fasilitas"
                maxlength="300"
                required></textarea>
        </div>

        <button type="submit">Kirim</button>
        <button type="reset">Batal</button>

    </form>
	<?php if (!empty($_SESSION["errors_peminjaman"])): ?>

    <div class="form-feedback-error">
        <h3>Pengajuan Belum Berhasil</h3>

        <?php foreach ($_SESSION["errors_peminjaman"] as $error): ?>
            <p><?= htmlspecialchars($error, ENT_QUOTES, "UTF-8") ?></p>
        <?php endforeach; ?>
    </div>

<?php elseif (!empty($_SESSION["peminjaman"])): ?>

    <article class="submission-result">
        <h3>Data Peminjaman Berhasil Dikirim</h3>

        <p><strong>Nama Penanggung Jawab:</strong>
            <?= htmlspecialchars($_SESSION["peminjaman"]["nama"], ENT_QUOTES, "UTF-8") ?>
        </p>

        <p><strong>Jenis Fasilitas:</strong>
            <?= htmlspecialchars($_SESSION["peminjaman"]["fasilitas"], ENT_QUOTES, "UTF-8") ?>
        </p>

        <p><strong>Tanggal Peminjaman:</strong>
            <?= htmlspecialchars($_SESSION["peminjaman"]["tanggal"], ENT_QUOTES, "UTF-8") ?>
        </p>

        <p><strong>Durasi Peminjaman:</strong>
            <?= htmlspecialchars($_SESSION["peminjaman"]["durasi"], ENT_QUOTES, "UTF-8") ?> jam
        </p>

        <p><strong>Keperluan:</strong>
            <?= htmlspecialchars($_SESSION["peminjaman"]["keperluan"], ENT_QUOTES, "UTF-8") ?>
        </p>
    </article>

<?php endif; ?>
</section>



   			<section id="contact">
			<h2>Kontak</h2>

			<p>
				Kunjungi
				<a target="_blank" href="https://github.com/<?= PROFIL_GITHUB ?>">profil GitHub saya</a>.
			</p>

			<form id="contactForm" class="js-contact-form" data-validation="contact" action="index.php" method="post" novalidate>
				<div class="form-group">
					<label for="nama">Nama Lengkap</label><br />

					<input
						class="input-form"
						type="text"
						id="nama"
						name="nama"
						placeholder="Masukkan nama lengkap"
						minlength="3"
						maxlength="50"
						required />
				</div>

				<div class="form-group">
					<label for="email">Email</label><br />

					<input class="input-form" type="email" id="email" name="email" placeholder="nama@email.com" required />
				</div>

				<div class="form-group">
					<label for="semester">Semester</label><br />

					<input class="input-form" type="number" id="semester" name="semester" min="1" max="14" required />
				</div>

				<div class="form-group">
					<label for="tanggal">Tanggal Kunjungan</label><br />

					<input class="input-form" type="date" id="tanggal" name="tanggal" required />
				</div>

				<div class="form-group">
					<p>Jenis Pesan</p>

					<input type="radio" id="pertanyaan" name="jenis_pesan" value="pertanyaan" required />
					<label for="pertanyaan">Pertanyaan</label>

					<input type="radio" id="saran" name="jenis_pesan" value="saran" />
					<label for="saran">Saran</label>
				</div>

				<div class="form-group">
					<p>Topik yang Diminati</p>

					<input type="checkbox" id="minat-html" name="minat[]" value="HTML" />
					<label for="minat-html">HTML</label>

					<input type="checkbox" id="minat-css" name="minat[]" value="CSS" />
					<label for="minat-css">CSS</label>
				</div>

				<div class="form-group">
					<label for="prodi">Program Studi</label><br />

					<select class="input-form" id="prodi" name="prodi" required>
						<option value="">-- Pilih Program Studi --</option>
						<option value="SI">Sistem Informasi</option>
						<option value="TI">Teknik Informatika</option>
					</select>
				</div>

				<div class="form-group">
					<label for="pesan">Pesan</label><br />

					<textarea
						class="input-form"
						id="pesan"
						name="pesan"
						maxlength="300"
						placeholder="Tulis pesan Anda"
						required></textarea>
				</div>

				<button type="submit">Kirim</button>
				<button type="reset">Batal</button>
				<p class="form-feedback" data-form-feedback aria-live="polite"></p>
			</form>

			<?php if (isset($_SESSION["nama"])): ?>
				<article id="hasilKontak" class="submission-result" aria-live="polite">
					<h3>Data Formulir yang Dikirim</h3>
					<p><strong>Nama Lengkap:</strong> <?= htmlspecialchars($_SESSION["nama"] ?? "", ENT_QUOTES, "UTF-8") ?></p>
					<p><strong>Email:</strong> <?= htmlspecialchars($_SESSION["email"] ?? "", ENT_QUOTES, "UTF-8") ?></p>
					<p><strong>Semester:</strong> <?= htmlspecialchars($_SESSION["semester"] ?? "", ENT_QUOTES, "UTF-8") ?></p>
					<p><strong>Tanggal Kunjungan:</strong> <?= htmlspecialchars($_SESSION["tanggal"] ?? "", ENT_QUOTES, "UTF-8") ?></p>
					<p><strong>Jenis Pesan:</strong> <?= htmlspecialchars($_SESSION["jenis_pesan"] ?? "", ENT_QUOTES, "UTF-8") ?></p>
					<p><strong>Topik yang Diminati:</strong>
						<?= htmlspecialchars(implode(", ", $_SESSION["minat"] ?? []), ENT_QUOTES, "UTF-8") ?>
					</p>
					<p><strong>Program Studi:</strong> <?= htmlspecialchars($_SESSION["prodi"] ?? "", ENT_QUOTES, "UTF-8") ?></p>
					<p><strong>Pesan:</strong> <?= nl2br(htmlspecialchars($_SESSION["pesan"] ?? "", ENT_QUOTES, "UTF-8")) ?></p>
				</article>
			<?php endif; ?>
		</section>
	</main>

	<footer>
		<p>&copy; <?= date("Y") ?> <?php echo $namaMahasiswa; ?> [<?= $nim ?>]</p>
	</footer>
	<script src="script.js"></script>
</body>

</html>