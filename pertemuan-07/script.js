// Navigasi responsif dan validasi awal di sisi browser.
// Validasi PHP di server tetap menjadi pemeriksaan utama.
const navToggle = document.getElementById("navToggle");
const navMenu = document.getElementById("navMenu");

if (navToggle && navMenu) {
  navToggle.addEventListener("click", () => {
    const isOpen = navMenu.classList.toggle("nav-open");
    navToggle.setAttribute("aria-expanded", String(isOpen));
    navToggle.setAttribute("aria-label", isOpen ? "Tutup navigasi" : "Buka navigasi");
  });
}

const contactForm = document.getElementById("contactForm");
const formFeedback = document.getElementById("formFeedback");

if (contactForm && formFeedback) {
  contactForm.addEventListener("submit", (event) => {
    const nama = document.getElementById("nama").value.trim();
    const email = document.getElementById("email").value.trim();
    const semester = Number(document.getElementById("semester").value);
    const tanggal = document.getElementById("tanggal").value;
    const jenisPesan = document.querySelector('input[name="jenis_pesan"]:checked');
    const minat = document.querySelectorAll('input[name="minat[]"]:checked');
    const prodi = document.getElementById("prodi").value;
    const pesan = document.getElementById("pesan").value.trim();

    let error = "";
    if (nama.length < 3 || nama.length > 50) error = "Nama harus 3 sampai 50 karakter.";
    else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) error = "Masukkan email yang valid.";
    else if (!Number.isInteger(semester) || semester < 1 || semester > 14) error = "Semester harus 1 sampai 14.";
    else if (!tanggal) error = "Tanggal kunjungan wajib diisi.";
    else if (!jenisPesan) error = "Pilih jenis pesan.";
    else if (minat.length === 0) error = "Pilih minimal satu topik.";
    else if (!prodi) error = "Pilih program studi.";
    else if (!pesan || pesan.length > 300) error = "Pesan wajib diisi, maksimal 300 karakter.";

    if (error) {
      event.preventDefault();
      formFeedback.textContent = error;
      return;
    }

    formFeedback.textContent = "Data dikirim ke PHP untuk divalidasi kembali.";
  });

  contactForm.addEventListener("reset", () => {
    formFeedback.textContent = "";
  });
}
