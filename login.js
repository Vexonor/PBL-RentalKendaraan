

// Slide Login

const container = document.getElementById('container');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');

registerBtn.addEventListener('click', () => {
    container.classList.add("active");
});

loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
});

// Password Login

var password1 = document.getElementById("password1");
var toggler1 = document.getElementById("toggle1-password");



toggler1.addEventListener("click", hideShowPassword1);


function hideShowPassword1(){
  if(password1.type == "password"){
      password1.setAttribute("type", "text")
      toggler1.classList.remove("fa-eye-slash")
      toggler1.classList.add("fa-eye")
  }
  else{
      password1.setAttribute("type", "password")
      toggler1.classList.remove("fa-eye")
      toggler1.classList.add("fa-eye-slash")
  }
}

// Password Daftar

var password = document.getElementById("password");
var toggler = document.getElementById("toggle-password");

toggler.addEventListener("click", hideShowPassword);


function hideShowPassword(){
  if(password.type == "password"){
      password.setAttribute("type", "text")
      toggler.classList.remove("fa-eye-slash")
      toggler.classList.add("fa-eye")
  }
  else{
      password.setAttribute("type", "password")
      toggler.classList.remove("fa-eye")
      toggler.classList.add("fa-eye-slash")
  }
}






