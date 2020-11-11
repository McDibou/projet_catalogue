//file that manages the behavior of the multi checkbox

// select all checkbox
let check = document.querySelectorAll('.check')

// select the main checkbox that will serve as the trigger element
let checkAll = document.querySelector('.check-all')

// adds a click event to the main checkbox
checkAll.addEventListener('click', () => {

    // if the main checkbox is checked. browse through all the checkboxes and check them if they are not checked.
    if (checkAll.checked) {
        for (let i = 0; i < check.length; i++) {
            if (!check[i].checked) {
                check[i].checked = true;
            }
        }
        // else the main checkbox is unchecked and runs through all checkboxes and unchecks them.
    } else {
        for (let i = 0; i < check.length; i++) {
            check[i].checked = false;
        }
    }

})

/**
 * function that checks if a checkbox is unchecked and unchecks the main checkbox,
 * and checks if all checkboxes are checked to check the main checkbox.
 */
function noneCheckedAll() {

    // if the current element is unchecked, then uncheck the main checkbox
    if (!this.checked) {
        checkAll.checked = false;
    }

    // initializes test with a starting value of 0
    let test = 0;

    // runs all the checkboxes is checked if they are checked, if not, add 1 to variable test
    for (let i = 0; i < check.length; i++) {
        if (check[i].checked) {
            test += 1
        }

        // if the test variable is equal to the total number of checkboxes, check the main checkbox.
        if (test === check.length) {
            checkAll.checked = true
        }
    }

}
