<?php
    require '../Moodle/Scripts/valida.php';
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Moodle/CSS/index.css">
    <title>DarwinSchool - Index</title>
    <link rel="shortcut icon" href="../Moodle/Media/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
    <header>
        <div class="logo">
            <img src="../Moodle/Media/logo.png" alt="DarwinSchool Logo">
           <h1 onclick="window.location.reload()">DarwinSchool</h1>
        </div>  
        <nav>
            <ul>
                <li>
                    <form method="POST" action="">
                        <button type="submit" name="Pprincipal">Página Principal</button>
                    </form>
                </li>
                <li>
                    <form method="POST" action="">
                        <button type="submit" name="Perfil">Meu Perfil</button>
                    </form>
                </li>
                <li>
                    <form method="POST" action="">
                        <button type="submit" name="Disciplina">Minhas Disciplinas</button>
                    </form>
                </li>
                <li>
                    <form method="POST" action="">
                        <button type="submit" name="Logout">Encerrar Sessão</button>
                    </form>
                </li>
            </ul>
        </nav>
    </header>
    <main class="main-content">
        <?php
            if (isset($_POST['Pprincipal'])){
                $url = "index.php";
                header("Location: " . $url);
            }
            if (isset($_POST['Perfil'])){
                echo '<script>alert("Meu Perfil")</script>';
                MeuPerfil();
            }
            if (isset($_POST['Disciplina'])){
                echo '<script>alert("Minhas Disciplinas")</script>';
                Disciplinas();
            }
            if (isset($_POST['Logout'])){
                StatusUpdate($_SESSION["user_email"]);
                require '../Moodle/Scripts/logout.php';
                require '../Moodle/Scripts/valida.php';
            }
        ?>
    </main>
    <footer>
        <p>&copy; 2024 DarwinSchool. Todos os direitos reservados.</p>
    </footer>
    <script src="../Moodle/Scripts/index.js"></script>
</body>
</html>


<?php
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


function MeuPerfil() {
    //Form com o meu Perfil    
}

function Disciplinas() {
    // Mostrar Disciplinas inscritas
}

?>