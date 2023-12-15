// Ambil semua tautan menu
var navLinks = document.querySelectorAll(".navbar-nav .nav-link");

// Tambahkan event listener untuk setiap tautan menu
navLinks.forEach(function (link) {
  link.addEventListener("click", function () {
    // Hapus kelas "active" dari semua tautan menu
    navLinks.forEach(function (link) {
      link.classList.remove("active");
    });
    // Tambahkan kelas "active" pada tautan yang diklik
    link.classList.add("active");
  });
});
