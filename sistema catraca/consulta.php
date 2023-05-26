<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<head>
  <title>Consulta de Usuário</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }
    .nav{
        display: flex;
        justify-content: space-between;
    }
    .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: red;
            color: #FFF;
            border: none;
            cursor: pointer;
            text-decoration: none;
            font-size: 16px;
            margin-top: 0px;
        }

        .button:hover {
            background-color: #45a049;
        }
    
    header {
      background-color: #333;
      color: #fff;
      padding: 20px;
      text-align: center;
    }
    
    h1 {
      margin: 0;
    }
    
    .container {
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 20px;
    }
    
    form {
      width: 400px;
      background-color: #f2f2f2;
      padding: 20px;
      border-radius: 8px;
    }
    
    input[type="text"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border-radius: 4px;
      border: 1px solid #ccc;
    }
    
    input[type="submit"] {
      background-color: #333;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }
    
    table th,
    table td {
      padding: 10px;
      border: 1px solid #ccc;
    }
    
    table th {
      background-color: #f2f2f2;
      font-weight: bold;
    }
    
    .action-buttons {
      display: flex;
      justify-content: center;
    }
    
    .action-buttons a {
      margin-right: 10px;
    }
  </style>
</head>
<body>
  <header class="nav">
    <h1>Consulta de Usuário</h1>
    <a href="Inicio.php" class="button">Voltar</a>
  </header>
  
  <div class="container">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
      <input type="text" id="search" name="search" placeholder="Digite um nome...">
      <input type="submit" value="Pesquisar">
    </form>
    
    <?php
    // Verifica se foi submetido um termo de pesquisa
    if (isset($_POST['search'])) {
        // Obtém o termo de pesquisa enviado pelo formulário
        $searchTerm = $_POST['search'];

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

        // Consulta para listar os usuários com base no termo de pesquisa
        $sql = "SELECT * FROM Cadastros  WHERE nome LIKE '%$searchTerm%'";

        // Executa a consulta
        $result = $conn->query($sql);

        // Verifica se a consulta retornou resultados
        if ($result->num_rows > 0) {
            // Exibe
            // Exibe os resultados em uma tabela
            echo "<table>";
            echo "<tr><th>ID</th><th>Nome</th><th>Tipo</th><th>Número da Catraca</th><th>Matrícula</th><th>Ações</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["nome"] . "</td>";
                echo "<td>" . $row["tipo"] . "</td>";
                echo "<td>" . $row["num_catraca"] . "</td>";
                echo "<td>" . $row["matricula"] . "</td>";
                echo "<td class='action-buttons'>";
echo "<a href='editar_user.php?id=" . $row["id"] . "'><i class='fas fa-edit'></i></a>";
echo "<a href='excluir_user.php?id=" . $row["id"] . "'><i class='fas fa-trash'></i></a>";
echo "</td>";

                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>Nenhum usuário encontrado.</p>";
        }

        // Fecha a conexão com o banco de dados
        $conn->close();
    }
    ?>
  </div>
</body>
</html>
