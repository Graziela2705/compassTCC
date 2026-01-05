

document.addEventListener('DOMContentLoaded', function() {
    

    const etapas = document.querySelectorAll('.etapa .ler-mais');
    etapas.forEach(etapa => {
        etapa.addEventListener('click', function() {
            const id = this.getAttribute('onclick').match(/'([^']+)'/)[1];
            const textoCompleto = document.getElementById(id);
            if (textoCompleto.style.display === 'none' || !textoCompleto.style.display) {
                textoCompleto.style.display = 'block';
                this.textContent = 'Ler menos';
            } else {
                textoCompleto.style.display = 'none';
                this.textContent = 'Ler mais';
            }
        });
    });

    // Carrossel
    const carrossel = document.querySelector('.carrossel-etapas');
    const etapasContainer = document.querySelector('.carrossel-container');
    const prevButton = document.querySelector('.carrossel-prev');
    const nextButton = document.querySelector('.carrossel-next');

    let currentSlide = 0;
    const numSlides = 6; // Número total de etapas

    function autoScroll() {
        currentSlide++;
        if (currentSlide >= numSlides) {
            currentSlide = 0;
        }
        const scrollAmount = currentSlide * etapasContainer.clientWidth;
        carrossel.scrollTo({
            left: scrollAmount,
            behavior: 'smooth'
        });
    }

    prevButton.addEventListener('click', function() {
        currentSlide--;
        if (currentSlide < 0) {
            currentSlide = numSlides - 1;
        }
        const scrollAmount = currentSlide * etapasContainer.clientWidth;
        carrossel.scrollTo({
            left: scrollAmount,
            behavior: 'smooth'
        });
    });

    nextButton.addEventListener('click', function() {
        currentSlide++;
        if (currentSlide >= numSlides) {
            currentSlide = 0;
        }
        const scrollAmount = currentSlide * etapasContainer.clientWidth;
        carrossel.scrollTo({
            left: scrollAmount,
            behavior: 'smooth'
        });
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const banners = document.querySelectorAll('.carrossel-banners .banner');
    let currentBanner = 0;

    function showBanner(index) {
        banners.forEach(banner => banner.style.display = 'none');
        banners[index].style.display = 'block';
    }

    function toggleFullscreen() {
        const banner = banners[currentBanner].querySelector('img');
        if (!document.fullscreenElement) {
            banner.requestFullscreen().catch(err => {
                console.log(`Erro ao tentar entrar em modo de tela cheia: ${err.message}`);
            });
        } else {
            document.exitFullscreen();
        }
    }

    const prevButton = document.querySelector('.carrossel-prev-banner');
    const nextButton = document.querySelector('.carrossel-next-banner');

    prevButton.addEventListener('click', function() {
        currentBanner--;
        if (currentBanner < 0) {
            currentBanner = banners.length - 1;
        }
        showBanner(currentBanner);
    });

    nextButton.addEventListener('click', function() {
        currentBanner++;
        if (currentBanner >= banners.length) {
            currentBanner = 0;
        }
        showBanner(currentBanner);
    });

    showBanner(currentBanner);

    // Adiciona evento para o botão de tela cheia
    const fullscreenBtns = document.querySelectorAll('.fullscreen-btn');
    fullscreenBtns.forEach(btn => {
        btn.addEventListener('click', toggleFullscreen);
    });
});





// script.js

// Selecionar os elementos
var modal = document.getElementById("profileModal");
var btn = document.getElementById("profileBtn");
var span = document.getElementsByClassName("close")[0];

// Quando o usuário clicar no botão "Perfil", abrir o modal
btn.onclick = function() {
    modal.style.display = "block";
}

// Quando o usuário clicar no "x", fechar o modal
span.onclick = function() {
    modal.style.display = "none";
}

// Quando o usuário clicar fora do modal, fechar o modal
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}


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


