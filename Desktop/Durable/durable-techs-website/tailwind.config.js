/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
        "./resources/website/**/*.blade.php",
        "./resources/website/**/*.js",
        "./resources/website/sass/**/*.scss",
        "./resources/admin/**/*.js", "./resources/admin/sass/**/*.scss", "./resources/admin/**/*.blade.php",
        "./node_modules/flowbite/**/*.js"],
  theme: {
        container: {
              center: true,
        },
        screens: {
              xs: '480px',
              sm: '578px',
              md: '768px',
              lg: '992px',
              xl: '1240px',
              '2xl': '1496px',
        },
        extend: {
              gridRow: {
                    'span-16': 'span 16 / span 16',
              }
        },

  },
  plugins: [
    require('flowbite/plugin')
]

}

