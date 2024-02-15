import { fetchAPI } from './app.js';

document.addEventListener('DOMContentLoaded', () => {
  startApp();
});

async function startApp() {
  await loadProducts(); // Cargar la primera página de productos al inicio
}

/* Products */
async function loadProducts(page = 1) {
  const productsResult = await fetchAPI(
    // PHP: Controllers/APIController::productsAPI();
    `http://localhost:3000/api/products?page=${page}`
  );
  const { products, productsCount: totalCount } = productsResult;
  const productsContainer = document.querySelector('.products');
  productsContainer.innerHTML = ''; // Clean the container before loading the products

  products.forEach((product) => {
    const { id, name, price, image } = product;

    const productContainer = document.createElement('a');
    productContainer.setAttribute('href', `/product?id=${id}`);
    productContainer.classList.add('product-container');

    const productName = document.createElement('p');
    productName.classList.add('product-name');
    productName.textContent = name;

    const productPrice = document.createElement('p');
    productPrice.classList.add('product-price');
    productPrice.textContent = `${price}€`;

    const productImage = document.createElement('img');
    productImage.classList.add('product-image');
    productImage.setAttribute('src', `build/img/products/${image}`);

    productContainer.append(productImage, productName, productPrice);
    productsContainer.appendChild(productContainer);
  });

  // Pagination controllers
  pagination(totalCount, page);
}

function pagination(productCount, page) {
  const productsPerPage = 10;
  const totalCount = productCount;

  if (!document.querySelector('.pagination')) {
    const paginationContainer = document.createElement('DIV');
    paginationContainer.classList.add('pagination');
    document.querySelector('.search').appendChild(paginationContainer);
  }

  const totalPages = Math.ceil(totalCount / productsPerPage);
  const paginationContainer = document.querySelector('.pagination');

  // Prevent deleting page buttons
  if (page < totalPages && page !== totalPages - 1 && page !== totalPages - 2) {
    paginationContainer.innerHTML = '';
  } else {
    return;
  }

  for (let i = page; i <= page + 3; i++) {
    if (i > totalPages) {
      return;
    } else {
      const pageButton = document.createElement('button');
      pageButton.classList.add('pagination__button');
      pageButton.textContent = i;
      pageButton.addEventListener('click', () => {
        loadProducts(i);
      });
      paginationContainer.append(pageButton);
    }
  }
}
