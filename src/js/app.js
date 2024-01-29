document.addEventListener('DOMContentLoaded', () => {
  startApp();
});

async function startApp() {
  const images = await loadAdImages();
  startImageRotation(images);
}

/* API */
async function fetchAPI(url) {
  try {
    const response = await fetch(url);
    const data = await response.json();
    return data;
  } catch (error) {
    console.log(error);
  }
}

/* MENU */
const menu = document.querySelector('.menu');
menu.addEventListener('click', () => menuAnimation());

function menuAnimation() {
  let menuBars = document.querySelectorAll('.menu > div');

  menuBars.forEach((bar) => {
    bar.classList.toggle('active');
    bar.classList.remove('not-active');
  });
  dropDownMenu();
}

function dropDownMenu() {
  const dropMenu = document.querySelector('.drop-menu');
  dropMenu.classList.toggle('hidden');
}

/* AD SLIDE SHOW */
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
