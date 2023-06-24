import { useSelect } from '@wordpress/data';

function familyTree(objeto, className) {
	const resultado = {};
	let el = '';

	for (const key in objeto) {
	  const categoria = objeto[key];
	  const nomePai = categoria.name;
	  const filhos = categoria.children.map((filho) => filho.name);

	  resultado[nomePai] = filhos;
	  el += `<span>${nomePai}: <strong>${filhos.join(', ')}</strong></span><br>`
	}

	return `<div className="${className}">${el}</div>`;
}

const joinFamily = ( categories ) => {
	let groupCategories = {};
	let parents = [];
	let childrens = [];

	// Ordenando as categories por ordem alfabética
	categories.sort((a, b) => a.name.localeCompare(b.name));
	parents = categories.filter( cat => cat.parent === 0 );
	childrens = categories.filter( cat => cat.parent > 0 );
	categories = parents.concat(childrens);
	 // Iterando sobre as categories e agrupando pais e filhos
	categories.forEach((category) => {
		const parentId = category.parent;
		//console.log('id: ', parentId, category.name)

		if (parentId === 0) {
		  // Se a category for um pai, cria uma propriedade no objeto agrupado
		  groupCategories[category.slug] = {
			 ...category,
			 children: []
		  };
		} else {
		  // Se a categoria for um filho, adiciona ao array de filhos do pai correspondente
		  const parentCategory = categories.find((cat) => cat.id === parentId);
		  if (parentCategory) {
			 groupCategories[parentCategory.slug].children.push(category);
		  }
		}
	});

	return groupCategories;
}

const ProductCategories = ( useBlockProps ) => {
   const { id } = useSelect( ( select ) => {
      return {
         id: select( 'core/editor' ).getCurrentPostId(),
      };
   } );

	const handleInputChange = (value) => {
		useBlockProps.onChange(value);
	};

   const { categories } = useSelect( ( select ) => {
      return {
         categories: select( 'core' ).getEntityRecords( 'taxonomy', 'prod_category', { per_page: -1 } ),
      };
   } );

   const postCategories = useSelect( ( select ) => {
      return {
         ids: select( 'core/editor' ).getEditedPostAttribute( 'prod_category' ),
      };
   } );

   // Verifica se as categorias estão carregadas e se o post possui categorias
   if ( categories && postCategories && typeof postCategories.ids !== 'undefined') {

      const filteredCategories = categories.filter( ( category ) => {
         return postCategories.ids.includes( category.id );
      } );

		const familyCategories = joinFamily(filteredCategories);
		const categoriesEl = familyTree(familyCategories, useBlockProps.className);

		useBlockProps.value = categoriesEl;
		handleInputChange(categoriesEl)

      return (
         <div dangerouslySetInnerHTML={{ __html: categoriesEl }} />
      );
   }

   return null;
};

export default ProductCategories;
