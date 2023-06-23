import { __ } from '@wordpress/i18n';
import { InnerBlocks, useBlockProps, RichText } from '@wordpress/block-editor';
import './editor.scss';
import ProductCategories from './assets/post-categories';


export default function Edit( { attributes, setAttributes } ) {

	const onChangeDescription = ( newContent ) => {
		setAttributes( { prodHeaderDescription: newContent } )
	}

	const onChangeCategories = ( newContent ) => {
		console.log(newContent)
		setAttributes( { prodHeaderCategories: newContent } )
	}

	return (
		<div { ...useBlockProps() }>
			<div className='bd-product-header is-layout-flex wp-container-11 wp-block-columns'>
				<div className='is-layout-flow wp-block-column'>

					<div className='bd-product-header__column-1'>
						<RichText
							{ ...useBlockProps }
							tagName='p'
							className='bd-product-header__description'
							onChange={ onChangeDescription }
							allowedFormats={ [ 'core/bold', 'core/italic' ] }
							value={ attributes.prodHeaderDescription }
							placeholder={ __( 'Digite a introdução aqui...' ) }
						/>

						<ProductCategories
							tagName='div'
							onChange={ onChangeCategories }
							className='bd-product-header__categories'
							value={ attributes.prodHeaderCategories }
						/>

					</div>
				</div>

				<div className='is-layout-flow wp-block-column bd-product-header__column-2'>
					<div { ...useBlockProps }>
						<InnerBlocks
							placeholder={ __('Insira uma Imagem ou Slider')}/>
					</div>
				</div>
			</div>

		</div>

	);
}
