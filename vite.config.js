import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
// import { viteStaticCopy } from 'vite-plugin-static-copy'
// import path from 'path'

export default defineConfig({
    plugins: [
        // viteStaticCopy({
        //     targets: [
        //       {
        //         src: path.resolve(__dirname, './resources') + '/[!.]*',
        //         dest: './public/build',
        //       },
        //     ],
        // }),
        laravel({
            input: [
                // scss
                'resources/scss/frontend/demo8.scss',
                // 'resources/css/app.scss', 
                // 'resources/js/app.js',
                // // 'resources/js/libs/app1.js' // jquery
                // 'resources/js/main.jsx',
            ],
            refresh: true, 
        }),
        // react(),
    ],
});
