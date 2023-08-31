import { useBlockProps } from '@wordpress/block-editor';

export default function save( { attributes } ) {
	const blockProps = useBlockProps.save();

	return (
		<div { ...blockProps } className="bd-block-header-front">

			<div className='bd-block-header-front__cover'>
				<figure className='bd-block-header-front__figure'>
					<img
					src={attributes.imageUrl}
					alt={attributes.imageAlt}
					width={attributes.imageWidth}
					height={attributes.imageHeight} />
				</figure>
			</div>

			<div className='bd-block-header-front__container'>
				<h2 data-js='txt-anim' className='bd-block-header-front__title' dangerouslySetInnerHTML={{__html: attributes.richContent}} />

				<div className='bd-block-header-front__video'>
					<div id="player"></div>
					<iframe width="380" height="480"
						id="ytplayer"
						src={`https://youtube.com/embed/${attributes.videoURL}?autoplay=1&playlist=${attributes.videoURL}&mute=1&loop=1&controls=0&rel=0&enablejsapi=1`}
						title="YouTube video player"
						frameborder="0"
						allow="accelerometer; autoplay; muted; loop; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
						allowfullscreen></iframe>
				</div>
			</div>

		</div>
	);
}
