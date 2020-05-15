const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;
const ServerSideRender = wp.serverSideRender;

registerBlockType( 'pcc/recent-content', {
	title: __( 'Recent Content', 'pcc-framework' ),
	description: __(
		'Generate a grid of recent content from various sources',
		'pcc-framework'
	),
	icon: 'screenoptions',
	category: 'blocks',
	edit: () => {
		return <ServerSideRender block="pcc/recent-content" />;
	},
	save: () => {
		return null;
	},
} );
