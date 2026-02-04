import defaultTheme from "tailwindcss/defaultTheme";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Inter", ...defaultTheme.fontFamily.sans],
                inter: ["Inter", "sans-serif"],
            },
            colors: {
                dark: {
                    900: "#0B0B0B",
                    800: "#111111",
                    700: "#1A1A1A",
                    600: "#222222",
                },
                gold: {
                    50: "#FFFBEB",
                    100: "#FEF3C7",
                    200: "#FDE68A",
                    300: "#FCD34D",
                    400: "#FBBF24",
                    500: "#F59E0B",
                    600: "#D97706",
                    700: "#B45309",
                    800: "#92400E",
                    900: "#78350F",
                },
            },
            backgroundImage: {
                "gradient-radial": "radial-gradient(var(--tw-gradient-stops))",
                "gradient-conic":
                    "conic-gradient(from 180deg at 50% 50%, var(--tw-gradient-stops))",
                "gradient-dark":
                    "linear-gradient(to bottom right, #0B0B0B, #111111, #0B0B0B)",
                "gradient-gold":
                    "linear-gradient(to right, #FBBF24, #F59E0B, #D97706)",
            },
            boxShadow: {
                "glow-sm": "0 0 10px rgba(250, 204, 21, 0.3)",
                glow: "0 0 20px rgba(250, 204, 21, 0.4)",
                "glow-lg": "0 0 40px rgba(250, 204, 21, 0.5)",
                "glow-xl": "0 0 60px rgba(250, 204, 21, 0.6)",
            },
            animation: {
                float: "float 3s ease-in-out infinite",
                glow: "glow 2s ease-in-out infinite",
                "pulse-slow": "pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite",
            },
            keyframes: {
                float: {
                    "0%, 100%": { transform: "translateY(0px)" },
                    "50%": { transform: "translateY(-20px)" },
                },
                glow: {
                    "0%, 100%": {
                        boxShadow: "0 0 20px rgba(250, 204, 21, 0.3)",
                    },
                    "50%": { boxShadow: "0 0 40px rgba(250, 204, 21, 0.6)" },
                },
            },
            backdropBlur: {
                xs: "2px",
            },
        },
    },
    plugins: [],
};
