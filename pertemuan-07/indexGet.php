<?php
// Demonstrasi GET: data formulir diterima melalui parameter URL.
$nama = trim((string)($_GET["nama"] ?? ""));
$email = trim((string)($_GET["email"] ?? ""));
$hasil = $_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["nama"]);

function e($value): string {
    return htmlspecialchars((string)$value, ENT_QUOTES, "UTF-8");
}
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demonstrasi GET</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header><h1>Demonstrasi Metode GET</h1><nav><ul><li><a href="index.php">Kembali ke P7</a></li></ul></nav></header>
<main>
    <section id="contact">
        <h2>Formulir GET</h2>
        <p>Data yang dikirim dengan GET akan terlihat sebagai parameter pada URL.</p>
        <form action="indexGet.php" method="get">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input class="input-form" id="nama" name="nama" type="text" value="<?= e($nama) ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input class="input-form" id="email" name="email" type="email" value="<?= e($email) ?>" required>
            </div>
            <button type="submit">Kirim dengan GET</button>
        </form>
        <?php if ($hasil): ?>
            <div class="result-panel">
                <h3>Data yang diterima</h3>
                <p>Nama: <?= e($nama) ?></p>
                <p>Email: <?= e($email) ?></p>
            </div>
        <?php endif; ?>
    </section>
</main>
</body>
</html>
