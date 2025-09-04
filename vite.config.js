import { defineConfig } from 'vite';

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
    experimental: {
        renderBuiltUrl(filename, { hostType }) {
            if (hostType === 'css') {
                return filename;
            }
            return { relative: true };
        }
    }
});