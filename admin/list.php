<?php
require_once 'banco_db/config.php';
session_start();
$sql = "SELECT * FROM user_data";
$stmt = $conn->prepare($sql);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lista de Usuários</title>
</head>
<body>

<div class="search position-relative text-center px-4 py-3 mt-2 container-sm">
    <input type="text" class="form-control w-100 border-0 bg-white" placeholder="Pesquisar aqui" id="searchInput">
    <i class="fa fa-search position-absolute d-block fs-6"></i>
</div>


<div class="container-sm">

<h2>Lista de Usuários</h2>
<table border="1">
    <thead>
        <tr>
            <th class="id-col">id</th>
            <th class="image-col">image</th>
            <th>NOME</th>
            <th>SOBRENOME</th>
            <th>Nickname</th>
            <th>NASCIMENTO</th>
            <th>RAÇA</th>
            <th>SEXO</th>
            <th>TELEFONE</th>
            <th>CELULAR</th>
            <th>AÇÃO</th>
        </tr>
    </thead>
    <tbody id="userTableBody">
        <?php foreach ($users as $user) { ?>
            <tr>
                <td class="id-col1"><?php echo $user['id']; ?></td>
                <td class="image-col"><img width="50px" height="50px" src="<?php echo $user['image']; ?>"></td>
                <td class="id-col"><?php echo $user['name']; ?></td>
                <td class="id-col"><?php echo $user['last_name']; ?></td>
                <td class="id-col"><?php echo $user['nick_name']; ?></td>
                <td class="id-col"><?php echo $user['date_pet']; ?></td>
                <td class="id-col"><?php echo $user['race_pet']; ?></td>
                <td class="id-col"><?php echo $user['sex_pet']; ?></td>
                <td class="id-col"><?php echo $user['phone']; ?></td>
                <td class="id-col"><?php echo $user['cell']; ?></td>
                <td>
                    <a href="edit_user.php?id=<?php echo $user['id']; ?>">Editar</a>
                    <a href="delete_user.php?id=<?php echo $user['id']; ?>">Excluir</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
</table>
</div>
</body>
</html>

<style>
        /* Estilo para tornar o texto branco */
        body, th, td {
            color: black;
        }

        .white-text {
    color: white;
}
table ,  tbody, td ,tr,th {
  border-color: white;
  border: 1px solid black;
}

/* CSS para fixar o tamanho das colunas */
.id-col {
    width: 80px; /* Defina o tamanho desejado para a coluna 'id' */
}
.id-col1 {
    width: 30px; /* Defina o tamanho desejado para a coluna 'id' */
}

.image-col {
    width: 80px; /* Defina o tamanho desejado para a coluna 'image' */
}




    </style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('searchInput');
        const userTableBody = document.getElementById('userTableBody');

        searchInput.addEventListener('input', function () {
            const searchText = searchInput.value.toLowerCase();
            const rows = userTableBody.getElementsByTagName('tr');

            for (let i = 1; i < rows.length; i++) {
                const row = rows[i];
                const columns = row.getElementsByTagName('td');
                let rowMatches = false;

                for (let j = 0; j < columns.length; j++) {
                    const column = columns[j];
                    const cellText = column.textContent.toLowerCase();

                    if (cellText.includes(searchText)) {
                        rowMatches = true;
                        break;
                    }
                }

                if (rowMatches) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            }
        });
    });
</script>