<!DOCTYPE html>
<html>
<head>
  <title>Sistema de Controle</title>
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
    h2:hover{
      color: green;
    }
    .container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 300px;
      cursor: pointer;
    }
    
    
    .container:nth-child(odd) {
      background-color: #f2f2f2;
    }
    
    .container:nth-child(even) {
      background-color: #e0e0e0;
    }
    
    .icon {
      font-size: 60px;
      margin-right: 20px;
    }
    .icon:hover{
      color: green;
    }
    
    a {
      text-decoration: none;
      color: inherit;
    }
  </style>
</head>
<body>
  <header class="nav">
    <h1>Bem vindo ao Sistema de Controle</h1>
    <a href="login.php" class="button">Voltar</a>
  </header>
  
  <a href="cadastro.php">
    <div class="container">
      <i class="icon">+</i>
      <h2>Cadastrar Usuário</h2>
    </div>
  </a>
  
  <a href="consulta.php">
    <div class="container">
      <i class="icon">≡</i>
      <h2>Listar Usuários</h2>
    </div>
  </a>
</body>
</html>
