<?php
session_start();

if ($_SESSION['LogAdmin'] == false || $_SESSION['LogAdmin'] == null) {
    header('location:' . "http://localhost/Moodle/login.html");
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/index.css">
    <title>DarwinSchool - Index</title>
    <link rel="shortcut icon" href="../Media/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<header>
        <div class="logo">
            <img src="../Media/logo.png" alt="DarwinSchool Logo">
           <?php print '<h1 onclick="window.location.reload()">Olá Administrador 👋</h1>'?>
        </div>  
        <nav>
            <ul>
                <li>
                    <form method="POST" action="">
                        <button type="submit" name="CriaCurso" id="Pprincipal" class="active"><i class="fa-solid fa-plus"></i> Criar Curso</button>
                    </form>
                </li>
                <li>
                    <form method="POST" action="">
                        <button type="submit" name="CriaDisciplina" id="Perfil"><i class="fa-solid fa-plus"></i> Cria disciplina</button>
                    </form>
                </li>
                <li>
                    <form method="POST" action="">
                        <button type="submit" name="EditCurso" id="Pprincipal" class="active"><i class="fa-solid fa-pen-to-square"></i> Editar Curso</button>
                    </form>
                </li>
                <li>
                    <form method="POST" action="">
                        <button type="submit" name="EditDisciplina" id="Perfil"><i class="fa-solid fa-pen-to-square"></i> Editar disciplina</button>
                    </form>
                </li>
                <li>
                    <form method="POST" action="">
                        <button type="submit" name="RemCurso" id="Perfil"><i class="fa-solid fa-minus"></i> Remover curso</button>
                    </form>
                </li>
                <li>
                    <form method="POST" action="">
                        <button type="submit" name="RemDisciplina" id="Perfil"><i class="fa-solid fa-minus"></i> Remover disciplina</button>
                    </form>
                </li>
                <li>
                    <form method="POST" action="">
                        <button type="submit" name="Alunos" id="Disciplina"><i class="fas fa-user"></i> Alunos</button>
                    </form>
                </li>
                <li>
                    <form method="POST" action="">
                        <button type="submit" name="Inscricoes" id="Disciplina"><i class="fa-solid fa-address-card"></i> Inscrições</button>
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
            // Isset's e functions
            if (isset($_POST['Logout'])) {
                $_SESSION['LogAdmin'] = false;
                header('location:' . "http://localhost/Moodle/index.php");
            }
        ?>
    </main>
</body>
</html>