const wrapper = document.querySelector('.amigoMuseu-wrapper');
const loginWrapper = document.querySelector('.account-wrapper.login');
const loginButton = document.querySelector('.login-button');

const registerWrapper = document.querySelector('.account-wrapper.register');
const registerButton = document.querySelector('.register-button');

loginWrapper.classList.add('active-wrapper');

registerButton.addEventListener("click", e => {
    loginWrapper.classList.remove('active-wrapper');
    registerWrapper.classList.add('active-wrapper');
})

loginButton.addEventListener("click", e => {
    registerWrapper.classList.remove('active-wrapper');
    loginWrapper.classList.add('active-wrapper');
})