let currentDate = new Date();
let currentYear = currentDate.getFullYear();

// Birth Date //

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
    for (var i = 1; i <= 12; i++) {
        var option = document.createElement('option');
        option.value = i < 10 ? '0' + i : i;
        option.textContent = months[i - 1];
        monthSelect.appendChild(option);
    }
}

function populateYears() {
    var yearSelect = document.getElementById('dateYear');
    for (var i = 2007; i >= 1920; i--) {
        var option = document.createElement('option');
        option.value = i;
        option.textContent = i;
        yearSelect.appendChild(option);
    }
}


// Remuneration Deadline //

document.addEventListener('DOMContentLoaded', function () {
    renumerationDays();
    renumerationMonths();
    renumerationYears();
});

function renumerationDays() {
    var daySelect = document.getElementById('remunerationDay');
    for (var i = 1; i <= 31; i++) {
        var option = document.createElement('option');
        option.value = i < 10 ? '0' + i : i;
        option.textContent = i;
        daySelect.appendChild(option);
    }
}

function renumerationMonths() {
    var monthSelect = document.getElementById('remunerationMonth');
    var months = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
    for (var i = 1; i <= 12; i++) {
        var option = document.createElement('option');
        option.value = i < 10 ? '0' + i : i;
        option.textContent = months[i - 1];
        monthSelect.appendChild(option);
    }
}

function renumerationYears() {
    var yearSelect = document.getElementById('remunerationYear');
    for (var i = (currentYear + 1); i >= currentYear; i--) {
        var option = document.createElement('option');
        option.value = i;
        option.textContent = i;
        yearSelect.appendChild(option);
    }
}

// Employed Since //

document.addEventListener('DOMContentLoaded', function () {
    employedMonths();
    employedYears();
});

function employedMonths() {
    var monthSelect = document.getElementById('employedMonth');
    var months = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
    for (var i = 1; i <= 12; i++) {
        var option = document.createElement('option');
        option.value = i < 10 ? '0' + i : i;
        option.textContent = months[i - 1];
        monthSelect.appendChild(option);
    }
}

function employedYears() {
    var yearSelect = document.getElementById('employedYear');
    for (var i = currentYear; i >= 1920; i--) {
        var option = document.createElement('option');
        option.value = i;
        option.textContent = i;
        yearSelect.appendChild(option);
    }
}