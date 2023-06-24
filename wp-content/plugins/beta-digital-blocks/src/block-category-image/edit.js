import { __ } from '@wordpress/i18n';
import { InspectorControls, BlockControls, MediaPlaceholder, useBlockProps, RichText, MediaReplaceFlow } from '@wordpress/block-editor';
import './editor.scss';
import metadata from './block.json';
import ProductCategories from './includes/post-categories';
const { Placeholder, PanelBody, RangeControl } = wp.components;

export default function Edit( { attributes, setAttributes } ) {
	const setImageAttributes = (media) => {
		console.log(media)
		if (!media || !media.url) {
			setAttributes({
				imageUrl: null,
				imageId: null,
				imageAlt: null,
				imageWidth: null,
				imageHeight: null
			});
			return;
		}
		setAttributes({
			imageUrl: media.url,
			imageId: media.id,
			imageAlt: media?.alt,
			imageWidth: media.width,
			imageHeight: media.height,
		});
	};
	const onChangeContent = ( newContent ) => {
		setAttributes( { content: newContent } )
	}

	const onChangeCategories = ( newContent ) => {
		if (typeof newContent !== 'string') return;
		const obj = JSON.parse(newContent);
		setAttributes( { categoryName: obj.name, categoryLink: obj.link } )
	}

	const imageClass = (attributes.imageUrl) ? 'bd-product__categories-image' : '';

	return (
		<div { ...useBlockProps() }>

			<ProductCategories
				tagName='a'
				onChange={ onChangeCategories }
				className='bd-product__categories'
				value={ { 'name': attributes.categoryName, 'link': attributes.categoryLink  } }
			/>

			{ attributes.imageUrl ?
			<div className='textbox-container'>
				<RichText
					{ ...useBlockProps }
					tagName="p"
					onChange={ onChangeContent }
					allowedFormats={ [ 'core/bold', 'core/italic' ] }
					value={ attributes.categoryName }
					placeholder={ __( 'Selecione uma categoria ao lado' ) }
				/>

				<div className={imageClass}>
					<figure>
						<img src={attributes.imageUrl} alt={attributes.imageAlt} />
					</figure>
				</div>
			</div>
			:
				<MediaPlaceholder
					accept="image/*"
					allowedTypes={['image']}
					onSelect={setImageAttributes}
					multiple={false}
					handleUpload={true}
				/>
			}
			<BlockControls>
				<MediaReplaceFlow
					mediaId={attributes.imageId}
					mediaUrl={attributes.imageUrl}
					allowedTypes={['image']}
					accept="image/*"
					onSelect={setImageAttributes}
					name={!attributes.imageUrl ? __('Add Image') : __('Replace Image')}
				/>
			</BlockControls>

		</div>

	);
}
