<?php
session_start();
ob_start();
include_once 'banco_db/config.php';

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (!empty($dados['SendLogin'])) {
    //var_dump($dados);
    $query_email = "SELECT id_admin, admin, email, password 
                    FROM admins 
                    WHERE email =:email  
                    LIMIT 1";
    $result_email = $conn->prepare($query_email);
    $result_email->bindParam(':email', $dados['email'], PDO::PARAM_STR);
    $result_email->execute();

    if(($result_email) AND ($result_email->rowCount() != 0)){
        $row_email = $result_email->fetch(PDO::FETCH_ASSOC);
        //var_dump($row_email);
        if(password_verify($dados['password'], $row_email['password'])){
            $_SESSION['id'] = $row_email['id_admin'];
            $_SESSION['admin'] = $row_email['admin'];
            header("Location: dashboard.php");
        }else{
            $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: Usuário ou senha inválida!</p>";
        }
    }else{
        $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: Usuário ou senha inválida!</p>";
    }
}

if(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-ico">
    <link rel="stylesheet" href="css/style.css">
    <title>Login</title>
</head>

<body>
    <?php
    //Exemplo criptografar a senha
    //echo password_hash(123456, PASSWORD_DEFAULT);
    ?>

    <div class="wrapper">
        <h1>Pets</h1>
        <div class="logo">
            <img src="uploads/logo.jpg" alt="">
        </div>
        <div class="text-center mt-4 name">
             Login
        </div>
        <form method="POST" class="p-3 mt-3">
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="email" id="userName" placeholder="Usuário" value="<?php if(isset($dados['email'])){ echo $dados['email']; } ?>">
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="password" id="pwd" placeholder="Senha" value="<?php if(isset($dados['password'])){ echo $dados['password']; } ?>">
            </div>
            <input type="submit" value="Acessar" name="SendLogin" class="btn mt-3"></input>
        </form>
        <div class="text-center fs-6">
        </div>
    </div>
</body>
</html>