<?php
// P9: Kumpulan fungsi buatan sendiri yang dipakai di index.php.

// Mengamankan teks sebelum ditampilkan ke HTML (mencegah XSS).
function bersihkan(string $teks): string
{
	return htmlspecialchars($teks, ENT_QUOTES, "UTF-8");
}

// Membungkus teks dengan tag <strong> agar tampil tebal.
function tebal(string $teks): string
{
	return "<strong>" . $teks . "</strong>";
}
