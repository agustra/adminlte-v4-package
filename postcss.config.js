module.exports = {
  plugins: [
    require("postcss-url")({
      url: (asset) => {
        // Ubah semua variasi path font menjadi ../fonts/
        if (asset.url.includes('bootstrap-icons')) {
          return asset.url.replace(/^(\.?\/)?fonts\//, "../fonts/").replace(/^\/fonts\//, "../fonts/");
        }
        return asset.url;
      },
    }),
  ],
};
