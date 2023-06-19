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
                // JS
                'resources/js/primary.js'
            ],
            refresh: true, 
        }),
        // react(),
    ],
});
