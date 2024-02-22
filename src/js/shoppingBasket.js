window.addEventListener('DOMContentLoaded', () => {
  startApp();
});

function startApp() {
  addProductBtn();
}

function addProductBtn() {
  const btn = document.querySelector('.basket-add');

  btn.addEventListener('click', () => {
    addProductToBasket();
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
      progressBar: true,
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
