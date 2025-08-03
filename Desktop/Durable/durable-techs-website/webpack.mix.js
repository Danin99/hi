const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');

mix.js(['resources/website/js/app.js', 'resources/admin/js/app.js'])
      .sass(['resources/website/sass/app.scss','resources/admin/sass/app.scss'])
      .options({
            processCssUrls: false,
            postCss: [tailwindcss('./tailwind.config.js')],
      });
