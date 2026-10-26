const navToggle = document.getElementById("navToggle");
const navMenu = document.getElementById("navMenu");

navToggle.addEventListener("click", function () {
    navMenu.classList.toggle("nav-open");

    const menuTerbuka = navMenu.classList.contains("nav-open");

    navToggle.setAttribute("aria-expanded", menuTerbuka);

    navToggle.setAttribute(
        "aria-label",
        menuTerbuka ? "Tutup navigasi" : "Buka navigasi"
    );
});


const form = document.querySelector("form");
const feedback = document.getElementById("form-feedback");

form.addEventListener("submit", function (event) {
    event.preventDefault();

    if (!form.checkValidity()) {
        form.reportValidity();
        return;
    }

    feedback.textContent = "Form berhasil diperiksa dan siap dikirim!";
    feedback.style.color = "green";
});

form.addEventListener("reset", function () {
    feedback.textContent = "";
});
