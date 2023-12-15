document.addEventListener("DOMContentLoaded", function () {
  const formPendaftaran = document.getElementById("form-pendaftaran");
  const ipkField = document.getElementById("ipk");
  const beasiswaField = document.getElementById("beasiswa");
  const hasilNama = document.getElementById("hasil-nama");
  const hasilEmail = document.getElementById("hasil-email");
  const hasilSemester = document.getElementById("hasil-semester");
  const hasilBeasiswa = document.getElementById("hasil-beasiswa");
  const hasilStatus = document.getElementById("hasil-status");
  const hasilIpk = document.getElementById("hasil-ipk");

  formPendaftaran.addEventListener("submit", function (e) {
    e.preventDefault();

    // Asumsi nilai IPK dari sistem (misalnya, 3.4)
    const ipk = 3.4;

    // Mengisi nilai IPK otomatis
    ipkField.value = ipk.toFixed(1);

    // Mengisi nilai hasil
    hasilNama.value = formPendaftaran.nama.value;
    hasilEmail.value = formPendaftaran.email.value;
    hasilSemester.value = formPendaftaran.semester.value;
    hasilIpk.value = ipk.toFixed(1); // Menampilkan nilai IPK dari sistem

    if (ipk < 3) {
      // Jika IPK < 3, nonaktifkan pilihan beasiswa dan tombol Daftar
      beasiswaField.disabled = true;
      formPendaftaran.querySelector('button[type="submit"]').disabled = true;
      hasilStatus.value = "Belum di verifikasi";
      hasilBeasiswa.value = "Tidak ada";
    } else {
      beasiswaField.disabled = false;
      formPendaftaran.querySelector('button[type="submit"]').disabled = false;
      hasilStatus.value = "Belum di verifikasi";
      hasilBeasiswa.value = formPendaftaran.beasiswa.value; // Menampilkan nilai beasiswa yang diisi
      beasiswaField.focus();
    }
  });
  // Menambahkan event listener pada input semester
  formPendaftaran.semester.addEventListener("input", function () {
    // Asumsi menghitung IPK berdasarkan semester (sesuaikan dengan logika perhitungan IPK Anda)
    const semester = parseInt(formPendaftaran.semester.value);
    const ipk = hitungIPK(semester); // Ganti dengan logika perhitungan IPK yang sesuai

    // Menampilkan IPK pada input IPK
    ipkField.value = ipk.toFixed(2); // Menampilkan IPK dengan dua angka di belakang koma
  });

  formPendaftaran.addEventListener("input", function () {
    hasilNama.value = formPendaftaran.nama.value;
    hasilEmail.value = formPendaftaran.email.value;
    hasilSemester.value = formPendaftaran.semester.value;
    hasilIpk.value = ipkField.value; // Menampilkan nilai IPK dari sistem
  });
});
