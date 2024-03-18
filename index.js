let btnMenu = document.getElementById('btn-abrir-menu');
let menu = document.getElementById('menu-mobile');
let overlay = document.getElementById('overlay-menu');

let closeAlert = document.getElementById("close-alert");
let customAlert = document.getElementById("alert");

btnMenu.addEventListener('click', ()=> {
    menu.classList.add('abrir-menu');
})

menu.addEventListener('click', ()=> {
    menu.classList.remove('abrir-menu');
})

overlay.addEventListener('click', ()=> {
    menu.classList.remove('abrir-menu');
})

window.addEventListener('scroll', ()=>{
    let scroll = document.querySelector('.btn-scroll-top a');

    scroll.classList.toggle('active', window.scrollY > 450);
})

closeAlert.addEventListener('click', ()=>{
    customAlert.classList.remove('open');
})