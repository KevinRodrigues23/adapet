<?php session_start();
include_once '../../admin/banco_db/config.php'; // Inclua o arquivo de conexão com o banco de dados

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha_usuario'];

    $query = "SELECT id, usuario, senha_usuario FROM user_data WHERE usuario = :usuario LIMIT 1";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() == 1) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if (password_verify($senha, $row['senha_usuario'])) {
            $_SESSION['user_id'] = $row['id'];
            header("Location: ../home/home.php?id=$id"); // Redirecione para a página de dashboard ou outra página após o login bem-sucedido
            exit();
        } else {
            echo "Senha incorreta!";
        }
    } else {
        echo "Usuário não encontrado!";
    }
}
?>






<php lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../styles.css">
    <title>AdoPet - Cadastro</title>
</head>


<body class="cadastro">
    <header class="cabecalho">
        <img src="../../img/Logo.png" alt="Logo da adopet" class="cabecalho__imagem cabecalho__imagem-logo">
        <a href="../../index.php"><img src="../../img/Casa.svg" alt="Página inicial" class="cabecalho__imagem"></a>
        <a href="../mensagem/mensagem.php"><img src="../../img/Mensagens.svg" alt="Caixa de mensagens"
                class="cabecalho__imagem"></a>
    </header>

    <section class="cadastro__formulario">
        <img src="../../img/Logo-Azul.png" alt="Logo da adopet">
        <p class="cadastro__texto">Já tem conta? Faça seu login:</p>

        <form class="formulario" method="POST" >
            <div class="container-formulario">
                <label for="email" class="container-formulario__rotulo">Token</label>
                <input type="text"  name="usuario" id="email" class="container-formulario__campo"
                    placeholder="Digite o Token" />
            </div>
            <div class="container-formulario">
                <label for="senha" class="container-formulario__rotulo">Senha</label>
                <input type="password" name="senha_usuario" id="senha" class="container-formulario__campo" placeholder="Senha" />
            </div>

            <a href="#" class="container-formulario__ancora">Esqueci minha senha</a><br>
            <input type="submit" value="Acessar" name="SendLogin" class="btn mt-3"></input>
        </form>

       
    </section>

    <footer class="rodape">
        <p>2022 - Desenvolvido por Alura.</p>
    </footer>
</body>



</php>