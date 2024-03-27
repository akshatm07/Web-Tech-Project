document.addEventListener("DOMContentLoaded", function () {
    const loginButton = document.getElementById("btn-login");
    const registerButton = document.getElementById("register-link");
    const loginForm = document.getElementById("login-form");
    const registerForm = document.getElementById("register-form");

    loginButton.addEventListener("click", function () {
        loginForm.style.display = "block";
        registerForm.style.display = "none";
    });

    registerButton.addEventListener("click", function () {
        loginForm.style.display = "none";
        registerForm.style.display = "block";
    });
});





// Login Form Submission
