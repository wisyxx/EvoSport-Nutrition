document.addEventListener('DOMContentLoaded', () => {
  startApp();
});

async function startApp() {
  await loadAdImages();
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

  imagesNames.forEach((imageName) => {
    const image = document.createElement('DIV');
    image.classList.add('slide-image');
    image.style.backgroundImage = `url('../build/img/${imageName}')`;
    adContainer.appendChild(image);
  });
}
