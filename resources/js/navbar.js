const navbar = document.querySelector('nav')
const mobileNav = navbar.querySelector('.mobile-nav')
const body = document.querySelector('body')

const navOpenButton = document.querySelector('#nav-open')
const navCloseButton = document.querySelector('#nav-close')

navOpenButton.addEventListener('click', ()=>{
    mobileNav.classList.remove('d-none')
    body.classList.add('overflow-y-h')
    window.setTimeout(()=>mobileNav.classList.add('active'),10)
})

navCloseButton.addEventListener('click', ()=>{
    mobileNav.classList.remove('active')
    body.classList.remove('overflow-y-h')
    window.setTimeout(()=>mobileNav.classList.add('d-none'),400)
})


var prevScrollpos = window.pageYOffset;
window.onscroll = function() {
var currentScrollPos = window.pageYOffset;
  if (prevScrollpos > currentScrollPos) {
    navbar.style.top = "0";
  } else {
    navbar.style.top = "-108px";
  }
  prevScrollpos = currentScrollPos;
}