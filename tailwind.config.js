/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./*.php",
    "./template-parts/**/*.php",
    "./inc/**/*.php"
  ],
  theme: {
    extend: {
      colors: {
        primary: '#1e3a8a', // Deep blue
        secondary: '#f59e0b', // Amber
      },
      fontFamily: {
        sans: ['Inter', 'sans-serif'],
      }
    },
  },
  plugins: [],
}
