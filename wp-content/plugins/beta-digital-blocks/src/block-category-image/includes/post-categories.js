import { __ } from '@wordpress/i18n';
import { useSelect } from '@wordpress/data';
import { InspectorControls } from '@wordpress/block-editor';
import { useState } from '@wordpress/element';
import metadata from '../block.json';

const { Placeholder, PanelBody, SelectControl } = wp.components;


const ProductCategories = ( useBlockProps ) => {

	const handleInputChange = (value) => {
		useBlockProps.onChange(value);
	};

   const { categories } = useSelect( ( select ) => {
      return {
         categories: select( 'core' ).getEntityRecords( 'taxonomy', 'prod-type_category', { per_page: -1 } ),
      };
   } );
	const [ category, setCategory ] = useState({});

   // Verifica se as categorias estão carregadas e se o post possui categorias
   if ( categories ) {
		const categoriesOptions = categories.map(cat => ({label: cat.name, value: JSON.stringify({ "name": cat.name, "link": cat.link }) }) );
		categoriesOptions.unshift( {label: '', value: JSON.stringify({ "name": '', "link": '' }) } )
		handleInputChange(category);
		console.log(useBlockProps)
      return (
        <div >
			<InspectorControls>
				<PanelBody
					title={__('Escolha a categoria', metadata.textdomain)}
					initialOpen={true}
				>
					<SelectControl
						label="Categorias"
						value={ JSON.stringify(useBlockProps.value) }
						options={ categoriesOptions }
						onChange={ ( newCat ) => setCategory(newCat) }
						__nextHasNoMarginBottom
					/>
				</PanelBody>
			</InspectorControls>

		</div>
      );
   }

   return null;
};

export default ProductCategories;
