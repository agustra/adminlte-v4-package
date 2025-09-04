import { defineConfig } from 'vite';
import { resolve } from 'path';
import { copyFileSync, existsSync, mkdirSync } from 'fs';

export default defineConfig({
    build: {
        outDir: 'dist',
        rollupOptions: {
            input: {
                adminlte: 'resources/js/adminlte.js',
                'adminlte-css': 'resources/css/adminlte.scss'
            },
            output: {
                entryFileNames: 'js/[name].js',
                chunkFileNames: 'js/[name].js',
                assetFileNames: (assetInfo) => {
                    if (assetInfo.name.endsWith('.css')) {
                        return 'css/[name][extname]';
                    }
                    if (assetInfo.name.match(/\.(woff2?|eot|ttf|otf)$/)) {
                        return 'fonts/[name][extname]';
                    }
                    return 'assets/[name][extname]';
                }
            }
        },
        assetsInlineLimit: 0
    },
    css: {
        preprocessorOptions: {
            scss: {
                api: 'modern-compiler',
                silenceDeprecations: ['legacy-js-api', 'import', 'global-builtin', 'color-functions']
            }
        }
    },
    plugins: [
        {
            name: 'copy-bootstrap-icons',
            writeBundle() {
                // Copy Bootstrap Icons fonts
                const fontsDir = resolve(__dirname, 'dist/fonts');
                if (!existsSync(fontsDir)) {
                    mkdirSync(fontsDir, { recursive: true });
                }
                
                const fontFiles = [
                    'node_modules/bootstrap-icons/font/fonts/bootstrap-icons.woff2',
                    'node_modules/bootstrap-icons/font/fonts/bootstrap-icons.woff'
                ];
                
                fontFiles.forEach(file => {
                    if (existsSync(file)) {
                        const fileName = file.split('/').pop();
                        copyFileSync(file, resolve(fontsDir, fileName));
                    }
                });
            }
        }
    ],
    experimental: {
        renderBuiltUrl(filename, { hostType }) {
            if (hostType === 'css') {
                return filename;
            }
            return { relative: true };
        }
    }
});