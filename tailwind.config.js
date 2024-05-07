import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';
const plugin = require('tailwindcss/plugin');

export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './*.html',
        './pages/**/*.html'
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                "primary": "#1f4b8e",
                "primary-dark": "#102a52",
                "secondary": "#182430",
                "secondary-dark": "#060C11",
            },
            // Ajout de la configuration pour la personnalisation de la scrollbar
            scrollbar: theme => ({
                width: theme('spacing.2'),
                trackColor: theme('colors.secondary'),
                thumbColor: '#888',
                thumbHoverColor: '#555',
            }),
        },
    },

    plugins: [
        forms,
        typography,
        plugin(function({ addUtilities, theme }) {
            // Utilitaire pour la personnalisation de la scrollbar
            const newUtilities = {
                '.custom-scrollbar': {
                    '::-webkit-scrollbar': { width: '6px' },
                    '::-webkit-scrollbar-track': { background: theme('scrollbar.trackColor')},
                    '::-webkit-scrollbar-thumb': { background: theme('scrollbar.thumbColor') },
                    '::-webkit-scrollbar-thumb:hover': {background: theme('scrollbar.thumbHoverColor')},
                }
            };

            addUtilities(newUtilities, ['responsive', 'hover']);
        })
    ],
};
