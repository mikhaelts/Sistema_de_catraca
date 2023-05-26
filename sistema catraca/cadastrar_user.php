<?php
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

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipo = $_POST["tipo"];
    $nome = $_POST["nome"];
    $num_catraca = $_POST["num_catraca"];
    $matricula = $_POST["matricula"] ?? ""; // Opcional se o campo estiver ausente no formulário

    // Prepara a consulta SQL
    $sql = "INSERT INTO Cadastros (tipo, nome, num_catraca, matricula) VALUES (?, ?, ?, ?)";

    // Prepara a declaração e verifica erros
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Erro na preparação da consulta: " . $conn->error);
    }

    // Associa os parâmetros e verifica erros
    $stmt->bind_param("ssss", $tipo, $nome, $num_catraca, $matricula);
    if (!$stmt->execute()) {
        die("Erro ao cadastrar usuário: " . $stmt->error);
    }

    // Exibe uma mensagem de sucesso
    echo "Usuário cadastrado com sucesso!";
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
