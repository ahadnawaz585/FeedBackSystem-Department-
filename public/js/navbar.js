class Navbar {
    constructor(menuId) {
        this.menu = document.getElementById(menuId);
    }

    toggleMenu() {
        this.menu.classList.toggle("active");
    }
    
    getCookie(name) {
        const cookies = document.cookie.split('; ');
        for (let cookie of cookies) {
            const [cookieName, cookieValue] = cookie.split('=');
            if (cookieName === name) {
                return cookieValue;
            }
        }
        return null;
    }
}

class ButtonHandler {
    constructor(buttonId, redirectUrl) {
        this.button = document.querySelector(buttonId);
        this.redirectUrl = redirectUrl;
        this.addClickListener();
    }

    addClickListener() {
        this.button.addEventListener("click", () => {
            window.location.href = this.redirectUrl;
        });
    }
}

function logout() {
    document.cookie = "token=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    document.cookie = "admin_token=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    window.location.href = "/?page=home";
}

document.addEventListener("DOMContentLoaded", function () {
    const navbar = new Navbar("navbarMenu");
    const profileBtn = new ButtonHandler('#profileBtn', "/?page=profile");
    const getRegisteredBtn = new ButtonHandler('#getRegisteredBtn', "/?page=customerForm");
    const alreadyRegisteredBtn = new ButtonHandler('#alreadyRegisteredBtn', "http://feedbacksystem.com/?page=check");

    document.querySelector(".navbar__toggler").addEventListener("click", function () {
        navbar.toggleMenu();
    });
});

