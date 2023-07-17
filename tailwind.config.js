import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Poppins', 'sans-serif'],
                'sans':['Poppins', 'sans-serif'],
                'serif': ['ui-serif', 'Georgia'],
                'mono': ['ui-monospace', 'SFMono-Regular'],
                'display': ['Oswald'],
                'body': ['Hoefler Text', 'serif'],

            },
            colors: {
                primary: '#8CBF3A',
                secondary:'#3C6317',
                background:"#f4faec"
              },
        },
        
    },

    plugins: [forms, typography],
};
