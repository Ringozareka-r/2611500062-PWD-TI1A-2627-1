const navToggle = document.getElementById("navToggle");
const navMenu = document.getElementById("navMenu");

// Navigasi responsif
navToggle.addEventListener("click", function () {
    navMenu.classList.toggle("nav-open");

    const menuTerbuka = navMenu.classList.contains("nav-open");
    navToggle.setAttribute("aria-expanded", String(menuTerbuka));
    navToggle.setAttribute(
        "aria-label",
        menuTerbuka ? "Tutup navigasi" : "Buka navigasi"
    );
});

// Validasi form kontak
const form = document.getElementById("contactForm");
const feedback = document.getElementById("formFeedback");
const pesanInput = document.getElementById("pesan");
const charCount = document.getElementById("charCount");

form.addEventListener("submit", function (event) {
    event.preventDefault();

    const nama = document.getElementById("nama").value.trim();
    const email = document.getElementById("email").value.trim();
    const semesterValue = document.getElementById("semester").value;
    const semester = Number(semesterValue);
    const tanggal = document.getElementById("tanggal").value;
    const jenisPesan = document.querySelector('input[name="jenis_pesan"]:checked');
    const minat = document.querySelectorAll('input[name="minat"]:checked');
    const prodi = document.getElementById("prodi").value;
    const pesan = pesanInput.value.trim();

    let pesanError = "";

    if (nama.length < 3 || nama.length > 50) {
        pesanError = "Nama harus diisi 3 sampai 50 karakter.";
    } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        pesanError = "Masukkan alamat email yang valid.";
    } else if (
        semesterValue === "" ||
        !Number.isInteger(semester) ||
        semester < 1 ||
        semester > 14
    ) {
        pesanError = "Semester harus diisi dengan angka bulat 1 sampai 14.";
    } else if (!tanggal) {
        pesanError = "Tanggal kunjungan harus diisi.";
    } else if (!jenisPesan) {
        pesanError = "Pilih jenis pesan.";
    } else if (minat.length === 0) {
        pesanError = "Pilih minimal satu topik yang diminati.";
    } else if (!prodi) {
        pesanError = "Pilih program studi.";
    } else if (!pesan) {
        pesanError = "Pesan harus diisi.";
    } else if (pesan.length > 300) {
        pesanError = "Pesan maksimal 300 karakter.";
    }

    if (pesanError) {
        feedback.textContent = pesanError;
        feedback.className = "form-feedback form-feedback-error";
        return;
    }

    feedback.textContent = "Form berhasil divalidasi.";
    feedback.className = "form-feedback form-feedback-success";
});

form.addEventListener("reset", function () {
    feedback.textContent = "";
    feedback.className = "form-feedback";
    charCount.textContent = "0/300 karakter";
});

form.addEventListener("input", function () {
    feedback.textContent = "";
    feedback.className = "form-feedback";
    charCount.textContent = pesanInput.value.length + "/300 karakter";
});