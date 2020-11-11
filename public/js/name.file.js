// file that retrieves the input file boostrap field to display the name of the file retrieved in the placeholder

// select the input
let input = document.querySelector('.custom-file-input');

// assigns an event when it changes
input.addEventListener('change', () => {
    // assigns the new value in the div
    document.querySelector('.custom-file-label').innerText = input.files[0].name
})