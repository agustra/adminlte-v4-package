# Panduan Instalasi AdminLTE v4 Package

## Persyaratan Sistem

- PHP ^8.2
- Laravel ^10.0 atau ^11.0
- Node.js & NPM (untuk build assets)
- Composer

## Instalasi Step-by-Step

### 1. Untuk Development (Package Lokal)

#### a. Tambahkan Repository Lokal
Edit file `composer.json` di proyek Laravel Anda:

```json
{
    "repositories": [
        {
            "type": "path",
            "url": "../../adminlte-v4-package"
        }
    ],
    "require": {
        "agus-usk/adminlte-v4-package": "@dev"
    }
}
```

#### b. Install Package
```bash
composer update agus-usk/adminlte-v4-package
```

### 2. Untuk Production (dari Packagist)

```bash
composer require agus-usk/adminlte-v4-package
```

### 3. Publish Assets

Setelah package terinstall, jalankan command berikut:

```bash
php artisan adminlte:publish-assets
```

Command ini akan otomatis:
- Install NPM dependencies
- Build assets dengan Vite
- Copy assets ke `public/vendor/adminlte/`

## Verifikasi Instalasi

### 1. Cek Routes
```bash
php artisan route:list --name=dashboard
```

Seharusnya muncul route:
```
GET|HEAD  dashboard  dashboard › AgusUsk\AdminLte\Http\Controllers\DashboardController@index
```

### 2. Cek Assets
Pastikan folder `public/vendor/adminlte/` berisi:
- `css/adminlte-css.css`
- `js/adminlte.js`
- `fonts/bootstrap-icons.woff`
- `fonts/bootstrap-icons.woff2`

### 3. Test Dashboard
Akses `http://your-app.test/dashboard` di browser.

## Konfigurasi Tambahan

### Redirect Homepage ke Dashboard
Edit `routes/web.php`:

```php
Route::get('/', function () {
    return redirect()->route('dashboard');
});
```

### Custom Views
Buat view dengan layout AdminLTE:

```blade
@extends('adminlte::layouts.app')

@section('title', 'My Page')
@section('content-header', 'My Dashboard')

@section('content')
    <div class="card">
        <div class="card-body">
            <h1>Welcome to AdminLTE v4!</h1>
        </div>
    </div>
@endsection
```

## Troubleshooting

### Problem: Assets tidak muncul
**Solution:**
```bash
php artisan adminlte:publish-assets
php artisan cache:clear
```

### Problem: Route tidak ditemukan
**Solution:**
```bash
php artisan route:clear
php artisan config:clear
composer dump-autoload
```

### Problem: NPM error saat publish
**Solution:**
```bash
cd vendor/agus-usk/adminlte-v4-package
rm -rf node_modules package-lock.json
cd ../../../
php artisan adminlte:publish-assets
```

## Development Mode

Untuk development, Anda bisa build assets secara manual:

```bash
cd vendor/agus-usk/adminlte-v4-package
npm install
npm run dev    # Development mode dengan watch
npm run build  # Production build
```

## Update Package

Untuk update package:

```bash
composer update agus-usk/adminlte-v4-package
php artisan adminlte:publish-assets
```