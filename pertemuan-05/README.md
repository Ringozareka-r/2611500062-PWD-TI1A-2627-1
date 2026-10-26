# Pertemuan 05 — JavaScript Dasar, DOM, Event, dan Validasi Sisi Klien

**Mahasiswa:** Ringo Zareka Ramadan  
**NIM:** 2611500062  
**Kelompok:** TI1A

## Deskripsi
Pada pertemuan ini, halaman profil mahasiswa dikembangkan dengan JavaScript untuk mengatur navigasi responsif dan memvalidasi formulir kontak. Tampilan dibuat menggunakan HTML dan CSS.

## Berkas
- `index.html` — struktur halaman profil dan formulir kontak.
- `style.css` — tata letak, gaya formulir, dan tampilan responsif.
- `script.js` — interaksi navigasi, validasi formulir, dan penghitung karakter.
- `img/foto-profil.png` — gambar profil.

## Fitur
- Navigasi hamburger untuk layar kecil.
- Atribut aksesibilitas `aria-expanded` dan `aria-label ikut diperbarui saat menu dibuka atau ditutup.
- Validasi nama (3–50 karakter), email, semester (bilangan bulat 1–14), tanggal kunjungan, jenis pesan, topik minat, program studi, dan pesan.
- Pesan formulir ditampilkan menggunakan kelas CSS untuk status kesalahan atau berhasil.
- Pesan validasi dibersihkan ketika pengguna mulai mengubah input atau menekan tombol Batal.
- Penghitung karakter pesan dengan batas 300 karakter.

## Cara Menjalankan
1. Buka folder `pertemuan-05`.
2. Buka `index.html` menggunakan browser.
3. Coba tombol Menu pada lebar layar kecil.
4. Isi formulir dengan data yang salah untuk melihat validasi, lalu isi semua kolom dengan data yang benar.
5. Tekan tombol Batal untuk mengosongkan formulir.

## Checklist Pengujian
- [ ] Menu navigasi bisa dibuka dan ditutup pada layar kecil.
- [ ] Nama kurang dari 3 atau lebih dari 50 karakter ditolak.
- [ ] Email tidak valid ditolak.
- [ ] Semester di luar rentang 1–14 atau bukan bilangan bulat ditolak.
- [ ] Tanggal, jenis pesan, program studi, dan minimal satu topik wajib dipilih.
- [ ] Pesan wajib diisi dan dibatasi maksimal 300 karakter.
- [ ] Pesan kesalahan dibersihkan saat input berubah.
- [ ] Tombol Batal mereset formulir dan pesan umpan balik.

## Riwayat Pengembangan
Catat perubahan berikutnya menggunakan pesan commit yang menjelaskan perubahan secara singkat. Checklist pengujian perlu ditandai setelah pengujian benar-benar dilakukan.