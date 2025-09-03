# Changelog

All notable changes to `adminlte-v4-package` will be documented in this file.

## [Unreleased]

### Added
- Artisan command `adminlte:publish-assets` untuk otomatis publish assets
- Auto-discovery Laravel service provider
- Automatic routes registration untuk dashboard
- Post-install dan post-update scripts di composer.json

### Changed
- Dokumentasi instalasi diperbaharui untuk menggunakan artisan command
- Proses instalasi tidak lagi manual, semuanya otomatis

### Fixed
- Assets publishing sekarang otomatis dengan satu command
- NPM dependencies dan build process terintegrasi

## [1.0.0] - 2024-01-01

### Added
- Initial release
- AdminLTE v4.0.0-rc4 integration
- Bootstrap 5 + Bootstrap Icons
- Vite bundling support
- SweetAlert2 & Toastify notifications
- Dark mode support
- Offline ready assets