<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigo = $_POST["code"];


    if ($_SESSION['numero_quatro_digitos'] == null || $_SESSION['Recover_email'] == null) {
        print '<script>window.location.href="http://localhost/Moodle/"</script>';
    }

    if (isset($_POST['Confirma'])) {
        if ($codigo == $_SESSION['numero_quatro_digitos']) {
            echo '<script>window.location.href="NewPassword.html"</script>';
        } else {
            print '<script>alert("Código inserido é Inválido")</script>';
            print '<script>window.location.href="http://localhost/Moodle/Recover/code.html"</script>';
        }
    }
}
?>
