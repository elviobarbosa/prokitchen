import { useBlockProps, InnerBlocks, RichText } from '@wordpress/block-editor';

export default function save( { attributes } ) {
	const blockProps = useBlockProps.save();

	return (
		<div { ...blockProps }>
			<div className='bd-block-page-titles'>
				<div className="">

					<h3 className='bd-block-page-titles__subtitle'>
						{attributes.contentSubTitle}
					</h3>
					<h2 className='bd-block-page-titles__title' dangerouslySetInnerHTML={{__html: attributes.contentTitle}} />
				</div>

			</div>
		</div>
	);
}
