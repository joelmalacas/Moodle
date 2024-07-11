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
                    <button type="submit" name="AddProfessor" id="AddProfessor"><i class="fa-solid fa-plus"></i> Professor</button>
                </form>
            </li>
            <li>
                <form method="POST" action="">
                    <button type="submit" name="RemProfessor" id="RemProfessor"><i class="fa-solid fa-minus"></i> Professor</button>
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

            if (isset($_POST['Alunos'])) {
                print '<script>const mainContent = document.querySelector(".main-content"); mainContent.innerHTML = ""</script>';
                print '<script>const Alunos = document.getElementById("Alunos"); Alunos.classList.add("active");</script>';

                print '
                    <div class="form-container">
                    <div class="search-container">
                        <input type="text" id="search" placeholder="Pesquisar alunos...">
                        <button type="button" id="searchButton"><i class="fas fa-search"></i></button>
                    </div>
                        <h1>Lista de Alunos</h1>
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Telemóvel</th>
                                    <th>Tipo Documento</th>
                                    <th>Número Documento</th>
                                    <th>Data Conta</th>
                                    <th>Nacionalidade</th>
                                    <th>Género</th>
                                    <th>estado</th>
                                </tr>
                            </thead>
                            <tbody>
                ';

                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "moodle_accounts";
                
                // Create connection
                $conn = new mysqli($servername, $username, $password, $database);
                
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                
                // Fetch students
                $sql = "SELECT * FROM aluno";
                $result = $conn->query($sql);
                
                // Count students
                $count = "SELECT COUNT(*) as Contagem FROM aluno";
                $count_result = $conn->query($count);
                $count_row = $count_result->fetch_assoc();
                $contagem = $count_row['Contagem'];
                
                // Display students
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["nome"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>" . $row["telemovel"] . "</td>";
                        echo "<td>" . $row["PortadorDocumento"] . "</td>";
                        echo "<td>" . $row["NumeroDocumento"] . "</td>";
                        echo "<td>" . $row["DataConta"] . "</td>";
                        echo "<td>" . $row["nacionalidade"] . "</td>";
                        echo "<td>" . $row["genero"] . "</td>";
                        echo "<td>" . $row["estado"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='9'>Nenhum aluno encontrado</td></tr>";
                }
                
                // Display total count of students
                echo "<h4>Total: " . $contagem . " alunos</h4>";
                
                // Close connection
                $conn->close();
                print '</div>';
            }

            if (isset($_POST['Inscricoes'])) {
                print '<script>const mainContent = document.querySelector(".main-content"); mainContent.innerHTML = ""</script>';
                print '<script>Inscricoes = document.getElementById("Inscricoes"); Inscricoes.classList.add("active");</script>';

            }

            if (isset($_POST['AddProfessor'])) {
                print '<script>const mainContent = document.querySelector(".main-content"); mainContent.innerHTML = ""</script>';
                print '<script>const AddProfessor = document.getElementById("AddProfessor"); AddProfessor.classList.add("active");</script>';
                print '
                    <div class="form-container">
                    <form method="post">
                        <h2 class="TituloFORM">Adicionar Professor</h2>
                        <div class="form-group">
                            <label for="name">Nome:</label>
                            <input type="text" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="subject">Especialidade:</label>
                            <input type="text" id="especialidade" name="especialidade">
                        </div>
                        <div class="form-group">
                            <label for="message">Foto:</label>
                            <input type="file" id="foto" name="foto">
                        </div>
                        <button type="submit" name="Criar">Adicionar</button>
                    </form>
                </div>
                ';
            }

            if (isset($_POST['RemProfessor'])) {
                print '<script>const mainContent = document.querySelector(".main-content"); mainContent.innerHTML = ""</script>';
                print '<script>const RemProfessor = document.getElementById("RemProfessor"); RemProfessor.classList.add("active");</script>';
                print '
                    <div class="form-container">
                    <form method="post">
                        <h2 class="TituloFORM">Remover Professor</h2>
                        <div class="form-group">
                            <label for="name">E-mail:</label>
                            <input type="text" id="RemEmail" name="RemEmail" placeholder="Introduza o enderço e-mail para remover">
                        </div>
                        <button type="submit" name="RemProf">Remover</button>
                    </form>
                </div>
                ';
            }

            if (isset($_POST['CriaCurso'])) {
                print '<script>const mainContent = document.querySelector(".main-content"); mainContent.innerHTML = ""</script>';
                print '<script>const CriaCurso = document.getElementById("CriaCurso"); CriaCurso.classList.add("active");</script>';
                print '
                    <div class="form-container">
                    <form method="post">
                        <h2 class="TituloFORM">Adicionar Curso</h2>
                        <div class="form-group">
                            <label for="name">Nome:</label>
                            <input type="text" id="name" name="name" placeholder="Nome do Curso">
                        </div>
                        <div class="form-group">
                            <label for="subject">Preço:</label>
                            <input type="number" id="preco" name="preco" placeholder="Adicionar preço do curso">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" placeholder="Adicionar E-mail do professor ao curso">
                        </div>
                        <div class="form-group">
                            <label for="Foto">Adicionar fotografia:</label>
                            <input type="file" id="fileCurso" name="fileCurso">
                        </div>
                        <div class="form-group">
                            <label for="subject">Descrição:</label>
                            <br>
                            <textarea id="descricao" name="descricaoCurso" placeholder="Adicionar descrição"></textarea>
                        </div>
                        <button type="submit" name="Criar">Adicionar</button>
                    </form>
                </div>
                ';

            }

            if (isset($_POST['CriaDisciplina'])) {
                print '<script>const mainContent = document.querySelector(".main-content"); mainContent.innerHTML = ""</script>';
                print '<script>const CriaDisciplina = document.getElementById("CriaDisciplina"); CriaDisciplina.classList.add("active");</script>';
                print '
                    <div class="form-container">
                    <form method="post">
                        <h2 class="TituloFORM">Adicionar Disciplina</h2>
                        <div class="form-group">
                            <label for="name">Nome:</label>
                            <input type="text" id="name" name="name" placeholder="Nome da Disciplina">
                        </div>
                        <div class="form-group">
                            <label for="subject">Curso:</label>
                            <input type="text" id="Curso" name="Curso" placeholder="Adiciona o curso para adicionar a disciplina ao mesmo">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" placeholder="Adicionar E-mail do professor à disciplina">
                        </div>
                        <div class="form-group">
                            <label for="Foto">Adicionar fotografia:</label>
                            <input type="file" id="fileDisciplina" name="fileDisciplina">
                        </div>
                        <div class="form-group">
                            <label for="subject">Descrição:</label>
                            <br>
                            <textarea id="descricao" name="descricao" placeholder="Adicionar descrição"></textarea>
                        </div>
                        <button type="submit" name="Criar">Adicionar</button>
                    </form>
                </div>
                ';

            }

            if (isset($_POST['EditCurso'])) {
                print '<script>const mainContent = document.querySelector(".main-content"); mainContent.innerHTML = ""</script>';
                print '<script>const EditCurso = document.getElementById("EditCurso"); EditCurso.classList.add("active");</script>';


            }

            if (isset($_POST['EditDisciplina'])) {
                print '<script>const mainContent = document.querySelector(".main-content"); mainContent.innerHTML = ""</script>';
                print '<script>const EditDisciplina = document.getElementById("EditDisciplina"); EditDisciplina.classList.add("active");</script>';


            }

            if (isset($_POST['RemCurso'])) {
                print '<script>const mainContent = document.querySelector(".main-content"); mainContent.innerHTML = ""</script>';
                print '<script>const RemCurso = document.getElementById("RemCurso"); RemCurso.classList.add("active");</script>';
                print '
                    <div class="form-container">
                    <form method="post">
                        <h2 class="TituloFORM">Remover Curso</h2>
                        <div class="form-group">
                            <label for="name">Nome Curso:</label>
                            <input type="text" id="RemCurso" name="RemCurso" placeholder="Introduza o nome do curso a remover">
                        </div>
                        <button type="submit" name="RemProf">Remover</button>
                    </form>
                </div>
                ';

            }

            if (isset($_POST['RemDisciplina'])) {
                print '<script>const mainContent = document.querySelector(".main-content"); mainContent.innerHTML = ""</script>';
                print '<script>const RemDisciplina = document.getElementById("RemDisciplina"); RemDisciplina.classList.add("active");</script>';
                print '
                    <div class="form-container">
                    <form method="post">
                        <h2 class="TituloFORM">Remover Disciplina</h2>
                        <div class="form-group">
                            <label for="name">Nome Disciplina:</label>
                            <input type="text" id="RemDiscipina" name="RemDiscipina" placeholder="Introduza a disciplina a remover">
                        </div>
                        <button type="submit" name="RemProf">Remover</button>
                    </form>
                </div>
                ';

            }
        ?>
    </main>
</body>
</html>