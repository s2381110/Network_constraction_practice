const hamburger = document.getElementById('hamburger');
const nav = document.getElementById('nav');

hamburger.addEventListener('click', () => {
  nav.classList.toggle('open'); 
});
function toggleNav() {
  nav.classList.toggle('open');
}