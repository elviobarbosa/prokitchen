import { useBlockProps } from '@wordpress/block-editor';

export default function save( { attributes } ) {
	const blockProps = useBlockProps.save();
	return (
		<div { ...blockProps } className="bd-block-img-category">
			<a href={attributes.categoryLink}></a>
			<p>{attributes.categoryName}</p>
			<div>
				<img
					src={attributes.imageUrl}
					alt={attributes.imageAlt}
					width={attributes.imageWidth}
					height={attributes.imageHeight} />
			</div>
		</div>
	);
}
