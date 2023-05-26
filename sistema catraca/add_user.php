<?php
// Iniciar a sessão
session_start();

// Estabelecer conexão com o banco de dados
$conn = mysqli_connect('localhost', 'root', '', 'agenda_escolar');

// Verificar se a conexão foi estabelecida com sucesso
if (!$conn) {
    die('Erro de conexão: ' . mysqli_connect_error());
}

// Verificar se o formulário foi submetido
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obter o email e a senha do formulário
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $senha = mysqli_real_escape_string($conn, $_POST['senha']);

    // Consultar o banco de dados para verificar se o email e a senha correspondem a uma entrada válida na tabela de usuários
    $sql = "SELECT * FROM usuarios WHERE email='$email' AND senha='$senha'";
    $result = mysqli_query($conn, $sql);

    // Verificar se a consulta retornou algum resultado
    if (mysqli_num_rows($result) > 0) {
        // Se houver um usuário correspondente, redirecionar para a página de login bem-sucedido
        header('Location: inicio.php');
        exit();
    } else {
         // Caso contrário, mostrar uma mensagem de erro
         $_SESSION['error_message'] = 'Email ou senha inválidos.';
         header('Location: login.php'); // redirecionar para a página principal
         exit();
    }
}

// Fechar a conexão com o banco de dados
mysqli_close($conn);
?>
