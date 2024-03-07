var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab
var selectN = document.getElementById("mySelect");

function showTab(n) {
    // This function will display the specified tab of the form...
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    //... and fix the Previous/Next buttons:
    if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
    } else {
        document.getElementById("prevBtn").style.display = "flex";
    }
    if (n == (x.length - 1)) {
        document.getElementById("nextBtn").innerHTML = "Obtener ofertas";
    } else {
        document.getElementById("nextBtn").innerHTML = "Siguiente";
    }
    //... and run a function that will display the correct step indicator:
    fixStepIndicator(n)
}

function nextPrev(n) {
    // if (document.querySelector('#nextBtn').innerHTML == "Get Deals") {
    //     redirectt();
    // }
    // This function will figure out which tab to display
    var x = document.getElementsByClassName("tab");
    // Exit the function if any field in the current tab is invalid:
    if (n == 1 && !validateForm()) return false;

    if ((document.getElementById("nextBtn").innerHTML == "Obtener ofertas") && n == -1) {
        x[currentTab].style.display = "none";
    }

    if (!(document.getElementById("nextBtn").innerHTML == "Obtener ofertas")) {
        // Hide the current tab:
        x[currentTab].style.display = "none";
    }

    if (document.querySelector('#agreecheckbox').checked) {
        if (document.getElementById("nextBtn").innerHTML == "Obtener ofertas") {
            document.getElementById("nextBtn").innerHTML = `<i class="fa fa-circle-o-notch fa-spin"></i>`;
        }
        // Increase or decrease the current tab by 1:
        currentTab = currentTab + n;
        // if you have reached the end of the form...
        if (currentTab >= x.length) {
            // ... the form gets submitted:
            modifyActionAndSubmit();
            return false;
        }
    } else {
        document.querySelector('#agreecheckbox-p').style.color = 'red';
    }
    // Otherwise, display the correct tab:
    showTab(currentTab);
}

function validateForm() {
    // This function deals with validation of the form fields
    var x, y, i, valid = true;
    x = document.getElementsByClassName("tab");
    y = x[currentTab].getElementsByTagName("input");
    // A loop that checks every input field in the current tab:
    for (i = 0; i < y.length; i++) {
        // If a field is empty...
        if (y[i].value == "") {
            // add an "invalid" class to the field:
            y[i].classList.add('invalid');
            // and set the current valid status to false
            valid = false;
        }
    }

    if (currentTab == 1) {
        if (selectN.options[selectN.selectedIndex].value == "Seleccione uno") {
            document.querySelector('.select-selected').classList.add('invalid');
            valid = false;
        }
    }


    function allowOnlyLetters(inputElement) {
        inputElement.addEventListener('input', function (e) {
            // Replace any character that is not a letter or space
            e.target.value = e.target.value.replace(/[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/g, '');
        });
    }

    // Applying the function to the name and surname fields
    allowOnlyLetters(document.querySelector('[name="Name"]'));
    allowOnlyLetters(document.querySelector('[name="last_name"]'));



    document.getElementById('phone').addEventListener('input', function (e) {
        var inputVal = e.target.value;

        // First, remove all characters that are not digits
        inputVal = inputVal.replace(/\D/g, '');

        // Then, cut off all excess digits
        inputVal = inputVal.substring(0, 10);

        // Now, add the spaces for the format "999 999 99 99"
        // This complex replacement regex handles the spacing after certain numbers of digits have been typed
        inputVal = inputVal
            .replace(/^(\d{3})(\d)/, '$1 $2')
            .replace(/^(\d{3})\s(\d{3})(\d)/, '$1 $2 $3')
            .replace(/^(\d{3})\s(\d{3})\s(\d{2})(\d)/, '$1 $2 $3 $4');

        e.target.value = inputVal;

        // Assume the rest of the validation function and the removal of 'invalid' class remains the same...
    });

    function allowOnlyNumbers(inputElement) {
        inputElement.addEventListener('input', function (e) {
            e.target.value = e.target.value.replace(/\D/g, '');
        });
    }




    if (currentTab == 3) {
        var inpt = document.querySelector('#mail');
        if (!validateEmailAddress(inpt.value)) {
            inpt.classList.add('invalid');
            valid = false;
        }
    }



    // Applying the function to each date field
    allowOnlyNumbers(document.getElementById('dateDay'));
    allowOnlyNumbers(document.getElementById('dateMonth'));
    allowOnlyNumbers(document.getElementById('dateYear'));

    // Your existing code
    if (currentTab == 6) {
        var dateDay = document.querySelector('#dateDay');
        var dateMonth = document.querySelector('#dateMonth');
        var dateYear = document.querySelector('#dateYear');
        if (!isValidDateDays(dateDay.value) || !isValidDateMonth(dateMonth.value) || !isValidDateYear(dateYear.value)) {
            dateDay.classList.add('invalid');
            dateMonth.classList.add('invalid');
            dateYear.classList.add('invalid');
            valid = false;
        }
    }

    // If the valid status is true, mark the step as finished and valid:
    if (valid) {
        document.getElementsByClassName("step")[currentTab].className += " finish";
    }
    return valid; // return the valid status
}






function validateEmailAddress(input_str) {
    let re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    return re.test(input_str);
}

function isValidDateDays(input) {
    const pattern = /^\d{1,2}$/;
    if (pattern.test(input)) {
        const number = parseInt(input, 10);
        return number >= 1 && number <= 31;
    }
    return false;
}

function isValidDateMonth(input_str) {
    let re = /^(1[0-2]|[1-9])$/;
    return re.test(input_str);
}

function isValidDateYear(input) {
    const pattern = /^\d{4}$/;
    if (pattern.test(input)) {
        const number = parseInt(input, 10);
        return number >= 1920 && number <= 2006;  // Check if the year is within the 1920 to 2015 range
    }
    return false;
}


//date drop-down //

document.addEventListener('DOMContentLoaded', function () {
    populateDays();
    populateMonths();
    populateYears();
});

function populateDays() {
    var daySelect = document.getElementById('dateDay');
    for (var i = 1; i <= 31; i++) {
        var option = document.createElement('option');
        option.value = i < 10 ? '0' + i : i;
        option.textContent = i;
        daySelect.appendChild(option);
    }
}

function populateMonths() {
    var monthSelect = document.getElementById('dateMonth');
    var months = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
    for (var i = 0; i < 12; i++) {
        var option = document.createElement('option');
        option.value = i + 1;
        option.textContent = months[i];
        monthSelect.appendChild(option);
    }
}

function populateYears() {
    var yearSelect = document.getElementById('dateYear');
    for (var i = 2006; i >= 1920; i--) {
        var option = document.createElement('option');
        option.value = i;
        option.textContent = i;
        yearSelect.appendChild(option);
    }
}

//date drop-down //


function validateSelect() {
    return false;
}

function fixStepIndicator(n) {
    // This function removes the "active" class of all steps...
    var i, x = document.getElementsByClassName("step");
    for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
    }
    //... and adds the "active" class on the current step:
    x[n].className += " active";
}


// steps //
//________________________________________________________________________________ //


// range input 


document.addEventListener("DOMContentLoaded", function () {
    var rangeInput = document.querySelector('.range-input');
    var valueSpan = document.querySelector('.money-value-new span');

    function updateSlider(value) {
        let min = rangeInput.min || 0;
        let max = rangeInput.max || 100;
        let width = ((value - min) / (max - min)) * 100;
        rangeInput.style.setProperty('--width', `${width}%`);
    }

    updateSlider(rangeInput.value); // Initialize the slider position

    rangeInput.addEventListener('input', function () {
        valueSpan.textContent = parseInt(this.value).toLocaleString();
        updateSlider(this.value);
    });
});


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

// pop=up


document.addEventListener('DOMContentLoaded', function () {
    var submitBtn = document.getElementById('submitBtn');

    submitBtn.addEventListener('click', function (event) {
        var select = document.querySelector('.select-selected');
        if (select.innerHTML === 'Select One') {
            alert('Please select one!');
            event.preventDefault();
        }
    });
});


//select //


// mailchimp//

function redirectt() {
    if (document.querySelector('#nextBtn').innerHTML == "Get Deals") {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                window.location.href = 'https://credito-mx.com/links.html';
            }
        };
        xhttp.open("GET", "https://credito-mx.us14.list-manage.com/subscribe/post-json?u=e505c1e791200be2cadfb7a4b&id=b4bfe9aaf7&f_id=003d9de0f0", true);
        xhttp.send();
    }
}

//////

function checkForInput(inptID) {
    let inpt = document.querySelector(`#${inptID}`);

    inpt.onkeypress = function (evt) {
        inpt.classList.remove('invalid');
    }
}

function removeSelectRed(selectID) {
    let select = document.querySelector(`.${selectID}`);
    select.classList.remove('invalid');
}

function modifyActionAndSubmit() {
    // Get the form element
    var form = document.getElementById('regForm');

    // Get the current action URL
    var currentAction = form.action;

    // Create an array to store field values
    var fieldValues = [];

    // Iterate through form elements and store their values
    for (var i = 0; i < form.elements.length; i++) {
        var element = form.elements[i];
        if (element.type !== 'button' && element.name) {
            var fieldName = 'fields[' + encodeURIComponent(element.name) + ']';
            var fieldValue = encodeURIComponent(element.value);
            fieldValues.push(fieldName + '=' + fieldValue);
        }
    }

    // Modify the action URL with the new format
    var newAction = currentAction + '?' + fieldValues.join('&');

    // Update the form's action attribute
    form.action = newAction;

    if (document.querySelector('#agreecheckbox').checked) {
        form.submit();
    } else {
        var redirectUrl = 'https://credito-mx.com/links.html'; // Replace with your desired URL
        window.location.href = redirectUrl;
    }

    // Submit the form

    // Redirect to another page after submission
    // var redirectUrl = 'https://credito-mx.com/links.html'; // Replace with your desired URL
    // window.location.href = redirectUrl;
}

// function modifyActionAndSubmit() {
//     // Get the form element
//     var form = document.getElementById('regForm');

//     // Get the current action URL
//     var currentAction = form.action;

//     // Create an array to store field values
//     var fieldValues = [];

//     // Iterate through form elements and store their values
//     for (var i = 0; i < form.elements.length; i++) {
//         var element = form.elements[i];
//         if (element.type !== 'button' && element.name) {
//             var fieldName = 'fields[' + encodeURIComponent(element.name) + ']';
//             var fieldValue = encodeURIComponent(element.value);
//             fieldValues.push(fieldName + '=' + fieldValue);
//         }
//     }

//     // Modify the action URL with the new format
//     var newAction = currentAction + '?' + fieldValues.join('&');

//     if (document.querySelector('#agreecheckbox').checked) {
//         newAction += "&fields[agreetosub]=Agreed";
//     } else {
//         newAction += "&fields[agreetosub]=Declined";
//     }

//     // Update the form's action attribute
//     form.action = newAction;

//     // Use fetch to make an asynchronous request
//     fetch(newAction, {
//         method: 'GET',
//     })
//         .then(response => {
//             if (response.ok) {
//                 // If the response is successful, redirect the user to the desired page
//                 window.location.href = 'https://example.com/success-page'; // Replace with your desired URL
//             } else {
//                 // Handle the case where the form submission is not successful
//                 console.error('Form submission failed');
//             }
//         })
//         .catch(error => {
//             console.error('Error during form submission:', error);
//         });

//     // Return false to prevent the default form submission
//     return false;
// }

// https://api.selzy.com/en/api/subscribe?format=json&api_key=6o4jh3kotrisbmu8sxufdgrcqf6ij3ewyzyq957o&list_ids=3&