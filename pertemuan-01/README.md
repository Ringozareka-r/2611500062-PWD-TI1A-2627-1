# pertemuan-01

Fungsi: Dokumentasi capaian pembelajaran P1.

# Bukti Belajar P1

**Fungsi:** Dokumentasi capaian pembelajaran P1.

## 1. Konsep Dasar Pemrograman Web

Pemrograman web adalah proses membuat dan mengembangkan aplikasi atau halaman yang dapat diakses melalui browser menggunakan jaringan internet atau jaringan lokal.

Dalam pemrograman web, terdapat beberapa teknologi yang sering digunakan, seperti **HTML, CSS, JavaScript, PHP, dan MySQL**. Masing-masing memiliki fungsi yang berbeda dalam membangun sebuah website.

* **HTML** digunakan untuk membuat struktur halaman web.
* **CSS** digunakan untuk mengatur tampilan dan desain halaman web.
* **JavaScript** digunakan untuk membuat halaman web menjadi interaktif.
* **PHP** digunakan untuk menjalankan proses di sisi server.
* **MySQL** digunakan untuk menyimpan dan mengelola data.

---

## 2. Arsitektur Klien-Peladen

Arsitektur klien-peladen (*client-server*) adalah model komunikasi antara komputer pengguna sebagai **klien** dan komputer yang menyediakan layanan sebagai **server**.

Ketika pengguna membuka sebuah website, browser bertindak sebagai klien yang mengirimkan permintaan (*request*) kepada server. Server kemudian memproses permintaan tersebut dan mengirimkan kembali hasilnya dalam bentuk *response*.

Contohnya:

```text
Pengguna
   ↓
Browser (Client)
   ↓ Request
Web Server
   ↓ Response
Browser
   ↓
Halaman Web
```

Dengan konsep ini, pengguna tidak perlu mengetahui proses yang terjadi di dalam server. Pengguna cukup berinteraksi melalui browser.

---

## 3. HTTP Request dan Response

**HTTP (Hypertext Transfer Protocol)** adalah protokol yang digunakan untuk komunikasi antara client dan server dalam pertukaran data di web.

Komunikasi HTTP terdiri dari dua bagian utama:

### HTTP Request

HTTP Request adalah permintaan yang dikirim oleh client kepada server.

Contohnya ketika kita membuka:

```text
https://contoh.com
```

Browser akan mengirimkan request kepada server untuk meminta halaman tersebut.

Beberapa metode HTTP yang umum digunakan adalah:

* **GET** → mengambil data dari server.
* **POST** → mengirim data ke server.
* **PUT** → memperbarui data.
* **DELETE** → menghapus data.

### HTTP Response

HTTP Response adalah balasan yang diberikan oleh server setelah menerima dan memproses request dari client.

Contoh status response:

* **200 OK** → permintaan berhasil.
* **404 Not Found** → halaman atau resource tidak ditemukan.
* **500 Internal Server Error** → terjadi kesalahan pada server.

---

## 4. HTML, CSS, JavaScript, PHP, dan MySQL

Kelima teknologi tersebut memiliki peran yang berbeda tetapi saling berhubungan dalam pengembangan web.

### HTML

**HTML (HyperText Markup Language)** digunakan untuk membuat struktur dan isi halaman web.

Contohnya:

```html
<h1>Halo Dunia</h1>
<p>Ini adalah halaman web pertama saya.</p>
```

### CSS

**CSS (Cascading Style Sheets)** digunakan untuk mengatur tampilan halaman web, seperti warna, ukuran tulisan, jarak, dan tata letak.

Contohnya:

```css
h1 {
    color: blue;
}
```

### JavaScript

**JavaScript** digunakan untuk memberikan interaksi dan perilaku dinamis pada halaman web.

Contohnya:

```javascript
alert("Halo Dunia!");
```

### PHP

**PHP (PHP: Hypertext Preprocessor)** merupakan bahasa pemrograman yang dapat dijalankan di sisi server (*server-side*).

PHP dapat digunakan untuk memproses data dari pengguna, menjalankan logika program, dan berkomunikasi dengan database.

Contohnya:

```php
<?php
echo "Halo Dunia!";
?>
```

### MySQL

**MySQL** adalah sistem manajemen database yang digunakan untuk menyimpan dan mengelola data.

Contohnya, sebuah website dapat menggunakan MySQL untuk menyimpan:

* Data pengguna
* Data mahasiswa
* Data produk
* Data transaksi

---

## 5. Hubungan Antarteknologi

HTML, CSS, JavaScript, PHP, dan MySQL tidak bekerja sendiri. Teknologi tersebut dapat digunakan secara bersama-sama untuk membangun aplikasi web.

Contoh hubungan antarteknologi:

```text
Pengguna
   ↓
HTML + CSS + JavaScript
   ↓
HTTP Request
   ↓
PHP (Server)
   ↓
MySQL (Database)
   ↓
PHP memproses data
   ↓
HTTP Response
   ↓
Browser
```

Contohnya pada website data mahasiswa:

1. **HTML** membuat form untuk memasukkan data mahasiswa.
2. **CSS** membuat form terlihat lebih rapi.
3. **JavaScript** dapat melakukan validasi input.
4. **PHP** menerima dan memproses data dari form.
5. **MySQL** menyimpan data mahasiswa.
6. PHP mengambil data dari MySQL ketika data ingin ditampilkan.
7. Hasilnya dikirim kembali ke browser melalui HTTP Response.

## Kesimpulan

Dari pembelajaran P1, saya memahami bahwa pengembangan web terdiri dari beberapa teknologi yang memiliki fungsi berbeda tetapi saling terhubung. **HTML** berfungsi sebagai struktur, **CSS** mengatur tampilan, **JavaScript** memberikan interaksi, **PHP** menangani proses di server, dan **MySQL** digunakan untuk mengelola data.

Pemahaman mengenai **arsitektur klien-peladen serta HTTP Request dan Response** juga menjadi dasar penting untuk memahami bagaimana browser dan server berkomunikasi dalam sebuah aplikasi web.

tes tes tes tes <bd
>
