window.addEventListener('DOMContentLoaded', () => {
  startApp();
});

function startApp() {
  deleteUserButton();
}
function deleteUserButton() {
  const deleteUserBtn = document.querySelectorAll('.remove-user');

  deleteUserBtn.forEach((btn) => {
    btn.addEventListener('click', (e) => {
      deleteUser(e.target.dataset.userid);
    });
  });
}

async function deleteUser(userId) {
  const data = new FormData();

  data.append('id', userId);

  try {
    const result = await fetch('http://localhost:3000/api/users/delete', {
      method: 'POST',
      body: data,
    });

    Swal.fire({
      title: 'User deleted!',
      icon: 'success',
      confirmButtonText: 'Ok',
      confirmButtonColor: '#a1f25f',
    }).then(() => {
      location.reload();
    });
  } catch (error) {
    Swal.fire({
      title: 'Something went wrong...',
      text: 'Try again later',
      icon: 'error',
    }).then(() => {
      location.reload();
    });
  }
}
