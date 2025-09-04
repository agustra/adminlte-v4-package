module.exports = {
  plugins: [
    require("postcss-url")([
      {
        filter: "**/bootstrap-icons.css",
        url: (asset) => {
          // Semua kemungkinan: ./fonts/, /fonts/, fonts/
          if (asset.url.match(/^(\.?\/)?fonts\//)) {
            return asset.url.replace(/^(\.?\/)?fonts\//, "../fonts/");
          }
          return asset.url;
        },
      },
    ]),
  ],
};
