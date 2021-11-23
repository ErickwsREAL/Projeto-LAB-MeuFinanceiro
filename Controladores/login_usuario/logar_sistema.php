<?php
include_once ("../login_bd/login_banco.php");

if(session_status() === PHP_SESSION_NONE){
    session_start();
}

$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "SELECT id_usuario, nome FROM usuario WHERE email = '$email' AND senha = MD5('$senha')";

$result = $conn->query($sql);

if (mysqli_num_rows($result) == 0) {
        
    echo '<script>alert("E-mail e/ou senha incorretos.")</script>';
    echo '<script>location.href="../../Telas/index.php"</script>';
    $conn->close();
    return;
}

$row = $result->fetch_assoc();

$_SESSION['usuario'] = $row;

$conn->close();

header("location: ../../Telas/categoria_subcategoria.php");
