
# Pertemuan 07 – Pemrograman Web Dasar

## Deskripsi

Pertemuan 07 merupakan pengembangan dari proyek Pertemuan 06 (P6) dengan menambahkan pemrosesan formulir menggunakan PHP. Pengembangan dilakukan pada folder `pertemuan-07` tanpa mengubah proyek P6.

Pada P7, formulir menggunakan metode POST, sedangkan demonstrasi GET dibuat melalui file `indexGet.php`. Data formulir diproses dan divalidasi di sisi server, kemudian dikelola menggunakan Session dan pola Post-Redirect-Get (PRG).

## Fitur dan Implementasi

1. **GET**: Demonstrasi pengambilan parameter menggunakan `$_GET` pada `indexGet.php`.
2. **POST**: Pemrosesan data formulir menggunakan `$_POST` pada `index.php`.
3. **Validasi server-side**:
   - Nama lengkap wajib diisi.
   - Email wajib diisi dan diperiksa formatnya.
   - Semester harus berupa bilangan bulat antara 1 dan 14.
   - Tanggal kunjungan wajib diisi.
   - Jenis pesan harus berupa pilihan yang diizinkan.
   - Program studi harus berupa pilihan yang diizinkan.
   - Minimal satu topik minat harus dipilih.
   - Pesan harus memenuhi panjang minimum.
4. **Keamanan keluaran**: Menggunakan `htmlspecialchars()` untuk mengamankan teks sebelum ditampilkan dan `nl2br()` untuk mempertahankan baris baru pada pesan.
5. **Session**: Menyimpan data formulir dan pesan kesalahan sementara menggunakan `$_SESSION`.
6. **Post-Redirect-Get (PRG)**: Setelah POST, server mengarahkan browser kembali ke `index.php` menggunakan `header('Location: index.php')`.
7. **Flash message**: Pesan kesalahan dihapus dari Session setelah ditampilkan.
8. **JavaScript**: Validasi sisi browser tetap digunakan bersama validasi PHP.

## Struktur Folder

```text
pertemuan-07/
├── img/
├── .gitkeep
├── index.html
├── index.php
├── indexGet.php
├── README.md
├── script.js
└── style.css
```

## Cara Menjalankan

Persyaratan:
- Windows
- Laragon
- PHP CLI

Versi PHP yang digunakan saat pengujian: PHP 8.3.36.

Jalankan terminal Cmder Laragon, kemudian masuk ke direktori proyek:

```bash
cd /d "C:\2611500065-PWD-TI1A-26271-"
```

Jalankan PHP Development Server:

```bash
php -S 127.0.0.1:8000 -t "C:\2611500065-PWD-TI1A-26271-\pertemuan-07"
```

Biarkan terminal tetap berjalan, kemudian buka browser:

- Halaman utama: http://127.0.0.1:8000/index.php
- Demonstrasi GET: http://127.0.0.1:8000/indexGet.php

Contoh pengujian GET dengan parameter nama:

```text
http://127.0.0.1:8000/indexGet.php?nama=Andi+Percobaan
```

## Hasil Pengujian

Pengujian berikut telah dilakukan melalui localhost:

| No. | Pengujian | Hasil |
|---|---|---|
| 1 | Demonstrasi GET dengan parameter nama | Berhasil |
| 2 | Pengiriman formulir POST dengan data valid | Berhasil |
| 3 | Redirect dari POST kembali ke index.php | Berhasil |
| 4 | Data tetap tampil setelah redirect | Berhasil |
| 5 | Refresh halaman tanpa pengiriman ulang POST | Berhasil |
| 6 | Validasi email kosong oleh PHP | Berhasil |
| 7 | Validasi format email tidak valid oleh PHP | Berhasil |
| 8 | Validasi ketika tidak ada topik minat dipilih | Berhasil |
| 9 | Flash message hilang setelah halaman dimuat ulang | Berhasil |
| 10 | Validasi JavaScript ketika formulir kosong | Berhasil |

Catatan pengujian:
- Pengujian validasi server-side dilakukan dengan menonaktifkan pemanggilan `script.js` sementara agar validasi PHP dapat diuji secara langsung.
- Setelah pengujian server-side selesai, pemanggilan `script.js` diaktifkan kembali.
- Pengujian PRG menggunakan data formulir yang valid. Setelah pengiriman, browser kembali ke `index.php` dan data tetap ditampilkan setelah halaman di-refresh.

## Kesimpulan

Proyek Pertemuan 07 telah dikembangkan dengan menambahkan demonstrasi GET, pemrosesan formulir POST, validasi server-side, pengelolaan Session, dan pola Post-Redirect-Get (PRG). Pengujian pada localhost menunjukkan bahwa data formulir tetap dapat ditampilkan setelah redirect dan pesan kesalahan validasi dapat ditampilkan melalui flash message.

Proyek tidak menggunakan database.