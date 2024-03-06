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