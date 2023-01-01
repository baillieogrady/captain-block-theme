module.exports = {
  content: ["./src/**/*.{js,css}", "./parts/*.html", "./templates/*.html", "./patterns/*.php", "../captain-block-plugin/src/**/*.{js,css}"],
  safelist: [
    {
      pattern: /col-start/,
      variants: ["lg"]
    },
    {
      pattern: /col-end/,
      variants: ["lg"]
    }
  ],
  theme: {
    screens: {
      lg: "1140px",
    },
    container: {
      center: true,
      padding: {
        DEFAULT: "1.25rem",
        lg: "2rem"
      }
    },
    extend: {
      fontFamily: {
        body: ["Helvetica"],
      },
      colors: {
        black: "#1D1D24",
        white: "#FFFFFF",
        grey: "#F1F1F2",
        blue: "#0000ff",
      },
      fontSize: {
        'sm': ".875rem",
        'lg': "1.125rem",
        'xl': "1.25rem",
        '2xl': "1.5rem",
        '3xl': "1.625rem",
        '4xl': "2.375rem",
        '5xl': "2.875rem",
        '6xl': "3.875rem",
        '9xl': "7.75rem",
      },
      lineHeight: {
        tight: '1.05',
        snug: '1.5'
      },
      height: {
        '22': '4.5rem',
      },
      letterSpacing: {
        tight: "-0.03em",
      },
      spacing: {
        '26': '6.5rem'
      }
    }
  }
};
