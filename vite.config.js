import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { resolve } from 'path'; // Import de resolve depuis le module path
import tailwindcss from 'tailwindcss'; // Import de tailwindcss

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/script.js',
                'resources/js/jq.js',
                'resources/js/telephone.js',
                'resources/js/intlTelInput.js',


            ],
            refresh: true,
        }),
        tailwindcss(), // Utilisation du plugin tailwindcss
    ],

    build: {
        rollupOptions: {
            input: {
                main: resolve(__dirname, 'index.html'),
            }
        }
    }
});
