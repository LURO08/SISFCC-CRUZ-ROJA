import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    // server: {
    //     host: '0.0.0.0', // Permite que el servidor escuche en todas las interfaces
    //     port: 5173,      // Cambia el puerto si es necesario
    //     hmr: {
    //         host: '192.168.0.105', // IP del servidor Laravel
    //     },
    // },
});
