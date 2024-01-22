/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./resources/views/blog/view.php"],
    theme: {
        extend: {},
    },
    plugins: [require("@tailwindcss/typography")],
};
