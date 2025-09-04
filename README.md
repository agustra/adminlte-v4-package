# AdminLTE v4.0.0-rc4 Package untuk Laravel dengan Vite

Package AdminLTE v4.0.0-rc4 dari ColorlibHQ dengan NPM + Vite bundling untuk performa optimal.

> 📖 **Panduan Lengkap**: Lihat [INSTALLATION.md](INSTALLATION.md) untuk panduan instalasi yang detail.

## 📦 Skenario Instalasi

### 🎨 **Skenario 1: Hanya UI AdminLTE (Tanpa Authentication)**

Jika Anda hanya ingin menggunakan UI AdminLTE tanpa sistem authentication:

```bash
# Install UI package
composer require agustra/adminlte-v4-package

# Publish assets
php artisan adminlte:publish-assets
```

**Hasil**: Dashboard AdminLTE siap digunakan di `/dashboard`

### 🔐 **Skenario 2: UI + Authentication (Lengkap)**

Jika Anda ingin UI AdminLTE dengan sistem authentication lengkap:

```bash
# Install UI package
composer require agustra/adminlte-v4-package

# Install authentication package
composer require agustra/adminlte-auth-package

# Publish assets UI
php artisan adminlte:publish-assets

# Install authentication system
php artisan adminlte:install-auth

# Jalankan migration
php artisan migrate
```

**Hasil**: Sistem lengkap dengan login, register, dashboard, dan profile management

### 🔧 **Skenario 3: Authentication ke UI yang Sudah Ada**

Jika Anda sudah punya UI AdminLTE dan ingin menambah authentication:

```bash
# Install authentication package (akan auto-install UI dependency)
composer require agustra/adminlte-auth-package

# Install authentication system
php artisan adminlte:install-auth

# Jalankan migration
php artisan migrate
```

## 🚀 Instalasi Cepat (Development)

### Untuk Package Lokal

```json
{
    "repositories": [
        {
            "type": "path",
            "url": "../../adminlte-v4-package"
        }
    ],
    "require": {
        "agustra/adminlte-v4-package": "@dev"
    }
}
```

```bash
composer update agustra/adminlte-v4-package
php artisan adminlte:publish-assets
```

## Penggunaan

### Routes Otomatis
Setelah instalasi, routes berikut otomatis tersedia:
- **Dashboard**: `/dashboard` 
- **Route name**: `dashboard`

### Mengakses Dashboard
```php
// Di routes/web.php
Route::get('/', function () {
    return redirect()->route('dashboard');
});
```

### Global Functions
```javascript
// Toast Notifications
showToast('Success message!', 'success');
showToast('Info message!', 'info');
showToast('Warning message!', 'warning');
showToast('Error message!', 'error');

// SweetAlert2
Swal.fire('Success!', 'Operation completed', 'success');
```

### Custom Views
```blade
@extends('adminlte::layouts.app')

@section('title', 'My Page')
@section('content-header', 'My Dashboard')

@section('content')
    <div class="card">
        <div class="card-body">
            Content here
        </div>
    </div>
@endsection
```

## Features

- ✅ AdminLTE v4.0.0-rc4 (ColorlibHQ)
- ✅ NPM + Vite bundling (no CDN dependency)
- ✅ Bootstrap 5 + Bootstrap Icons
- ✅ OverlayScrollbars untuk smooth scrolling
- ✅ SweetAlert2 & Toastify notifications
- ✅ Dark mode dengan localStorage
- ✅ Fullscreen toggle
- ✅ Multi-level menu examples
- ✅ Controller dan routes otomatis
- ✅ Offline ready (no internet dependency)

## Development

### Build Assets Manual (Opsional)
Jika ingin build assets secara manual:
```bash
cd vendor/agus-usk/adminlte-v4-package
npm install
npm run dev    # Development mode
npm run build  # Production build
```

### File Structure
```
resources/
├── js/
│   └── adminlte.js     # Main JavaScript entry
└── css/
    └── adminlte.scss   # Main SCSS entry
```

## Troubleshooting

### Assets Tidak Muncul
1. Pastikan command `php artisan adminlte:publish-assets` sudah dijalankan
2. Periksa folder `public/vendor/adminlte/` apakah assets sudah ada
3. Jalankan ulang command jika diperlukan

### Route Dashboard Tidak Ditemukan
1. Pastikan package sudah terinstall dengan benar
2. Jalankan `php artisan route:list --name=dashboard` untuk memverifikasi
3. Clear cache dengan `php artisan route:clear`

### NPM Dependencies Error
1. Pastikan Node.js dan NPM terinstall
2. Hapus `node_modules` dan `package-lock.json` di folder package
3. Jalankan ulang `php artisan adminlte:publish-assets`

## Commands Tersedia

```bash
# Publish assets AdminLTE
php artisan adminlte:publish-assets

# Lihat routes AdminLTE
php artisan route:list --name=dashboard
```