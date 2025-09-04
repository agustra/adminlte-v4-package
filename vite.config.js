import { defineConfig } from "vite";
import postcssUrl from "postcss-url";

export default defineConfig({
  base: "./", // pastikan relative path, bukan absolute
  build: {
    outDir: "dist",
    rollupOptions: {
      input: {
        adminlte: "resources/js/adminlte.js",
        "adminlte-css": "resources/css/adminlte.scss",
      },
      output: {
        entryFileNames: "js/[name].js",
        chunkFileNames: "js/[name].js",
        assetFileNames: (assetInfo) => {
          if (assetInfo.name.endsWith(".css")) {
            return "css/[name][extname]";
          }
          if (assetInfo.name.match(/\.(woff2?|eot|ttf|otf)$/)) {
            return "fonts/[name][extname]";
          }
          return "assets/[name][extname]";
        },
      },
    },
    assetsInlineLimit: 0,
  },
  css: {
    postcss: {
      plugins: [
        postcssUrl({
          url: (asset) => {
            // ubah semua variasi path font menjadi ../fonts/
            if (asset.url.includes('bootstrap-icons')) {
              return asset.url.replace(/^(\.?\/)?fonts\//, "../fonts/").replace(/^\/fonts\//, "../fonts/");
            }
            return asset.url;
          },
        }),
      ],
    },
    preprocessorOptions: {
      scss: {
        api: "modern-compiler",
        silenceDeprecations: [
          "legacy-js-api",
          "import",
          "global-builtin",
          "color-functions",
        ],
      },
    },
  },
});
