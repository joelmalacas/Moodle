<?php
    $codigo = $_POST["code"];
    if (isset($_POST['Confirma'])) {
        if ($codigo === $_SESSION['numero_quatro_digitos']){
            print '<script>alert("Código correto!")</script>';
        } else {
            print '<script>alert("Código errado!")</script>';
        }
    }
?>