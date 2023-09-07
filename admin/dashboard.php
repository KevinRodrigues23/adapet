<?php
session_start();
ob_start();
include_once 'banco_db/config.php';

if((!isset($_SESSION['id'])) AND (!isset($_SESSION['nome']))){
    $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: Necessário realizar o login para acessar a página!</p>";
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/style.css">
  <title>Document</title>
</head>
<body>

<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <a class="navbar-brand" href="#">Pets</a>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item m-1">
        <button class="btn btn-outline-success" type="submit"><a href="register-single.php">gerar usuário</a></button>
        </li>
        <li class="nav-item m-1">
        <button class="btn btn-outline-success" type="submit"><a  href="#"> Parceiros</a></button>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li>
      </ul>
      
        <button class="btn btn-outline-success" type="submit"><a href="logout.php">Sair</a></button>
    
    </div>
  </div>
</nav>

<div><h1> Olá, <?php echo $_SESSION['admin'];?></h1></div>

    <!-- cards -->
  <div class="container-sm">
      <div class="row row-cols-1 row-cols-md-3 g-2">
          <div class="col">
            <div class="card">
              <h3>3</h3>
            </div>
          </div>
          <div class="col">
            <div class="card">
              <h3> 3</h3>
            </div>
          </div>
          <div class="col">
            <div class="card">
              <h3>3</h3>
            </div>
          </div>
    </div>
  </div>

  <?php include('list.php'); ?>






  
</body>
</html>