const { scale } = require('tailwindcss/defaultTheme');
const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    darkMode: 'media',
    purge: [
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
        './resources/js/**/*.js',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            keyframes: {
                zoomIn: {
                  '0%': { transform: 'scale(0.5)'},
                  '100': { transform: 'scale(1)' },
                },
                bandex: {
                  '0%': { transform: 'scale(0)', opacity:0},
                  '25%': {opacity: 1},
                  '75%': { transform: 'scale(1.1)'},
                  '100': { transform: 'scale(1)' },
                },
                zoomOut: {
                  '0%': { transform: 'scale(1)', opacity: 1},
                  '50%': { transform: 'scale(0.5)'},
                  '100': { transform: 'scale(0)', opacity: 0},
                },
                fadeIn: {
                  '0%': { opacity: 0},
                  '100': { opacity: 1},
                },
                fadeAndExpand: {
                  '0%': { opacity: 0, width:'0%' },
                  '100': { opacity: 1, width: '100%' },
                },
                fadeOut: {
                  '0%': { opacity: 1},
                  '100': { opacity: 0},
                },
                fadeOutAndShrink: {
                  '0': { opacity: 1, width: '100%' },
                  '100%': { opacity: 0, width:'0%' },
                }
            },
            animation: {
                zoom: 'zoomIn 600ms ease',
                zoomslow: 'zoomIn 900ms ease',
                zoomout: 'zoomOut 600ms ease',
                fadein: 'fadeIn 600ms ease',
                fadeoutfast: 'fadeOut 400ms ease',
                fadeexpand: 'fadeAndExpand 700ms ease',
                fadeshrink: 'fadeOutAndShrink 400ms ease',
            },
            backgroundImage: theme => ({
              'logo': "url('/images/brain.png')",
              'site-bg': "url('/images/stories.jpeg')",
              'site-2': "url('/images/about.jpeg')",
              'site-3': "url('/images/works.jpeg')",
            })
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
