// Sliding menu

const toggleBtn = document.getElementsByClassName('toggle-btn')[0];
const slideNav = document.getElementsByClassName('slide-nav')[0];

toggleBtn.addEventListener('click', function () {
    toggleBtn.classList.toggle('active');
    slideNav.classList.toggle('active');
})