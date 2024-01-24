/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./views/*/*.php'],
  theme: {
    extend: {},
    colors: {
      text: 'var(--text)',
      background: 'var(--background)',
      primary: 'var(--primary)',
      secondary: 'var(--secondary)',
      accent: 'var(--accent)',
      black: '#000'
    },
  },
  plugins: [],
};

