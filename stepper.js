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


// range-input 2//
document.addEventListener("DOMContentLoaded", function () {
  // Second range input
  var rangeInput2 = document.querySelector('.range-input-2');
  var numberInput2 = document.querySelector('.number-input-2');

  const maxLength = 7;

  function updateSlider(value, rangeInput) {
    let min = rangeInput.min || 0;
    let max = rangeInput.max || 100;
    let width = ((value - min) / (max - min)) * 100;
    rangeInput.style.setProperty('--width', `${width}%`);
    rangeInput.value = value;
  }

  function updateInputs(value, numberInput, rangeInput) {
    value = value.toString().slice(0, maxLength); // Enforce max length
    value = parseInt(value) || 0;
    value = Math.min(value, 30000); // Enforce max value
    numberInput.value = value;
    updateSlider(value, rangeInput);
  }

  rangeInput2.addEventListener('input', function () {
    updateInputs(this.value, numberInput2, rangeInput2);
  });

  numberInput2.addEventListener('input', function () {
    updateInputs(this.value, numberInput2, rangeInput2);
  });

  updateInputs(rangeInput2.value, numberInput2, rangeInput2); // Initialize the second slider position
});


document.addEventListener("DOMContentLoaded", function () {
  var numberInput2 = document.querySelector('.number-input-2');
  const maxLength = 2;

  function updateInputs(value, numberInput) {
    value = value.toString().slice(0, maxLength); // Enforce max length
    value = parseInt(value) || 0;
    value = Math.min(value, 30); // Enforce max value
    value = Math.max(value, 1); // Enforce min value
    numberInput.value = value;
  }

  numberInput2.addEventListener('input', function () {
    updateInputs(this.value, numberInput2);
  });

  // Initialize the input value and placeholder
  updateInputs(numberInput2.value, numberInput2);
});



// RANGE Input 
//________________________________________________________________________________ //






// PROGRESS SECTION //



/* 
 * (class)Progress<nowValue, minValue, maxValue>
 */

//helper function-> return <DOMelement>
function elt(type, prop, ...childrens) {
  let elem = document.createElement(type);
  if (prop) Object.assign(elem, prop);
  for (let child of childrens) {
    if (typeof child == "string") elem.appendChild(document.createTextNode(child));
    else elem.appendChild(elem);
  }
  return elem;
}

//Progress class
class Progress {
  constructor(now, min, max, options) {
    this.dom = elt("div", {
      className: "progress-bar"
    });
    this.min = min;
    this.max = max;
    this.intervalCode = 0;
    this.now = now;
    this.syncState();

  }

  syncState() {
    this.dom.style.width = this.now + "%";
  }

  startTo(step, time) {
    if (this.intervalCode !== 0) return;
    this.intervalCode = setInterval(() => {
      console.log("sss")
      if (this.now + step > this.max) {
        this.now = this.max;
        this.syncState();
        clearInterval(this.interval);
        this.intervalCode = 0;
        return;
      }
      this.now += step;
      this.syncState()
    }, time)
  }
  end() {
    this.now = this.max;
    clearInterval(this.intervalCode);
    this.intervalCode = 0;
    this.syncState();
  }
}


let pb = new Progress(15, 0, 100, { parent: ".progress" });

//arg1 -> step length
//arg2 -> time(ms)
pb.startTo(5, 70);

//end to progress after 5s
setTimeout(() => {
  pb.end()
}, 5000)







document.addEventListener('DOMContentLoaded', function () {
  // Initially, hide the 'link-main' section
  var linkMain = document.getElementById('link-main');
  linkMain.style.display = 'none';

  // Set a timeout for 3 seconds
  setTimeout(function () {
    // After 3 seconds, hide the 'progress-section' and show the 'link-main'
    var progressSection = document.querySelector('.progress-section');
    progressSection.style.display = 'none'; // hides the progress section
    linkMain.style.display = 'block'; // shows the link main section
  }, 4000);
});






// First, ensure that the page is fully loaded
document.addEventListener('DOMContentLoaded', function () {
  // Hide the element with class 'progress-section'
  var progressSection = document.querySelector('.progress-section');
  progressSection.style.display = 'none';

  // Set a timeout for 3 seconds (3000 milliseconds)
  setTimeout(function () {
    // After 3 seconds, hide the 'progress-section' and show the 'link-main'
    progressSection.style.display = 'none'; // hides the progress section
    var linkMain = document.getElementById('link-main');
    linkMain.style.display = 'block'; // shows the link main section
  }, 3000);
});



// First, ensure that the page is fully loaded
document.addEventListener('DOMContentLoaded', function () {
  // Hide the element with class 'progress-section'
  var progressSection = document.querySelector('.progress-section');
  progressSection.style.display = 'none';

  // Set a timeout for 3 seconds (3000 milliseconds)
  setTimeout(function () {
    // After 3 seconds, hide the 'progress-section' and show the 'link-main'
    progressSection.style.display = 'none'; // hides the progress section
    var linkMain = document.getElementById('link-main');
    linkMain.style.display = 'block'; // shows the link main section
  }, 3000);
});

// progress section //



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






