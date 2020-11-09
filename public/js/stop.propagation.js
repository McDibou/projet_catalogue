let deleteButton = document.querySelectorAll('#delete-confirm');

for (let i = 0; i < deleteButton.length; i++) {
    deleteButton[i].addEventListener('click', (e) => {
        let resp = confirm('Are you sure you want to delete ?');
        if (!resp) {
            e.preventDefault();
        }
    })
}