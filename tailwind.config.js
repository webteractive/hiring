const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    theme: {
        extend: {
            fontFamily: {
                sintony: ['Sintony', 'sans-serif'],
            },

            fontSize: {
                '7xl': '5rem',
                '8xl': '6rem',
                '9xl': '7rem',
                '10xl': '8rem',
                '11xl': '9rem',
                '12xl': '10rem',
                '13xl': '11rem',
                '14xl': '12rem',
            },

            spacing: {
                '1/3': '33%',
                '1/2': '50%',
                '1.5': '150%',
            },

            height: {
                '980': '980px',
                '1024': '1024px',
                '1280': '1280px',
                '1440': '1440px',
            },

            width: {
                '980': '980px'
            },

            inset: {
                '-380': '-380px',
                '-256': '-256px',
                '-124': '-124px',
                '1/2': '50%'
            },

            minHeight: {
                '50vh': '50vh',
                '75vh': '75vh'
            },

            colors: {
                'some-gray': '#9C9CAA'
            }
        },
    },
    variants: {
        cursor: ['responsive', 'hover', 'focus'],
    },
    purge: {
        content: [
            './app/**/*.php',
            './resources/**/*.html',
            './resources/**/*.js',
            './resources/**/*.jsx',
            './resources/**/*.ts',
            './resources/**/*.tsx',
            './resources/**/*.php',
            './resources/**/*.vue',
            './resources/**/*.twig',
        ],
        options: {
            defaultExtractor: (content) => content.match(/[\w-/.:]+(?<!:)/g) || [],
            whitelistPatterns: [/-active$/, /-enter$/, /-leave-to$/, /show$/],
        },
    },
    plugins: [],
};
