<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigo = $_POST["code"];

    if (isset($_POST['Confirma'])) {
        if ($codigo === $_SESSION['numero_quatro_digitos']) {
            echo '<script>alert("Código correto!")</script>';
        } else {
            echo '<script>alert("Código errado!")</script>';
        }
    }
}
?>
