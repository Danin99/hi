import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
      plugins: [
            laravel({
                  input: ['resources/website/sass/app.scss', 'resources/website/js/app.js', 'resources/website/js/body.js',
                        'resources/admin/sass/app.scss', 'resources/admin/js/app.js'],
                  refresh: true,
            }),
      ],
      resolve: {
            alias: {
                  '$': 'jQuery'
            },
      },
      server: {
            hmr: true
      }
});
