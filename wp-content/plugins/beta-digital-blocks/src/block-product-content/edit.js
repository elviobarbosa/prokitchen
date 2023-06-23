import { __ } from '@wordpress/i18n';
import { InnerBlocks, useBlockProps, RichText } from '@wordpress/block-editor';
import './editor.scss';

export default function Edit( { attributes, setAttributes } ) {
	const { withSelect } = wp.data;

	const onChangeTitle = ( newContent ) => {
		setAttributes( { prodContentTitle: newContent } )
	}

	return (
		<div { ...useBlockProps() }>
			<div className="is-layout-flex wp-container-11 wp-block-columns">
				<div className="is-layout-flow wp-block-column">

					<div className='subtittle'>
						<RichText
							{ ...useBlockProps }
							tagName="h2"
							className='beta-digital__product-content-title'
							onChange={ onChangeTitle }
							allowedFormats={ [ 'core/bold', 'core/italic' ] }
							value={ attributes.prodContentTitle }
							placeholder={ __( 'Digite o título aqui...' ) }
						/>

					</div>
				</div>

				<div className='is-layout-flow wp-block-column description'>
					<div { ...useBlockProps }>
						<InnerBlocks/>
					</div>
				</div>
			</div>

		</div>

	);
}
