import { useBlockProps, InnerBlocks, RichText } from '@wordpress/block-editor';

export default function save( { attributes } ) {
	const blockProps = useBlockProps.save();

	return (
		<div { ...blockProps }>
			<div className='is-layout-flex wp-container-3 wp-block-columns bd-block-product-header'>
				<div className='is-layout-flow wp-block-column bd-block-product-header__column-1'>

					<div>
						<RichText.Content
							tagName='p'
							className='bd-block-product-header__description'
							value={ attributes.prodHeaderDescription } />

						<RichText.Content
							tagName='div'
							className='bd-block-product-header__categories'
							value={ attributes.prodHeaderCategories } />
					</div>

				</div>
				<div className='is-layout-flow wp-block-column description' >
					<InnerBlocks.Content />
				</div>
			</div>
		</div>
	);
}
