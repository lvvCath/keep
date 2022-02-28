function clearForm() {
    document.getElementById("form").reset();
}
// Password Hide/Unhide
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