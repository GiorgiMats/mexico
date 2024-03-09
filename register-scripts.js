var submitinput = true;
var currentStep = 1;
var patterns = [
    {
        first_name: /^[a-záéèíñóúüç\s-']+$/i,
        last_name: /^[a-záéèíñóúüç\s-']+$/i,
        second_last_name: /^[a-záéèíñóúüç\s-']+$/i,
        personal_id: /^[A-Z]{1}[AEIOUX]{1}[A-Z]{2}[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[HM]{1}(AS|BC|BS|CC|CS|CH|CL|CM|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|YN|ZS|NE)[B-DF-HJ-NP-TV-Z]{3}[0-9A-Z]{1}[0-9]{1}$/,
        tax_id_number: /^[A-Z]{1}[AEIOUX]{1}[A-Z]{2}[0-9]{2}(?:0[1-9]|1[0-2])(?:0[1-9]|1[0-9]|2[0-9]|3[0-1])[A-Za-z0-9]{3}$/,
        bank_account: /^.{18}$/,
        email: /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/,
        phone: /^.{16}$/,
    },
    {
        postal_code: /^[0-9]{5}$/,
        city: /^.{1,45}$/,
        street: /^.{1,45}$/,
        house_number: /^.{1,45}$/,
        region: /^.{1,45}$/,
        district: /^.{1,255}$/,
        colony: /^.{1,255}$/,
        county: /^.{1,45}$/,
    },
    {
        employer: /^.{1,45}$/,
    }
]

//  colony: /^.{1,255}$/,

var customSelects = [
    [
        'marital_status-div',
        'nationality-div',
        'dependant_count-div',
        'phone_plan-div',
    ],
    [
        'housing_type-div',
    ],
    [
        'occupation-div',
        'credit_score-div',
        'has_loan-div',
        'car-div'
    ]
]

var customSelects2 = [
    [
        'dateDay',
        'dateMonth',
        'dateYear'
    ],
    [

    ],
    [
        'remunerationDay',
        'remunerationMonth',
        'remunerationYear',
        'employedMonth',
        'employedYear',
    ]
]

function nextStep(n) {
    let steps = document.querySelectorAll('.steps-div');
    if (n == -1) {
        alert("fuck off");
    } else if (n == 1) {
        if (steps.length < (currentStep + 1)) {
            if (validateForm('stepsdiv3')) {
                submitForm();
            }
        } else {
            if (validateForm(`stepsdiv${currentStep}`)) {
                document.querySelector(`#stepsdiv${currentStep}`).classList.add('displaynone');
                if (steps.length == (currentStep + 1)) {
                    document.querySelector('#stepsbutton').classList.add('green-btn');
                }
                currentStep = currentStep + n;
                document.querySelector(`#stepsdiv${currentStep}`).classList.remove('displaynone');
            }
        }
    }
}

function validateForm(formName) {
    submitinput = true;
    let formGroup = document.querySelectorAll(`#${formName} input`);
    let patternInputs = getObjectNames(patterns[currentStep - 1]);

    // Check if any input is empty
    formGroup.forEach(inpt => {
        if (inpt.value == '') {
            console.log(`please fill in ${inpt.id} correctly`);
            inputWarning(inpt.id);
            submitinput = false;
            return false;
        }
    });

    // Check if inputs with Patterns are valid
    patternInputs.forEach(patternName => {
        validateInput(patternName);
    });

    // Check if Selects are selected
    if (!(customSelects[currentStep - 1].length < 1)) {
        customSelects[currentStep - 1].forEach(select => {
            validateSelect(select);
        });
    }

    if (!(customSelects2[currentStep - 1].length < 1)) {
        customSelects2[currentStep - 1].forEach(select => {
            validateCustomSelect(select);
        });
    }

    if (currentStep == 1) {
        let radioMale = document.querySelector('#male');
        let radioFemale = document.querySelector('#female');
        if (!(radioMale.checked || radioFemale.checked)) {
            submitinput = false;
            document.querySelector('.male-div label').classList.add('radioVibrate');
            document.querySelector('.female-div label').classList.add('radioVibrate');
        }
    }

    if (currentStep == 3) {
        validateCheckboxes();
    }

    if (submitinput) {
        return true;
    } else {
        return false;
    }
}

function selectRadio() {
    submitinput = true;
    document.querySelector('.male-div label').classList.remove('radioVibrate');
    document.querySelector('.female-div label').classList.remove('radioVibrate');
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

    inpt.classList.remove('inpt-success');
    inpt.classList.add('inpt-warning');

    return false;
}

function inputSuccess(inptid) {
    inpt = document.querySelector(`#${inptid}`);

    inpt.classList.remove('inpt-warning');
    inpt.classList.add('inpt-success');

    return false;
}

function validateInput(inptid) {
    let inpt = document.querySelector(`#${inptid}`);
    if (!patterns[currentStep - 1].hasOwnProperty(`${inptid}`)) {
        inputSuccess(inptid);
    } else {
        if (!patterns[currentStep - 1][`${inptid}`].test(inpt.value) || inpt.value == '') {
            inputWarning(inptid);
            submitinput = false;
        } else {
            inputSuccess(inptid);
        }
    }
}

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

function getObjectNames(obj) {
    var keys = [];
    for (var key in obj) {
        keys.push(key);
    }
    return keys;
}

function validateCustomSelect(selectid) {
    defaultSelect = document.querySelector(`#${selectid} .select-one`);

    if (defaultSelect.selected) {
        document.querySelector(`#${selectid}`).style.background = 'rgba(234, 51, 34, 0.2)';
        document.querySelector(`#${selectid}`).style.borderColor = 'rgba(234, 51, 34, 0.6)';
        submitinput = false;
    } else {
        document.querySelector(`#${selectid}`).style.background = 'rgba(55, 210, 0, 0.2)';
        document.querySelector(`#${selectid}`).style.borderColor = 'rgba(55, 210, 0, 0.6)';
    }
}

function checkCustomSelect(selectid) {
    document.querySelector(`#${selectid}`).style.background = '#fff';
    document.querySelector(`#${selectid}`).style.borderColor = '#D2D2D3';
    submitinput = true;
}

function validateCheckboxes() {
    let terms = document.querySelector('#terms');
    let policy = document.querySelector('#policy');
    let termsp = document.querySelector('#terms-p');
    let policyp = document.querySelector('#policy-p');

    if (!(terms.checked) || !(policy.checked)) {
        submitinput = false;
        termsp.classList.add('text-warning');
        policyp.classList.add('text-warning');
        return false;
    }

    return true;
}

function selectCheckbox(checkboxID) {
    document.querySelector(`#${checkboxID}`).classList.remove('text-warning');
    submitinput = true;
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

document.getElementById('phone').addEventListener('input', function (event) {
    const input = event.target;

    // Remove non-numeric characters (except "+")
    const cleanedValue = input.value.replace(/[^0-9+]/g, '');

    // Check if the cleaned value starts with "+52" and has a length greater than 3
    if (cleanedValue.startsWith("+52")) {
        // If yes, set the cleaned value with spacing
        input.value = "+52 " + cleanedValue.slice(3, 6) + (cleanedValue[6] ? ' ' + cleanedValue.slice(6, 9) : '') + (cleanedValue[9] ? ' ' + cleanedValue.slice(9) : '');
    } else {
        // If not, add "+52" to the beginning with spacing
        input.value = "+52 " + cleanedValue.slice(0, 3) + (cleanedValue[3] ? ' ' + cleanedValue.slice(3, 6) : '') + (cleanedValue[6] ? ' ' + cleanedValue.slice(6, 9) : '') + (cleanedValue[9] ? ' ' + cleanedValue.slice(9) : '');
    }

    // Limit the total length to 17 characters (including spaces)
    if (input.value.length > 17) {
        input.value = input.value.slice(0, 17);
    }
});