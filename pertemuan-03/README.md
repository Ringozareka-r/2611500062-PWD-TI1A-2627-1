# pertemuan-03

# Pertemuan 3 - Formulir HTML dan CSS Dasar

## Baseline

* Menggunakan hasil P2 sebagai dasar pengembangan P3.
* Menyalin `index.html` dan `img/foto-profil.jpg` ke folder `pertemuan-03/`.
* Mengembangkan halaman profil dengan menambahkan formulir kontak dan CSS dasar.

## Implementasi Formulir

* Elemen form yang digunakan: `<form>`, `<label>`, `<input>`, `<button>`.
* Tipe input yang digunakan:

  1. `text` untuk nama.
  2. `email` untuk alamat email.
  3. `number` untuk semester.
  4. `date` untuk tanggal.
  5. `submit` untuk mengirim formulir.
* Atribut validasi yang digunakan:

  * `required`
  * `minlength`
  * `maxlength`
  * `min`
  * `max`
  * `type="email"`

## Pengujian GET dan POST

* Hasil pengujian GET: Data formulir ditampilkan pada URL browser setelah formulir dikirim.
* Contoh URL encoding yang ditemukan: `nama=Ringo+Zareka+Ramadan&email=ringo%40email.com&semester=1`
* Hasil pengujian POST: Data formulir dikirim melalui request POST dan tidak ditampilkan pada URL browser.

## CSS Dasar

* Selector elemen: `body`, `h1`, `p`, `form`, `input`.
* Selector class: `.container`, `.form-group`.
* Selector ID: `#contact`, `#nama`, `#email`.
* Properti CSS dasar yang digunakan:

  * `color`
  * `background-color`
  * `font-family`
  * `font-size`
  * `margin`
  * `padding`
  * `border`
  * `width`

## Pengujian dan Perbaikan

* Galat yang ditemukan: Beberapa input formulir tidak dapat dikirim ketika data yang dimasukkan tidak memenuhi aturan validasi.
* Penyebab galat: Data yang dimasukkan tidak sesuai dengan atribut validasi seperti `required`, `minlength`, `maxlength`, `min`, atau `max`.
* Perbaikan yang dilakukan: Mengisi data sesuai dengan aturan validasi dan memperbaiki atribut pada elemen form.
* Hasil pengujian ulang: Formulir dapat digunakan dan validasi HTML berjalan dengan baik.

## GitHub Pages

URL: [https://github.com/Ringozareka-r/2611500062-PWD-TI1A-2627-1/tree/main/pertemuan-03]
