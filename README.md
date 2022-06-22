<p align="center">Guestbook</p>

<p align="center">
Alfian Pradiknatama
</p>

## Instalasi

- Jalankan `git clone https://github.com/pradiknatama/GuestBook.git`
- Setelah melakukan clone, masuk ke direktori GuestBook
- Jalankan `composer install`
- Copy file `.env.example` ke`.env`
- Jalankan `php artisan key:generate`
- update file `.env` sesuaikan dengan username, password, dan nama pada Database.
- Kemudian melakukan migrasi serta menjalankan seeder dengan cara `php artisan migrate --seed`
- Selanjutnya lakukan `php artisan serve`
- Masuk ke halaman `http://127.0.0.1:8000/api/province` untuk menyimpan data provinsi dan tunggu beberapa saat hingga loading selesai.
- Masuk ke halaman `http://127.0.0.1:8000/api/city` untuk menyimpan data city dan tunggu beberapa saat hingga loading selesai.

## Fitur Website
- Setelah itu masuk ke halaman login,dan dapat login menggunakan akun yang sudah ada/disiapkan pada seeder yang tadi sudah kita install.
- Email : `admin@gmail.com` ,dan password: `12345678`
<br>
Sidebar `Home`
- Setelah berhasil login maka akan berada pada tampilan home.
- Pada home terdapat table yang bisa digunakan untuk melihat list dari guestbook.
- Apabila ingin menambahkan guestbook baru maka klik button `add Guestbook` yang berada di atas tabel guestbook.
- Kemudian isilah form untuk menambahkan guestbook baru.
- Apabila sudah selesai menambahkan guestbook baru maka akan kembali ke home.
- Apabila terdapat kesalahan dalam pengisian data guestbook, maka pilih button `detail` yang ingin di ubah.
- lalu ubah data guestbook yang ingin diubah melalui form yang tersedia.
- Apabila kita ingin menghapus data guestbook, maka pilih button `delete`
<br>
Sidebar `profile`
- Pada menu profile kita dapat mengubah/ mengganti nama dan password.
- apabila hanya ingin mengganti nama saja maka form `old password`, `new password`, dan `confirm password` tidak perlu diisi
- Apabila ingin mengganti password, isikan old password sesuai dengan password lama, kemudian isikan new password sebagai password baru dengan syarat minimal 8 karakter, selanjutnya `confirm password` harus sama dengan `new password`.

Logout
- apa bila ingin logout maka klik `hi, {nama}` yang berada pada pojok kanan atas lalu pilih logout.
