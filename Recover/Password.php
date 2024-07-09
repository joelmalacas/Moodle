<?php

session_start();

if ($_SESSION['Recover_email'] == null) {
    print '<script>alert("Insira o endereço e-mail");</script>';
    print '<script>window.location.href="index.html";</script>';
}

$servername = "localhost";
$username = "root";
$password = "";
$database = "moodle_accounts";

$conn = mysqli_connect($servername, $username, $password, $database);

if ($conn == false){
    echo "Error Trying Connect to Database Server\n";
    print "<script>console.log('Error Trying Connect to Database Server\n')</script>;";
}

$passe = $_POST['Code'];
$Repasse = $_POST['Recode'];

if (strlen($passe) >= 5 && $passe == $Repasse) {
    $atualiza = "UPDATE aluno set passe = '". $passe ."' WHERE email = '". $_SESSION['Recover_email'] ."';";
    mysqli_query($conn, $atualiza) or die("Erro query base de dados");
    print '<script>alert("Password Atualizada com sucesso!");</script>';
    print '<script>window.location.href="http://localhost/Moodle"</script>';
    $_SESSION['Recover_email'] == null;
} else {
    print '<script>alert("A password não cumpre os parâmetros requisitados para renovar a password")</script>';
}

mysqli_close($conn);

?>