import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    server: {
        host: 'augustogomes-lv.recruitment.alfasoft.pt',
        port: 5173,
        https: true, // Força o Vite a rodar com HTTPS
    },
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
