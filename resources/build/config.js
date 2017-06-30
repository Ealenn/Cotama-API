const appRoot = require('app-root-path');

module.exports = {
  entry: {
    app: ['./resources/assets/sass/app.scss', './resources/assets/js/app.js']
  },
  port: 3003,
  html: false,
  browsers: ['last 2 versions', 'ie > 8'],
  assets_url: '/assets/',  // Urls dans le fichier final
  //stylelint: './resources/assets/sass/**/*.scss',
  assets_path: appRoot + '/public/assets/', // ou build ?
  refresh: ['app/**/*.php', 'ressources/views/**/*.php'],
  historyApiFallback: false, // true si on utilise le mode: 'history' de vue-router (redirige toutes les requêtes sans réponse vers index.html)
  debug: false
}
