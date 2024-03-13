let currentDate = new Date();
let currentYear = currentDate.getFullYear();

// Birth Date //

document.addEventListener('DOMContentLoaded', function () {
    populateMonths();
    populateYears();
    updateDays(); // Initial population of days based on the current month and year
});

document.getElementById('dateMonth').addEventListener('change', updateDays);
document.getElementById('dateYear').addEventListener('change', updateDays);

function updateDays() {
    populateDays();
}

function populateDays() {
    var daySelect = document.getElementById('dateDay');
    var monthSelect = document.getElementById('dateMonth');
    var yearSelect = document.getElementById('dateYear');

    var selectedMonth = parseInt(monthSelect.value, 10);
    var selectedYear = parseInt(yearSelect.value, 10);

    // Clear existing options
    daySelect.innerHTML = '<option class="select-one" value="" disabled selected>Día</option>';

    // Get the number of days in the selected month and year
    var daysInMonth = new Date(selectedYear, selectedMonth, 0).getDate();

    // Populate days
    for (var i = 1; i <= daysInMonth; i++) {
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

// Remuneration Date //

document.addEventListener('DOMContentLoaded', function () {
    populateRemunerationMonths();
    populateRemunerationYears();
    updateRemunerationDays(); // Initial population of days based on the current month and year
});

document.getElementById('remunerationMonth').addEventListener('change', updateRemunerationDays);
document.getElementById('remunerationYear').addEventListener('change', updateRemunerationDays);

function updateRemunerationDays() {
    populateRemunerationDays();
}

function populateRemunerationDays() {
    var daySelect = document.getElementById('remunerationDay');
    var monthSelect = document.getElementById('remunerationMonth');
    var yearSelect = document.getElementById('remunerationYear');

    var selectedMonth = parseInt(monthSelect.value, 10);
    var selectedYear = parseInt(yearSelect.value, 10);

    // Clear existing options
    daySelect.innerHTML = '<option class="select-one" value="" disabled selected>Día</option>';

    // Calculate the maximum days based on the selected month and year
    var maxDays = new Date(selectedYear, selectedMonth, 0).getDate();

    // Calculate the minimum day (current date) for the current year and selected month
    var minDay = (currentYear === selectedYear && selectedMonth === currentDate.getMonth() + 1) ? currentDate.getDate() : 1;

    // Populate days
    for (var i = minDay; i <= maxDays; i++) {
        var option = document.createElement('option');
        option.value = i < 10 ? '0' + i : i;
        option.textContent = i;
        daySelect.appendChild(option);
    }
}

function populateRemunerationMonths() {
    var monthSelect = document.getElementById('remunerationMonth');
    var months = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
    var currentMonth = currentDate.getMonth() + 1; // Months are zero-based in JavaScript Date objects
    for (var i = currentMonth; i <= 12; i++) {
        var option = document.createElement('option');
        option.value = i < 10 ? '0' + i : i;
        option.textContent = months[i - 1];
        monthSelect.appendChild(option);
    }
}

function populateRemunerationYears() {
    var yearSelect = document.getElementById('remunerationYear');
    for (var i = currentYear; i <= currentYear + 1; i++) {
        var option = document.createElement('option');
        option.value = i;
        option.textContent = i;
        yearSelect.appendChild(option);
    }
}

// Employed Date //

// Employed Date //

document.addEventListener('DOMContentLoaded', function () {
    populateEmployedMonths();
    populateEmployedYears();
});

document.getElementById('employedYear').addEventListener('change', updateEmployedMonths);

function updateEmployedMonths() {
    populateEmployedMonths();
}

function populateEmployedMonths() {
    var monthSelect = document.getElementById('employedMonth');
    var yearSelect = document.getElementById('employedYear');
    var months = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
    var selectedYear = parseInt(yearSelect.value, 10);
    var currentMonth = (currentYear === selectedYear) ? currentDate.getMonth() + 1 : 12;

    // Clear existing options
    monthSelect.innerHTML = '<option class="select-one" value="" disabled selected>Mes</option>';

    for (var i = 1; i <= currentMonth; i++) {
        var option = document.createElement('option');
        option.value = i < 10 ? '0' + i : i;
        option.textContent = months[i - 1];
        monthSelect.appendChild(option);
    }
}

function populateEmployedYears() {
    var yearSelect = document.getElementById('employedYear');
    for (var i = currentYear; i >= 1920; i--) {
        var option = document.createElement('option');
        option.value = i;
        option.textContent = i;
        yearSelect.appendChild(option);
    }
}