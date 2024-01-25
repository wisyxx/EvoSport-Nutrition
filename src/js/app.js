document.addEventListener('DOMContentLoaded', () => {
  startApp();
});

function startApp() {}

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
