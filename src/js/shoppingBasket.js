window.addEventListener('DOMContentLoaded', () => {
  startApp();
});

function startApp() {
  addProductToBasketBtn();
  removeProductFromBasketBtn();
}

function addProductToBasketBtn() {
  const btn = document.querySelector('.basket-add');
  if (!btn) {
    return;
  }
  btn.addEventListener('click', () => {
    addProductToBasket();
  });
}
function removeProductFromBasketBtn() {
  const btn = document.querySelectorAll('.delete-button');

  btn.forEach((button) => {
    button.addEventListener('click', () => {
      removeProductFromBasket();
    });
  });
}

async function addProductToBasket() {
  const data = new FormData();
  const userId = document.querySelector('.user-id').dataset.userid;
  const productId = document.querySelector('.product').dataset.productid;

  if (userId === '') {
    Swal.fire({
      title: "You're not logged in!",
      icon: 'warning',
      showCancelButton: true,
      cancelButtonText: 'Close',
      cancelButtonColor: '#504835',
      confirmButtonText: 'Log in',
      confirmButtonColor: '#a1f25f',
    }).then((result) => {
      if (result.isConfirmed) {
        location = 'http://localhost:3000/login';
      }
    });

    return;
  }

  data.append('productId', productId);

  try {
    const response = await fetch('http://localhost:3000/api/basket', {
      method: 'POST',
      body: data,
    });

    /* Sweet alert */
    Swal.fire({
      position: 'top-end',
      icon: 'success',
      title: 'Product added to your shopping basket',
      showCancelButton: true,
      cancelButtonText: 'Close',
      cancelButtonColor: '#504835',
      confirmButtonText: 'My basket',
      confirmButtonColor: '#a1f25f',
      timer: 4000,
      timerProgressBar: true,
      showClass: {
        popup: `
      animate__animated
      animate__faster
      animate__backInRight
    `,
      },
      hideClass: {
        popup: `
      animate__animated
      animate__backOutRight
    `,
      },
    }).then((result) => {
      if (result.isConfirmed) {
        location = 'http://localhost:3000/account#shopping-basket';
      }
    });
  } catch (error) {
    /* Sweet alert */
    Swal.fire({
      title: 'Something went wrong...',
      text: 'Try again later',
      icon: 'error',
    }).then(() => {
      location.reload();
    });
  }
}

async function removeProductFromBasket() {
  const data = new FormData();
  const basketItemId =
    document.querySelector('.delete-button').dataset.basketitemid;

  data.append('id', basketItemId);

  try {
    const response = await fetch('http://localhost:3000/api/basket/delete', {
      method: 'POST',
      body: data,
    });

    /* Sweet alert */
    Swal.fire({
      position: 'top-end',
      icon: 'success',
      title: 'Product removed from your basket',
      confirmButtonText: 'Close',
      confirmButtonColor: '#a1f25f',
      showClass: {
        popup: `
      animate__animated
      animate__faster
      animate__backInRight
    `,
      },
      hideClass: {
        popup: `
      animate__animated
      animate__backOutRight
    `,
      },
    }).then(() => {
      location.reload();
    });
  } catch (error) {
    /* Sweet alert */
    Swal.fire({
      title: 'Something went wrong...',
      text: 'Try again later',
      icon: 'error',
    }).then(() => {
      location.reload();
    });
  }
}