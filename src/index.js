import { __ } from '@wordpress/i18n';
import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps } from '@wordpress/block-editor';
import './style.scss';
import './index.scss';

registerBlockType( 'alpine/alpine', {
	title: __( 'Example: Alpinejs', 'alpine' ),
	icon: 'universal-access-alt',
	category: 'layout',
	example: {},
	edit( props ) {
		const {
			className,
		} = props;
		return (
			<div {...useBlockProps({ className })}>
				Alpinejs Example Block in the Editor.
			</div>
		);
	},
	save() {
		return (
			<div
				{ ...useBlockProps.save() }
				{ ...{ 'x-data': '{ show: false }' } }
			>
				<div
					className="block"
					{ ...{ ':class': `{'block': show, 'hidden': ! show }` } }
				>
					Alpinejs Example Block on the Frontend.
				</div>
				<button
					{ ...{ '@click':'show = !show' } }
				>
					<span
						className="hidden"
						{ ...{ ':class': `{'hidden': show, 'block': ! show }` } }
					>Show Text</span>
					<span
						className="block"
						{ ...{ ':class': `{'block': show, 'hidden': ! show }` } }
					>Hide Text</span>
				</button>
			</div>
		);
	},
} );
