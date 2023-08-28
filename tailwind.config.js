/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./public/*.{html,js,php}"],
  theme: {
    fontFamily: {
      montserrat: ['Montserrat', 'sans-serif']
    },
    extend: {
      colors: {
          green: '#004643',
          yellow: '#f9bc60',
          white: '#fffffe'
      },
    },
  },
  plugins: [],
}