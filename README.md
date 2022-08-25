<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

# Tentang Aplikasi
laravue-library merupakan aplikasi Perpustakaan berbasis website, dibangun menggunakan Laravel versi 8, VueJS, Ajax dan Bootstrap versi 4.

## Spesifikasi Minimal:
- PHP > 7.4

## Cara Penggunaan

1. Jalankan perintah 
```bash
composer install
```

2. Copy file .env dari .env.example
```bash
cp .env.example .env
```
3. Setting nama database sesuai dengan keinginan.

4. Lakukan perintah
```bash
php artisan key:generate
```
5. Migrate database
```bash
php artisan migrate
```
6. Jalankan Spatie
```bash
localhost:8000/test_spatie
```