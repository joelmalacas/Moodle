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
    <title>DarwinSchool - Index</title>
    <link rel="stylesheet" href="../Administrador/index.css">
    <link rel="shortcut icon" href="../Media/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<script src="../Administrador/index.js"></script>

<body>
    <nav class="sidebar">
        <header>
            <div class="logo" onclick="window.location.reload()">
                <img src="../Media/logo.png" alt="DarwinSchool Logo">
                <?php print '<h2>Olá Admin 👋</h2>'?>
            </div>  
        </header>
        <ul>
            <li>
                <form method="POST" action="">
                    <button type="submit" name="Alunos" id="Alunos"><i class="fas fa-user"></i> Alunos</button>
                </form>
            </li>
            <li>
                <form method="POST" action="">
                    <button type="submit" name="Inscricoes" id="Inscricoes"><i class="fa-solid fa-address-card"></i> Inscrições</button>
                </form>
            </li>
            <li>
                <form method="POST" action="">
                    <button type="submit" name="CriaCurso" id="CriaCurso"><i class="fa-solid fa-plus"></i> Criar Curso</button>
                </form>
            </li>
            <li>
                <form method="POST" action="">
                    <button type="submit" name="CriaDisciplina" id="CriaDisciplina"><i class="fa-solid fa-plus"></i> Criar disciplina</button>
                </form>
            </li>
            <li>
                <form method="POST" action="">
                    <button type="submit" name="EditCurso" id="EditCurso"><i class="fa-solid fa-pen-to-square"></i> Editar Curso</button>
                </form>
            </li>
            <li>
                <form method="POST" action="">
                    <button type="submit" name="EditDisciplina" id="EditDisciplina"><i class="fa-solid fa-pen-to-square"></i> Editar disciplina</button>
                </form>
            </li>
            <li>
                <form method="POST" action="">
                    <button type="submit" name="RemCurso" id="RemCurso"><i class="fa-solid fa-minus"></i> Remover curso</button>
                </form>
            </li>
            <li>
                <form method="POST" action="">
                    <button type="submit" name="RemDisciplina" id="RemDisciplina"><i class="fa-solid fa-minus"></i> Remover disciplina</button>
                </form>
            </li>
            <li>
                <form method="POST" action="">
                    <button type="submit" name="Logout"><i class="fa-solid fa-right-from-bracket"></i> Encerrar Sessão</button>
                </form>
            </li>
        </ul>
    </nav>
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