import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.scss','resources/css/app.css', 'resources/js/app.js','resources/js/validarEdicion.js','resources/js/validadCreacion.js'],
            refresh: true,
        }),
    ],
});
