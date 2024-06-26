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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<script src="../Moodle/Scripts/index.js"></script>

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
                        <button type="submit" name="Pprincipal" id="Pprincipal" class="active"><i class="fa-solid fa-house"></i> Página Principal</button>
                    </form>
                </li>
                <li>
                    <form method="POST" action="">
                        <button type="submit" name="Perfil" id="Perfil"><i class="fas fa-user"></i> Meu Perfil</button>
                    </form>
                </li>
                <li>
                    <form method="POST" action="">
                        <button type="submit" name="Disciplina" id="Disciplina"><i class="fa-solid fa-book"></i> Minhas Disciplinas</button>
                    </form>
                </li>
                <li>
                    <form method="POST" action="">
                        <button type="submit" name="Logout" id="Logout"><i class="fa-solid fa-right-from-bracket"></i> Encerrar Sessão</button>
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
                MeuPerfil();
            }
            if (isset($_POST['Disciplina'])){
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
    print '<form class="perfil-form" method="POST" action="update_perfil.php">
        <h2>Meu Perfil</h2>
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="' . $_SESSION['user_email'] . '" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="' . htmlspecialchars($_SESSION['email'], ENT_QUOTES, 'UTF-8') . '" required>
        </div>
        <div class="form-group">
            <label for="telefone">Telefone:</label>
            <input type="tel" id="telefone" name="telefone" value="' . htmlspecialchars($_SESSION['telefone'], ENT_QUOTES, 'UTF-8') . '" required>
        </div>
    </form>';
}

function Disciplinas() {
    // Mostrar Disciplinas inscritas
    print '<h1>Minhas Disciplinas</h1>';
}

?>