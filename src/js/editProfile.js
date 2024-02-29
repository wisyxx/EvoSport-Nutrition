window.addEventListener('DOMContentLoaded', () => {
  startApp();
});

function startApp() {
  clickImgInput();
  deleteProfileImage();
}

function clickImgInput() {
  const input = document.querySelector('.img-input');
  const icon = document.querySelector('.image-upload');

  icon.addEventListener('click', () => {
    input.click();
  });
}

async function deleteProfileImage() {
  const btn = document.querySelector('.delete-profile-image');

  btn.addEventListener('click', () => {
    deletePfpImageAPI();
  });
}

async function deletePfpImageAPI() {
  try {
    const result = await fetch(`${location.origin}/api/images/delete-pfp`, {
      method: 'POST',
    });

    if (result.ok) {
      Swal.fire({
        title: 'Image removed!',
        icon: 'success',
        confirmButtonText: 'Ok',
        confirmButtonColor: '#a1f25f',
      }).then(() => {
        location = `${location.origin}/account`;
      });
    }
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
