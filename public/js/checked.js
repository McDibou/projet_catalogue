let check = document.querySelectorAll('.check')
let checkAll = document.querySelector('.check-all')

checkAll.addEventListener('click', () => {
    if (checkAll.checked) {
        for (let i = 0; i < check.length; i++) {
            if (!check[i].checked) {
                check[i].checked = true;
            }
        }
    } else {
        for (let i = 0; i < check.length; i++) {
            check[i].checked = false;
        }
    }

})

function noneCheckedAll() {
    if (!this.checked) {
        checkAll.checked = false;
    }

    let test = 0;
    for (let i = 0; i < check.length; i++) {
        if (check[i].checked) {
            test += 1
        }

        if (test === check.length) {
            checkAll.checked = true
        }
    }

}
