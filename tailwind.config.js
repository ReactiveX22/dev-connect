/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
    ],
    theme: {
        extend: {
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

