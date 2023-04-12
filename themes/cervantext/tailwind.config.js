/** @type {import('tailwindcss').Config} */
module.exports = {
	content: [ './**/*.{php,js}' ],
	theme: {
		extend: {
			colors: {
				'light-pink': {
					100: '#fcfaf8',
					200: '#f9f5f2',
					300: '#f5f0eb',
					400: '#f2ebe5',
					500: '#efe6de',
					600: '#bfb8b2',
					700: '#8f8a85',
					800: '#605c59',
					900: '#302e2c',
				},
			},
			fontFamily: {
				lato: [ 'Lato', 'sans-serif' ],
			},
		},
	},
	plugins: [],
};
