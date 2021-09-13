const path = require( 'path' );
const defaultConfig = require( '@wordpress/scripts/config/webpack.config' );
const isProduction = process.env.NODE_ENV === 'production';


const config = {
	...defaultConfig,
	mode: isProduction ? 'production' : 'development',
	devtool: 'source-map',
	entry: {
		index: [ path.resolve( process.cwd(), `src/index.js` ) ],
		frontend: [ path.resolve( process.cwd(), `src/frontend.js` ) ],
	},
	output: {
		publicPath: `/build/`,
		path: path.resolve( process.cwd(), `./build` ),
		filename: '[name].js',
	},
	module: {
		...defaultConfig.module,
	},
	optimization: {
		...defaultConfig.optimization,
	},
	plugins: [ ...defaultConfig.plugins ],
};

module.exports = config;
