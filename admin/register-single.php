
<?php 
session_start();
?>
<!DOCTYPE html>
<html>
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
        <li class="nav-item">
        <button class="btn btn-outline-success" type="submit"><a href="register-single.php">gerar usuário</a></button>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li>
      </ul>
      
        <button class="btn btn-outline-success" type="submit"><a href="logout.php">Sair</a></button>
    
    </div>
  </div>
</nav>
<h2 style="text-align: center;">FORMULÁRIO DO PET</h2>
    <div class="container-sm">
    <form action="process_upload.php" class="row g-3" method="POST"enctype="multipart/form-data" >

    <div class="row g-3">
        <label for="image">Image:</label>
        <input type="file" name="image" id="image" required>
    </div>
        
  <div class="col-md-6">
    <label for="inputEmail4"  class="form-label ">NOME DO PET</label>
    <input type="text" name="name" class="form-control" id="inputEmail4">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">SOBRE NOME:</label>
    <input type="text" name="last_name" class="form-control" id="inputPassword4">
  </div>
  <div class="col-md-4">
    <label for="inputCity" class="form-label">NASCIMENTO DO PET</label>
    <input type="date" name="date_pet" class="form-control" id="inputCity">
  </div>
  <div class="col-md-4">
    <label for="inputCity" class="form-label">RAÇA DO PET</label>
    <input type="text" name="race_pet"class="form-control" id="inputCity">
  </div>
  <div class="col-md-4">
    <label for="inputState" class="form-label">SEXO DO PET</label>
    <select name="sex_pet"  id="inputState" class="form-select">
      <option selected>SEXO DO PET</option>
      <option value="Fêmea">FÊMEA</option>
      <option value="Macho">MACHO</option>
    </select>
  </div>



  <div class="col-12">
    <label for="inputAddress" class="form-label">NOME DA MÃE:</label>
    <input type="text" name="mother_pet" class="form-control" id="inputAddress" placeholder="nome completo">
  </div>
  <div class="col-12">
    <label for="inputAddress2" class="form-label">NOME DO PAI:</label>
    <input type="text" name="father_pet" class="form-control" id="inputAddress2" placeholder="nome completo">
  </div>

  <div class="col-md-6">
    <label for="inputCity" class="form-label">TELEFONE</label>
    <input type="text" name="phone" class="form-control" id="inputCity">
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">CELULAR</label>
    <input type="text" name="cell" class="form-control" id="inputCity">
  </div>

  <div class="col-md-6">
    <label for="inputCity" class="form-label">CIDADE</label>
    <input type="text" name="city" class="form-control" id="inputCity">
  </div>
  <div class="col-md-4">
    <label for="inputCity" class="form-label">ESTADO</label>
    <input type="text" name="state" class="form-control" id="inputCity">
  </div>
  <div class="col-md-2">
    <label for="inputZip" class="form-label">CEP</label>
    <input type="text" name="zid" class="form-control" id="inputZip">
  </div>
  <div class="col-md-9">
    <label for="inputCity" class="form-label">ENDEREÇO</label>
    <input type="text" name="address" class="form-control" id="inputCity">
  </div>
  <div class="col-md-3">
    <label for="inputCity" class="form-label">NÚMERO</label>
    <input type="text" name="number" class="form-control" id="inputCity">
  </div>
  <div class="col-md-12">
    <label for="inputCity" class="form-label">COMPLEMENTO</label>
    <input type="text" name="complet" class="form-control" id="inputCity">
  </div>

  <div class="col-12">
    <button type="submit" name="SendImage" class="btn btn-primary">Finalizar</button>
  </div>
</form>
    </div>
    
</body>
</html>