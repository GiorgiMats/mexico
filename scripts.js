var submitinput = true;

// RANGE Input
//________________________________________________________________________________ //

// select//
var x, i, j, l, ll, selElmnt, a, b, c;
/* Look for any elements with the class "custom-select": */
x = document.getElementsByClassName("custom-select");
l = x.length;
for (i = 0; i < l; i++) {
    selElmnt = x[i].getElementsByTagName("select")[0];
    ll = selElmnt.length;
    /* For each element, create a new DIV that will act as the selected item: */
    a = document.createElement("DIV");
    a.setAttribute("class", "select-selected");
    a.setAttribute("onclick", "removeSelectRed('select-selected')");
    a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
    x[i].appendChild(a);
    /* For each element, create a new DIV that will contain the option list: */
    b = document.createElement("DIV");
    b.setAttribute("class", "select-items select-hide");
    for (j = 1; j < ll; j++) {
        /* For each option in the original select element,
        create a new DIV that will act as an option item: */
        c = document.createElement("DIV");
        c.innerHTML = selElmnt.options[j].innerHTML;
        c.addEventListener("click", function (e) {
            /* When an item is clicked, update the original select box,
            and the selected item: */
            var y, i, k, s, h, sl, yl;
            s = this.parentNode.parentNode.getElementsByTagName("select")[0];
            sl = s.length;
            h = this.parentNode.previousSibling;
            for (i = 0; i < sl; i++) {
                if (s.options[i].innerHTML == this.innerHTML) {
                    s.selectedIndex = i;
                    h.innerHTML = this.innerHTML;
                    y = this.parentNode.getElementsByClassName("same-as-selected");
                    yl = y.length;
                    for (k = 0; k < yl; k++) {
                        y[k].removeAttribute("class");
                    }
                    this.setAttribute("class", "same-as-selected");
                    break;
                }
            }
            h.click();
        });
        b.appendChild(c);
    }
    x[i].appendChild(b);
    a.addEventListener("click", function (e) {
        /* When the select box is clicked, close any other select boxes,
        and open/close the current select box: */
        e.stopPropagation();
        closeAllSelect(this);
        this.nextSibling.classList.toggle("select-hide");
        this.classList.toggle("select-arrow-active");
    });
}

function closeAllSelect(elmnt) {
    /* A function that will close all select boxes in the document,
    except the current select box: */
    var x, y, i, xl, yl, arrNo = [];
    x = document.getElementsByClassName("select-items");
    y = document.getElementsByClassName("select-selected");
    xl = x.length;
    yl = y.length;
    for (i = 0; i < yl; i++) {
        if (elmnt == y[i]) {
            arrNo.push(i)
        } else {
            y[i].classList.remove("select-arrow-active");
        }
    }
    for (i = 0; i < xl; i++) {
        if (arrNo.indexOf(i)) {
            x[i].classList.add("select-hide");
        }
    }
}

/* If the user clicks anywhere outside the select box,
then close all select boxes: */
document.addEventListener("click", closeAllSelect);

// Form submission event listener
document.addEventListener('DOMContentLoaded', function () {
    var form = document.querySelector('.field3');
    form.addEventListener('submit', function (event) {
        var selectedDiv = form.querySelector('.select-selected');
        // Check if the placeholder option is still selected
        if (selectedDiv.innerHTML === "Select One") {
            event.preventDefault(); // Prevent form submission
            alert('Please select an option!'); // Show the alert
            selectedDiv.focus(); // Focus on the select box
        }
    });
});


function validateSelect(selectid) {
    defaultSelect = document.querySelector(`#${selectid} .select-one`);

    if (defaultSelect.selected) {
        document.querySelector(`#${selectid} .select-selected`).style.background = 'rgba(234, 51, 34, 0.2)';
        document.querySelector(`#${selectid} .select-selected`).style.borderColor = 'rgba(234, 51, 34, 0.6)';
        submitinput = false;
    } else {
        document.querySelector(`#${selectid} .select-selected`).style.background = 'rgba(55, 210, 0, 0.2)';
        document.querySelector(`#${selectid} .select-selected`).style.borderColor = 'rgba(55, 210, 0, 0.6)';
    }
}

function checkSelect(selectid) {
    document.querySelector(`#${selectid} .select-selected`).style.background = '#fff';
    document.querySelector(`#${selectid} .select-selected`).style.borderColor = '#D2D2D3';
    submitinput = true;
}

function validateSubmit() {
    validateSelect('loan_purpose');

    if (submitinput) {
        submitForm();
        // window.open("https://credito-mx.com/offers");
        window.location.href = "https://credito-mx.com/offers";
    }
}

function submitForm() {
    // Get the form element
    let form = document.querySelector('#regForm');

    // Get the current action URL
    let currentAction = form.action;

    // Create an array to store field values
    let fieldValues = [];

    // Iterate through form elements and store their values
    for (var i = 0; i < form.elements.length; i++) {
        var element = form.elements[i];
        if (element.type !== 'button' && element.name) {
            var fieldName = encodeURIComponent(element.name);
            var fieldValue = encodeURIComponent(element.value);
            fieldValues.push(fieldName + '=' + fieldValue);
        }
    }

    // Modify the action URL with the new format
    var newAction = currentAction + '?' + fieldValues.join('&');

    // Update the form's action attribute
    form.action = newAction;

    // Submit the form
    form.submit();
}