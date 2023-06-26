import { useBlockProps } from '@wordpress/block-editor';

export default function save( { attributes } ) {
	const blockProps = useBlockProps.save();
	return (
		<div { ...blockProps } className="bd-block-img-category">
			<a href={attributes.categoryLink} className="bd-block-img-category__link"></a>
			<p className="bd-block-img-category__name">{attributes.categoryName}</p>

			<figure>
				<img
				src={attributes.imageUrl}
				alt={attributes.imageAlt}
				width={attributes.imageWidth}
				height={attributes.imageHeight} />
			</figure>

		</div>
	);
}
