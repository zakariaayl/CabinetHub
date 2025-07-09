/** @type {import('tailwindcss').Config} */
module.exports = {
    // tailwind.config.js
theme: {
    extend: {
      colors: {
        gray: {
          75: '#f9fafb' // a custom color between gray-50 and gray-100
        }
      }
    }
  },
  plugins: [
  require('tailwind-scrollbar'),
],

  content: [
    './resources/views/**/*.blade.php',
    './resources/js/**/*.js',
    './resources/css/**/*.css',
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './storage/framework/views/*.php',
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}
