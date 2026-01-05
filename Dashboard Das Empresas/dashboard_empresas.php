
<?php
// Inicia a sessão para acessar as variáveis de sessão
session_start();

// Conexão com o banco de dados
include('db_connect.php');

// Verifique se a empresa está logada, se não, redireciona para a página de login
if (!isset($_SESSION['empresa_id'])) {
    header("Location: login.php");
    exit();
}

// Obtenha o id da empresa logada
$empresa_id = $_SESSION['empresa_id']; // Isso deve ser configurado no processo de login

// Consulta SQL para pegar os dados da empresa logada
$sql = "SELECT nome, email, acesso_concedido FROM empresas WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $empresa_id); // "i" é para integer
$stmt->execute();
$result = $stmt->get_result();

// Verifica se a consulta retornou dados
if ($result->num_rows > 0) {
    $empresa = $result->fetch_assoc(); // Pegue os dados da empresa
    $nome = $empresa['nome'];
    $email = $empresa['email'];
    $acesso_concedido = $empresa['acesso_concedido'] ? "Sim" : "Não";
} else {
    echo "Erro ao carregar os dados da empresa.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
     <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styles.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Dashboard -Empresas</title>
    <link rel="shortcut icon" href="favicon.png">
</head>
<body>
<div class="dashboard-container">

        <!-- Menu Lateral -->
        <nav class="sidebar">
        <div class="logo-name">
            <!-- Título no topo do menu -->
            <h1 style="text-align: center; font-family: 'Merriweather', serif; font-size: 24px; color: #1ab79d;">CompassTCC</h1>
            
        </div>
        <ul>
            <li><a href="#" id="perfil-link">
                <i class='bx bx-home-alt-2'></i>
                <span class="link-name">Perfil</span>
            </a></li>
            
            <li><a href="#" id="visualizar-link">
                <i class='bx bxs-bar-chart-alt-2'></i>
                <span class="link-name">Visualizar</span>
            </a></li>
            <li><a href="#" id="adicionar-link">
                <i class='bx bx-clinic'></i>
                <span class="link-name">Adicionar</span>
            </a></li>
        </ul>
        <ul>
            <li><a href="../Bloqueio-Empresas/login_empresa.php" id="adicionar-link">
                <i class='bx bxs-log-out'></i>
                <span class="link-name">Log-out</span>
            </a></li>
       </ul>
    </nav>
        <!-- Seção para Perfil da Empresa -->
        <section id="perfil-section">
    <form id="perfil-form">
        <h2>Perfil da Empresa</h2>
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?php echo $nome; ?>" readonly>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $email; ?>" readonly>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" value="***" readonly>

        <label for="ativo">Ativo:</label>
        <input type="text" id="ativo" name="ativo" value="<?php echo $acesso_concedido; ?>" readonly>
    </form>
</section>





            <div class="content">
            
            <div class="boxes">
                    <div class="box box1">
                        
                        <ion-icon name="eye-outline"></ion-icon>
                        
                    </div>
<!-- Seção para Adicionar Conteúdo -->
 
<section id="adicionar-section" class="hidden">
<h2>Adicionar Conteúdo</h2>
    <form action="adicionar_conteudo.php" method="post" enctype="multipart/form-data" id="adicionar-form">
        
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" required>

        <label for="introducao">Introdução:</label>
        <textarea id="introducao" name="introducao" required></textarea>

        <label for="arquivo">Arquivo (PDF):</label>
        <input type="file" id="arquivo" name="arquivo" accept="application/pdf" required>

        <button type="submit">Adicionar Conteúdo</button>
    </form>
</section>

          <!-- Seção para Visualizar e Editar Conteúdo -->
<section id="visualizar-section" class="hidden">
    <h2>Visualizar e Editar Conteúdo</h2>
    
    <?php
    // Conexão com o banco de dados
    $conn = new mysqli('localhost', 'root', '', 'compasstcc');

    // Verifica a conexão
    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    // Seleciona todos os conteúdos
    $sql = "SELECT id, titulo, introducao FROM referencias";
    $result = $conn->query($sql);



    if ($result->num_rows > 0) {
        // Exibe os conteúdos em uma tabela
        echo "<table >";
        echo "<tr><th>Título</th><th>Introdução</th><th>Editar</th><th>Excluir</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["titulo"] . "</td>";
            echo "<td>" . $row["introducao"] . "</td>";
            echo "<td><a href='editar_conteudo.php?id=" . $row["id"] . "'>Editar</a></td>";
            echo "<th><a href='excluir_conteudo.php?id=" . $row["id"] . "' onclick=\"return confirm('Tem certeza que deseja excluir este conteúdo?');\">Excluir</a></td>";
            echo "</td>";
        }
        echo "</table>";
    } else {
        echo "Nenhum conteúdo encontrado.";
    }

    $conn->close();
    ?>
</section>

        </div>
    </div>

    <script src="./js/script.js"></script>
</body>
</html>