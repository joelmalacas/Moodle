<?php
//====LOGOUT====
session_start();
session_destroy();

function StatusUpdate($User) {
    // Mudar status para Online

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "moodle_accounts";

    // Criar conexão
    $conn = new mysqli($servername, $username, $password, $database);

    // Verifica a conexão
    if ($conn->connect_error) {
        die("Erro na conexão: " . $conn->connect_error);
    }

    $query = "UPDATE aluno SET status = ? WHERE email = ?";

    // Prepara a query
    if ($stmt = $conn->prepare($query)) {
        // Vincula os parâmetros
        $status = 'Offline';
        $stmt->bind_param("ss", $status, $User);

        // Executa a query
        if ($stmt->execute()) {
            echo "<script>console.log('Status: Online')</script>";
        } else {
            echo "<script>console.log('Status: Erro ao Atualizar na BD')</script>";
        }

        // Fecha a declaração
        $stmt->close();
    } else {
        echo "Erro na preparação da query: " . $conn->error;
    }

    // Fecha a conexão
    $conn->close();
}

require '../Scripts/valida.php';
?>