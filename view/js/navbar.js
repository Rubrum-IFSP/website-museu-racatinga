const menuIcon = document.querySelector('.menu-icon');
const closeNavIcon = document.querySelector('.close-nav-icon');
const navBackground = document.querySelector('.navbar-background');
const navWrapper = document.querySelector('.navbar-options');

menuIcon.addEventListener("click", () => {
    navWrapper.classList.add('active');
    navBackground.classList.add('active');
});

closeNavIcon.addEventListener("click", () => {
    navWrapper.classList.remove('active');
    navBackground.classList.remove('active');
});