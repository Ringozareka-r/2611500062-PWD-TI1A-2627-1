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