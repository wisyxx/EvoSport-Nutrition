import { fetchAPI } from './app.js';

document.addEventListener('DOMContentLoaded', () => {
  startApp();
});

async function startApp() {
  await loadProducts(1); // Cargar la primera página de productos al inicio
}

/* Products */
async function loadProducts(page) {
  const productsPerPage = 10; // Número de productos por página

  const productsResult = await fetchAPI(
    `http://localhost:3000/api/products?page=${page}`
  );
  console.log(productsResult);
  const { products, productsCount: totalCount } = productsResult;
  console.log(productsResult.productsCount);
  const productsContainer = document.querySelector('.products');
  productsContainer.innerHTML = ''; // Limpiar el contenedor antes de cargar nuevos productos

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

  // Agregar controles de paginación
  if (!document.querySelector('.pagination')) {
    const paginationContainer = document.createElement('DIV');
    paginationContainer.classList.add('pagination');

    const totalPages = Math.ceil(totalCount / productsPerPage);
    for (let i = 1; i <= totalPages; i++) {
      const pageButton = document.createElement('button');
      pageButton.textContent = i;
      pageButton.addEventListener('click', () => {
        loadProducts(i); // Cargar los productos de la página correspondiente al hacer clic en el botón
      });
      paginationContainer.appendChild(pageButton);
    }

    document
      .querySelector('.products-container')
      .appendChild(paginationContainer);
  }
}
