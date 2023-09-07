<?php
session_start();
include_once 'banco_db/config.php'; // Inclua o arquivo de conexão com o banco de dados

include_once('../vendor/autoload.php');

use chillerlan\QRCode\QROptions;

// Criar a variável com a URL completa para o QRCode
$url = 'https://localhost/localpet/pages/lista.php?id=' . $_SESSION['user_id']; // Certifique-se de usar o parâmetro correto aqui

$options = new QROptions([
    'version'     => 5,
    'imageBase64' => true,
    'scale'       => 5,
]);

// Gerar QRCode
$qrcode = (new \chillerlan\QRCode\QRCode($options))->render($url);

// Substituir o valor 'data:image/png;base64,' pelo valor vazio
$imagem = str_replace('data:image/png;base64,', '', $qrcode);

// Substituir o valor
$imagem = str_replace(' ', '+', $imagem);

// Decodificar a imagem base64
$arquivo_imagem = base64_decode($imagem);

// Local de upload, a função uniqid() utilizada para gerar nome aleatório
$destino_arquivo = 'imagens/' . uniqid() . '.png';

if (isset($_POST['SendImage'])) {
    $image = $_FILES['image']['name'];
    $name = $_POST['name'];
    $last_name = $_POST['last_name'];
    $date_pet = $_POST['date_pet'];
    $race_pet = $_POST['race_pet'];
    $sex_pet = $_POST['sex_pet'];
    $mother_pet = $_POST['mother_pet'];
    $father_pet = $_POST['father_pet'];
    $phone = $_POST['phone'];
    $cell = $_POST['cell'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zid = $_POST['zid'];
    $address = $_POST['address'];
    $number = $_POST['number'];
    $complet = $_POST['complet'];
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha_usuario'];

    $image_path = 'uploads/' . $image; // Atualize isso para o caminho de armazenamento desejado da imagem

    // Mova a imagem enviada para o diretório de armazenamento
    move_uploaded_file($_FILES['image']['tmp_name'], $image_path);

    // Insira os dados no banco de dados
    $sql = "INSERT INTO user_data (image, name, last_name, date_pet, race_pet, sex_pet, mother_pet, father_pet, phone, cell, city, state, zid, address, number, complet, qrcode, usuario, senha_usuario)
            VALUES (:image, :name, :last_name, :date_pet, :race_pet, :sex_pet, :mother_pet, :father_pet, :phone, :cell, :city, :state, :zid, :address, :number, :complet, :qrcode, '$usuario', '$senha')"; // Use os valores diretamente aqui

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':image', $image_path);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':last_name', $last_name);
    $stmt->bindParam(':date_pet', $date_pet);
    $stmt->bindParam(':race_pet', $race_pet);
    $stmt->bindParam(':sex_pet', $sex_pet);
    $stmt->bindParam(':mother_pet', $mother_pet);
    $stmt->bindParam(':father_pet', $father_pet);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':cell', $cell);
    $stmt->bindParam(':city', $city);
    $stmt->bindParam(':state', $state);
    $stmt->bindParam(':zid', $zid);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':number', $number);
    $stmt->bindParam(':complet', $complet);
    $stmt->bindParam(':qrcode', $qrcode); // Atualize para o valor correto do QRCode

    if ($stmt->execute()) {
        $_SESSION['msg'] = "Dados e imagem enviados com sucesso.";
        header("Location: dashboard.php");
    } else {
        $_SESSION['msg'] = "Erro ao enviar dados e imagem.";
        header("Location: dashboard.php");
    }
} else {
    $_SESSION['msg'] = "Erro no envio do formulário.";
    header("Location: dashboard.php");
}
?>