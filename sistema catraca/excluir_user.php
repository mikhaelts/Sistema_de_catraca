<!DOCTYPE html>
<html>
<head>
    <title>Excluir Usuário</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            color: #333;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #FFF;
            border: none;
            cursor: pointer;
            text-decoration: none;
            font-size: 16px;
            margin-top: 20px;
        }

        .button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Excluir Usuário</h1>
    
    <?php
    // Verifica se o ID do usuário foi fornecido na URL
    if (isset($_GET['id'])) {
        $userId = $_GET['id'];

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

        // Consulta para excluir o usuário do banco de dados
        $sql = "DELETE FROM Cadastros WHERE id = $userId";

        if ($conn->query($sql) === TRUE) {
            echo "Usuário excluído com sucesso.";
        } else {
            echo "Erro ao excluir o usuário: " . $conn->error;
        }

        // Fecha a conexão com o banco de dados
        $conn->close();
    } else {
        echo "ID do usuário não fornecido.";
    }
    ?>

    <br><br>
    <a href="consulta.php" class="button">Voltar</a>
</body>
</html>
