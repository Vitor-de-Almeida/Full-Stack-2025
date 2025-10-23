// tailwind.config.js
export default {
  content: [
    "./index.html", // ajuste o caminho
    "./**/*.html", // inclua todos os seus HTMLs se preferir
    "./src/**/*.{js,ts,jsx,tsx}", // se usar JS/TS
  ],
  theme: {
    extend: {
      colors: {
        content: {
          primary: "#FFFFFF",
          secondary: "#C7C9CC",
          tertiary: "#1e1b26",
          brand: "#C58DE7",
          inverse: "#030203",
        },
        background: {
          primary: "#020202",
          secondary: "#111012",
          tertiary: "#24222E",
          brand: "#C58DE7",
          gray: "#3D3D3D",
        },
        accent: {
          pink: "#D586E0",
          blue: "#91A1FA",
          green: "#77C0A",
          lime: "#D1DC97",
          red: "#E9A9B3",
        },
      },
      backgroundImage: {
        "gradient-border":
          "linear-gradient(90deg, #77C0A 0%, #D1DC97 14.84%, #E9A9B3 32.15%, #D586E0 65.79%, #91A1FA 84.58%)",
        "gradient-background":
          "linear-gradient(90deg, #D586E0 0%, #91A1FA 98.93%)",
        "gradient-content": "linear-gradient(90deg, #C7C9CC 0%, #3D3D3D 100%)",
      },
      fontFamily: {
        sora: ["Sora", "sans-serif"],
        robotoMono: ["Roboto Mono", "monospace"],
        robotoFlex: ["Roboto Flex", "sans-serif"],
      },
      fontSize: {
        // Display
        "display-large": [
          "72px",
          { lineHeight: "130%", fontWeight: "800", textTransform: "uppercase" },
        ],
        "display-medium": [
          "40px",
          { lineHeight: "130%", fontWeight: "800", textTransform: "uppercase" },
        ],
        "display-small": [
          "32px",
          { lineHeight: "130%", fontWeight: "700", textTransform: "uppercase" },
        ],

        // Overline
        overline: [
          "16px",
          { lineHeight: "150%", fontWeight: "700", textTransform: "uppercase" },
        ],

        // Paragraphs
        "paragraph-large": ["16px", { lineHeight: "150%", fontWeight: "500" }],
        "paragraph-medium": ["14px", { lineHeight: "150%", fontWeight: "500" }],
        "paragraph-small": ["12px", { lineHeight: "150%", fontWeight: "500" }],

        // Labels
        "label-medium": ["20px", { lineHeight: "150%", fontWeight: "700" }],
        "label-small": ["16px", { lineHeight: "150%", fontWeight: "500" }],
      },
    },
  },
  plugins: [],
};
