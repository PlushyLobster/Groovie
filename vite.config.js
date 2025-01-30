import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/css/root.css', 'resources/js/app.js',
                'resources/css/reset.css', 'resources/css/style.css', 'resources/js/navBar.js',
                'resources/js/ResetPassword.js', 'resources/js/profilRedirect.js'],
            refresh: true,
        }),
    ],
});
