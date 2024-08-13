/** @type {import('tailwindcss').Config} */
export default {
  content: [
    'node_modules/preline/dist/*.js',
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  darkMode: 'class', // Defina o modo escuro como 'class'
  theme: {
    extend: {},
  },
  plugins: [
    require('preline/plugin'),
  ],
}
