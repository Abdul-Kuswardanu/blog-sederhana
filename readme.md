# Aplikasi Blog Sederhana

Aplikasi blog sederhana ini adalah platform blog berbasis web yang memungkinkan pengguna untuk membuat dan mengelola postingan blog, memberikan komentar, serta melakukan pengelolaan profil pengguna. Aplikasi ini menggunakan **PHP** untuk backend dan **MySQL** sebagai database, dengan antarmuka berbasis **HTML** dan **CSS** untuk desain.

## Fitur Utama

1. **Pendaftaran dan Login Pengguna**
   - Pengguna dapat membuat akun baru melalui halaman pendaftaran (**`signup.php`**).
   - Pengguna yang sudah terdaftar dapat login menggunakan halaman login (**`signin.php`**).
   - Setelah berhasil login, pengguna dapat mengakses fitur blog dan profil pribadi.

2. **CRUD untuk Postingan (Create, Read, Update, Delete)**
   - **Buat Postingan**: Pengguna dapat membuat postingan baru melalui halaman **`tambah_blog.php`**.
   - **Baca Postingan**: Semua postingan yang sudah dibuat akan ditampilkan di halaman utama **`index.php`**.
   - **Edit Postingan**: Pengguna dapat mengedit postingan yang sudah ada menggunakan halaman **`edit_blog.php`**.
   - **Hapus Postingan**: Pengguna dapat menghapus postingan melalui halaman **`hapus_blog.php`**.

3. **Komentar pada Postingan Blog**
   - Pengguna dapat memberikan komentar pada setiap postingan melalui halaman **`tambah_komen.php`**.
   - Pengguna dapat mengedit atau menghapus komentar yang sudah ada menggunakan halaman **`edit_komen.php`** dan **`hapus_komen.php`**.

4. **Manajemen Profil Pengguna**
   - Pengguna dapat mengedit profil mereka, termasuk mengganti informasi profil dan password, di halaman **`edit_profile.php`**.

5. **Fitur Logout**
   - Pengguna dapat logout dari akun mereka dengan mengakses halaman **`logout.php`**.

## Struktur File

Berikut adalah penjelasan mengenai struktur file aplikasi blog ini:

- **`db_blog_sederhana.php`**  
  File ini bertanggung jawab untuk koneksi ke database MySQL yang digunakan oleh aplikasi blog ini.

- **`index.php`**  
  Halaman utama yang menampilkan semua postingan blog yang sudah ada. Pengguna yang sudah login akan melihat postingan miliknya, sedangkan pengguna yang belum login hanya melihat postingan umum.

- **`function.php`**  
  Berisi berbagai fungsi yang digunakan dalam aplikasi ini, seperti validasi form, pengecekan status login, dan pengelolaan sesi.

- **`tambah_blog.php`**  
  Halaman untuk membuat postingan baru. Pengguna yang sudah login dapat mengisi form untuk membuat artikel baru.

- **`edit_blog.php`**  
  Halaman untuk mengedit postingan yang sudah ada. Pengguna hanya dapat mengedit postingan miliknya sendiri.

- **`hapus_blog.php`**  
  Halaman untuk menghapus postingan. Pengguna hanya dapat menghapus postingan miliknya sendiri.

- **`report_blog.php`**  
  Halaman untuk melaporkan postingan yang dianggap melanggar ketentuan atau tidak pantas.

- **`tambah_komen.php`**  
  Halaman untuk menambah komentar pada setiap postingan.

- **`edit_komen.php`**  
  Halaman untuk mengedit komentar yang sudah ditambahkan oleh pengguna.

- **`hapus_komen.php`**  
  Halaman untuk menghapus komentar yang sudah ada.

- **`signup.php`**  
  Halaman untuk pendaftaran akun baru. Pengguna dapat membuat akun baru dengan memasukkan informasi seperti nama, email, dan password.

- **`signin.php`**  
  Halaman untuk login. Pengguna dapat memasukkan email dan password untuk mengakses aplikasi blog.

- **`logout.php`**  
  File yang menangani proses logout, mengakhiri sesi pengguna yang sedang aktif.

- **`edit_profile.php`**  
  Halaman untuk mengedit profil pengguna, termasuk mengganti nama, email, dan password pengguna.

## Tampilan

1. **Dashboard**
   - **Judul dan Logo**: Di kiri atas halaman dashboard, terdapat judul aplikasi dan logo.
   - **Tombol Login/Logout**: Terletak di kanan atas, tombol login/logout berubah sesuai status login pengguna. Jika pengguna sudah login, tombol akan berubah menjadi **"Welcome, [Nama Pengguna]"** dengan tombol logout di sampingnya. Jika belum login, tombol tetap tertulis **Login**.
   - **Warna**: Dashboard berwarna **biru tua**, dengan background halaman menggunakan **biru muda**. 

2. **Login dan Daftar Akun**
   - Halaman login dan pendaftaran menggunakan **CSS internal** yang serupa dengan desain dashboard untuk konsistensi tampilan.
   - Halaman login memungkinkan pengguna untuk masuk menggunakan email dan password yang sudah terdaftar.
   - Halaman pendaftaran memungkinkan pengguna untuk membuat akun dengan memasukkan nama, email, dan password.

3. **Halaman Postingan**
   - Di halaman utama **`index.php`**, semua postingan akan ditampilkan dengan opsi untuk membaca, mengedit, dan menghapus bagi yang sudah login.
   - Komentar pada setiap postingan dapat ditambah, diubah, atau dihapus oleh pengguna yang sudah login.
   
4. **Footer**
   - **Konten Footer**: Footer berisi informasi dasar mengenai aplikasi, misalnya informasi hak cipta, tahun pembuatan aplikasi, dan pengembang. Bisa juga berisi link ke halaman kebijakan privasi, syarat dan ketentuan, dll.
   - Terletak di bagian bawah setiap halaman sebagai elemen yang konsisten.

---

## Cara Instalasi

### Prasyarat
1. **PHP** (Minimal PHP 7.x)
2. **MySQL** atau MariaDB
3. Web server seperti **XAMPP** atau **WAMP**.

### Langkah Instalasi
1. **Download dan Ekstrak**: Download aplikasi blog ini dan ekstrak file ke dalam folder web server Anda.
2. **Buat Database**:  
   - Buat database baru dengan nama `blog_sederhana` di MySQL.
   - Sesuaikan pengaturan di file **`db_blog_sederhana.php`** untuk mencocokkan konfigurasi database (username, password, dan nama database).
3. **Import Database**:  
   - Impor file SQL yang berisi struktur tabel ke dalam database. (Bisa dibuat dengan file SQL tersendiri atau buat tabel secara manual di database).
4. **Akses Aplikasi**: Buka aplikasi melalui browser dengan mengakses `http://localhost/nama_folder` (misalnya `http://localhost/blog_sederhana`).

---

## Cara Penggunaan

### 1. **Pendaftaran dan Login Pengguna**
   - Akses halaman **`signup.php`** untuk mendaftar akun baru.
   - Setelah pendaftaran, login menggunakan **`signin.php`** dengan email dan password yang sudah didaftarkan.
   - Jika login berhasil, Anda akan diarahkan ke dashboard, di mana Anda bisa mulai membuat postingan blog.

### 2. **Menggunakan Fitur Postingan**
   - **Buat Postingan**: Akses halaman **`tambah_blog.php`** dan buat postingan baru.
   - **Baca Postingan**: Semua postingan yang sudah ada akan ditampilkan di halaman utama **`index.php`**.
   - **Edit Postingan**: Akses halaman **`edit_blog.php`** untuk mengedit postingan yang sudah ada.
   - **Hapus Postingan**: Akses halaman **`hapus_blog.php`** untuk menghapus postingan.

### 3. **Menggunakan Fitur Komentar**
   - **Tambah Komentar**: Akses halaman **`tambah_komen.php`** dan beri komentar pada setiap postingan.
   - **Edit Komentar**: Akses halaman **`edit_komen.php`** untuk mengedit komentar yang sudah ditambahkan.
   - **Hapus Komentar**: Akses halaman **`hapus_komen.php`** untuk menghapus komentar.

---

## Lisensi

MIT License. Lihat file `LICENSE` untuk detail lebih lanjut.

Copyright (c) 2024 [Nama Anda]

Izinkan orang lain untuk mengubah, mendistribusikan, dan menggunakan kode ini selama memenuhi persyaratan lisensi berikut:
1. Pemberitahuan hak cipta dan izin di dalam salinan kode harus disertakan dalam distribusi.
2. Kode ini disediakan "sebagaimana adanya", tanpa jaminan apapun, baik tersurat maupun tersirat, termasuk tetapi tidak terbatas pada jaminan perdagangan atau kesesuaian untuk tujuan tertentu.