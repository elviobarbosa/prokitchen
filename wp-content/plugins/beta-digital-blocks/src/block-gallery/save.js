import { useBlockProps, RichText } from '@wordpress/block-editor';

export default function save( { attributes } ) {
	const blockProps = useBlockProps.save();

	return (
		<div { ...blockProps }>
			<div>
				<img src={attributes.imageUrl} alt={attributes.imageAlt} />
			</div>
		</div>
	);
}
