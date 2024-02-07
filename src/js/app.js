/*======> API <======*/
export async function fetchAPI(url) {
  try {
    const response = await fetch(url);
    const data = await response.json();
    return data;
  } catch (error) {
    console.log(error);
  }
}

/*======> MENU <======*/
const menu = document.querySelector('.menu').addEventListener('click', () => menuAnimation());

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
