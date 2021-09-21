import Slide from "./module/slide.js"

const slide = new Slide('.carrosel','.btn', 3000);
slide.init();
//primeiro parametro sãso as imagens o segundo o target, o terceiro o tempo 
//que fica cada imagem

const btnMobile = document.querySelector('[data-btn="mobile"]')
btnMobile.addEventListener('click', showAdminMenu)
const deskTopMainMenu = document.querySelector('.main-menu')

function showAdminMenu(){
    deskTopMainMenu.classList.toggle('show_admin_menu')
}