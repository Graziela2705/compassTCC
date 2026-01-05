<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-CompassTCC - A Melhor plataforma de TCC</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="shortcut icon" href="./img/favicon.png">
    <link rel="shortcut icon" href="img/favicon.png">
</head>

<body>
    <div class="dashboard-container">
        <!-- Menu Lateral -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <h1>Admin Dashboard</h1>
            </div>
            <nav class="sidebar-menu">
                <ul>
                    <li class="menu-item">
                        <a href="#">
                        <img src="./img/user.png" alt="Usuário" class="icon">
                        Usuário
                        </a>
                        <ul class="submenu">
                            <li><a href="gerenciar_usuarios.php">Gerenciar Usuários</a></li>
                        </ul>
                    </li>
                    <li class="menu-item">
                        <a href="#">
                        <img src="./img/emp.png" alt="Empresas" class="icon">
                        Empresas
                        </a>
                        <ul class="submenu">
                            <li><a href="javascript:void(0);" id="gerenciar-empresas">Gerenciar Empresas</a></li>
                        </ul>
                    </li>
                    <li class="menu-item">
                        <a href="#">
                        <img src="./img/cont.png" alt="Conteúdos" class="icon">
                        Conteúdos
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="#">Defesa de Tema</a>
                                <ul class="sub-submenu">
                                    <li><a href="#">Visualizar</a></li>
                                    <li><a href="#" id="adicionar-defesa">Adicionar</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Manual de Elaboração</a>
                                <ul class="sub-submenu">
                                    <li><a href="#">Visualizar</a></li>
                                    <li><a href="#" id="adicionar-manual">Adicionar</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Multimídia</a>
                                <ul class="sub-submenu">
                                    <li><a href="#">Visualizar</a></li>
                                    <li><a href="#">Adicionar</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </aside>
        <!-- Conteúdo Principal -->
        <main class="main-content">
            <div class="header">
                <h1>Bem-vindo, Admin</h1>
            </div>
            <div class="content">
                <p>Selecione uma opção no menu para começar.</p>
                <div id="conteudo-dinamico">
                    
                </div>     
            </div>
        </main>
    </div>
    <script>
document.addEventListener('DOMContentLoaded', function() {
    var conteudoDinamico = document.getElementById('conteudo-dinamico');

    function carregarConteudo(url) {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', url, true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                conteudoDinamico.innerHTML = xhr.responseText;
            } else {
                console.error('Erro ao carregar o conteúdo');
            }
        };
        xhr.send();
    }

    // Carregar formulário de edição
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('edit-button')) {
            var empresaId = e.target.getAttribute('data-id');
            carregarConteudo('editar_empresa.php?id=' + empresaId);
        }
    });

    // Confirmar e processar exclusão
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-button')) {
            var empresaId = e.target.getAttribute('data-id');
            if (confirm('Você realmente deseja remover esta empresa?')) {
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'processar_remocao_empresa.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        carregarConteudo('gerenciar_empresas.php'); // Recarregar a lista de empresas
                    } else {
                        console.error('Erro ao excluir a empresa');
                    }
                };
                xhr.send('id=' + empresaId);
            }
        }
    });
});

document.addEventListener('DOMContentLoaded', function() {
        var conteudoDinamico = document.getElementById('conteudo-dinamico');

        function carregarConteudo(url) {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', url, true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    conteudoDinamico.innerHTML = xhr.responseText;

                    // Após carregar o conteúdo, inicializar a funcionalidade de pesquisa
                    inicializarPesquisa();
                } else {
                    console.error('Erro ao carregar o conteúdo');
                }
            };
            xhr.send();
        }

        function inicializarPesquisa() {
    // Captura o formulário de pesquisa, se estiver presente
    const searchForm = document.getElementById('search-form');
    if (searchForm) {
        searchForm.addEventListener('submit', function(e) {
            e.preventDefault(); // Evita o envio padrão do formulário

            var searchTerm = searchForm.querySelector('input[name="search"]').value;
            carregarConteudo('gerenciar_usuarios.php?search=' + encodeURIComponent(searchTerm));
        });
    } else {
        console.warn("O formulário de pesquisa não está disponível.");
    }

    // Adicionar listeners aos botões de editar, se existirem
    document.querySelectorAll('.edit-button').forEach(function(button) {
        button.addEventListener('click', function() {
            var userId = this.getAttribute('data-id');
            carregarConteudo('editar_usuario.php?id=' + userId); // Carregar o formulário no conteúdo dinâmico
        });
    })

    

    // Captura e escuta o formulário de edição dinamicamente carregado
    const dynamicForm = document.querySelector('#conteudo-dinamico form');
    if (dynamicForm) {
        dynamicForm.addEventListener('submit', function(e) {
            e.preventDefault(); // Prevenir o envio normal do formulário

            var formData = new FormData(this);
            var xhr = new XMLHttpRequest();
            xhr.open('POST', this.action, true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    document.getElementById('conteudo-dinamico').innerHTML = xhr.responseText;
                    inicializarPesquisa(); // Re-inicializar a pesquisa
                } else {
                    console.error('Erro ao salvar as alterações');
                }
            };
            xhr.send(formData);
        });
    } else {
        console.warn("O formulário de edição não está disponível.");
    }

    // Adicionar listeners aos botões de remover, se existirem
    document.querySelectorAll('.remove-button').forEach(function(button) {
        button.addEventListener('click', function() {
            var userId = this.getAttribute('data-id');

            if (confirm('Você realmente deseja remover este usuário?')) {
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'processar_exclusao_usuario.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        document.getElementById('conteudo-dinamico').innerHTML = xhr.responseText;
                        inicializarPesquisa(); // Re-inicializar a pesquisa
                    } else {
                        console.error('Erro ao carregar o conteúdo');
                    }
                };
                xhr.send('user_id=' + userId);
            }
        });
    });
}


        // Event listener para "Gerenciar Empresas"
        document.getElementById('gerenciar-empresas').addEventListener('click', function() {
            carregarConteudo('gerenciar_empresas.php');
        });

        // Event listener para "Gerenciar Usuários"
        document.querySelector('a[href="gerenciar_usuarios.php"]').addEventListener('click', function(e) {
            e.preventDefault();
            carregarConteudo('gerenciar_usuarios.php');
        });


        
        // Links de adicionar
    document.querySelectorAll('.sub-submenu li a').forEach(function(link) {
        link.addEventListener('click', function(e) {
            e.preventDefault(); // Previne o comportamento padrão
            var parentText = this.closest('ul').previousElementSibling.textContent;
            if (this.textContent.includes('Adicionar')) {
                if (parentText.includes('Defesa de Tema')) {
                    carregarConteudo('adicionar_defesa.php');
                } else if (parentText.includes('Manual de Elaboração')) {
                    carregarConteudo('adicionar_manual.php');
                } else if (parentText.includes('Multimídia')) {
                    carregarConteudo('adicionar_multimidia.php'); // Carrega o formulário de adicionar multimídia
                }
            } else if (this.textContent.includes('Visualizar')) {
                if (parentText.includes('Defesa de Tema')) {
                    carregarConteudo('visualizar_defesa.php');
                } else if (parentText.includes('Manual de Elaboração')) {
                    carregarConteudo('visualizar_manual.php');
                } else if (parentText.includes('Multimídia')) {
                    carregarConteudo('visualizar_multimidia.php');
                }
            }
        });
    });
});


    document.addEventListener('DOMContentLoaded', function() {
        var conteudoDinamico = document.getElementById('conteudo-dinamico');

        function carregarConteudo(url) {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', url, true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    conteudoDinamico.innerHTML = xhr.responseText;
                    inicializarPesquisaEmpresas();
                } else {
                    console.error('Erro ao carregar o conteúdo');
                }
            };
            xhr.send();
        }

        function inicializarPesquisaEmpresas() {
            const searchForm = document.getElementById('search-form');
            if (searchForm) {
                searchForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    var searchTerm = searchForm.querySelector('input[name="search"]').value;
                    carregarConteudo('gerenciar_empresas.php?search=' + encodeURIComponent(searchTerm));
                });
            }
        }

        document.getElementById('gerenciar-empresas').addEventListener('click', function() {
            carregarConteudo('gerenciar_empresas.php');
        });
    });

    
// Adicionar listeners aos botões de editar, se existirem
document.querySelectorAll('.edit-button').forEach(function(button) {
        button.addEventListener('click', function() {
            var userId = this.getAttribute('data-id');
            carregarConteudo('../Conteúdos/Multimídia/editar_video_multimidia.php?id=' + userId); // Carregar o formulário no conteúdo dinâmico
        });
    });
 

    

</script>

</body>
</html>

