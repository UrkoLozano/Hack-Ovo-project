$(document).ready(function () {
    const btnsFavorite = $('.favorite');
    const products = $('.card-product');
    const counterFavorites = $('.counter-favorite');

    const containerListFavorites = $('.container-list-favorites');
    const listFavorites = $('.list-favorites');

    let favorites = [];

    const updateFavoritesInLocalStorage = () => {
        localStorage.setItem('favorites', JSON.stringify(favorites));
    };

    const loadFavoritesFromLocalStorage = () => {
        const storedFavorites = localStorage.getItem('favorites');

        if (storedFavorites) {
            favorites = JSON.parse(storedFavorites);
            showHTML();
        }
    };

    const toggleFavorite = product => {
		const index = favorites.findIndex(element => element.id === product.id);
	
		if (index > -1) {
			favorites.splice(index, 1);
			updateFavoritesInLocalStorage();
		} else {
			const productInfo = {
				id: product.id,
				title: product.title,
				model: product.model, // Agrega el modelo del producto
				name: product.name,   // Agrega el nombre del producto
				price: product.price,
			};
	
			favorites.push(productInfo);
			updateFavoritesInLocalStorage();
		}
	};
	
	
	 

    const updateFavoriteMenu = () => {
		listFavorites.html('');
	
		favorites.forEach(fav => {
			const favoriteCard = $('<div>').addClass('card-favorite');
			const titleElement = $('<p>').addClass('title').text(fav.title);
			const modelElement = $('<p>').text(fav.model);
			const nameElement = $('<p>').text(fav.name);  
			const priceElement = $('<p>').text(fav.price);
	
			favoriteCard.append(titleElement, modelElement, nameElement, priceElement);
			listFavorites.append(favoriteCard);
		});
	};
	
	

    const showHTML = () => {
        products.each(function () {
            const contentProduct = $(this).find('.content-card-product');
            const productId = contentProduct.data('productId');
            const isFavorite = favorites.some(favorite => favorite.id === productId);

            const favoriteButton = $(this).find('.favorite');
            const favoriteActiveButton = $(this).find('#added-favorite');
            const favoriteRegularIcon = $(this).find('#favorite-regular');

            favoriteButton.toggleClass('favorite-active', isFavorite);
            favoriteRegularIcon.toggleClass('active', isFavorite);
            favoriteActiveButton.toggleClass('active', isFavorite);
        });

        counterFavorites.text(favorites.length);
        updateFavoriteMenu();
    };

    btnsFavorite.on('click', function (e) {
		const card = $(this).closest('.content-card-product');
	
		const product = {
			id: card.data('productId'),
			title: card.find('h3').text(),
			model: card.find('.modelo-item').text(), 
			name: card.find('.titulo-item').text(),  
			price: card.find('.price').text(),
		};
	
		toggleFavorite(product);
		showHTML();
	});
	

    const btnClose = $('#btn-close');
    const buttonHeaderFavorite = $('#button-header-favorite');

    buttonHeaderFavorite.on('click', () => {
        containerListFavorites.toggleClass('show');
    });

    btnClose.on('click', () => {
        containerListFavorites.removeClass('show');
    });

    loadFavoritesFromLocalStorage();
    updateFavoriteMenu();
});