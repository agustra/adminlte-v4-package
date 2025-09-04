module.exports = {
  plugins: [
    require("postcss-url")({
      url: (asset) => {
        // Ubah path font untuk Laravel: ./fonts/ atau fonts/ menjadi ../fonts/
        if (asset.url.includes('bootstrap-icons') && asset.url.match(/^(\.?\/)?fonts\//)) {
          return asset.url.replace(/^(\.?\/)?fonts\//, "../fonts/");
        }
        return asset.url;
      },
    }),
  ],
};
