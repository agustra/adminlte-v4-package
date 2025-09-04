module.exports = {
  plugins: [
    require("postcss-url")({
      url: (asset) => {
        // Ubah semua variasi path font menjadi ../fonts/
        if (asset.url.includes('bootstrap-icons')) {
          // Handle semua kemungkinan: ./fonts/, fonts/, /fonts/
          if (asset.url.match(/^\/fonts\//)) {
            return asset.url.replace(/^\/fonts\//, "../fonts/");
          }
          if (asset.url.match(/^(\.?\/)?fonts\//)) {
            return asset.url.replace(/^(\.?\/)?fonts\//, "../fonts/");
          }
        }
        return asset.url;
      },
    }),
  ],
};
