/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./assets/**/*.js",
    "./templates/**/*.html.twig",
  ],
  theme: {
    extend: {
      margin: {
        '1/4': '25%',
      },
      colors : {
        customColor : '#FF00EE',
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
          'purple': {
            '50': '#fff4ff',
            '100': '#fee9fd',
            '200': '#fcd2fb',
            '300': '#f9aef4',
            '400': '#f57deb',
            '500': '#ea53dd',
            '600': '#cd2cbc',
            '700': '#aa2198',
            '800': '#8b1d7b',
            '900': '#721d65',
            '950': '#4b073f',
        },  
          'blue': {
            '50': '#f0fdfb',
            '100': '#ccfbf5',
            '200': '#98f7ed',
            '300': '#53eae0',
            '400': '#2cd5cf',
            '500': '#13b9b6',
            '600': '#0c9595',
            '700': '#0e7577',
            '800': '#105d5f',
            '900': '#124e4f',
            '950': '#042c2f',
        },
      }
    },
  },
  plugins: [],
}

