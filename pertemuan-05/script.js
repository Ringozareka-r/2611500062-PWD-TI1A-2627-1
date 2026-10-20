
const navToggle = document.getElementById("navToggle");
const navMenu = document.getElementById("navMenu");

// Navigasi responsif
navToggle.addEventListener("click", function () {
    navMenu.classList.toggle("nav-open");

    const menuTerbuka = navMenu.classList.contains("nav-open");

    navToggle.setAttribute("aria-expanded", menuTerbuka);
    navToggle.setAttribute(
        "aria-label",
        menuTerbuka ? "Tutup navigasi" : "Buka navigasi"
    );
});

// Validasi form kontak
const form = document.querySelector("form");
const feedback = document.getElementById("form-feedback");

form.addEventListener("submit", function (event) {
    event.preventDefault();

    const nama = document.getElementById("nama").value.trim();
    const email = document.getElementById("email").value.trim();
    const semester = Number(document.getElementById("semester").value);
    const tanggal = document.getElementById("tanggal").value;
    const jenisPesan = document.querySelector(
        'input[name="jenis_pesan"]:checked'
    );
    const minat = document.getElementById("minat").checked;
    const prodi = document.getElementById("prodi").value;
    const pesan = document.getElementById("pesan").value.trim();

    let pesanError = "";

    if (nama.length < 3 || nama.length > 50) {
        pesanError = "Nama harus diisi 3 sampai 50 karakter.";
    } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        pesanError = "Masukkan alamat email yang valid.";
    } else if (
        document.getElementById("semester").value === "" ||
        !Number.isInteger(semester) ||
        semester < 1 ||
        semester > 14
    ) {
        pesanError = "Semester harus diisi dengan angka 1 sampai 14.";
    } else if (!tanggal) {
        pesanError = "Tanggal kunjungan harus diisi.";
    } else if (!jenisPesan) {
        pesanError = "Pilih jenis pesan.";
    } else if (!minat) {
        pesanError = "Pilih topik yang diminati.";
    } else if (!prodi) {
        pesanError = "Pilih program studi.";
    } else if (!pesan) {
        pesanError = "Pesan harus diisi.";
    }

    if (pesanError) {
        feedback.textContent = pesanError;
        feedback.style.color = "red";
        return;
    }

    feedback.textContent = "Form berhasil divalidasi.";
    feedback.style.color = "green";
});

form.addEventListener("reset", function () {
    feedback.textContent = "";
});
