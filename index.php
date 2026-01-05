<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CompassTCC - A Melhor plataforma de TCC</title>
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="shortcut icon" href="./img/favicon.png">
</head>
<body>
    <nav class="navbar">
        <div class="logo">CompassTCC</div>
        <ul class="nav-links">
            <li><a href="#top">Início</a></li>
            <li><a href="#recursos">Recursos</a></li>
            <li><a href="#parcerias">Parcerias</a></li>
        </ul>
        <a href="./Cadastro e Login/index.php" class="btn-entrar">Entrar</a>
    </nav>

    <div id="top" class="banner">
        <!-- Apenas a imagem de fundo -->
    </div>  

    <section id="recursos">
        <h1>Recursos que o nosso site oferece</h1>
        <div class="container">
            <div class="recurso">
                <img src="./img/video-aula.png" alt="Ícone 1">
                <h2>Vídeos Explicativos</h2>
                <p>Os melhores vídeos escolhidos especialmente para você.</p>
            </div>
            <div class="recurso">
                <img src="./img/icon2.png" alt="Ícone 2">
                <h2>Manual de Elaboração de Monografia</h2>
                <p>Conteúdo exclusivo para te ajudar na elaboração.</p>
            </div>
            <div class="recurso">
                <img src="./img/icon3.png" alt="Ícone 3">
                <h2>Dicas para defender sua Idéia</h2>
                <p>Dicas e Sugestões para boas idéias de desenvolvimento.</p>
            </div>
            <div class="recurso">
                <img src="./img/icon4.png" alt="Ícone 4">
                <h2>Cronogramas</h2>
                <p>Organização eficiente para um bom desenvolvimento.</p>
            </div>
        </div>
    </section>
    
    <section id="parcerias">
        <div class="banner-parcerias">
            <!-- Imagem de fundo para o banner das Parcerias -->
        </div>
    </section>
    
    <section id="empresas-parceiras">
        <h1>Empresas Parceiras</h1>
        <div class="container">
            <div class="parceiro">
                <img src="./img/log1.png" alt="Parceiro 1">
            </div>
            <div class="parceiro">
                <img src="./img/log2.png" alt="Parceiro 2">
            </div>
            <div class="parceiro">
                <img src="./img/log3.png" alt="Parceiro 3">
            </div>
            <div class="parceiro">
                <img src="./img/log4.png" alt="Parceiro 4">
            </div>
            <div class="parceiro">
                <img src="./img/log5.png" alt="Parceiro 5">
            </div>
        </div>
    </section>

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

    <script src="script.js"></script>
    <script>
        // Função para voltar ao topo da página
        function topFunction() {
            document.body.scrollTop = 0; // Para navegadores da web
            document.documentElement.scrollTop = 0; // Para navegadores móveis
        }
    </script>
</body>
</html>
