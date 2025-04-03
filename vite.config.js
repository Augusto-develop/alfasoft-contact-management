import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    server: {
        https: true,
        host: 'augustogomes-lv.recruitment.alfasoft.pt',
        port: 5175,
        cors: {
            origin: 'https://augustogomes-lv.recruitment.alfasoft.pt',
            methods: ['GET', 'POST', 'PUT', 'DELETE'],
            allowedHeaders: ['Content-Type', 'Authorization'],
        }
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
