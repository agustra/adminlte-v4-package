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
                
                // Copy built assets selectively
                $distPath = $packagePath . 'dist';
                if (File::exists($distPath)) {
                    // Copy only specific folders, not the entire dist
                    $foldersToSync = ['css', 'js', 'fonts'];
                    
                    foreach ($foldersToSync as $folder) {
                        $sourcePath = $distPath . '/' . $folder;
                        $destPath = $publicPath . '/' . $folder;
                        
                        if (File::exists($sourcePath)) {
                            File::copyDirectory($sourcePath, $destPath);
                        }
                    }
                    
                    // Copy Bootstrap Icons fonts
                    $fontsSourcePath = $packagePath . 'node_modules/bootstrap-icons/font/fonts';
                    $fontsDestPath = $publicPath . '/fonts';
                    
                    if (File::exists($fontsSourcePath)) {
                        if (!File::exists($fontsDestPath)) {
                            File::makeDirectory($fontsDestPath, 0755, true);
                        }
                        // Copy individual font files to avoid overwriting
                        $fontFiles = File::files($fontsSourcePath);
                        foreach ($fontFiles as $fontFile) {
                            File::copy($fontFile->getPathname(), $fontsDestPath . '/' . $fontFile->getFilename());
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