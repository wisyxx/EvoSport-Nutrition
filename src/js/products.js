import { fetchAPI } from './app.js';

document.addEventListener('DOMContentLoaded', () => {
  startApp();
});

async function startApp() {
  await loadProducts();
}

/* Products */
async function loadProducts() {
  const products = await fetchAPI('http://localhost:3000/api/products');

  const productsContainer = document.querySelector('.products');

  products.forEach((product) => {
    const { id, name, price, image } = product;

    const productContainer = document.createElement('A');
    productContainer.setAttribute('href', `/product?id=${id}`);
    productContainer.classList.add('product-container');

    const productName = document.createElement('P');
    productName.classList.add('product-name');
    productName.textContent = name;

    const productPrice = document.createElement('P');
    productPrice.classList.add('product-price');
    productPrice.textContent = `${price}€`;

    const productImage = document.createElement('IMG');
    productImage.classList.add('product-image');
    productImage.setAttribute('src', `build/img/products/${image}`);

    productContainer.append(productImage, productName, productPrice);
    productsContainer.appendChild(productContainer);
  });
}
