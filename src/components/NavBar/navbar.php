<?php
function renderNavbar()
{
    ?>
    <nav class="navbar">
        <div class="navbar__header">
            <a href="#" class="navbar__logo"><img width="30px" height="30px" src="/public/images/logo.png"
                    alt="Your Logo">FEED BACK SYSTEM</a>
            <p class="details">info@feedbacksystem.com</p>
            <button class="navbar__toggler" id="navbarToggler">
                <span class="navbar__menu-icon">&#9776;</span> <!-- Hamburger icon -->
            </button>

        </div>
        <div class="nav-row">
            <ul class="navbar__menu" id="navbarMenu">
                <li><a href="?page=home" class="navbar__link">Home</a></li>
                <li><a href="?page=department" class="navbar__link">Department</a></li>
                <li><a href="?page=about" class="navbar__link">About</a></li>
                <li><a href="?page=contact" class="navbar__link">Contact</a></li>
                <?php if (isset($_COOKIE['token'])): ?>
                    <li><a href="/?page=feedback" class="navbar__link">Feedback</a></li>
                <?php endif; ?>
                <?php if (isset($_COOKIE['admin_token'])): ?>
                    <li><a href="?page=admin" class="navbar__link">AdminLTE</a></li>
                <?php endif; ?>
            </ul>
            <span class="navbar__user">
                <label class="popup">
                    <input type="checkbox">
                    <div class="burger" tabindex="0">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <nav class="popup-window">
                        <legend>Actions</legend>
                        <ul>
                            <li>
                                <button id="profileBtn">
                                    <svg stroke-linejoin="round" stroke-linecap="round" stroke-width="2"
                                        stroke="currentColor" fill="none" viewBox="0 0 24 24" height="14" width="14"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                        <circle r="4" cy="7" cx="9"></circle>
                                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                    </svg>
                                    <span>Profile</span>
                                </button>
                            </li>
                            <hr>
                            <li>
                                <button id="getRegisteredBtn">
                                    <svg stroke-linejoin="round" stroke-linecap="round" stroke-width="2"
                                        stroke="currentColor" fill="none" viewBox="0 0 24 24" height="14" width="14"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path>
                                        <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path>
                                    </svg>
                                    <span>Get Registered?</span>
                                </button>
                            </li>
                            <li>
                                <button id="alreadyRegisteredBtn">
                                    <svg stroke-linejoin="round" stroke-linecap="round" stroke-width="2"
                                        stroke="currentColor" fill="none" viewBox="0 0 24 24" height="14" width="14"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <polygon points="16 3 21 8 8 21 3 21 3 16 16 3"></polygon>
                                    </svg>
                                    <span>Already Registered?</span>
                                </button>
                            </li>
                            <hr>
                            <?php if (isset($_COOKIE['token'])): ?>
                                <li>
                                    <button id="logoutBtn" onclick="logout()">
                                        <svg width="18px" height="18px" viewBox="0 0 15 15" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M13.5 7.5L10.5 10.75M13.5 7.5L10.5 4.5M13.5 7.5L4 7.5M8 13.5H1.5L1.5 1.5L8 1.5"
                                                stroke="#000000" />
                                        </svg>
                                        <span>Logout</span>
                                    </button>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </nav>
                </label>
            </span>
        </div>
    </nav>
    <?php
}
?>