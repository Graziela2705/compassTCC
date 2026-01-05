<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CompassTCC - A Melhor plataforma de TCC</title>
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="shortcut icon" href="./favicon.png">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;500;600;700;800&family=Poppins:wght@400;500&display=swap"rel="stylesheet">

    <style>
 
 :root {
 
 /**
  * colors
  */
 
 --selective-yellow: hsl(42, 94%, 55%);
 --eerie-black-1: hsl(0, 0%, 9%);
 --eerie-black-2: hsl(180, 3%, 7%);
 --quick-silver: hsl(0, 0%, 65%);
 --radical-red: hsl(351, 83%, 61%);
 --light-gray: hsl(0, 0%, 80%);
 --isabelline: hsl(36, 33%, 94%);
 --gray-x-11: hsl(0, 0%, 73%);
 --kappel_15: hsla(170, 75%, 41%, 0.15);
 --platinum: hsl(0, 0%, 90%);
 --gray-web: hsl(0, 0%, 50%);
 --black_80: hsla(0, 0%, 0%, 0.8);
 --white_50: hsla(0, 0%, 100%, 0.5);
 --black_50: hsla(0, 0%, 0%, 0.5);
 --black_30: hsla(0, 0%, 0%, 0.3);
 --kappel: hsl(170, 75%, 41%);
 --white: hsl(0, 0%, 100%);
 
 /**
  * gradient color
  */
 
 --gradient: linear-gradient(-90deg,hsl(151, 58%, 46%) 0%,hsl(170, 75%, 41%) 100%);
 
 /**
  * typography
  */
 
 --ff-league_spartan: 'League Spartan', sans-serif;
 --ff-poppins: 'Poppins', sans-serif; 
 
 --fs-1: 4.2rem;
 --fs-2: 3.2rem;
 --fs-3: 2.3rem;
 --fs-4: 1.8rem;
 --fs-5: 1.5rem;
 --fs-6: 1.4rem;
 --fs-7: 1.3rem;
 
 --fw-500: 500;
 --fw-600: 600;
 
 /**
  * spacing
  */
 
 --section-padding: 75px;
 
 /**
  * shadow
  */
 
 --shadow-1: 0 6px 15px 0 hsla(0, 0%, 0%, 0.05);
 --shadow-2: 0 10px 30px hsla(0, 0%, 0%, 0.06);
 --shadow-3: 0 10px 50px 0 hsla(220, 53%, 22%, 0.1);
 
 /**
  * radius
  */
 
 --radius-pill: 500px;
 --radius-circle: 50%;
 --radius-3: 3px;
 --radius-5: 5px;
 --radius-10: 10px;
 
 /**
  * transition
  */
 
 --transition-1: 0.25s ease;
 --transition-2: 0.5s ease;
 --cubic-in: cubic-bezier(0.51, 0.03, 0.64, 0.28);
 --cubic-out: cubic-bezier(0.33, 0.85, 0.4, 0.96);
 
 }
 
 
 
 
 
 /*-----------------------------------*\
 #RESET
 \*-----------------------------------*/
 
 *,
 *::before,
 *::after {
 margin: 0;
 padding: 0;
 box-sizing: border-box;
 }
 
 li { list-style: none; }
 
 a,
 img,
 span,
 data,
 input,
 button,
 ion-icon { display: block; }
 
 a {
 color: inherit;
 text-decoration: none;
 }
 
 img { height: auto; }
 
 input,
 button {
 background: none;
 border: none;
 font: inherit;
 }
 
 input { width: 100%; }
 
 button { cursor: pointer; }
 
 ion-icon { pointer-events: none; }
 
 address { font-style: normal; }
 
 html {
 font-family: var(--ff-poppins);
 font-size: 10px;
 scroll-behavior: smooth;
 }
 
 body {
 background-color:#f0f0f0;
 color: var(--gray-web);
 font-size: 1.6rem;
 line-height: 1.75;
 }
 
 :focus-visible { outline-offset: 4px; }
 
 ::-webkit-scrollbar { width: 10px; }
 
 ::-webkit-scrollbar-track { background-color: hsl(0, 0%, 98%); }
 
 ::-webkit-scrollbar-thumb { background-color: hsl(0, 0%, 80%); }
 
 ::-webkit-scrollbar-thumb:hover { background-color: hsl(0, 0%, 70%); }
 
 
 
 
 
 /*-----------------------------------*\
 #REUSED STYLE
 \*-----------------------------------*/
 
 .container { padding-inline: 15px; }
 
 .section { padding-block: var(--section-padding); }
 
 .shape {
 position: absolute;
 display: none;
 }
 
 .has-bg-image {
 background-repeat: no-repeat;
 background-size: cover;
 background-position: center;
 }
 
 .h1,
 .h2,
 .h3 {
 color: var(--eerie-black-1);
 font-family: var(--ff-league_spartan);
 line-height: 1;
 }
 
 .h1,
 .h2 { font-weight: var(--fw-600); }
 
 .h1 { font-size: var(--fs-1); }
 
 .h2 { font-size: var(--fs-2); }
 
 .h3 {
 font-size: var(--fs-3);
 font-weight: var(--fw-500);
 }
 
 .section-title {
 --color: var(--radical-red);
 text-align: center;
 }
 
 .section-title .span {
 display: inline-block;
 color: var(--color);
 }
 
 .btn {
 background-color: var(--kappel);
 color: var(--white);
 font-family: var(--ff-league_spartan);
 font-size: var(--fs-4);
 display: flex;
 align-items: center;
 gap: 7px;
 max-width: max-content;
 padding: 10px 20px;
 border-radius: var(--radius-5);
 overflow: hidden;
 }
 
 .has-before,
 .has-after {
 position: relative;
 z-index: 1;
 }
 
 
 
 
 
 .close:hover,
 .close:focus {
 color: black;
 text-decoration: none;
 cursor: pointer;
 }
 
 .has-before::before,
 .has-after::after {
 position: absolute;
 content: "";
 }
 
 .btn::before {
 inset: 0;
 background-image: var(--gradient);
 z-index: -1;
 border-radius: inherit;
 transform: translateX(-100%);
 transition: var(--transition-2);
 }
 
 .btn:is(:hover, :focus)::before { transform: translateX(0); }
 
 .img-holder {
 aspect-ratio: var(--width) / var(--height);
 background-color: var(--light-gray);
 overflow: hidden;
 }
 
 .img-cover {
 width: 100%;
 height: 100%;
 object-fit: cover;
 }
 
 .section-subtitle {
 font-size: var(--fs-5);
 text-transform: uppercase;
 font-weight: var(--fw-500);
 letter-spacing: 1px;
 text-align: center;
 margin-block-end: 15px;
 }
 
 .section-text {
 font-size: var(--fs-5);
 text-align: center;
 margin-block: 15px 25px;
 }
 
 .grid-list {
 display: grid;
 gap: 30px;
 }
 
 .category-card,
 .stats-card { background-color: hsla(var(--color), 0.1); }
 
 :is(.course, .blog) .section-title { margin-block-end: 40px; }
 
 
 
 
 
 /*-----------------------------------*\
 #HEADER
 \*-----------------------------------*/
 
 .header .btn { display: none; }
 
 .header {
 position: absolute;
 top: 0;
 left: 0;
 width: 100%;
 background-color: var(--white);
 padding-block: 12px;
 box-shadow: var(--shadow-1);
 z-index: 4;
 }
 
 .header.active { position: fixed; }
 
 .header .container,
 .header-actions,
 .navbar .wrapper {
 display: flex;
 justify-content: space-between;
 align-items: center;
 gap: 15px;
 }
 
 .header-action-btn,
 .nav-close-btn {
 position: relative;
 color: var(--eerie-black-1);
 font-size: 24px;
 transition: var(--transition-1);
 }
 
 .header-action-btn:is(:hover, :focus) { color: var(--kappel); }
 
 .header-action-btn .btn-badge {
 position: absolute;
 top: -10px;
 right: -10px;
 background-color: var(--kappel);
 color: var(--white);
 font-family: var(--ff-league_spartan);
 font-size: var(--fs-6);
 min-width: 20px;
 height: 20px;
 border-radius: var(--radius-circle);
 }
 
 .navbar {
 position: fixed;
 top: 0;
 left: -320px;
 background-color: var(--white);
 width: 100%;
 max-width: 320px;
 height: 100%;
 z-index: 2;
 transition: 0.25s var(--cubic-in);
 }
 
 .navbar.active {
 transform: translateX(320px);
 transition: 0.5s var(--cubic-out);
 }
 
 .navbar .wrapper {
 padding: 15px 20px;
 border-block-end: 1px solid var(--platinum);
 }
 
 .nav-close-btn {
 background-color: var(--white);
 box-shadow: var(--shadow-2);
 padding: 8px;
 border-radius: var(--radius-circle);
 }
 
 .nav-close-btn:is(:hover, :focus) {
 background-color: var(--kappel);
 color: var(--white);
 }
 
 .navbar-list { padding: 15px 20px; }
 
 .navbar-item:not(:last-child) { border-block-end: 1px solid var(--platinum); }
 
 .navbar-link {
 padding-block: 8px;
 font-weight: var(--fw-500);
 transition: var(--transition-1);
 }
 
 .navbar-link:is(:hover, :focus) { color: var(--kappel); }
 
 .overlay {
 position: fixed;
 inset: 0;
 background-color: var(--black_80);
 pointer-events: none;
 opacity: 0;
 z-index: 1;
 transition: var(--transition-1);
 }
 
 .overlay.active {
 opacity: 1;
 pointer-events: all;
 }
 
 
 
 
 
 
 
 
 
 
 /*-----------------------------------*\
   #MEDIA QUERIES
 \*-----------------------------------*/
 
 /**
  * responsive for large than 575px screen
  */
 
 @media (min-width: 575px) {
 
   /**
    * REUSED STYLE
    */
 
   .container {
     max-width: 520px;
     width: 100%;
     margin-inline: auto;
   }
 
   .grid-list { grid-template-columns: 1fr 1fr; }
 
   :is(.course, .blog) .grid-list { grid-template-columns: 1fr; }
 
 
 
   /**
    * HEADER
    */
 
   .header .container { max-width: unset; }
 
   .header-actions { gap: 30px; }
 
 
 
 }
   /**
    * HEADER
    */
 
   .header .container { padding-inline: 30px; }
 
   .header .btn {
     display: flex;
     padding: 10px 30px;
     margin-inline: 20px;
   }
 
   /**
    * ABOUT
    */
 
   .about { padding-block-start: 50px; }
 
   .about-banner {
     padding: 60px;
     padding-inline-end: 0;
   }
 
   .about-banner .img-holder {
     max-width: max-content;
     margin-inline: auto;
   }
 
   
 
 
 
   /**
    * FOOTER
    */
 
   .footer-brand,
   .footer-list:last-child { grid-column: auto; }
 
   .newsletter-form .btn { padding-block: 10px; }
 
 
 
 
 
 
 /**
  * responsive for large than 992px screen
  */
 
 @media (min-width: 992px) {
 
   /**
    * CUSTOM PROPERTY
    */
 
   :root {
 
     /**
      * typography
      */
 
     --fs-1: 5.5rem;
     --fs-2: 4.5rem;
 
   }
 
 
 
   /**
    * REUSED STYLE
    */
 
   .container { max-width: 960px; }
 
   .grid-list { grid-template-columns: repeat(4, 1fr); }
 
   :is(.course, .blog) .grid-list { grid-template-columns: repeat(3, 1fr); }
 
 
 
   /**
    * HERO
    */
 
   .hero .container {
     grid-template-columns: 1fr 1fr;
     align-items: center;
   }
 
   .hero .section-title,
   .hero-text { text-align: left; }
 
   .hero .btn { margin-inline: 0; }
 
 
 
   /**
    * ABOUT
    */
 
   .about .container {
     grid-template-columns: 1fr 0.6fr;
     align-items: center;
     gap: 60px;
   }
 
 
 
   /**
    * VIDEO
    */
 
   .video-banner {
     max-width: 75%;
     margin-inline: auto;
   }
 
 
 
   /**
    * FOOTER
    */
 
   .footer .grid-list { grid-template-columns: 1fr 0.6fr 0.6fr 1.2fr; }
 
 }
 
 
 
 
 
 /**
  * responsive for large than 1200px screen
  */
 
 @media (min-width: 1200px) {
 
   /**
    * CUSTOM PROPERTY
    */
 
   :root {
 
     /**
      * typography
      */
 
     --fs-1: 6.5rem;
 
     /**
      * spacing
      */
 
     --section-padding: 120px;
 
   }
 
 
 
   /**
    * REUSED STYLE
    */
 
   .container { max-width: 1185px; }
 
   .shape { display: block; }
 
   .about-content,
   .video-card,
   .blog { position: relative; }
 
 
 
   /**
    * HEADER
    */
 
   .header-action-btn:last-child,
   .navbar .wrapper,
   .overlay { display: none; }
 
   .header.active {
     transform: translateY(-100%);
     animation: slideIn 0.5s ease forwards;
   }
 
   @keyframes slideIn {
     0% { transform: translateY(-100%); }
     100% { transform: translateY(0); }
   }
 
   .navbar,
   .navbar.active { all: unset; }
 
   .navbar-list {
     display: flex;
     gap: 50px;
     padding: 0;
   }
 
   .navbar-item:not(:last-child) { border-block-end: none; }
 
   .navbar-link {
     color: var(--eerie-black-1);
     padding-block: 20px;
   }
 
   .header .btn { margin-inline-end: 0; }
   
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
 
 
     </style> 
</head>
<body>


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
            <a href="../Boas Vindas/index.php" class="navbar-link" data-nav-link>Sobre</a>
          </li>

          <li class="navbar-item dropdown">
          <a class="navbar-link" data-nav-link>Conteúdos</a>
    <ul class="dropdown-menu">
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
    <a href="../../Cadastro e Login/index.php" class="btn has-before" id="profileBtn">
    <span class="span">Log-out</span>
    <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
</a>

</div>
     <div class="overlay" data-nav-toggler data-overlay></div>
 </div>


   
</header>
    

    <!-- Mini Banner -->
    <div class="mini-banner">
        <img src="./img/banner.png" alt="Banner Image">
    </div>

    <!-- Título "Etapas" -->
    <div class="etapas">
        <h2>Etapas</h2>
    </div>

    <!-- Carrossel de Etapas -->
    <div class="carrossel-container">
        <button class="carrossel-prev">&lt;</button>
        <div class="carrossel-etapas">

            <?php
            // Conexão com o banco de dados
            include('db_connect.php');

            // Consulta para obter as etapas
            $sql = "SELECT * FROM etapas_manual ORDER BY id ASC";
            $result = mysqli_query($conn, $sql);

            // Verifique se há resultados
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="etapa">';
                    echo '<img src="../../Dashboard Do Admin/uploads/' . $row['imagem'] . '" alt="Etapa ' . $row['id'] . '">';
                    echo '<h3>'  . $row['titulo'] . '</h3>';
                    echo '<p>' . substr($row['descricao'], 0, 100) . '...</p>';
                    echo '<span class="ler-mais" onclick="toggleText(\'texto-completo' . $row['id'] . '\')">Ler mais</span>';
                    echo '<p class="texto-completo" id="texto-completo' . $row['id'] . '">' . $row['descricao'] . '</p>';
                    echo '</div>';
                }
            } else {
                echo "Nenhuma etapa encontrada.";
            }
            ?>

        </div>
        <button class="carrossel-next">&gt;</button>
    </div>

    <div class="video-title">Vídeos explicativos</div>
<div class="video-boxes">
    <?php
    // Conexão com o banco de dados
    include('db_connect.php');

    // Consulta para obter os vídeos
    $sql = "SELECT * FROM videos_manual ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);

    // Verifique se há vídeos
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="video-box">';
            echo '<img src="../../Dashboard Do Admin/uploads/' . $row['imagem'] . '" alt="Ícone do vídeo">';
            echo '<h3>' . $row['titulo'] . '</h3>';
            echo '<h4>' . $row['subtitulo'] . '</h4>';
            echo '<p>' . substr($row['descricao'], 0, 100) . '</p>';
            echo '<a href="' . $row['url'] . '" class="assistir-btn" target="_blank">Assistir</a>';
            echo '</div>';
        }
    } else {
        echo '<p>Nenhum vídeo encontrado.</p>';
    }
    ?>
</div>


   <!-- Exibição de Mapas Mentais -->
<div class="carrossel-banners">
    <button class="carrossel-prev-banner">&lt;</button>
    <?php
    // Consulta para obter os mapas mentais
    $sql = "SELECT * FROM mapas_mentais_manual ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="banner">';
            echo '<h2 class="banner-title">Mapas Mentais</h2>';
            echo '<img src="../../Dashboard Do Admin/uploads/' . $row['imagem'] . '" alt="Mapa Mental">';
            echo '<button class="fullscreen-btn">&#128269;</button>';
            echo '</div>';
        }
    } else {
        echo "Nenhum mapa mental encontrado.";
    }
    ?>
    <button class="carrossel-next-banner">&gt;</button>
</div>


   

    <!-- Rodapé -->
    <footer>
        <div class="footer-column">
            <h3>Sobre Nós</h3>
            <p>Somos uma plataforma dedicada a auxiliar estudantes na elaboração de seus Trabalhos de Conclusão de Curso.</p>
            <div class="info">
                <img src="./img/local.png" alt="Ícone de Localização">
                <p>Rua Tal, 1234, Cidade - Estado</p>
            </div>
            <div class="info">
                <img src="./img/tell.png" alt="Ícone de Telefone">
                <p>(00) 1234-5678</p>
            </div>
        </div>
        <div class="footer-column">
            <h3>Grupo</h3>
             <ul>
                <li>Ana Júlia</li>
                <li>Ana Eduarda</li>
                <li>Daniel</li>
                <li>Graziela</li>
                <li>Samara</li>
                <li>Riam</li>
            </ul>
        </div>
        <div class="footer-column">
            <h3>Recursos</h3>
            <ul>
                <li>Vídeos Explicativos</li>
                <li>Manual de Elaboração de Monografia</li>
                <li>Dicas para defender sua Ideia</li>
                <li>Cronogramas</li>
                <li>Banco de Referências</li>
            </ul>
        </div>
        <div class="footer-column">
            <h3>Redes Sociais</h3>
            <div class="social-icons">
                <img src="./img/twitter.png" alt="Ícone do Facebook">
                <img src="./img/instagram.png" alt="Ícone do Twitter">
                <img src="./img/facebook.png" alt="Ícone do Instagram">
                <img src="./img/youtube.png" alt="Ícone do LinkedIn">
            </div>
            <button onclick="topFunction()" id="btnVoltarTopo" title="Voltar ao Topo">▲</button>
        </div>
    </footer>

    <script src="./js/script.js"></script>
</body>
</html>