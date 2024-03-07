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
    for (var i = 2007; i >= 1920; i--) {
        var option = document.createElement('option');
        option.value = i;
        option.textContent = i;
        yearSelect.appendChild(option);
    }
}