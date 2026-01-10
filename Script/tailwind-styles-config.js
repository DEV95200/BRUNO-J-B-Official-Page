tailwind.config = {
  theme: {
    extend: {
      colors: {
        primary: '#00bfff',
        dark: '#0f172a',
        cyan: '#00ffff'
      },
      fontFamily: {
        mono: ['Fira Code', 'monospace']
      },
      animation: {
        fade: 'fadeIn 1.5s ease-in-out',
        slide: 'slideUp 1s ease-out'
      },
      keyframes: {
        fadeIn: {
          '0%': { opacity: 0 },
          '100%': { opacity: 1 }
        },
        slideUp: {
          '0%': { transform: 'translateY(20px)', opacity: 0 },
          '100%': { transform: 'translateY(0)', opacity: 1 }
        }
      }
    }
  }
}
