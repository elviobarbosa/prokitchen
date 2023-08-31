import { __ } from '@wordpress/i18n';
import { BlockControls, MediaPlaceholder, useBlockProps, RichText, MediaReplaceFlow, Iframe } from '@wordpress/block-editor';
import './editor.scss';
import metadata from './block.json';
import InspectControl from './includes/inspect-control';
const { Placeholder, PanelBody, RangeControl } = wp.components;

export default function Edit( { attributes, setAttributes } ) {
	const setImageAttributes = (media) => {
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

	const onChangeText = ( title, words, video ) => {
		console.log(video, title)
		video = (typeof video === 'undefined') ? '' : video;
		title = (typeof title === 'undefined') ? '' : title;
		words = (typeof words === 'undefined') ? '' : words;
		let count = -1;

		const arr = (!words) ? [] : words.split('\n');
		const htmlWords = arr.map( val => {
			count += 1;
			return `<span id='letter${count}' class='letters'>${val}</span>`
		});
		if (video.length > 0) {
			const regExp = /^.*(youtu\.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
			const match = ( video.length > 0 ) ? video.match(regExp) : '';
			console.log(match)
			video = (match && match[2].length == 11) ? match[2] : video;
			console.log(video, 'video')
		}

		setAttributes({
			richContent: `${title} <span class='ml10'><span data-js='txt-anim-child' class='text-wrapper'>${htmlWords.join(' ')}</span></span>`,
			titleContent: title,
			wordsContent: words,
			videoURL: video
		})
	}

	const imageClass = (attributes.imageUrl) ? 'bd-header__cover' : '';

	return (
		<div { ...useBlockProps() }>

			<InspectControl
				tagName='a'
				onChange={ onChangeText }
				className='bd-header__inspect'
				value={ {
					'title':attributes.titleContent,
					'words': attributes.wordsContent,
					'video': attributes.videoURL
				} }
			/>

			{ attributes.imageUrl ?
			<div className='textbox-container'>
				<div className={imageClass}>
					<figure>
						<img src={attributes.imageUrl} alt={attributes.imageAlt} />
					</figure>
				</div>

				<div className='bd-header__container'>
					<RichText
						{ ...useBlockProps }
						tagName='h2'
						className='bd-header__title'
						disabled='true'
						allowedFormats={ [ 'core/bold', 'core/italic' ] }
						value={ `${attributes.richContent}` }
						placeholder={ __( 'Digite no painel a direita...' ) }
					/>

					<div className="video-container">
						{attributes.videoURL && (
							<iframe width="380" height="480"
							src={"https://youtube.com/embed/" + attributes.videoURL}
							title="YouTube video player"
							frameborder="0"
							allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
							allowfullscreen></iframe>
						)}
					</div>
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
