// Cler form input fields
function clearForm() {
    document.getElementById("form").reset();
}

// Modal Password Hide/Unhide #########################
function modal_password_show_hide() {
  var x = document.getElementById("password");
  var show_eye = document.getElementById("show_eye_m");
  var hide_eye = document.getElementById("hide_eye_m");
  hide_eye.classList.remove("d-none");
  if (x.type === "password") {
    x.type = "text";
    show_eye.style.display = "none";
    hide_eye.style.display = "block";
  } else {
    x.type = "password";
    show_eye.style.display = "block";
    hide_eye.style.display = "none";
  }
}

function ver_password_show_hide() {
    var x = document.getElementById("ver_password");
    var show_eye = document.getElementById("show_eye_v");
    var hide_eye = document.getElementById("hide_eye_v");
    hide_eye.classList.remove("d-none");
    if (x.type === "password") {
      x.type = "text";
      show_eye.style.display = "none";
      hide_eye.style.display = "block";
    } else {
      x.type = "password";
      show_eye.style.display = "block";
      hide_eye.style.display = "none";
    }
  }

// Password Hide/Unhide #########################
function password_show_hide() {
    var x = document.getElementById("last_password");
    var y = document.getElementById("new_password");
    var z = document.getElementById("con_password");
    var show_eye = document.getElementById("show_eye");
    var hide_eye = document.getElementById("hide_eye");
    hide_eye.classList.remove("d-none");
    if (x.type === "password") {
      x.type = "text";
      y.type = "text";
      z.type = "text";
      show_eye.style.display = "none";
      hide_eye.style.display = "block";
    } else {
      x.type = "password";
      y.type = "password";
      z.type = "password";
      show_eye.style.display = "block";
      hide_eye.style.display = "none";
    }
  }

// PASSWORD LIVE VALIDATION #########################
var myInput = document.getElementById("new_password");
var pwd_letter = document.getElementById("pwd_letter");
var pwd_capital = document.getElementById("pwd_capital");
var pwd_number = document.getElementById("pwd_number");
var pwd_symbol = document.getElementById("pwd_symbol");
var pwd_length = document.getElementById("pwd_length");

// When the user clicks on the password field, show the message box
function showValidation(){
    document.getElementById("passwordHelpBlock").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.addEventListener('blur', (event) => {
    document.getElementById("passwordHelpBlock").style.display = "none";
});

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
    // Validate lowercase letters
    var lowerCaseLetters = /[a-z]/g;
    if(myInput.value.match(lowerCaseLetters)) {  
        pwd_letter.classList.remove("invalid");
        pwd_letter.classList.add("valid");
    } else {
        pwd_letter.classList.remove("valid");
        pwd_letter.classList.add("invalid");
    }
    // Validate capital letters
    var upperCaseLetters = /[A-Z]/g;
    if(myInput.value.match(upperCaseLetters)) {  
        pwd_capital.classList.remove("invalid");
        pwd_capital.classList.add("valid");
    } else {
        pwd_capital.classList.remove("valid");
        pwd_capital.classList.add("invalid");
    }
    // Validate numbers
    var numbers = /[0-9]/g;
    if(myInput.value.match(numbers)) {  
        pwd_number.classList.remove("invalid");
        pwd_number.classList.add("valid");
    } else {
        pwd_number.classList.remove("valid");
        pwd_number.classList.add("invalid");
    }
    // Validate special character
    var symbols = /[_\W]/g;
    if(myInput.value.match(symbols)) {  
        pwd_symbol.classList.remove("invalid");
        pwd_symbol.classList.add("valid");
    } else {
        pwd_symbol.classList.remove("valid");
        pwd_symbol.classList.add("invalid");
    }
    // Validate length
    if(myInput.value.length >= 10) {
        pwd_length.classList.remove("invalid");
        pwd_length.classList.add("valid");
    } else {
        pwd_length.classList.remove("valid");
        pwd_length.classList.add("invalid");
    }
    // update confirm password match message
    confirmPassword();
}

// USERNAME LIVE VALIDATION #########################
var usernameInput = document.getElementById("username");
var uid_firstChar = document.getElementById("uid_firstChar");
var uid_lastChar = document.getElementById("uid_lastChar");
var uid_space = document.getElementById("uid_space");
var uid_length = document.getElementById("uid_length");

// When the user clicks on the username field, show the message box
function uidValidation(){
    document.getElementById("usernameHelpBlock").style.display = "block";
}

// When the user clicks outside of the username field, hide the message box
usernameInput.addEventListener('blur', (event) => {
    document.getElementById("usernameHelpBlock").style.display = "none";
});

// When the user starts to type something inside the username field
usernameInput.onkeyup = function() {
    // Validate lowercase letters
    var firstCharacter = /^[a-zA-Z]/g;
    if(usernameInput.value.match(firstCharacter)) {  
        uid_firstChar.classList.remove("invalid");
        uid_firstChar.classList.add("valid");
    } else {
        uid_firstChar.classList.remove("valid");
        uid_firstChar.classList.add("invalid");
    }
    // Validate numbers
    var lastCharacter = /[0-9a-zA-Z]$/g;
    if(usernameInput.value.match(lastCharacter)) {  
        uid_lastChar.classList.remove("invalid");
        uid_lastChar.classList.add("valid");
    } else {
        uid_lastChar.classList.remove("valid");
        uid_lastChar.classList.add("invalid");
    }
    // No whitespace
    var whitespace = /[\s]/g;
    if(!usernameInput.value.match(whitespace)) {  
        uid_space.classList.remove("invalid");
        uid_space.classList.add("valid");
    } else {
        uid_space.classList.remove("valid");
        uid_space.classList.add("invalid");
    }
    // Validate length
    if(usernameInput.value.length >= 6 && usernameInput.value.length <= 20 ) {
        uid_length.classList.remove("invalid");
        uid_length.classList.add("valid");
    } else {
        uid_length.classList.remove("valid");
        uid_length.classList.add("invalid");
    }
}

// CONFIRM PASSWORD LIVE VALIDATION #########################
var conpasswordInput = document.getElementById("con_password");
var password = document.getElementById("new_password");
var conpwd_match = document.getElementById("conpwd_match");
const reg_button = document.getElementById("createBtn");

function confirmPassword(){
    if(conpasswordInput.value == password.value) {
        document.getElementById("conpwd_match").innerHTML = "Password Matched";
        conpwd_match.classList.remove("invalid");
        conpwd_match.classList.add("valid");
        reg_button.disabled = false;
    }
    else {
        document.getElementById("conpwd_match").innerHTML = "Password does not match";
        conpwd_match.classList.remove("valid");
        conpwd_match.classList.add("invalid");
        reg_button.disabled = true;
    }
}

function conPasswordValidation(){
    if(password.value == "") {
        document.getElementById("conpasswordHelpBlock").style.display = "none";
    }else{
        document.getElementById("conpasswordHelpBlock").style.display = "block";
    }
    confirmPassword();
}
conpasswordInput.onkeyup = function() {
    confirmPassword();
}

// TO TOP
//Get the button
var mybutton = document.getElementById("toTop");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        mybutton.style.display = "block";
    } else {
        mybutton.style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}