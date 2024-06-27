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
            CursoCard();
            if (isset($_POST['Pprincipal'])){
                $url = "index.php";
                header("Location: " . $url);
                print '<script>const mainContent = document.querySelector(".main-content"); mainContent.innerHTML = ""</script>';
            }
            if (isset($_POST['Perfil'])){
                print '<script>const mainContent = document.querySelector(".main-content"); mainContent.innerHTML = ""</script>';
                MeuPerfil();
            }
            if (isset($_POST['Disciplina'])){
                print '<script>const mainContent = document.querySelector(".main-content"); mainContent.innerHTML = ""</script>';
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
    // Base de Dados
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "moodle_accounts";
        
    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Erro ao tentar conectar ao servidor de banco de dados: " . $conn->connect_error);
    }

    // Consulta segura usando prepared statement
    $sql = "SELECT name, email, phone, Data_criacao FROM aluno WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $_SESSION["user_email"]);
    $stmt->execute();
    $stmt->bind_result($NomeCompleto, $email, $phone, $DataCriacao);
    $stmt->fetch();
    $stmt->close();
    $conn->close();

    // Formulário com o perfil
    echo '<form class="perfil-form" method="POST" action="update_perfil.php">
        <h2>Meu Perfil</h2>
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="' . htmlspecialchars($NomeCompleto, ENT_QUOTES, 'UTF-8') . '" readonly required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="' . htmlspecialchars($email, ENT_QUOTES, 'UTF-8') . '" readonly required>
        </div>
        <div class="form-group">
            <label for="telefone">Telefone:</label>
            <input type="tel" id="telefone" name="telefone" value="' . htmlspecialchars($phone, ENT_QUOTES, 'UTF-8') . '" readonly required>
        </div>
        <div class="form-group">
            <label for"DataCriacao">Conta criada:</label>
            <input type="date" id="DataCriacao" name="DataCriacao" value="' . htmlspecialchars($DataCriacao, ENT_QUOTES, 'UTF-8') . '" readonly required>
        </div>
    </form>';
}

function Disciplinas() {
    // Mostrar Disciplinas inscritas
    print '<h1>Minhas Disciplinas</h1>';
}

function CursoCard() {
    print '
    <h1>Cursos Disponíveis</h1>
   <div class="course-container">
        <div class="course-card">
            <div class="course-image">
                <img src="https://www.mundoconectado.com.br/wp-content/uploads/2022/05/capa-programacao.jpg" alt="Curso de Programação">
            </div>
            <div class="course-info">
                <h3>Curso de Programação</h3>
                <p>Aprenda os fundamentos da programação com este curso abrangente e prático.</p>
                <p><strong>Preço: </strong> 199.99 €</p>
                <button class="buy-button"><i class="fa-solid fa-cart-shopping"></i> Comprar Curso</button>
            </div>
        </div>
        <div class="course-card">
            <div class="course-image">
                <img src="https://www.mundoconectado.com.br/wp-content/uploads/2022/05/capa-programacao.jpg" alt="Curso de Design">
            </div>
            <div class="course-info">
                <h3>Curso de Design</h3>
                <p>Desenvolva suas habilidades em design gráfico e web design.</p>
                <p><strong>Preço: </strong> 149.99 €</p>
                <button class="buy-button"><i class="fa-solid fa-cart-shopping"></i> Comprar Curso</button>
            </div>
        </div>
    </div>';
}

?>