<?php

namespace AgusUsk\AdminLte\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class PublishAssetsCommand extends Command
{
    protected $signature = 'adminlte:publish-assets';
    protected $description = 'Publish AdminLTE assets to public directory';

    public function handle()
    {
        $this->info('Publishing AdminLTE assets...');
        
        // Handle existing vendor/adminlte directory
        $publicPath = public_path('vendor/adminlte');
        if (File::exists($publicPath)) {
            $this->info('Existing assets found, replacing...');
            File::deleteDirectory($publicPath);
        }
        File::makeDirectory($publicPath, 0755, true);
        
        // Build assets first
        $packagePath = __DIR__ . '/../../../';
        $this->info('Building assets with Vite...');
        
        if (File::exists($packagePath . 'package.json')) {
            exec("cd {$packagePath} && npm install && npm run build", $output, $returnCode);
            
            if ($returnCode === 0) {
                $this->info('Assets built successfully!');
                
                // Remove any vendor folder from dist to prevent recursive copy
                $vendorPath = $packagePath . 'dist/vendor';
                if (File::exists($vendorPath)) {
                    File::deleteDirectory($vendorPath);
                }
                
                // Copy built assets selectively (skip vendor folder)
                $distPath = $packagePath . 'dist';
                if (File::exists($distPath)) {
                    // Only copy css, js, fonts - skip vendor folder completely
                    $foldersToSync = ['css', 'js'];
                    
                    foreach ($foldersToSync as $folder) {
                        $sourcePath = $distPath . '/' . $folder;
                        $destPath = $publicPath . '/' . $folder;
                        
                        if (File::exists($sourcePath)) {
                            File::copyDirectory($sourcePath, $destPath);
                        }
                    }
                    
                    // Create fonts folder manually
                    $fontsDestPath = $publicPath . '/fonts';
                    if (!File::exists($fontsDestPath)) {
                        File::makeDirectory($fontsDestPath, 0755, true);
                    }
                    
                    // Copy Bootstrap Icons fonts
                    $fontsSourcePath = $packagePath . 'node_modules/bootstrap-icons/font/fonts';
                    
                    if (File::exists($fontsSourcePath)) {
                        // Copy to vendor/adminlte/fonts/
                        $fontFiles = File::files($fontsSourcePath);
                        foreach ($fontFiles as $fontFile) {
                            File::copy($fontFile->getPathname(), $fontsDestPath . '/' . $fontFile->getFilename());
                        }
                        
                        // Also copy to public/fonts/ for direct access
                        $publicFontsPath = public_path('fonts');
                        if (!File::exists($publicFontsPath)) {
                            File::makeDirectory($publicFontsPath, 0755, true);
                        }
                        
                        foreach ($fontFiles as $fontFile) {
                            File::copy($fontFile->getPathname(), $publicFontsPath . '/' . $fontFile->getFilename());
                        }
                        
                        $this->info('Bootstrap Icons fonts copied successfully!');
                    }
                    
                    $this->info('Assets published to public/vendor/adminlte/');
                } else {
                    $this->error('Build directory not found!');
                }
            } else {
                $this->error('Failed to build assets!');
            }
        } else {
            $this->error('package.json not found!');
        }
    }
}