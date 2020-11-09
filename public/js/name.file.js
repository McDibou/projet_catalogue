let input = document.querySelector('.custom-file-input');

input.addEventListener('change', () => {
    document.querySelector('.custom-file-label').innerText = input.files[0].name
})

