const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './public/index.html',
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    theme: {
        colors: {
          transparent: 'transparent',
          current: 'currentColor',
          'white': '#ffffff',
          'black': '#000000',
          'rose-100': '#F7EDF0',
          'rose-300': '#F4CBC6',
          'rose-500': '#F4AFAB',
          'yellow-100': '#F4EEA9',
          'yellow-300': '#F4F482',
          'gray-200': '#f3f4f6',
          'gray-300': '#d1d5db',
          'gray-600': '#4b5563',
          'gray-900': '#111827',
          'indigo-200':'#c7d2fe',
          'indigo-300': '#a5b4fc',
          'indigo-600': '#4f46e5',
        },
      },
    plugins: [require('@tailwindcss/forms')],
};
