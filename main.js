/* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
function myFunction() {
  var x = document.getElementById("navi");
  if (x.className === "navi") {
    x.className += " responsive";
  } else {
    x.className = "navi";
  }
  var y = document.getElementById("split");
  if (y.className === "split") {
    // console.log(y);
    y.className = "splitns";
  } else {
    y.className = "split";
  }
  
  
}
// var w = window.innerWidth; 
// console.log(w);
// if (w>600) {
//     console.log("Nice");  
// }
var a =document.getElementById("btn"); 
var b =document.getElementById("btn2");
function hoverbtn(z) {  
  a.classList.remove("btn-outline-primary");
  z.className += " butn";
  }

function normalbtn(x) {
    a.classList.remove("butn");
    x.className += " btn-outline-primary";
  }
  function hoverbtn2(z) {  
    b.classList.remove("btn-outline-primary");
    z.className += " butn";
    }
  
  function normalbtn2(x) {
      b.classList.remove("butn");
      x.className += " btn-outline-primary";
    }
    function hoverbtn3(z) {  
      var t =document.getElementById(z); 
      t.classList.remove("btn-outline-primary");
      z.className += " butn";
      }
    
    function normalbtn3(x) {
      var t =document.getElementById(x); 
      t.classList.remove("butn");
      x.className += " btn-outline-primary";
      }
    var pic =document.getElementById("disp");
    // console.log(pic);
    // console.log(pic.src);
    var loadFile = function(event) {
      var image = document.getElementById('disp');
      image.src = URL.createObjectURL(event.target.files[0]);
    };

 


    

    // addEventListener("DOMContentLoaded", (event) => 
  //   function validate_password() {
  //     const password = document.getElementById("password-input");
  //     const passwordAlert = document.getElementById("password-alert");
  //     const requirements = document.querySelectorAll(".requirements");
  //     let lengBoolean, bigLetterBoolean, numBoolean, specialCharBoolean;
  //     let leng = document.querySelector(".leng");
  //     let bigLetter = document.querySelector(".big-letter");
  //     let num = document.querySelector(".num");
  //     let specialChar = document.querySelector(".special-char");
  //     const specialChars = "!@#$%^&*()-_=+[{]}\\|;:'\",<.>/?`~";
  //     const numbers = "0123456789";
  
  //     requirements.forEach((element) => element.classList.add("wrong"));
  
  //     password.addEventListener("focus", () => {
  //         passwordAlert.classList.remove("d-none");
  //         if (!password.classList.contains("is-valid")) {
  //             password.classList.add("is-invalid");
  //         }
  //     });
  
  //     password.addEventListener("input", () => {
  //         let value = password.value;
  //         if (value.length < 8) {
  //             lengBoolean = false;
  //         } else if (value.length > 7) {
  //             lengBoolean = true;
  //         }
  
  //         if (value.toLowerCase() == value) {
  //             bigLetterBoolean = false;
  //         } else {
  //             bigLetterBoolean = true;
  //         }
  
  //         numBoolean = false;
  //         for (let i = 0; i < value.length; i++) {
  //             for (let j = 0; j < numbers.length; j++) {
  //                 if (value[i] == numbers[j]) {
  //                     numBoolean = true;
  //                 }
  //             }
  //         }
  
  //         specialCharBoolean = false;
  //         for (let i = 0; i < value.length; i++) {
  //             for (let j = 0; j < specialChars.length; j++) {
  //                 if (value[i] == specialChars[j]) {
  //                     specialCharBoolean = true;
  //                 }
  //             }
  //         }
  
  //         if (lengBoolean == true && bigLetterBoolean == true && numBoolean == true && specialCharBoolean == true) {
  //             password.classList.remove("is-invalid");
  //             password.classList.add("is-valid");
  
  //             requirements.forEach((element) => {
  //                 element.classList.remove("wrong");
  //                 element.classList.add("good");
  //             });
  //             passwordAlert.classList.remove("alert-warning");
  //             passwordAlert.classList.add("alert-success");
  //         } else {
  //             password.classList.remove("is-valid");
  //             password.classList.add("is-invalid");
  
  //             passwordAlert.classList.add("alert-warning");
  //             passwordAlert.classList.remove("alert-success");
  
  //             if (lengBoolean == false) {
  //                 leng.classList.add("wrong");
  //                 leng.classList.remove("good");
  //             } else {
  //                 leng.classList.add("good");
  //                 leng.classList.remove("wrong");
  //             }
  
  //             if (bigLetterBoolean == false) {
  //                 bigLetter.classList.add("wrong");
  //                 bigLetter.classList.remove("good");
  //             } else {
  //                 bigLetter.classList.add("good");
  //                 bigLetter.classList.remove("wrong");
  //             }
  
  //             if (numBoolean == false) {
  //                 num.classList.add("wrong");
  //                 num.classList.remove("good");
  //             } else {
  //                 num.classList.add("good");
  //                 num.classList.remove("wrong");
  //             }
  
  //             if (specialCharBoolean == false) {
  //                 specialChar.classList.add("wrong");
  //                 specialChar.classList.remove("good");
  //             } else {
  //                 specialChar.classList.add("good");
  //                 specialChar.classList.remove("wrong");
  //             }
  //         }
  //     });
  
  //     password.addEventListener("blur", () => {
  //         passwordAlert.classList.add("d-none");
  //     });
  // };