<?php
require('classes/login.php');

$login = filter_input(INPUT_POST, 'login');
$senha = filter_input(INPUT_POST, 'senha');
$validador = new Login();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if($validador->verificar_credenciais($login, $senha)) {
        header("Location: home.php");
        exit();
    }
}
$validador->logout();
header("Location: index.php");
?>