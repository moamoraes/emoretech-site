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

function validacaoEmail(email) {
    user = email.value.substring(0, email.value.indexOf("@"));
    domain = email.value.substring(email.value.indexOf("@")+ 1, email.value.length);
    
    if (!(user.length >=1) ||
        !(domain.length >=3) ||
        !(user.search("@")==-1) ||
        !(domain.search("@")==-1) ||
        !(user.search(" ")==-1) ||
        !(domain.search(" ")==-1) ||
        !(domain.search(".")!=-1) ||
        !(domain.indexOf(".") >=1)||
        !(domain.lastIndexOf(".") < domain.length - 1)) {
        
        document.getElementById("invalid-email").classList.add('show');
    }
    else{
        document.getElementById("invalid-email").classList.remove('show');
    }
}

const handlePhone = (event) => {
    let input = event.target
    input.value = phoneMask(input.value)
}

const phoneMask = (value) => {
    if (!value) return ""
    value = value.replace(/\D/g,'')
    value = value.replace(/(\d{2})(\d)/,"($1) $2")
    value = value.replace(/(\d)(\d{4})$/,"$1-$2")
    return value
}