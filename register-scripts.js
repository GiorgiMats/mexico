var submitinput = true;
var currentStep = 1;
var employedSince = false;
var header = document.querySelector('#header');
var patterns = [
    {
        first_name: /^[a-záéèíñóúüç\s-']+$/i,
        last_name: /^[a-záéèíñóúüç\s-']+$/i,
        second_last_name: /^[a-záéèíñóúüç\s-']+$/i,
        personal_id: /^[A-Z]{1}[AEIOU]{1}[A-Z]{2}\d{2}(0[1-9]|1[0-2])(0[1-9]|[1-2][0-9]|3[0-1])[HM]{1}(AS|BC|BS|CC|CS|CH|CL|CM|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[0-9A-Z]{1}\d{1}$/,
        tax_id_number: /^[A-Z&Ñ]{3,4}\d{6}[A-Za-z\d]{3}$/,
        email: /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/,
        bank_account: /^.{18}$/,
        phone: /^.{16}$/,
    },
    {
        postal_code: /^[0-9]{5}$/,
        city: /^.{1,45}$/,
        street: /^.{1,45}$/,
        house_number: /^.{1,45}$/,
        region: /^.{1,45}$/,
        district: /^.{1,255}$/,
        county: /^.{1,45}$/,
    },
    {
        neto_income: /^(?:[1-9]\d{3,}|1000)$/
        ,
    }
];

// employer: /^.{1,45}$/,

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
        'car-div',
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
    ]
]

// 'employedMonth',
// 'employedYear',

function nextStep(n) {
    let steps = document.querySelectorAll('.step-container');
    if (n == -1) {
        alert("fuck off");
    } else if (n == 1) {
        if (steps.length < (currentStep + 1)) {
            if (validateForm('stepsdiv3')) {
                submitForm();
            }
        } else {
            if (validateForm(`stepsdiv${currentStep}`)) {
                document.querySelector(`#radio_${currentStep}`).checked = false;
                document.querySelector(`#atitle${currentStep}`).classList.remove('error-accordion');
                document.querySelector(`#atitle${currentStep}`).classList.add('filled-accordion');
                // if (steps.length == (currentStep + 1)) {
                //     document.querySelector('#stepsbutton').classList.add('green-btn');
                // }
                currentStep = currentStep + n;
                document.querySelector(`#atitle${currentStep}`).classList.remove('disabled-title');
                document.querySelector(`#radio_${currentStep}`).removeAttribute('disabled');
                document.querySelector(`#radio_${currentStep}`).checked = true;
                header.scrollIntoView();
            } else {
                document.querySelector(`#atitle${currentStep}`).classList.add('error-accordion');
                header.scrollIntoView();
            }
        }
    }
}

function validateForm(formName) {
    submitinput = true;
    let formGroup = document.querySelectorAll(`#${formName} input`);
    let patternInputs = getObjectNames(patterns[currentStep - 1]);

    // Check if any input is empty
    // formGroup.forEach(inpt => {
    //     if (inpt.value == '') {
    //         console.log(`please fill in ${inpt.id} correctly`);
    //         inputWarning(inpt.id);
    //         submitinput = false;
    //         return false;
    //     }
    // });

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

    // Format Date Inputs
    let remunerationDay = encodeURIComponent(document.querySelector('#remunerationDay').value);
    let remunerationMonth = encodeURIComponent(document.querySelector('#remunerationMonth').value);
    let remunerationYear = encodeURIComponent(document.querySelector('#remunerationYear').value);
    fieldValues.push(`remuneration_deadline=${remunerationYear}-${remunerationMonth}-${remunerationDay}`);

    // Format Date Inputs
    if (employedSince) {
        let employedMonth = encodeURIComponent(document.querySelector('#employedMonth').value);
        let employedYear = encodeURIComponent(document.querySelector('#employedYear').value);
        fieldValues.push(`employed_since=${employedYear}-${employedMonth}-18`);
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
    if (inptid == 'bank_account') {
        // fffffffffffffffffffffffffffffffffffffffffffffffff
        let accountNumber = document.querySelector('#bank_account').value;
        let controlDigit = calculateControlDigit(accountNumber);
        if (!compareLastDigit(accountNumber, controlDigit)) {
            submitinput = false;
            inputWarning('bank_account');
            console.log(accountNumber, controlDigit);
        } else {
            inputSuccess(inptid);
        }
    } else if (inptid == 'tax_id_number') {
        if (validateRfc(document.querySelector('#tax_id_number').value).isValid) {
            inputSuccess(inptid);
        } else {
            console.log(validateRfc(document.querySelector('#tax_id_number').value));
            submitinput = false;
            inputWarning(inptid);
        }
    } else if (inptid == 'personal_id') {
        if (validateCurp(document.querySelector('#personal_id').value).isValid) {
            inputSuccess(inptid);
        } else {
            console.log(validateCurp(document.querySelector('#personal_id').value));
            submitinput = false;
            inputWarning(inptid);
        }
    } else if (inptid == 'phone') {
        if (isPhoneNumberValid(document.querySelector('#phone').value)) {
            inputSuccess(inptid);
        } else {
            console.log(document.querySelector('#phone').value, isPhoneNumberValid(document.querySelector('#phone').value));
            submitinput = false;
            inputWarning(inptid);
        }
    } else {
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

    if (selectid == 'occupation-div') {
        let occupationOptions = document.querySelector('#occupation').options;

        if (occupationOptions[1].selected || occupationOptions[2].selected || occupationOptions[3].selected) {
            employedSince = true;
            document.querySelector('#employed_since_step_item').classList.remove('displaynone');
            document.querySelector('#employer_step_item').classList.remove('displaynone');

            patterns[2].employer = /^.{1,45}$/;
            customSelects2[2].push('employedMonth');
            customSelects2[2].push('employedYear');

        } else {
            employedSince = false;
            document.querySelector('#employed_since_step_item').classList.add('displaynone');
            document.querySelector('#employer_step_item').classList.add('displaynone');

            if ('employer' in patterns[2]) {
                delete patterns[2].employer;
                customSelects2[2] = customSelects2[2].filter(function (name) {
                    return name !== 'employedMonth';
                });
                customSelects2[2] = customSelects2[2].filter(function (name) {
                    return name !== 'employedYear';
                });
            }
        }
    }

    if (selectid == 'has_loan-div') {
        let hasLoanOptions = document.querySelector('#has_loan').options;

        if (hasLoanOptions[2].selected) {
            document.querySelector('#debt_amount_step_item').classList.remove('displaynone');
            patterns[2].debt_amount = /^.{1,45}$/;
        } else {
            document.querySelector('#debt_amount_step_item').classList.add('displaynone');
        }
    }

    if (selectid == 'credit_score-div') {
        let creditScoreOptions = document.querySelector('#credit_score').options;

        if (creditScoreOptions[5].selected) {
            document.querySelector('#hascard_step_item').classList.remove('displaynone');
            customSelects[2].push('has_credit_card-div');
        } else {
            document.querySelector('#hascard_step_item').classList.add('displaynone');
            customSelects[2] = customSelects[2].filter(function (name) {
                return name !== 'has_credit_card-div';
            });
        }
    }
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


function changeCurrentStep(n) {
    if (!document.querySelector(`#radio_${n}`).hasAttribute('disabled')) {
        currentStep = n;
    }
}

function calculateControlDigit(clabe) {
    // Define weights for each position in the CLABE
    const weights = [3, 7, 1, 3, 7, 1, 3, 7, 1, 3, 7, 1, 3, 7, 1, 3, 7];

    // Calculate the sum of products
    let sum = 0;
    for (let i = 0; i < 17; i++) {
        sum += parseInt(clabe.charAt(i), 10) * weights[i];
    }

    // Calculate the control digit
    let controlDigit = 10 - (sum % 10);
    if (controlDigit === 10) {
        controlDigit = 0;
    }

    return controlDigit;
}

function compareLastDigit(num1, num2) {
    // Extract the last character of the first number
    const lastDigit = num1.charAt(num1.length - 1);

    // Convert the second number to a string for comparison
    const strNum2 = num2.toString();

    // Check if the last digit equals the second number
    return lastDigit === strNum2;
}

function isPhoneNumberValid(phoneNumber) {
    // Remove non-digit characters from the phone number
    const cleanedNumber = phoneNumber.replace(/\D/g, '');

    // Remove the country code and any leading "1" for long distance dialing within Mexico
    const numberWithoutCountryCode = cleanedNumber.startsWith("521") ? cleanedNumber.slice(3) :
        cleanedNumber.startsWith("52") ? cleanedNumber.slice(2) :
            cleanedNumber;

    // Define the prefixes
    const prefixes = [
        "550", "330", "811", "551", "331", "812", "552", "332", "813", "553", "333", "814", "554", "334", "815", "555", "335", "816", "556", "336", "817", "557", "337", "818", "558", "338", "819", "559", "339", "820", "560", "561", "562", "563", "564", "565", "566", "567", "568", "569",
        "479", "440", "729", "664", "446", "222", "990", "656",
        "614", "618", "999", "221", "442", "449", "663", "612", "624", "844", "686", "667",
        "722", "998", "871", "744", "444", "833", "477", "961", "662", "633", "645", "644",
        "642", "631", "229", "443", "921", "771", "981", "899", "868",
        "866", "221", "821", "222", "311", "411", "588", "612", "711", "913",
        "823", "223", "312", "412", "591", "613", "712", "914",
        "824", "224", "313", "413", "592", "614", "713", "916",
        "825", "225", "314", "414", "593", "615", "714", "917",
        "826", "226", "315", "415", "594", "616", "715", "918",
        "828", "227", "316", "417", "595", "618", "716", "919",
        "829", "228", "317", "418", "596", "621", "717", "921",
        "831", "229", "319", "419", "597", "622", "718", "922",
        "832", "231", "321", "421", "599", "623", "719", "923",
        "833", "232", "322", "422", "624", "721", "924",
        "834", "233", "323", "423", "625", "723", "932",
        "835", "235", "324", "424", "626", "724", "933",
        "836", "236", "325", "425", "627", "725", "934",
        "841", "237", "326", "426", "628", "726", "936",
        "842", "238", "327", "427", "629", "727", "937",
        "844", "241", "328", "428", "631", "728", "938",
        "845", "243", "329", "429", "632", "729", "951",
        "846", "244", "341", "431", "633", "731", "953",
        "861", "245", "342", "432", "634", "732", "954",
        "862", "246", "343", "433", "635", "733", "958",
        "864", "247", "344", "434", "636", "734", "961",
        "867", "248", "345", "435", "637", "735", "962",
        "868", "249", "346", "436", "638", "736", "963",
        "869", "271", "347", "437", "639", "737", "964",
        "871", "272", "348", "438", "641", "738", "965",
        "872", "273", "349", "440", "642", "739", "966",
        "873", "274", "351", "441", "643", "741", "967",
        "877", "275", "352", "442", "644", "742", "968",
        "878", "276", "353", "443", "645", "743", "969",
        "891", "278", "354", "444", "646", "744", "971",
        "892", "279", "355", "445", "647", "745", "972",
        "894", "281", "356", "446", "648", "746", "981",
        "897", "282", "357", "447", "649", "747", "982",
        "899", "283", "358", "448", "651", "748", "983",
        "284", "359", "449", "652", "749", "984",
        "285", "371", "451", "653", "751", "985",
        "287", "372", "452", "656", "753", "986",
        "288", "373", "453", "658", "754", "987",
        "294", "374", "454", "659", "755", "988",
        "296", "375", "455", "661", "756", "991",
        "297", "376", "456", "662", "757", "992",
        "377", "457", "665", "758", "993",
        "378", "458", "666", "759", "994",
        "381", "459", "667", "761", "995",
        "382", "461", "668", "762", "996",
        "383", "462", "669", "763", "997",
        "384", "463", "671", "764", "998",
        "385", "464", "672", "765", "999",
        "386", "465", "673", "766",
        "387", "466", "674", "767",
        "388", "467", "675", "768",
        "389", "468", "676", "769",
        "391", "469", "677", "771",
        "392", "471", "686", "772",
        "393", "472", "687", "773",
        "394", "473", "694", "774",
        "395", "474", "695", "775",
        "475", "696", "776",
        "476", "697", "777",
        "478", "698", "778",
        "481", "663", "779",
        "482", "664", "781",
        "783",
        "784",
        "785",
        "786",
        "789",
        "791",
        "797",
        "722",
        "729",
        "477",
        "479"
    ];


    // Extract the first 3 digits as the prefix from the number without the country code
    const extractedPrefix = numberWithoutCountryCode.slice(0, 3);

    // Check if the extracted prefix is in the list of valid prefixes
    return prefixes.includes(extractedPrefix);
}


