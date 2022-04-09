const mix = require('laravel-mix');

mix.disableNotifications();
mix.sass('resources/scss/style.scss', 'public/css');
mix.browserSync('127.0.0.1:8000');
