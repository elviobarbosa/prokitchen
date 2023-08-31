import { __ } from '@wordpress/i18n';
import { useSelect } from '@wordpress/data';
import { __experimentalInputControl as InputControl, TextareaControl } from '@wordpress/components';
import { InspectorControls } from '@wordpress/block-editor';
import { useState } from '@wordpress/element';
import metadata from '../block.json';

const { PanelBody } = wp.components;

const InspectControl = ( useBlockProps ) => {

	const handleInputChange = (title, words, video) => {
		useBlockProps.onChange(title, words, video);
	};

	const [ title, setTitle ] = useState(useBlockProps.value.title);
	const [ words, setWords ] = useState(useBlockProps.value.words);
	const [ video, setVideo ] = useState(useBlockProps.value.video);

	handleInputChange(title, words, video);

	return (
        <div >
			<InspectorControls>
				<PanelBody
					title={__('Insira o texto complementar', metadata.textdomain)}
					initialOpen={true}
				>
					<TextareaControl
						label="Título"
						help="Insira o título aqui"
						value={ useBlockProps.value.title }
						onChange={ ( value ) => setTitle( value ) }
					/>

					<TextareaControl
						label="Palavras adicionais"
						help="Insira as palavras separadas por ENTER"
						value={ useBlockProps.value.words }
						onChange={ ( value ) => setWords( value ) }
					/>

					<TextareaControl
						label="URL vídeo no YouTube"
						help="Insira a URL de um vídeo do YouTube"
						value={ useBlockProps.value.video }
						onChange={ ( value ) => setVideo( value ) }
					/>

				</PanelBody>
			</InspectorControls>

		</div>
      );



   return null;
};

export default InspectControl;
