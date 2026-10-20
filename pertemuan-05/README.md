# pertemuan-05
1. menambahkan file index.html , style.css , img ke dalam folder p5

P5 - JavaScript Dasar, DOM, Event, dan Validasi Sisi Klien

## Deskripsi
Dokumentasi pengembangan halaman web pada P5, meliputi JavaScript, DOM, event listener, interaksi navigasi, dan validasi formulir sisi klien.

## Fitur dan Pengembangan
[melakukan tes connect js ]: [testing pakah java script bisa di jalankan .]

[melakukan praktik DOM]: [Penjelasan singkat perubahan yang dilakukan.]

Tambahkan entri setiap kali ada perkembangan penting pada proyek.

## Pengujian
[Fitur yang diuji]: [Langkah pengujian dan hasil aktual.]

[Fitur yang diuji]: [Langkah pengujian dan hasil aktual.]

Perbarui bagian ini setelah melakukan pengujian atau debugging yang relevan.

## Riwayat Pengembangan
Catat perkembangan melalui commit Git yang bermakna.

[Pesan commit]: [Ringkasan perubahan dan hasil pengujiannya.]

[Pesan commit]: [Ringkasan perubahan dan hasil pengujiannya.]

### 1. Navigasi Responsif

**Perubahan:**
- Menambahkan tombol hamburger dengan ID `navToggle`.
- Menambahkan ID `navMenu` pada elemen navigasi.
- Menggunakan JavaScript untuk membuka dan menutup menu.
- Mengatur atribut `aria-expanded` dan `aria-label` sesuai kondisi menu.
- Menambahkan CSS responsif agar menu dapat dibuka dan ditutup pada layar berukuran kecil.

**Hasil Pengujian:**
- Tombol Menu berhasil diklik.
- Menu navigasi berhasil dibuka dan ditutup.
- Event listener JavaScript berhasil terpasang.
- Pengujian dilakukan pada tampilan responsif dengan lebar 400 px.

### Validasi Form

Menambahkan validasi pada form kontak menggunakan JavaScript.

Yang ditambahkan:
- Memeriksa nama dan email.
- Memeriksa semester dan tanggal kunjungan.
- Memeriksa jenis pesan dan pilihan minat.
- Memeriksa program studi dan isi pesan.
- Menampilkan pesan jika data belum sesuai atau sudah valid.
- Mengosongkan pesan validasi saat tombol Batal ditekan.

Pengujian:
- Form kosong dan data yang tidak sesuai diuji.
- Validasi nama, email, semester, tanggal, jenis pesan, minat, program studi, dan pesan diuji.
- Form dengan data yang benar berhasil divalidasi.
- Tombol Batal berhasil mengosongkan form dan pesan validasi.