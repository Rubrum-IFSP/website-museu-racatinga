const head = document.querySelector('head');
const wrapper = document.querySelector('.amigoMuseu-wrapper');

const loginWrapper = document.querySelector('.account-wrapper.login');
const loginButton = document.querySelector('.login-button');

const registerWrapper = document.querySelector('.account-wrapper.register');
const registerButton = document.querySelector('.register-button');

const openButton = document.querySelector('.open-login-button');
const closeButton = document.querySelector('.close-icon');

loginWrapper.classList.add('active-wrapper');

const css = document.createElement('link');
css.rel = "stylesheet";
css.href = "view/css/loginWrapper.css";
head.appendChild(css);

const closeIcon = document.createElement('link');
closeIcon.rel = "stylesheet";
closeIcon.href = "https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0";
head.appendChild(closeIcon);

registerButton.addEventListener("click", e => {
    loginWrapper.classList.remove('active-wrapper');
    registerWrapper.classList.add('active-wrapper');
})

loginButton.addEventListener("click", e => {
    registerWrapper.classList.remove('active-wrapper');
    loginWrapper.classList.add('active-wrapper');
})

closeButton.addEventListener("click", e => {
    wrapper.classList.remove('active');
});

if ( openButton ) {
    openButton.addEventListener("click", e => {
        wrapper.classList.add('active');
    });
}
