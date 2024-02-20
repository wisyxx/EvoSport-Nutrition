import { fetchAPI } from "./app.js";

document.addEventListener('DOMContentLoaded', () => {
  startApp();
});

async function startApp() {
  const images = await loadAdImages();
  startImageRotation(images);

  await loadPopularProducts();
  popularProductsSlider();
}



/*======> AD SLIDE SHOW <======*/
async function getAdImages() {
  const imageFiles = await fetchAPI('http://localhost:3000/api/ad-images');
  let imagesNames = [];

  if (imagesNames.length !== 0) {
    return imagesNames;
  }

  imageFiles.forEach((imageFile) => {
    const { name } = imageFile;

    imagesNames = [...imagesNames, name];
  });

  return imagesNames;
}

async function loadAdImages() {
  const imagesNames = await getAdImages();
  const adContainer = document.querySelector('.ads-container');

  let images = [];

  imagesNames.forEach((imageName, index) => {
    const image = document.createElement('DIV');
    image.classList.add('slide-image');
    image.style.backgroundImage = `url('../build/img/ads/${imageName}')`;
    adContainer.appendChild(image);
    images.push(image);

    if (index === 0) {
      image.classList.add('active');
    }
  });

  return images;
}

function startImageRotation(images) {
  let currentIndex = 0;

  setInterval(() => {
    images[currentIndex].classList.remove('active');
    currentIndex = currentIndex + 1;
    if (currentIndex >= images.length) {
      currentIndex = 0;
    }
    images[currentIndex].classList.add('active');
  }, 6000);
}

/*======> PRODUCTS API <======*/

/* Popular products */
async function loadPopularProducts() {
  const products = await fetchAPI('http://localhost:3000/api/popular-products');

  const productsContainer = document.querySelector('.popular-products-slider');

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

function popularProductsSlider() {
  const left = document.querySelector('#arrow-left');
  const right = document.querySelector('#arrow-right');

  const productsContainer = document.querySelector('.popular-products-slider');

  const scrollRightEdge =
    productsContainer.scrollWidth - productsContainer.clientWidth;

  let scrollLeftArrows = productsContainer.scrollLeft;

  right.addEventListener('click', () => {
    scrollLeftArrows += 255.75;
    if (scrollLeftArrows >= scrollRightEdge) {
      scrollLeftArrows = scrollRightEdge;
    }
    productsContainer.scrollLeft = scrollLeftArrows;
  });

  left.addEventListener('click', () => {
    scrollLeftArrows -= 255.75;
    if (scrollLeftArrows <= 0) {
      scrollLeftArrows = 0;
    }
    productsContainer.scrollLeft = scrollLeftArrows;
  });

  productsContainer.addEventListener('scroll', () => {
    const scrollLeft = Math.ceil(productsContainer.scrollLeft);

    if (scrollLeft >= scrollRightEdge) {
      right.style.visibility = 'hidden';
    } else if (scrollLeft < scrollRightEdge) {
      right.style.visibility = 'visible';
    }

    if (scrollLeft === 0) {
      left.style.visibility = 'hidden';
    } else if (scrollLeft > 0) {
      left.style.visibility = 'visible';
    }
  });
}
