<?php

// Conecta ao banco de dados
$host = 'localhost';
$user = 'root';
$senha_bd = '';
$bd = 'agenda_escolar';

$conexao = mysqli_connect($host, $user, $senha_bd, $bd);

// Verifica se houve erro na conexão
if (mysqli_connect_errno()) {
    echo "Falha ao conectar ao MySQL: " . mysqli_connect_error();
}


?>