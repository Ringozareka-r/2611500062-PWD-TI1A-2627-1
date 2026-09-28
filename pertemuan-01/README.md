# pertemuan-01

Fungsi: Dokumentasi capaian pembelajaran P1.

# Bukti Belajar P1

**Fungsi:** Dokumentasi capaian pembelajaran P1.

## 1. Konsep Dasar Pemrograman Web


Pemrograman web adalah proses membuat dan mengembangkan sebuah website agar bisa digunakan oleh pengguna melalui browser. Dalam membuat website, biasanya digunakan beberapa bahasa pemrograman seperti HTML, CSS, dan JavaScript.

HTML digunakan untuk membuat struktur atau isi dari halaman web. CSS digunakan untuk mengatur tampilan halaman, seperti warna, ukuran tulisan, dan posisi elemen. Sedangkan JavaScript digunakan untuk membuat halaman web menjadi lebih interaktif.

Jadi, secara sederhana pemrograman web merupakan cara untuk membuat sebuah halaman atau aplikasi yang dapat diakses melalui internet dan digunakan oleh pengguna.


## 2. Arsitektur Klien-Peladen

Web memakai model klien-peladen (client-server). Klien (biasanya browser) meminta sumber daya, sedangkan peladen (server) menyimpan, memproses, dan mengirimkan sumber daya itu. Satu peladen bisa melayani banyak klien sekaligus. Contohnya, browser meminta halaman index.html, lalu server mengirimkan berkasnya.

## 3. HTTP Request dan Response

HTTP (HyperText Transfer Protocol) adalah aturan komunikasi antara klien dan peladen.

Request: permintaan dari klien, berisi metode (misalnya GET untuk mengambil data, POST untuk mengirim data), URL, dan header.
Response: jawaban dari peladen, berisi status code (misalnya 200 berhasil, 404 tidak ditemukan), header, dan isi (body) seperti HTML.

Alurnya: klien kirim request → peladen memproses → peladen kirim response → browser menampilkan hasilnya.

## 4. HTML, CSS, JavaScript, PHP, MySQL
HTML: membentuk struktur dan isi halaman (teks, gambar, tautan).
CSS: mengatur tampilan (warna, tata letak, font).
JavaScript: membuat halaman interaktif, berjalan di sisi klien (browser).
PHP: bahasa pemrograman sisi peladen untuk memproses logika, seperti menangani formulir dan mengambil data.
MySQL: sistem basis data untuk menyimpan dan mengelola data secara terstruktur.
## 5. Hubungan Antarteknologi

Kelimanya saling melengkapi. Browser meminta halaman, lalu PHP di peladen memproses permintaan dan mengambil data dari MySQL. Hasilnya dikirim sebagai HTML, yang tampilannya diatur CSS dan interaktivitasnya ditambah JavaScript. Bisa diibaratkan HTML sebagai kerangka, CSS sebagai desain, JavaScript sebagai gerakan, PHP sebagai otak di belakang layar, dan MySQL sebagai tempat penyimpanan data.