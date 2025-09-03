# AdminLTE v4.0.0-rc4 Package untuk Laravel dengan Vite

Package AdminLTE v4.0.0-rc4 dari ColorlibHQ dengan NPM + Vite bundling untuk performa optimal.

> 📖 **Panduan Lengkap**: Lihat [INSTALLATION.md](INSTALLATION.md) untuk panduan instalasi yang detail.

## Instalasi Cepat

### Untuk Package Lokal (Development)

#### 1. Tambahkan Repository Lokal ke composer.json
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

#### 2. Install Package
```bash
composer update agustra/adminlte-v4-package
```

#### 3. Publish Assets (Otomatis)
```bash
php artisan adminlte:publish-assets
```

### Untuk Package dari Packagist (Production)

#### 1. Install Package
```bash
composer require agustra/adminlte-v4-package
```

#### 2. Publish Assets
```bash
php artisan adminlte:publish-assets
```

> **Catatan**: Command `adminlte:publish-assets` akan otomatis:
> - Install NPM dependencies
> - Build assets dengan Vite
> - Copy assets ke `public/vendor/adminlte/`

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