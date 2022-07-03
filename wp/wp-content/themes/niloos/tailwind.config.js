const _ = require("lodash");
const theme = require("./theme.json");
const tailpress = require("@jeffreyvr/tailwindcss-tailpress");

module.exports = {
  mode: "jit",
  important: false,
  content: [
    "./*/*.php",
    "./**/*.php",
    "./template-parts/page-overlay.php",
    "../../plugins/NlsHunter/*/*.php",
    "../../plugins/NlsHunter/**/*.php",
    "../../plugins/NlsHunter/public/js/jobSearch.js",
    "./resources/css/*.css",
    "./resources/js/*.js",
    "./safelist.txt",
  ],
  theme: {
    container: {
      padding: {
        //DEFAULT: '1rem',
        // sm: '2rem',
        // lg: '0rem'
        DEFAULT: "0rem",
      },
      margin: {
        DEFAULT: "0.5rem 0",
      },
    },
    extend: {
      colors: tailpress.colorMapper(
        tailpress.theme("settings.color.palette", theme)
      ),
      width: {
        'input-lg': 'calc(25% - 10px)',
        'input-md': 'calc(50% - 8px)',
        'input-2lg': 'calc(50% - 20px)'
      },
      maxWidth: {
        '180': '180px',
        '90': '90px',
        '480': '480px',
        '40vw': '40vw',
        '50vw': '50vw'
      },
      minWidth: {
      },
      maxHeight: {
        '50vw': '50vw',
        '70vh': '70vh',
        '80vh': '80vh'
      },
      minHeight: {
        '120': '120px',
        '140': '140px',
        '280': '280px',
        '360': '360px',
        '400': '400px',
        '680': '680px',
        '50vw': '50vw'
      },
      rotate: {
        '270': '270deg',
      },
      animation: {
        spin: 'spin 1s linear infinite',
        expand: 'expand-middle 0.6s -0.3s ease-out',
        slide: 'slide-left 1s -0.3s ease-out',
        'slide-down': 'slide-down 0.6s -0.3s ease-out'
      },
      keyframes: {
        'spin': {
          from: {
            transform: 'rotate(0deg)'
          },
          to: {
            transform: 'rotate(360deg)'
          }
        },
        'expand-middle': {
          from: {
            transform: 'scale(0)',
            opacity: '0.3'
          },
          to: {
            transform: 'scale(100%)',
            opacity: '1'
          }
        },
        'slide-left': {
          from: {
            transform: 'scaleX(0)',
            opacity: '0.3'
          },
          to: {
            transform: 'scaleX(1)',
            opacity: '1'
          }
        },
        'slide-down': {
          from: {
            transform: 'scaleY(0)',
            opacity: '0.3'
          },
          to: {
            transform: 'scaleY(1)',
            opacity: '1'
          }
        }
      },
      gridTemplateColumns: {
        'autofit-160': 'repeat( auto-fit, minmax(160px, 1fr) )',
        'autofit-120': 'repeat( auto-fit, minmax(120px, 1fr) )'
      }
    },
    screens: {
      sm: "640px",
      md: "822px",
      lg: "1280px",
      xl: "1640px",
    },
  },
  plugins: [tailpress.tailwind],
};
