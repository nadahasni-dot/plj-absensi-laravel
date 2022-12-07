# Sistem Absensi Laravel

Terdiri dari sistem admin CRUD, dan REST API untuk aplikasi mobile

## How to Run

1. Copy `.env.example` dan rubah nama menjadi `.env`

2. Sesuaikan konfigurasi database pada `.env`

3. Jalankan migrasi database

```
php artisan migrate:fresh --seed
```

4. Bersihkan cache

```
php artisan config:clear
php artisan route:clear
```

5. Link Storage Untuk File upload

```
php artisan storage:link
```

6. Jalankan Server

```
php artisan serve
```

## Dokumentasi REST API
[Absensi Laravel PLJ REST API Documentation](https://documenter.getpostman.com/view/10944704/2s8YmNQN82)