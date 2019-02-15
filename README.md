Nama : Rian Maulana Kelas : XII RPL 2

## Harus Menginstal
  * XAMPP Versi Terbaru
  * Composer
  * Postman

## Cara Install
  * Clone <a> https://github.com/rianmau-lana/belajar-lumen </a> ke komputer anda
  * Buka cmd / terminal, masuk ke file yang sudah di clone tadi di cmd dan masukkan <code> $ composer install </code>
  * Buat file bernama .env dengan menyalin dari file .env.example
  * Buat database dengan nama <code>sekolah-api</code>  dan juga tambahkan <code>DB_DATABASE=sekolah-api</code> di file .env
  * Ketik <code> $ php artisan migrate </code>  di cmd / terminal
  * ketik <code> $ php -S localhost:3000 -t public </code>  lalu buka aplikasi Postman

## Cara Menjalankan di Postman
  * Start MySQL pada aplikasi XAMPP
  * Buka Aplikasi Postman
  * Copy <a> https://www.getpostman.com/collections/8e313cfb03f843f898b7 </a> dan Import From Link di Postman
  * Import Environment dengan file <code> api-sekolah.postman_environment </code> yang ada di file belajar-lumen
  * Sekarang anda bisa menjalankan program tersebut
