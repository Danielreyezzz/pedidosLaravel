import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/css/custom.css',
                'resources/css/main.css',
                'resources/js/main.js',
                'resources/css/util.css',

            ],
            refresh: true,
        }),
    ],
});
