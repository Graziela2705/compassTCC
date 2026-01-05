'use strict';

const profileBtn = document.querySelector('#profileBtn'); // Botão do perfil
const profileModal = document.getElementById('profileModal'); // Modal de perfil
const closeBtn = document.querySelector('.close'); // Botão para fechar o modal

// Função para abrir o modal
const openProfileModal = function (event) {
    event.preventDefault(); // Impede comportamento padrão do link
    profileModal.style.display = 'block';
};

// Função para fechar o modal
const closeProfileModal = function () {
    profileModal.style.display = 'none';
};

// Ação de abrir o modal ao clicar no botão de perfil
profileBtn.addEventListener('click', openProfileModal);

// Ação de fechar o modal ao clicar no botão de fechar
closeBtn.addEventListener('click', closeProfileModal);

// Fechar o modal se clicar fora dele
window.addEventListener('click', function (event) {
    if (event.target === profileModal) {
        closeProfileModal();
    }
});
// Dropdown de Conteúdos
const dropdown = document.querySelector('.navbar-item.dropdown');
const dropdownMenu = dropdown.querySelector('.dropdown-menu');

// Exibe o menu dropdown ao clicar, sem impedir a navegação
dropdown.addEventListener('click', function (event) {
    const target = event.target;

    // Verifica se o clique foi em um link dentro do menu
    if (target.tagName === 'A' && target.classList.contains('dropdown-item')) {
        return; // Permite a navegação normal do link
    }

    // Caso contrário, apenas exibe/oculta o menu
    dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
});

// Fecha o dropdown se o usuário clicar fora dele
window.addEventListener('click', function(event) {
    if (!dropdown.contains(event.target)) {
        dropdownMenu.style.display = 'none';
    }
});




/**
 * add event on element
 */

const addEventOnElem = function (elem, type, callback) {
  if (elem.length > 1) {
    for (let i = 0; i < elem.length; i++) {
      elem[i].addEventListener(type, callback);
    }
  } else {
    elem.addEventListener(type, callback);
  }
}



/**
 * navbar toggle
 */

const navbar = document.querySelector("[data-navbar]");
const navTogglers = document.querySelectorAll("[data-nav-toggler]");
const navLinks = document.querySelectorAll("[data-nav-link]");
const overlay = document.querySelector("[data-overlay]");

const toggleNavbar = function () {
  navbar.classList.toggle("active");
  overlay.classList.toggle("active");
}

addEventOnElem(navTogglers, "click", toggleNavbar);

const closeNavbar = function () {
  navbar.classList.remove("active");
  overlay.classList.remove("active");
}

addEventOnElem(navLinks, "click", closeNavbar);



/**
 * header active when scroll down to 100px
 */

const header = document.querySelector("[data-header]");
const backTopBtn = document.querySelector("[data-back-top-btn]");

const activeElem = function () {
  if (window.scrollY > 100) {
    header.classList.add("active");
    backTopBtn.classList.add("active");
  } else {
    header.classList.remove("active");
    backTopBtn.classList.remove("active");
  }
}

addEventOnElem(window, "scroll", activeElem);