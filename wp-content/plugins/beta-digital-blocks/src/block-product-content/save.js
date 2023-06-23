import { useBlockProps, InnerBlocks, RichText } from '@wordpress/block-editor';

export default function save( { attributes } ) {
	const blockProps = useBlockProps.save();

	return (
		<div { ...blockProps }>
			<div className='bd-block-product__content'>
				<div className="">

					<h2 className='bd-block-product__content-title'>
						{attributes.prodContentTitle}
					</h2>

				</div>
				<div className='bd-block-product__content-description' >
					<InnerBlocks.Content />
				</div>
			</div>
		</div>
	);
}
