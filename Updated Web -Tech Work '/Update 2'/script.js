document.addEventListener("DOMContentLoaded", function () {
    const modeToggleCheckbox = document.getElementById("mode-toggle-checkbox");
    const loginDiv = document.getElementById("login");
    const header = document.querySelector("header");
    const footer = document.querySelector("footer");
    const navBar = document.querySelector("nav");
    const container = document.querySelector(".container");
    const sphericalBoxes = document.querySelectorAll(".spherical-box");

    // Event listener for dark mode toggle checkbox
    modeToggleCheckbox.addEventListener("change", function () {
        document.body.classList.toggle("dark-mode");
        header.classList.toggle("dark-mode");
        footer.classList.toggle("dark-mode");
        navBar.classList.toggle("dark-mode");
        container.classList.toggle("dark-mode");
        sphericalBoxes.forEach(box => {
            box.classList.toggle("dark-mode");
        });
    });

    // Event listener for login button
    loginDiv.addEventListener("click", function () {
        const loginForm = document.getElementById("login-form");
        const registerForm = document.getElementById("register-form");
        const registerLink = document.getElementById("register-link");

        loginForm.style.display = loginForm.style.display === "none" ? "block" : "none";
        registerForm.style.display = "none";
        registerLink.style.display = loginForm.style.display === "none" ? "block" : "none";
    });
});



function validateLogin() {
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;

    if (username.trim() === "" || password.trim() === "") {
        alert("Fields cannot be left blank.");
        return false;
    }

    if (password.length < 8) {
        alert("Password must contain at least 8 characters.");
        return false;
    }

    if (!/\d/.test(password) || !/[A-Z]/.test(password) || !/[a-z]/.test(password)) {
        alert("Password must contain at least one numeric character, one uppercase letter, and one lowercase letter.");
        return false;
    }

    return true;
}







    
          
