import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js','resources/js/jspdf.js','resources/css/filament/selling/theme.css'],
            refresh: true,
        }),
    ],
});
