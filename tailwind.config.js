/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./public/*.{html,js,php}"],
  theme: {
    fontFamily: {
      montserrat: ['Montserrat', 'sans-serif']
    },
    extend: {
      colors: {
          black: '#11101d',
          gray: '#2E2E36',
          cyan: '#159ebd',
          white: '#ffffff'
      },
    },
  },
  plugins: [],
}