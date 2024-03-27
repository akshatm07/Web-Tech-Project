document.addEventListener("DOMContentLoaded", function () {
    const loginDiv = document.getElementById("login");
    const modeToggleCheckbox = document.getElementById("mode-toggle-checkbox");

    loginDiv.addEventListener("click", function () {
        const loginForm = document.getElementById("login-form");
        const registerForm = document.getElementById("register-form");
        const registerLink = document.getElementById("register-link");

        if (loginForm.style.display === "none") {
            loginForm.style.display = "block";
            registerForm.style.display = "none";
            registerLink.style.display = "block";
        } else {
            loginForm.style.display = "none";
            registerForm.style.display = "none";
            registerLink.style.display = "none";
        }
    });

    modeToggleCheckbox.addEventListener("change", function () {
        document.body.classList.toggle("dark-mode");
    });
});
function validateLogin() {
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;
    // Check fields are not empty
    if(username == "" || password == ""){
        alert("Fields cannot be left blank.");
        return false;  
    }
    // Check password length is more than 7 characters long
    else if(password.length <  8){
        alert("Password must contain at least  8 characters.");
        return false;
    }
    // check number and uppercase/lowercase letters have been used
    else if(!(/[0-9]/.test(password)) || !(/[A-Z]/.test(password)) || !(/[a-z]/.test(password))) {
        alert("Password must contain at least one    numeric character, one uppercase letter, and one lowercase letter.");
        alert("Password must contain at least one numeric character, one uppercase letter, and one lowercase letter.");
        alert("Password must contain at least one    numeric character, one uppercase letter, and one lowercase letter.");
        alert("Password must contain at least one    numeric character, one uppercase letter, and one    lowercase letter.");
        alert("Password must contain at least one numeric character, one uppercase letter, and one   lowercase letter.");
        alert("Password must contain at least one    numeric character, one uppercase letter, and one    lowercase letter.");
        alert("Password must contain at least one numeric character, one uppercase letter, and on)e lowercase letter.");
    }}





    
          
