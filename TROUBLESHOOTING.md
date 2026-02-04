# Troubleshooting - 404 Not Found

## Masalah
Halaman menampilkan error **404 | NOT FOUND** saat mengakses `http://localhost:8080` atau URL lainnya.

## Kemungkinan Penyebab & Solusi

### 1. **Clear Laravel Cache**
Laravel mungkin masih meng-cache route lama. Jalankan command berikut:

```bash
cd /home/secondio10/projects

# Clear semua cache
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Rebuild cache (optional)
php artisan config:cache
php artisan route:cache
```

### 2. **Periksa Route List**
Pastikan route sudah terdaftar dengan benar:

```bash
php artisan route:list
```

Output yang diharapkan:
```
GET|HEAD  /  ............ home
```

### 3. **Restart Laravel Server**
Hentikan server yang sedang berjalan (Ctrl+C) dan jalankan ulang:

```bash
php artisan serve
# atau jika menggunakan port tertentu
php artisan serve --port=8080
```

### 4. **Periksa File `.env`**
Pastikan file `.env` sudah dikonfigurasi dengan benar:

```env
APP_NAME=BidZap
APP_ENV=local
APP_KEY=base64:... (harus ada)
APP_DEBUG=true
APP_URL=http://localhost:8080
```

Jika `APP_KEY` kosong, generate dengan:
```bash
php artisan key:generate
```

### 5. **Periksa Permissions (WSL)**
Jika menggunakan WSL, pastikan permissions file sudah benar:

```bash
cd /home/secondio10/projects
chmod -R 755 storage bootstrap/cache
```

### 6. **Compile Vite Assets**
Pastikan Vite sudah running untuk compile CSS/JS:

```bash
# Terminal 1 - Laravel Server
php artisan serve --port=8080

# Terminal 2 - Vite Dev Server
npm run dev
```

### 7. **Periksa Struktur File**
Pastikan struktur file sudah benar:

```
/home/secondio10/projects/
├── routes/
│   └── web.php ✓
├── resources/
│   ├── views/
│   │   ├── layouts/
│   │   │   └── app.blade.php ✓
│   │   └── home.blade.php ✓
│   └── css/
│       └── app.css ✓
├── tailwind.config.js ✓
└── vite.config.js
```

### 8. **Check Vite Config**
Periksa `vite.config.js` apakah sudah benar:

```javascript
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
```

### 9. **Install Dependencies**
Pastikan semua dependencies sudah terinstall:

```bash
# PHP Dependencies
composer install

# Node Dependencies
npm install
```

### 10. **Debug Mode**
Aktifkan debug mode untuk melihat error detail:

Di file `.env`:
```env
APP_DEBUG=true
```

## Quick Fix (Recommended)

Jalankan command berikut secara berurutan:

```bash
cd /home/secondio10/projects

# 1. Clear all cache
php artisan optimize:clear

# 2. Generate app key (jika belum)
php artisan key:generate

# 3. Install dependencies
composer install
npm install

# 4. Build assets
npm run build

# 5. Restart server
php artisan serve --port=8080
```

Kemudian di terminal terpisah:
```bash
npm run dev
```

## Akses Aplikasi

Setelah server berjalan, akses di:
- **Development**: `http://localhost:8080` atau `http://127.0.0.1:8080`
- Pastikan menggunakan port yang sama dengan yang ditampilkan di terminal

## Catatan Penting

1. **Jangan akses via WSL path** (`\\wsl.localhost\...`) di browser
2. **Gunakan localhost** atau IP yang ditampilkan Laravel server
3. **Pastikan Vite dev server berjalan** untuk melihat styling
4. **Check terminal output** untuk error messages
