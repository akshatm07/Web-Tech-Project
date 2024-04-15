document.addEventListener("DOMContentLoaded", function () {
    const modeToggleCheckbox = document.getElementById("mode-toggle-checkbox");
    const loginDiv = document.getElementById("login");
    const header = document.querySelector("header");
    const footer = document.querySelector("footer");
    const navBar = document.querySelector("nav");
    const container = document.querySelector(".container");
    const sphericalBoxes = document.querySelectorAll(".spherical-box");
    const homeLink = document.getElementById("home-link");
    const loginLink = document.getElementById("login-link");
    const donateButton = document.getElementById('donate-button');
    const suggestionsButton = document.getElementById('suggestions-button');
  // Event listener for home link

     // Handle home link click
    homeLink.addEventListener("click", function() {
        // Navigate to home page
    });

    // Handle login link click
    loginLink.addEventListener("click", function() {
        // Navigate to login page
    });
    donateButton.addEventListener('click', () => {
        window.location.href = 'donate.html';
    });

    suggestionsButton.addEventListener('click', () => {
        window.location.href = 'add_suggestion.html';
    });

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
document.addEventListener("DOMContentLoaded", function () {
    const homeLink = document.getElementById("home-link");

    homeLink.addEventListener("click", function (event) {
        event.preventDefault();  // Prevent the default action of the link
        location.reload();  // Reload the page
    });
    const uploadNotesSubmit = document.querySelector(".upload-notes button");

    uploadNotesSubmit.addEventListener("click", function() {
        window.location.href = "https://drive.google.com/drive/u/0/folders/1stURQwqYcsU9k_LG-Eo1IKKS30ft_Ko6";
    });
    
});








    
          
