<?php
session_start();

// Verifique se o usuário comum ou a empresa está logado
$isEmpresa = isset($_SESSION['empresa_nome']);
$isUsuario = isset($_SESSION['nome']);

if ($isEmpresa) {
    $nome = $_SESSION['empresa_nome'];
    $email = $_SESSION['empresa_email'];
    $tipo = "Empresa Ativa";
} elseif ($isUsuario) {
    $nome = $_SESSION['nome'];
    $email = $_SESSION['email'];
    $tipo = "Usuário Ativo";
} else {
    $nome = null;
    $email = null;
    $tipo = null;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> <title>CompassTCC - A Melhor plataforma de TCC</title>
  <meta name="title" content="EduWeb - The Best Program to Enroll for Exchange">
  <meta name="description" content="This is an education html template made by codewithsadee">
  <link rel="shortcut icon" href="./favicon.png" type="image/svg+xml">
  <link rel="stylesheet" href="./assets/css/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;500;600;700;800&family=Poppins:wght@400;500&display=swap"
    rel="stylesheet">
  <link rel="preload" as="image" href="./assets/images/hero-bg.svg">
  <link rel="preload" as="image" href="./assets/images/hero-banner-1.jpg">
  <link rel="preload" as="image" href="./assets/images/hero-banner-2.jpg">
 
  <link rel="preload" as="image" href="./assets/images/hero-shape-2.png">
  <style>
/* Modal */
.modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.5);
}

/* Ajusta a largura do modal */
.modal-content {
    background-color: #fff;
    margin: 10% auto;
    padding: 30px;
    border-radius: 8px;
    width: 60%; /* Reduz a largura para 60% */
    max-width: 400px; /* Limita o tamanho máximo do modal */
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}
.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
}

.close:hover,
.close:focus {
    color: #333;
    text-decoration: none;
}

.profile-header {
    text-align: center;
    margin-bottom: 20px;
}

.profile-title {
    font-size: 24px;
    font-weight: 600;
    color: #333;
}

.orange-line {
    width: 50px;
    height: 2px;
    background-color:#85a7b5; /* Cor laranja */
    margin: 10px auto;
}

.profile-info {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-bottom: 20px;
}

.profile-picture-container {
    position: relative;
    margin-bottom: 20px;
}

/* Diminuir o tamanho do círculo do ícone de perfil */
.profile-picture-label {
    cursor: pointer;
    display: inline-block;
    width: 80px; /* Reduzido de 120px para 80px */
    height: 80px; /* Reduzido de 120px para 80px */
    background-color:hsl(170, 75%, 41%);
    border-radius: 50%;
    overflow: hidden;
    display: flex;
    justify-content: center;
    align-items: center;
    border: 2px solid hsl(170, 75%, 41%);
    position: relative;
}

#profilePictureIcon {
    width: 100%;
    height: 100%;
    color: white;
    object-fit: cover;
}

/* Remover a câmera que aparece no círculo */
.camera-icon {
    display: none;
}


.user-details {
    text-align: left; /* Alinha os textos à esquerda */
    display: flex;
    flex-direction: column;
    align-items: center;
}

.user-status {
    display: flex;
    align-items: center; /* Centraliza verticalmente a bolinha e o texto */
    font-size: 14px;
    color: hsl(170, 75%, 41%);
    font-weight: bold;
    margin-bottom: 5px;
    gap: 5px; /* Adiciona um espaço fixo entre a bolinha e o texto */
}

.status-indicator {
    flex-shrink: 0; /* Garante que o tamanho da bolinha não será alterado */
    width: 10px;
    height: 10px;
    background-color: #4CAF50; /* Indicador de status verde */
    border-radius: 50%; /* Torna a bolinha completamente redonda */
}

.user-name {
    font-size: 18px;
    font-weight: 600;
    color: #333;
    margin-top: 5px;
}

.user-email {
    font-size: 16px;
    color: #777;
}

.separator {
    margin-top: 20px;
    border: 1px solid #ddd;
}

.add-account {
    display: flex;
    justify-content: center;
    align-items: center;
    text-decoration: none;
    color: hsl(170, 75%, 41%) ;
    font-size: 16px;
    margin-top: 20px;
}

.add-icon {
    font-size: 20px;
    margin-right: 10px;
}

/* Estilo para o item dropdown */
.navbar-item.dropdown {
    position: relative;
}


.dropdown-menu {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    background-color: white;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    min-width: 200px;
    list-style: none;
    padding: 10px 0;
    margin: 0;
    z-index: 1000;
}

.navbar-item:hover .dropdown-menu {
    display: block; /* Exibe o menu ao passar o mouse */
}

.dropdown-item {
    padding: 10px;
    text-decoration: none;
    color: #333;
    display: block;
}

.dropdown-item:hover {
    background-color: #f1f1f1; /* Cor ao passar o mouse sobre os itens */
}

.btn-ver {
  background-color: #84868a; /* Cor de fundo laranja */
  border: none;
  color: white;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  cursor: pointer;
  border-radius: 5px;
}

.btn-ver:hover {
  background-color: #535457; /* Cor do botão ao passar o mouse */
}

.card-badge {
  font-weight: bold;
}



    </style> 
</head>
<body id="top">

<header class="header" data-header>
    <div class="container">

      <a href="#" class="logo">
        <img src="./logo1.png" width="190" height="60" alt="EduWeb logo">
      </a>

      <nav class="navbar" data-navbar>

        <div class="wrapper">
          <a href="#" class="logo">
            <img src="./logo.png" width="130" height="50" alt="EduWeb logo">
          </a>

          <button class="nav-close-btn" aria-label="close menu" data-nav-toggler>
            <ion-icon name="close-outline" aria-hidden="true"></ion-icon>
          </button>
        </div>

        <ul class="navbar-list">

          <li class="navbar-item">
            <a href="../../index.php" class="navbar-link" data-nav-link>Início</a>
          </li>

          <li class="navbar-item">
            <a href="#about" class="navbar-link" data-nav-link>Sobre</a>
          </li>

          <li class="navbar-item dropdown">
          <a class="navbar-link" data-nav-link>Conteúdos</a>
    <ul class="dropdown-menu">
        <li><a href="../Manual de elaboraçaõ/index.php" class="dropdown-item">Manual de Elaboração</a></li>
        <li><a href="../Defesa de Tema/index.php" class="dropdown-item">Defesa de Tema</a></li>
        <li><a href="../Cronogramas/index.php" class="dropdown-item">Cronogramas</a></li>
        <li><a href="../Multimídia/index.php" class="dropdown-item">Multimidia</a></li>
        <li><a href="../Referências/index.php" class="dropdown-item">Referências</a></li>
    </ul>
</li>

          <li class="navbar-item">
            <a href="../Cronogramas/index.php" class="navbar-link" data-nav-link>Premium</a>
          </li>
        </ul>

      </nav>

      <div class="header-actions">
    <button class="header-action-btn" aria-label="toggle search" title="Search">
        <ion-icon name="search-outline" aria-hidden="true"></ion-icon>
    </button>
    <a href="#" class="btn has-before" id="profileBtn">
    <span class="span">Perfil Usuário</span>
    <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
</a>

</div>
     <div class="overlay" data-nav-toggler data-overlay></div>
 </div>


   <!-- Modal para exibir os dados do usuário -->
<div id="profileModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        
        <div class="profile-header">
            <h2 class="profile-title">Meu Perfil</h2>
            <hr class="orange-line">
        </div>
        
        <div class="profile-info">
        <div class="profile-picture-container">
    <label for="profilePictureInput" class="profile-picture-label">
        <!-- Substituindo a imagem da foto por um ícone -->
        <ion-icon name="person-circle-outline" id="profilePictureIcon" style="font-size: 50px;"></ion-icon>
    </label>
</div>


<div class="user-details">
    <?php if ($nome) : ?>
        <div class="user-status">
            <span class="status-indicator"></span>
            <?php echo $tipo; ?>
        </div>
        <div class="user-name"><?php echo $nome; ?></div>
        <div class="user-email"><?php echo $email; ?></div>
    <?php else : ?>
        <div class="user-status">Não logado</div>
    <?php endif; ?>
</div>

        </div>
        <hr class="separator">
        <a href="../../Cadastro e Login/index.php" class="add-account">
            <span class="add-icon">+</span>
            <span>Adicionar outra conta</span>
        </a>
    </div>
</div>
</header>

  <main>
    <article>
      <section class="section hero has-bg-image" id="home" aria-label="home"
        style="background-image: url('./assets/images/hero-bg.svg')">
        <div class="container">

          <div class="hero-content">
            <h1 class="h1 section-title">
            Bem-vindo ao<span class="span">CompassTCC</span> , seu guia acadêmico confiável
            </h1>

            <p class="hero-text">
            Encontre recursos completos para sua jornada acadêmica e conquiste seu TCC com sucesso.
            </p>
           
            <a href="#about" class="btn has-before">
              <span class="span">Explorar</span>

              <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
            </a>

          </div>

          <figure class="hero-banner">

            <div class="img-holder one" style="--width: 270; --height: 300;">
              <img src="./assets/images/hero-banner-1.jpg" width="270" height="300" alt="hero banner" class="img-cover">
            </div>

            <div class="img-holder two" style="--width: 240; --height: 370;">
              <img src="./assets/images/hero-banner-2.jpg" width="240" height="370" alt="hero banner" class="img-cover">
            </div>


            <img src="./assets/images/hero-shape-2.png" width="622" height="551" alt="" class="shape hero-shape-2">

          </figure>

        </div>
      </section>

      <div id="content-container">
    <!-- O conteúdo da página será carregado aqui -->
</div>




      <!-- 
        - #CATEGORY
      -->

      <section class="section category" aria-label="category">
        <div class="container">

          <p class="section-subtitle">Acessos Rápidos</p>
        
          <h2 class="h2 section-title">
          Explore Nossos <span class="span">Recursos</span> e Conteúdos Essenciais.
          </h2>

          <p class="section-text">
          Acesse materiais exclusivos para auxiliar no seu TCC e impulsionar seu aprendizado.
          </p>

          <ul class="grid-list">

          <li>
  <div class="category-card" style="--color: 170, 75%, 41%">

    <div class="card-icon">
      <img src="./assets/images/category-1.svg" width="40" height="40" loading="lazy" alt="Online Degree Programs" class="img">
    </div>

    <h3 class="h3">
      <a href="#" class="card-title">Defesa de Tema</a>
    </h3>

    <p class="card-text">
      Dicas práticas para defender seu tema de TCC com sucesso. Prepare-se para sua apresentação.
    </p>
    <!-- Substituímos o <button> por <a> para funcionar como link -->
    
    <a href=" ../Defesa de Tema/index.php" class="btn-ver">Ver</a>

  </div>
</li>


            <li>
              <div class="category-card" style="--color: 351, 83%, 61%">

                <div class="card-icon">
                  <img src="./assets/images/category-2.svg" width="40" height="40" loading="lazy"
                    alt="Non-Degree Programs" class="img">
                </div>

                <h3 class="h3">
                  <a href="#" class="card-title">Elaborar Monografia</a>
                </h3>

                <p class="card-text">
                Introdução ao Manual de Elaboração de TCC. Saiba como começar seu trabalho acadêmico.
                </p>

                <a href="../Manual de elaboraçaõ/index.php" class="btn-ver">Ver</a>

              </div>
            </li>

            <li>
              <div class="category-card" style="--color: 229, 75%, 58%">

                <div class="card-icon">
                  <img src="./assets/images/category-3.svg" width="40" height="40" loading="lazy"
                    alt="Off-Campus Programs" class="img">
                </div>

                <h3 class="h3">
                  <a href="#" class="card-title">Banco de Referencias</a>
                </h3>

                <p class="card-text">
                Passos fundamentais para construir um banco de referências sólido e confiável para seu TCC
                </p>

                 <a href="../Referências/index.php" class="btn-ver">Ver</a>

              </div>
            </li>

            <li>
              <div class="category-card" style="--color: 42, 94%, 55%">

                <div class="card-icon">
                  <img src="./assets/images/category-4.svg" width="40" height="40" loading="lazy"
                    alt="Hybrid Distance Programs" class="img">
                </div>

                <h3 class="h3">
                  <p class="card-title">Multimídia</p>
                </h3>

                <p class="card-text">
                  Vídeos detalhados e bem explicativos para garantir para você um TCC bem estruturado.
                </p>

                <a href="../Multimídia/index.php" class="btn-ver">Ver</a>

              </div>
            </li>

            

          </ul>
          

        </div>
      </section>





      <!-- 
        - #ABOUT
      -->

      <section class="section about" id="about" aria-label="about">
        <div class="container">

          <figure class="about-banner">

            <div class="img-holder" style="--width: 520; --height: 370;">
              <img src="./assets/images/about-banner.jpg" width="520" height="370" loading="lazy" alt="about banner"
                class="img-cover">
            </div>
            <img src="./assets/images/about-shape-3.png" width="722" height="528" loading="lazy" alt=""
              class="shape about-shape-3">

          </figure>

          <div class="about-content">

            <p class="section-subtitle">Sobre Nós</p>

            <h2 class="h2 section-title">
            CompassTCC:<span class="span">Guia completo</span> para seu Sucesso Acadêmico
            </h2>

            <p class="section-text">
            O CompassTCC foi criado para orientar estudantes na conclusão de seus trabalhos acadêmicos. Com recursos práticos, exemplos de monografias, cronogramas e dicas, nosso 
            objetivo é simplificar o processo, ajudando você a alcançar a excelência no seu TCC.
            </p>

            <ul class="about-list">

              <li class="about-item">
                <ion-icon name="checkmark-done-outline" aria-hidden="true"></ion-icon>

                <span class="span">Orientação Especializada para Seu TCC</span>
              </li>

              <li class="about-item">
                <ion-icon name="checkmark-done-outline" aria-hidden="true"></ion-icon>

                <span class="span">Recursos Completos para Estudo</span>
              </li>

              <li class="about-item">
                <ion-icon name="checkmark-done-outline" aria-hidden="true"></ion-icon>

                <span class="span">Acesso Imediato ao Conteúdo</span>
              </li>

            </ul>

            <img src="./assets/images/about-shape-4.svg" width="100" height="100" loading="lazy" alt=""
              class="shape about-shape-4">

          </div>

        </div>
      </section>

    </article>
  </main>
<footer class="footer" style="background-image: url('./assets/images/footer-bg.png')">

    <div class="footer-top section">
      <div class="container grid-list">

        <div class="footer-brand">

          <a href="#" class="logo">
            <img src="./logo1.png" width="162" height="50" alt="EduWeb logo">
          </a>

          <p class="footer-brand-text">
          Somos uma plataforma dedicada a auxiliar estudantes na elaboração de seus Trabalhos de Conclusão de Curso.
          </p>

          <div class="wrapper">
            <span class="span">Telefone</span>

            <a href="tel:+011234567890" class="footer-link">(00) 1234-5678</a>
          </div>

          <div class="wrapper">
            <span class="span">Email:</span>

            <a href="mailto:info@eduweb.com" class="footer-link">compasstcc@gmail.com</a>
          </div>

        </div>

        <ul class="footer-list">

          <li>
            <p class="footer-list-title">Links</p>
          </li>

          <li>
            <a href="#" class="footer-link">Sobre</a>
          </li>

          <li>
            <a href="#" class="footer-link">Monografia</a>
          </li>

          <li>
            <a href="#" class="footer-link">Defesa De Tema</a>
          </li>

          <li>
            <a href="#" class="footer-link">Multimídia</a>
          </li>

          <li>
            <a href="#" class="footer-link">Referências</a>
          </li>

          <li>
            <a href="#" class="footer-link">Cronogramas</a>
          </li>

        </ul>

        <ul class="footer-list">

          <li>
            <p class="footer-list-title">Grupo</p>
          </li>

          <li>
            <a href="#" class="footer-link">Ana Júlia</a>
          </li>

          <li>
            <a href="#" class="footer-link">Ana Eduarda</a>
          </li>

          <li>
            <a href="#" class="footer-link">Graziela</a>
          </li>

          <li>
            <a href="#" class="footer-link">Samara</a>
          </li>

          <li>
            <a href="#" class="footer-link">Daniel</a>
          </li>

          <li>
            <a href="#" class="footer-link">Riam</a>
          </li>

        </ul>

        <div class="footer-list">

          <p class="footer-list-title">Contatos</p>

          <p class="footer-list-text">
          Digite seu endereço de e-mail para se registrar em nosso site
          </p>

          <form action="" class="newsletter-form">
            <input type="email" name="email_address" placeholder="Seu email" required class="input-field">

            <button type="submit" class="btn has-before">
              <span class="span">Escreva-se</span>
            
              <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
            </button>
          </form>

          <ul class="social-list">

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-facebook"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-linkedin"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-instagram"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-twitter"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-youtube"></ion-icon>
              </a>
            </li>

          </ul>

        </div>

      </div>
    </div>

    <div class="footer-bottom">
      <div class="container">

        <p class="copyright">
        Copyright 2024 Todos os direitos reservados por <a href="#" class="copyright-link">compasstcc</a>
        </p>

      </div>
    </div>

  </footer>
<a href="#top" class="back-top-btn" aria-label="back top top" data-back-top-btn>
    <ion-icon name="chevron-up" aria-hidden="true"></ion-icon>
 <script src="./assets/js/script.js" defer></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>