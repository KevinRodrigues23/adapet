<?php 
session_start();

require_once '../admin/banco_db/config.php';
include_once('../vendor/autoload.php');

use chillerlan\QRCode\QROptions;

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM user_data WHERE id=:id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Criar a variável com a URL para o QRCode
    $url = 'https://localhost/localpet/pages/lista.php?id=' . $id;

    $options = new QROptions([
        'version'     => 3,
        'imageBase64' => true,
        'scale'       => 5,
    ]);

    // Gerar QRCode
    $qrcode = (new \chillerlan\QRCode\QRCode($options))->render($url);
} else {
    // Redirecionar para uma página de erro ou faça o tratamento adequado
    header("Location: error_page.php");
    exit();
}
?>


    <?php
    if (isset($qrcode)) {
         "<," . $qrcode . "' alt='QRCode'>";
    } else {
        echo "QRCode não encontrado.";
    }
    ?>






<!DOCTYPE php>
<php lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
   
    <title>MyFênix</title>
</head>


<body class="lista">
    <header class="cabecalho">
        <img src="../img/Logo.png" alt="Logo da adopet" class="cabecalho__imagem cabecalho__imagem-logo">
        <a href="../index.php"><img src="../img/Casa.svg" alt="Página inicial" class="cabecalho__imagem"></a>
        <a href="https://web.whatsapp.com/send?phone=<?php echo $user['cell']; ?>"><img  width="28px" style="padding: 0px;" src="../img/whatsapp.png" alt="Página inicial" class="cabecalho__imagem"></a>
        
    </header>
    <div style="text-align:center;"><h1><h1><?php echo $user['name']; ?> <?php echo $user['last_name']; ?></h1></h1></div>
    <div class="container">
      
    <header class="cabecalho">
      
      <div class="perfil">
      
        <img width="140px" height="150px" class="perfil-foto" src="<?php echo $user['image']; ?>">
      <div class="titulo" style="text-align:center;">
   
      </div>
      </div>
      <div class="tema">
      <img src='<?php echo $qrcode; ?>' alt='QRCode'>
      </div>
    
      
      
    </header>
   
    <main class="projetos">
    <form class="row g-3">

    <div class="col-md-6">
    <label for="validationDefault03" class="form-label">MÃE DO PET</label>
    <input type="text" class="form-control" value="<?php echo $user['mother_pet']; ?>" id="validationDefault03" disabled>
  </div>

    <div class="col-md-6">
    <label for="validationDefault03" class="form-label">PAI DO PET</label>
    <input type="text" class="form-control" value="<?php echo $user['father_pet']; ?>" id="validationDefault03" disabled>
  </div>
  <div class="col-md-6">
    <label for="validationDefault03" class="form-label">Celular</label>
    <input type="text" class="form-control" value="<?php echo $user['cell']; ?> " id="validationDefault03" disabled>
  </div>
  <div class="col-md-6">
  
    <label for="validationDefault03" class="form-label">TELEFONE</label>
    
    <input type="text" class="form-control" value="<?php echo $user['phone']; ?>" id="validationDefault03" disabled>
  </div>
  <div class="col-md-4">
    <label for="inputCity" class="form-label">NASCIMENTO DO PET</label>
    <input type="date" name="date_pet" value="<?php echo $user['date_pet']; ?>" class="form-control" id="inputCity" disabled>
  </div>
  <div class="col-md-4">
    <label for="inputCity" class="form-label">RAÇA DO PET</label>
    <input type="text" name="race_pet" value="<?php echo $user['race_pet']; ?> " class="form-control" id="inputCity" disabled>
  </div>
  <div class="col-md-4">
    <label for="inputCity" class="form-label">SEXO DO PET</label>
    <input type="text" name="sex_pet"class="form-control" value="<?php echo $user['sex_pet']; ?>" id="inputCity" disabled>
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">CIDADE</label>
    <input type="text" name="city" value="<?php echo $user['city']; ?>" class="form-control" id="inputCity" disabled>
  </div>
  <div class="col-md-4">
    <label for="inputCity" class="form-label">ESTADO</label>
    <input type="text" name="state" value="<?php echo $user['state']; ?>" class="form-control" id="inputCity" disabled>
  </div>
  <div class="col-md-2">
    <label for="inputZip" class="form-label">CEP</label>
    <input type="text" name="zid" value="<?php echo $user['zid']; ?>" class="form-control" id="inputZip" disabled>
  </div>
  <div class="col-md-9">
    <label for="inputCity" class="form-label">ENDEREÇO</label>
    <input type="text" name="address" value="<?php echo $user['address']; ?>" class="form-control" id="inputCity" disabled>
  </div>
  <div class="col-md-3">
    <label for="inputCity" class="form-label">NÚMERO</label>
    <input type="text" name="number" value="<?php echo $user['number']; ?>" class="form-control" id="inputCity" disabled>
  </div>
  <div class="col-md-12">
    <label for="inputCity" class="form-label">COMPLEMENTO</label>
    <input type="text" name="complet" value="<?php echo $user['complet']; ?>" class="form-control" id="inputCity" disabled>
  </div>

  <div class="col-md-12">
  <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14697.482521193035!2d-43.5743441!3d-22.936573599999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1spt-BR!2sbr!4v1693624539537!5m2!1spt-BR!2sbr" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  
  </div>






  <div class="col-12">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" disabled>
      <label class="form-check-label" for="invalidCheck2">
        Agree to terms and conditions
      </label>
    </div>
  </div>
  
</form>
   
    </main>
  </div>

    <footer class="rodape">
        <p>2022 - Desenvolvido por Kevin.</p>
    </footer>
</body>



</php>