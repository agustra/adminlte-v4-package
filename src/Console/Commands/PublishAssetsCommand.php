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
        
        // Create vendor/adminlte directory
        $publicPath = public_path('vendor/adminlte');
        if (!File::exists($publicPath)) {
            File::makeDirectory($publicPath, 0755, true);
        }
        
        // Build assets first
        $packagePath = __DIR__ . '/../../../';
        $this->info('Building assets with Vite...');
        
        if (File::exists($packagePath . 'package.json')) {
            exec("cd {$packagePath} && npm install && npm run build", $output, $returnCode);
            
            if ($returnCode === 0) {
                $this->info('Assets built successfully!');
                
                // Copy built assets
                $distPath = $packagePath . 'dist';
                if (File::exists($distPath)) {
                    File::copyDirectory($distPath, $publicPath);
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