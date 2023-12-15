# Sistem Pendaftaran Beasiswa - Panduan Pengembangan

Selamat datang di panduan pengembangan untuk Sistem Pendaftaran Beasiswa. Dokumen ini memberikan panduan tentang struktur proyek, penamaan file, dan pedoman pengkodean yang dianjurkan untuk memastikan konsistensi dan kerapihan dalam pengembangan aplikasi.

## Struktur Direktori

Berikut adalah struktur direktori yang digunakan dalam proyek ini:

- `index.php`: Halaman utama aplikasi, memberikan informasi umum tentang program beasiswa.
- `pendaftaran.php`: Halaman formulir pendaftaran beasiswa.
- `process_daftar.php`: Proses backend untuk mengelola pendaftaran dan perhitungan nilai IPK.
- `hasil.php`: Halaman hasil pendaftaran beasiswa, menampilkan informasi pendaftaran terakhir.
- `add_ipk.php`: Halaman untuk mengasumsikan ipk dari sistem tanpa inputan user.
- `edit_status.php`: Halaman untuk mengedit status beasiswa atau status ajuan.
- `grafik.php`: Halaman untuk membuat visualisasi data pendaftaran dalam bentuk grafik.
- `updatestatus.php`: Halaman untuk mengupdate status data beasiswa.

- `assets/`: Direktori yang berisi aset-aset seperti gambar, script JavaScript, dan file gaya (CSS).
  - `img/`: Direktori untuk gambar-gambar yang digunakan dalam aplikasi.
  - `js/`: Direktori untuk file-file skrip JavaScript.
  - `style/`: Direktori untuk file-file gaya (CSS) aplikasi.

## Panduan Pengkodean

Agar kode tetap terstruktur dan mudah dimengerti oleh semua anggota tim, kami mengikuti pedoman pengkodean berikut:

### Penamaan File

- Gunakan huruf kecil dan pisahkan kata dengan tanda underscore (\_) untuk penamaan file.
- Berikan nama file yang deskriptif dan mencerminkan fungsi utama dari file tersebut.

### Penamaan Variabel dan Fungsi

- Gunakan gaya camelCase untuk penamaan variabel dan fungsi (contoh: `nilaiIPK`, `hitungNilai`).
- Berikan nama yang singkat dan deskriptif, menggambarkan tujuan atau isi variabel/fungsi.

### Indentasi dan Spasi

- Gunakan indentasi dengan 2 atau 4 spasi untuk meningkatkan keterbacaan kode.
- Gunakan spasi dengan bijak untuk memisahkan elemen kode agar lebih mudah dibaca.

### Komentar

- Sisipkan komentar saat diperlukan untuk menjelaskan bagian kode yang kompleks atau memerlukan penjelasan tambahan.
- Gunakan bahasa yang jelas dan deskriptif dalam komentar.

### Kejelasan Kode

- Hindari penggunaan variabel dengan nama yang ambigu (misalnya, `data` atau `temp`).
- Pisahkan kode menjadi fungsi-fungsi yang lebih kecil dengan tujuan spesifik.

### Pengecekan Kesalahan

- Selalu lakukan validasi data sebelum menggunakannya dalam operasi penting atau penyimpanan ke database.
- Tangani kasus kesalahan dengan elegan dan berikan pesan kesalahan yang informatif kepada pengguna.

## Kontribusi

Jika Anda ingin berkontribusi pada proyek ini, harap mengikuti pedoman di atas dan lakukan permintaan tarik (pull request) ke repositori kami.

Pastikan Anda telah mengonfigurasi koneksi ke database dan pengaturan lainnya sebelum menjalankan aplikasi ini.

Terima kasih atas kontribusi Anda untuk mengembangkan Sistem Pendaftaran Beasiswa!
