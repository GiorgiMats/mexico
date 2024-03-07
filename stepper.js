//  steps //


// steps //
//________________________________________________________________________________ //


// range input 


document.addEventListener("DOMContentLoaded", function () {
  var rangeInput = document.querySelector('.range-input');
  var numberInput = document.querySelector('.number-input');
  const maxLength = 7;

  function updateSlider(value) {
    let min = rangeInput.min || 0;
    let max = rangeInput.max || 100;
    let width = ((value - min) / (max - min)) * 100;
    rangeInput.style.setProperty('--width', `${width}%`);
    rangeInput.value = value;
  }

  function updateInputs(value) {
    value = value.toString().slice(0, maxLength); // Enforce max length
    value = parseInt(value) || 0;
    value = Math.min(value, 30000); // Enforce max value
    numberInput.value = value;
    updateSlider(value);
  }

  rangeInput.addEventListener('input', function () {
    updateInputs(this.value);
  });

  numberInput.addEventListener('input', function () {
    updateInputs(this.value);
  });

  updateInputs(rangeInput.value); // Initialize the slider position
});




// RANGE Input 
//________________________________________________________________________________ //










//________________________________________________________________________________ //


// hamburger menu //
document.querySelector('.hamburger-menu').addEventListener('click', function () {
  document.querySelector('.nav').classList.add('active');
  this.style.display = 'none';
  document.querySelector('.close').style.display = 'block';
});

document.querySelector('.close').addEventListener('click', function () {
  document.querySelector('.nav').classList.remove('active');
  this.style.display = 'none';
  document.querySelector('.hamburger-menu').style.display = 'block';
});
// hamburger end//






