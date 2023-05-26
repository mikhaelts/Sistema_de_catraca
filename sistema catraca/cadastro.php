<!DOCTYPE html>
<html>
<head>
  <title>Cadastro de Usuário</title>
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
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    form {
      width: 400px;
      background-color: #f2f2f2;
      padding: 20px;
      border-radius: 8px;
    }

    label {
      display: block;
      margin-bottom: 10px;
      font-weight: bold;
    }

    input[type="text"],
    input[type="radio"] {
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

    .radio-group {
      display: flex;
      margin-bottom: 20px;
    }

    .radio-group label {
      margin-right: 10px;
      margin-bottom: 0;
    }

    .hidden {
      display: none;
    }
  </style>
</head>
<body>
  <header class="nav">
    <h1>Cadastro de Usuário</h1>
    <a href="Inicio.php" class="button">Voltar</a>
  </header>

  <div class="container">
    <form action="cadastrar_user.php" method="post">
      <div class="radio-group">
        <label>
          <input type="radio" name="tipo" value="funcionario" checked onclick="hideMatriculaField()">
          Funcionário
        </label>
        <label>
          <input type="radio" name="tipo" value="estudante" onclick="showMatriculaField()">
          Estudante
        </label>
      </div>

      <label for="nome">Nome Completo:</label>
      <input type="text" id="nome" name="nome" required>

      <label for="num_catraca">Número da Catraca:</label>
      <input type="text" id="num_catraca" name="num_catraca" required>

      <label for="matricula" id="matricula_label">Matrícula:</label>
      <input type="text" id="matricula" name="matricula" class="hidden">

      <input type="submit" value="Cadastrar">
  </form>
    
  </div>

  <?php
  // Verifica se a mensagem de sucesso deve ser exibida
  if (isset($_GET['mensagem'])) {
    $mensagem = $_GET['mensagem'];
    echo "<p>$mensagem</p>";
  }
  ?>

  <script>
    function hideMatriculaField() {
      document.getElementById("matricula").classList.add("hidden");
      document.getElementById("matricula_label").classList.add("hidden");
    }

    function showMatriculaField() {
      document.getElementById("matricula").classList.remove("hidden");
      document.getElementById("matricula_label").classList.remove("hidden");
    }
  </script>
</body>
</html>
