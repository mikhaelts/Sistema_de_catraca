<!DOCTYPE html>
<html>
<head>
    <title>Editar Usuário</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            background-color: #f2f2f2;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            text-align: center;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #FFF;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        // Verifica se o ID do usuário foi fornecido na URL
        if (isset($_GET['id'])) {
            $userId = $_GET['id'];

            // Verifica se o formulário foi submetido
            if (isset($_POST['submit'])) {
                // Obtém os dados do formulário
                $nome = $_POST['nome'];
                $tipo = $_POST['tipo'];
                $num_catraca = $_POST['num_catraca'];
                $matricula = $_POST['matricula'];

                // Configurações do banco de dados
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "agenda_escolar";

                // Conexão com o banco de dados
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Verifica se a conexão foi estabelecida com sucesso
                if ($conn->connect_error) {
                    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
                }

                // Atualiza os dados do usuário no banco de dados
                $sql = "UPDATE Cadastros SET nome = '$nome', tipo = '$tipo', num_catraca = '$num_catraca', matricula = '$matricula' WHERE id = $userId";

                if ($conn->query($sql) === TRUE) {
                    echo "Usuário atualizado com sucesso.";
                } else {
                    echo "Erro ao atualizar o usuário: " . $conn->error;
                }

                // Fecha a conexão com o banco de dados
                $conn->close();
            }

            // Recupera os dados do usuário do banco de dados
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "agenda_escolar";

            // Conexão com o banco de dados
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Verifica se a conexão foi estabelecida com sucesso
            if ($conn->connect_error) {
                die("Falha na conexão com o banco de dados: " . $conn->connect_error);
            }
                    // Consulta para obter os dados do usuário
        $sql = "SELECT * FROM Cadastros WHERE id = $userId";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $nome = $row['nome'];
            $tipo = $row['tipo'];
            $num_catraca = $row['num_catraca'];
            $matricula = $row['matricula'];

            // Exibe o formulário de edição
            ?>
            <h1>Editar Usuário</h1>
            <form action="<?php echo $_SERVER['PHP_SELF'] . '?id=' . $userId; ?>" method="post">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" value="<?php echo $nome; ?>"><br>
                <label for="tipo">Tipo:</label>
                <input type="text" id="tipo" name="tipo" value="<?php echo $tipo; ?>"><br>
                <label for="num_catraca">Número da Catraca:</label>
                <input type="text" id="num_catraca" name="num_catraca" value="<?php echo $num_catraca; ?>"><br>
                <label for="matricula">Matrícula:</label>
                <input type="text" id="matricula" name="matricula" value="<?php echo $matricula; ?>"><br>
                <input type="submit" name="submit" value="Salvar">
            </form>
            <?php
            // Fecha a conexão com o banco de dados
            $conn->close();
        } else {
            echo "Usuário não encontrado.";
        }
    } else {
        echo "ID do usuário não fornecido.";
    }
    ?>
</div>
</body>
</html>
