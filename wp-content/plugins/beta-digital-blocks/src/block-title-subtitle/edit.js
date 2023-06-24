import { __ } from '@wordpress/i18n';
import { InnerBlocks, useBlockProps, RichText, AlignmentControl } from '@wordpress/block-editor';
import './editor.scss';

export default function Edit( { attributes, setAttributes } ) {
	const { withSelect } = wp.data;

	const onChangeTitle = ( newContent ) => {
		setAttributes( { contentTitle: newContent } )
	}

	const onChangeSubTitle = ( newContent ) => {
		setAttributes( { contentSubTitle: newContent } )
	}

	return (
		<div { ...useBlockProps() }>
			<div className="beta-digital-page-titles">
				<div className='title-box'>
					<RichText
						{ ...useBlockProps }
						tagName="h3"

						className='beta-digital-page-titles__subtitle'
						onChange={ onChangeSubTitle }
						allowedFormats={ [ 'core/bold', 'core/italic' ] }
						value={ attributes.contentSubTitle }
						placeholder={ __( 'Digite a tagline aqui...' ) }

					/>

					<RichText
						{ ...useBlockProps }
						tagName="h2"
						multiline="br"
						className='beta-digital-page-titles__title'
						onChange={ onChangeTitle }
						allowedFormats={ [ 'core/bold', 'core/italic' ] }
						value={ attributes.contentTitle }
						placeholder={ __( 'Digite o título aqui...' ) }
					/>

				</div>
			</div>
		</div>

	);
}
