/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./assets/**/*.js",
    "./templates/**/*.html.twig",
  ],
  theme: {
    extend: {
      fontFamily: {
        lalezar: ['Lalezar', 'sans-serif'],
        assistant: ['Assistant', 'sans-serif'],
      },
      margin: {
        '1/4': '25%',
      },
      colors: {
        customColor: '#FF00EE',
        'primary': {
          '50': '#fffaec',
          '100': '#fff5d3',
          '200': '#ffe7a5',
          '300': '#ffd56d',
          '400': '#ffb632',
          '500': '#ff9e0a',
          '600': '#f48000',
          '700': '#cc6202',
          '800': '#a14b0b',
          '900': '#82400c',
          '950': '#461e04',
        },
        'darkred': {
          '50': '#fdf3f3',
          '100': '#fbe5e5',
          '200': '#f9cfcf',
          '300': '#f3aeae',
          '400': '#ea7f7f',
          '500': '#de5555',
          '600': '#ca3838',
          '700': '#a22a2a',
          '800': '#8c2828',
          '900': '#752727',
          '950': '#3f1010',
        },
        'lightblue': {
          '50': '#f2fbf8',
          '100': '#d1f6ec',
          '200': '#9eead7',
          '300': '#6edac3',
          '400': '#40c1aa',
          '500': '#27a590',
          '600': '#1d8475',
          '700': '#1b6a60',
          '800': '#1a554e',
          '900': '#1a4741',
          '950': '#092a27',
        },
        'base': {
          '50': '#f6f6f6',
          '100': '#e7e7e7',
          '200': '#d1d1d1',
          '300': '#b0b0b0',
          '400': '#888888',
          '500': '#6d6d6d',
          '600': '#636363',
          '700': '#4f4f4f',
          '800': '#454545',
          '900': '#3d3d3d',
          '950': '#262626',
        },
      }
    },
  },
  plugins: [],
}

