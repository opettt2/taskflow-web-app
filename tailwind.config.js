import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                ocean: {
                    slate:  '#4f6d7a',
                    sky:    '#c0d6df',
                    alice:  '#dbe9ee',
                    smart:  '#4a6fa5',
                    baltic: '#166088',
                },
            },
            backdropBlur: {
                xs: '2px',
                sm: '6px',
                md: '12px',
                lg: '20px',
            },
            backgroundColor: {
                'glass-light': 'rgba(255, 255, 255, 0.25)',
                'glass-dark': 'rgba(0, 0, 0, 0.25)',
            },
        },
    },
    plugins: [forms],
};
