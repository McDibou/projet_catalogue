// file used for confirmation of deletions

// selects all buttons that have the id #delete-confirm
let deleteButton = document.querySelectorAll('#delete-confirm');

// scrolls through all the buttons and adds a click event to them
for (let i = 0; i < deleteButton.length; i++) {
    deleteButton[i].addEventListener('click', (e) => {

        // displays the javascript confirm popup that stops the script and stores its return value
        let resp = confirm('Are you sure you want to delete ?');

        // if the confirmation is false
        if (!resp) {

            // event will not be considered
            e.preventDefault();
        }

    })
}