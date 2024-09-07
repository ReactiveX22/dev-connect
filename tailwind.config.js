const colors = require('tailwindcss/colors')

/** @type {import('tailwindcss').Config} */

export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
    ],
    theme: {
        extend: {
            colors:{
                primary: colors.indigo
            },
            fontFamily: {
                'inter': ['Inter', 'sans-serif']
            },

            fontSize: {
                '2xs': '0.625rem'
            }
        },
    },
    plugins: [],
}

