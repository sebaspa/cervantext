/** @type {import('tailwindcss').Config} */
module.exports = {
	content: [ './**/*.php' ],
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
				yellow: {
					100: '#fcfacf',
					200: '#f9f59f',
					300: '#f7ef6f',
					400: '#f4ea3f',
					500: '#f1e50f',
					600: '#c1b70c',
					700: '#918909',
					800: '#605c06',
					900: '#302e03',
				},
				gray: {
					100: '#d6d6d6',
					200: '#adadad',
					300: '#858585',
					400: '#5c5c5c',
					500: '#333333',
					600: '#292929',
					700: '#1f1f1f',
					800: '#141414',
					900: '#0a0a0a',
				},
			},
			fontFamily: {
				lato: [ 'Lato', 'sans-serif' ],
				varela: [ 'Varela', 'sans-serif' ],
			},
		},
	},
	plugins: [],
};
