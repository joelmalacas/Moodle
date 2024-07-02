<?php
    require '../Moodle/Scripts/bd.php';
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
           <?php print '<h1 onclick="window.location.reload()">Olá '. $_SESSION['user_email'] .'👋</h1>'?>
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
    echo '<form class="perfil-form" method="POST">
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
        <div class="form-group">
            <button type="submit" class="btn-primary">Guardar Alterações</button>
        </div>
    </form>';
}

function Disciplinas() {
    // Mostrar Disciplinas inscritas
    print '<h1>Minhas Disciplinas</h1>';
}

function CursoCard() {
    echo '
    <h1>Cursos Disponíveis</h1>
    <div class="course-container">';
    
    // Array de cursos para exemplo. Substitua com dados reais ou dinâmicos.
    $cursos = [
        [
            'id' => 1,
            'nome' => 'Curso de Programação',
            'disciplinas' => ['Introdução à Programação', 'Estruturas de Dados', 'Algoritmos'],
            'descricao' => 'Aprenda os fundamentos da programação com este curso abrangente e prático.',
            'preco' => '199.99 €',
            'imagem' => 'https://www.mundoconectado.com.br/wp-content/uploads/2022/05/capa-programacao.jpg'
        ],
        [
            'id' => 2,
            'nome' => 'Curso de Design',
            'disciplinas' => ['Photoshop', 'Illustrator', 'InDesign'],
            'descricao' => 'Desenvolva suas habilidades em design gráfico e web design.',
            'preco' => '149.99 €',
            'imagem' => 'https://www.mundoconectado.com.br/wp-content/uploads/2022/05/capa-programacao.jpg'
        ]
    ];

    foreach ($cursos as $curso) {
        echo "
        <div class='course-card'>
            <div class='course-image'>
                <img src='{$curso['imagem']}' alt='{$curso['nome']}'>
            </div>
            <div class='course-info'>
                <h3>{$curso['nome']}</h3>
                <p>{$curso['descricao']}</p>
                <p><strong>Preço: </strong>{$curso['preco']}</p>
                <form method='post'>
                    <input type='hidden' name='curso_id' value='{$curso['id']}'>
                    <button class='view-button' type='submit' name='view_course'>Ver Detalhes</button>
                </form>
            </div>
        </div>
        ";
    }
    echo '</div>';

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['view_course'])) {
        $curso_id = (int)$_POST['curso_id']; // Garantir que $curso_id seja um inteiro
        $curso_selecionado = null;
    
        foreach ($cursos as $curso) {
            if ($curso['id'] === $curso_id) {
                $curso_selecionado = $curso;
                break;
            }
        }
    
        if ($curso_selecionado) {
            $curso_nome = $curso_selecionado['nome'];
            $curso_disciplinas = $curso_selecionado['disciplinas'];
            $curso_descricao = $curso_selecionado['descricao'];
            $curso_preco = $curso_selecionado['preco'];
            $curso_imagem = $curso_selecionado['imagem'];

            print '<script>const mainContent = document.querySelector(".main-content"); mainContent.innerHTML = ""</script>';
            print "<div class='Curso_desc'>
                                <h1>Detalhes do Curso</h1>
                                <img src='{$curso_imagem}' class='ImgCurso' alt='{$curso_nome}'>
                                <h3 class='CursoNome'>{$curso_nome}</h3>
                                <p class='Desc'>{$curso_descricao}</p>
                                <p class='Desc'><strong>Preço: </strong>{$curso_preco}</p>
                                <h3>Disciplinas</h3>
                                <ul>";
                                foreach ($curso_disciplinas as $disciplina) {
                                    print "<li>{$disciplina}</li>";
                                }
                                print "</ul>
                                <form method='post' action='comprar.php'>
                                    <input type='hidden' name='curso_id' value='{$curso_id}'>
                                    <button class='buy-button' type='submit'><i class='fa-solid fa-cart-shopping'></i> Comprar Curso</button>
                                </form>
                    </div>";
        } else {
            print "<script>alert('Curso não encontrado.')</script>";
        }
    }
}

?>