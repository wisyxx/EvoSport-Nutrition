window.addEventListener('DOMContentLoaded', () => {
    startApp();
});

function startApp() {
    clickImgInput();
}

function clickImgInput() {
    const input = document.querySelector('.img-input');
    const icon = document.querySelector('.image-upload');

    icon.addEventListener('click', () => {
        input.click();
    });
}