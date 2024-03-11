//  steps //

// steps //
//________________________________________________________________________________ //

// range input

document.addEventListener("DOMContentLoaded", function () {
  var rangeInput = document.querySelector(".range-input");
  var numberInput = document.querySelector(".number-input");
  const maxLength = 7;

  function updateSlider(value) {
    let min = rangeInput.min || 0;
    let max = rangeInput.max || 100;
    let width = ((value - min) / (max - min)) * 100;
    rangeInput.style.setProperty("--width", `${width}%`);
    rangeInput.value = value; // This will update the slider value
    console.log("Slider updated to: " + value);
  }

  function updateInputs(value) {
    value = value.toString().slice(0, maxLength); // Enforce max length
    value = parseInt(value) || 0;
    value = Math.min(value, 30000); // Enforce max value
    numberInput.value = value; // This will update the number input value
    updateSlider(value);
    console.log("Inputs updated to: " + value);
  }

  rangeInput.addEventListener("input", function () {
    updateInputs(this.value);
  });

  numberInput.addEventListener("input", function () {
    updateInputs(this.value);
  });

  updateInputs(rangeInput.value); // Initialize the slider position
});
window.addEventListener("load", function () {
  var rangeInput = document.querySelector(".range-input");
  var numberInput = document.querySelector(".number-input");
  var rangeInput2 = document.querySelector(".range-input-2");
  var numberInput2 = document.querySelector(".number-input-2");
  const maxLength = 7;

  // Define your functions here...

  // Update the sliders based on the actual input values when the page fully loads
  updateInputs(rangeInput.value, numberInput, rangeInput);
  updateInputs(rangeInput2.value, numberInput2, rangeInput2);
});
// range-input 2//
document.addEventListener("DOMContentLoaded", function () {
  var rangeInput2 = document.querySelector(".range-input-2");
  var numberInput2 = document.querySelector(".number-input-2");
  const maxLength = 7;
  console.log(rangeInput2.value, numberInput2.value);
  function updateSlider(value, rangeInput) {
    let min = rangeInput.min || 0;
    let max = rangeInput.max || 100;
    let width = ((value - min) / (max - min)) * 100;
    rangeInput2.style.setProperty("--width", `${width}%`);

    rangeInput.value = value;
  }

  // function alignValue(value) {
  //   if (value > 30) {
  //     const remainder = (value - 1) % 30;
  //     value = remainder === 0 ? value : value + 30 - remainder;
  //   }
  //   return value;
  // }
  function alignValue(value) {
    if (value <= 30) {
      // If value is 30 or less, it should not change.
      return value;
    } else {
      // If value is greater than 30, align it to the nearest multiple of 30.
      const roundedValue = Math.ceil((value - 1) / 30) * 30;
      return roundedValue;
    }
  }

  function updateInputs(value, numberInput, rangeInput) {
    // console.log("value:", numberInput.value);
    value = value.toString().slice(0, maxLength); // Enforce max length
    value = parseInt(value) || 0;
    value = alignValue(value); // Align the value if necessary
    numberInput.value = value;
    updateSlider(value, rangeInput);
    adjustStep(value, rangeInput);
  }

  function adjustStep(value, rangeInput) {
    // Adjust step size based on value
    rangeInput.step = value > 30 ? 30 : 1;
  }

  rangeInput2.addEventListener("input", function () {
    updateInputs(this.value, numberInput2, rangeInput2);
  });

  numberInput2.addEventListener("input", function () {
    const value = parseInt(this.value) || 0;
    this.value = value; // Directly update the value without alignment
    adjustStep(value, rangeInput2);
    updateSlider(value, rangeInput2);
  });

  // Initial setup
  updateInputs(rangeInput2.value, numberInput2, rangeInput2); // Initialize inputs with aligned value
  updateSlider(rangeInput2.value, rangeInput2);
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
    if (typeof child == "string")
      elem.appendChild(document.createTextNode(child));
    else elem.appendChild(elem);
  }
  return elem;
}

//Progress class
// class Progress {
//   constructor(now, min, max, options) {
//     this.dom = elt("div", {
//       className: "progress-bar",
//     });
//     this.min = min;
//     this.max = max;
//     this.intervalCode = 0;
//     this.now = now;
//     this.syncState();
//   }

//   syncState() {
//     this.dom.style.width = this.now + "%";
//   }

//   startTo(step, time) {
//     if (this.intervalCode !== 0) return;
//     this.intervalCode = setInterval(() => {
//       console.log("sss");
//       if (this.now + step > this.max) {
//         this.now = this.max;
//         this.syncState();
//         clearInterval(this.interval);
//         this.intervalCode = 0;
//         return;
//       }
//       this.now += step;
//       this.syncState();
//     }, time);
//   }
//   end() {
//     this.now = this.max;
//     clearInterval(this.intervalCode);
//     this.intervalCode = 0;
//     this.syncState();
//   }
// }

// let pb = new Progress(15, 0, 100, { parent: ".progress" });

// //arg1 -> step length
// //arg2 -> time(ms)
// pb.startTo(5, 70);

// //end to progress after 5s
// setTimeout(() => {
//   pb.end();
// }, 5000);

// document.addEventListener("DOMContentLoaded", function () {
//   // Initially, hide the 'link-main' section
//   var linkMain = document.getElementById("link-main");
//   linkMain.style.display = "none";

//   // Set a timeout for 3 seconds
//   setTimeout(function () {
//     // After 3 seconds, hide the 'progress-section' and show the 'link-main'
//     var progressSection = document.querySelector(".progress-section");
//     progressSection.style.display = "none"; // hides the progress section
//     linkMain.style.display = "block"; // shows the link main section
//   }, 4000);
// });

// // First, ensure that the page is fully loaded
// document.addEventListener("DOMContentLoaded", function () {
//   // Hide the element with class 'progress-section'
//   var progressSection = document.querySelector(".progress-section");
//   progressSection.style.display = "none";

//   // Set a timeout for 3 seconds (3000 milliseconds)
//   setTimeout(function () {
//     // After 3 seconds, hide the 'progress-section' and show the 'link-main'
//     progressSection.style.display = "none"; // hides the progress section
//     var linkMain = document.getElementById("link-main");
//     linkMain.style.display = "block"; // shows the link main section
//   }, 3000);
// });

// // First, ensure that the page is fully loaded
// document.addEventListener("DOMContentLoaded", function () {
//   // Hide the element with class 'progress-section'
//   var progressSection = document.querySelector(".progress-section");
//   progressSection.style.display = "none";

//   // Set a timeout for 3 seconds (3000 milliseconds)
//   setTimeout(function () {
//     // After 3 seconds, hide the 'progress-section' and show the 'link-main'
//     progressSection.style.display = "none"; // hides the progress section
//     var linkMain = document.getElementById("link-main");
//     linkMain.style.display = "block"; // shows the link main section
//   }, 3000);
// });

// progress section //

//________________________________________________________________________________ //

// hamburger menu //
document
  .querySelector(".hamburger-menu")
  .addEventListener("click", function () {
    document.querySelector(".nav").classList.add("active");
    this.style.display = "none";
    document.querySelector(".close").style.display = "block";
  });

document.querySelector(".close").addEventListener("click", function () {
  document.querySelector(".nav").classList.remove("active");
  this.style.display = "none";
  document.querySelector(".hamburger-menu").style.display = "block";
});
// hamburger end//


function enforceMinMax(el) {
  if (el.value != "") {
    if (parseInt(el.value) < parseInt(el.min)) {
      el.value = el.min;
    }
    if (parseInt(el.value) > parseInt(el.max)) {
      el.value = el.max;
    }
  }
}