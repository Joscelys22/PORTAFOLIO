/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./*.php",
    "./**/*.php",],
    theme: {
      extend: {
        colors: {
          'primary-color': '#b2ecea',
          'dark-bg': '#94578cc2',
          'darker-bg': '#794a83',
          'light-text': '#f7fff6',
          'border-color': '#a86aa8',
          'gray-text': '#d4f3f5',
          'card-bg': '#64b1a0d8',
        },
        fontFamily: {
          montserrat: ['Montserrat', 'sans-serif'],
        },
      },
    },
  plugins: [],
}

