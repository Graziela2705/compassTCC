document.addEventListener("DOMContentLoaded", function() {
    const perfilLink = document.getElementById("perfil-link");
    const visualizarLink = document.getElementById("visualizar-link");
    const adicionarLink = document.getElementById("adicionar-link");

    const perfilSection = document.getElementById("perfil-section");
    const visualizarSection = document.getElementById("visualizar-section");
    const adicionarSection = document.getElementById("adicionar-section");

    perfilLink.addEventListener("click", function() {
        perfilSection.classList.remove("hidden");
        visualizarSection.classList.add("hidden");
        adicionarSection.classList.add("hidden");
    });

    visualizarLink.addEventListener("click", function() {
        visualizarSection.classList.remove("hidden");
        perfilSection.classList.add("hidden");
        adicionarSection.classList.add("hidden");
    });

    adicionarLink.addEventListener("click", function() {
        adicionarSection.classList.remove("hidden");
        perfilSection.classList.add("hidden");
        visualizarSection.classList.add("hidden");
    

        
    });

});

