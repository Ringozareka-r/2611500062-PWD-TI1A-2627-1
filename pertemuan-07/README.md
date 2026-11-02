# Pertemuan 07 – Pemrograman Web Dasar

Project P7 melanjutkan halaman profil dari P6. Folder P6 tidak perlu diubah; letakkan folder `pertemuan-07` ini sejajar dengan folder `pertemuan-06`.

## Identitas
- Nama: Ringo Zareka Ramadan
- NIM: 2611500062
- Program Studi: Teknik Informatika
- Kelas: TI1A
- Semester: 1
- Tahun Akademik: 2026/2027

## Isi folder
- `index.php` – halaman profil dan formulir utama dengan POST, validasi server, session, dan PRG.
- `indexGet.php` – demonstrasi pengiriman data menggunakan GET.
- `style.css` – tampilan halaman.
- `script.js` – navigasi responsif dan pemeriksaan awal formulir di browser.
- `img/` – tempat gambar profil.

## Cara memasang di Laragon
1. Pastikan Laragon sudah berjalan dan Apache aktif.
2. Salin folder `pertemuan-07` ke dalam folder project di `C:\laragon\www\2611500062-PWD-TI1A-2627-1\`.
3. Pastikan folder `img` berisi file `foto-profil.png`. Salin gambar yang sama dari folder `pertemuan-06/img/` jika belum ada.
4. Buka `http://localhost/2611500062-PWD-TI1A-2627-1/pertemuan-07/`.
5. Untuk demonstrasi GET, buka `http://localhost/2611500062-PWD-TI1A-2627-1/pertemuan-07/indexGet.php`.

## Materi yang diterapkan
1. GET memakai `$_GET` pada `indexGet.php`.
2. POST memakai `$_POST` pada formulir utama.
3. Normalisasi input menggunakan `trim()`.
4. Validasi email menggunakan `filter_var()` dan validasi semester, tanggal, pilihan radio, checkbox, program studi, serta panjang pesan.
5. Pengamanan keluaran HTML menggunakan `htmlspecialchars()` melalui fungsi `e()`.
6. Pesan kesalahan, nilai formulir, dan hasil berhasil disimpan sementara menggunakan `$_SESSION`.
7. Post-Redirect-Get dilakukan dengan `header("Location: index.php"); exit;` setelah POST diproses.
8. Checkbox menggunakan nama `minat[]` agar pilihan diterima sebagai array.

## Pengujian yang perlu dilakukan
Lakukan melalui browser setelah Apache aktif:
- Buka halaman utama dan pastikan tidak ada galat PHP.
- Kirim data valid: nama minimal 3 karakter, email valid, semester 1–14, tanggal valid, pilih jenis pesan, minimal satu minat, program studi, dan pesan maksimal 300 karakter.
- Pastikan halaman kembali ke `index.php` dan data hasil pemrosesan tampil.
- Muat ulang halaman (Ctrl+R) dan pastikan browser tidak meminta pengiriman ulang POST.
- Kirim data tidak valid (misalnya email salah atau semester 15) dan pastikan pesan kesalahan muncul serta nilai yang sudah diisi tetap tersedia.
- Buka `indexGet.php`, kirim nama dan email, lalu amati parameter pada URL.

**Catatan kejujuran pengujian:** file ini disusun berdasarkan struktur P6 di repository. Pengujian langsung di Laragon pada komputer pengguna belum dapat dilakukan dari sini. Isi bagian hasil pengujian di atas sesuai hasil yang benar-benar diperoleh saat dijalankan.

## Catatan gambar profil
Repository P6 menggunakan `img/foto-profil.png`. Salin file tersebut ke folder `pertemuan-07/img/` agar gambar profil tampil. Folder `img` pada paket ini disiapkan untuk file tersebut.


## Menyimpan ke GitHub
Setelah folder `pertemuan-07` diletakkan di dalam repository lokal:
```bash
git status
git add pertemuan-07/
git commit -m "feat: complete P7 form processing with PHP"
git push
```
Perintah tersebut dijalankan dari folder utama repository. Pastikan hasil `git status` dan proses `git push` diperiksa sebelum menyatakan perubahan sudah terkirim ke GitHub.
