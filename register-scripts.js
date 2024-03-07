var submitinput = true;
var patterns = {
    'first_name': /^[a-záéèíñóúüç\s-']+$/i,
    'last_name': /^[a-záéèíñóúüç\s-']+$/i,
    'second_last_name': /^[a-záéèíñóúüç\s-']+$/i,
    personal_id: /^[A-Z]{1}[AEIOUX]{1}[A-Z]{2}[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[HM]{1}(AS|BC|BS|CC|CS|CH|CL|CM|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|YN|ZS|NE)[B-DF-HJ-NP-TV-Z]{3}[0-9A-Z]{1}[0-9]{1}$/,
    tax_id_number: /^[A-Z]{1}[AEIOUX]{1}[A-Z]{2}[0-9]{2}(?:0[1-9]|1[0-2])(?:0[1-9]|1[0-9]|2[0-9]|3[0-1])[A-Za-z0-9]{3}$/,
    bank_account: /^.{18}$/,
    email: /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/,
    postal_code: /^[0-9]{5}$/,
    maxlength45: /^.{1,45}$/,
    maxlength255: /^.{1,255}$/,
    remuneration_deadline: /^([12][0-9]{3}-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01]))$/,
    city: /^.{1,45}$/,
    street: /^.{1,45}$/,
    house_number: /^.{1,45}$/,
    colony: /^.{1,255}$/,
}

function validateForm(formName) {
    let formGroup = document.querySelectorAll(`#${formName} input`);
    formGroup.forEach(inpt => {
        if (inpt.value == '') {
            console.log(`please fill in ${inpt.id} correctly`);
            inputWarning(inpt.id);
            submitinput = false;
            return;
        }
    });

    if (submitinput) {
        submitForm();
    }
}

function submitForm() {
    // Get the form element
    let form = document.querySelector('#customers-form');

    // Get the current action URL
    let currentAction = form.action;

    // Create an array to store field values
    let fieldValues = [];

    // Format Date Inputs
    let dateDay = encodeURIComponent(document.querySelector('#dateDay').value);
    let dateMonth = encodeURIComponent(document.querySelector('#dateMonth').value);
    let dateYear = encodeURIComponent(document.querySelector('#dateYear').value);
    fieldValues.push(`birth_date=${dateYear}-${dateMonth}-${dateDay}`);

    // Iterate through form elements and store their values
    for (var i = 0; i < form.elements.length; i++) {
        var element = form.elements[i];
        if (element.type !== 'button' && element.name && !element.classList.contains('date-select')) {
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

// Function to change input to Warning State
function inputWarning(inptid) {
    inpt = document.querySelector(`#${inptid}`);

    inpt.classList.add('inpt-warning');

    return false;
}

function inputSuccess(inptid) {
    inpt = document.querySelector(`#${inptid}`);

    inpt.classList.add('inpt-success');

    return false;
}

function validateInput(inptid) {
    let inpt = document.querySelector(`#${inptid}`);
    if (patterns[`${inptid}`] == undefined) {
        inputSuccess(inptid);
    } else {
        if (!patterns[`${inptid}`].test(inpt.value) || inpt.value == '') {
            inputWarning(inptid);
            submitinput = false;
        } else {
            inputSuccess(inptid);
        }
    }
}


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


// pop=up





//select //