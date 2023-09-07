<?php
require_once 'banco_db/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $last_name = $_POST['last_name'];
    $nick_name = $_POST['nick_name'];

    $sql = "UPDATE user_data SET name=:name, last_name=:last_name, nick_name=:nick_name WHERE id=:id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':last_name', $last_name);
    $stmt->bindParam(':nick_name', $nick_name);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    header("Location: user_list.php");
    exit();
}

$id = $_GET['id'];
$sql = "SELECT * FROM user_data WHERE id=:id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Usuário</title>
</head>
<body>
    <h2>Editar Usuário</h2>
    <form method="POST" action="">
        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
        <label for="name">Nome:</label>
        <input type="text" name="name" value="<?php echo $user['name']; ?>"><br>
        <label for="last_name">Sobrenome:</label>
        <input type="text" name="last_name" value="<?php echo $user['last_name']; ?>"><br>
        <label for="nick_name">Nickname:</label>
        <input type="text" name="nick_name" value="<?php echo $user['nick_name']; ?>"><br>
        <button type="submit">Salvar</button>
    </form>
</body>
</html>