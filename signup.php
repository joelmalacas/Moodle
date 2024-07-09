<?php
// Verifica se há dados recebidos via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura dos dados do formulário
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $postalcode = $_POST['postalcode'];
    $birthdate = $_POST['birthdate'];
    $nacionalidade = $_POST['nacionalidades'];
    $birthplace = $_POST['birthplace'];
    $gender = $_POST['gender'];
    $transporte = $_POST['transporte'];
    $idnumber = $_POST['idnumber'];
    $taxnumber = $_POST['taxnumber'];
    $habilitacao = $_POST['habilitacao'];
    $employee = $_POST['employee'];
    $employer = isset($_POST['employer']) ? $_POST['employer'] : '';
    $status = 'Offline';
    $data_criacao = date('Y-m-d');

    // Conexão com o banco de dados
    $servername = "localhost";
    $username = "root";
    $password_db = "";
    $database = "moodle_accounts";

    $conn = new mysqli($servername, $username, $password_db, $database);

    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT * FROM aluno WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 0) {
        $stmt = $conn->prepare("INSERT INTO aluno (nome, email, passe, telemovel, morada, codPostal, DataNascimento, nacionalidade, naturalidade, genero, PortadorDocumento, NumeroDocumento, contribuinte, habilitacao, situacao_profissional, Empresa, estado, DataConta) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssssssssssssss", $name, $email, $password, $phone, $address, $postalcode, $birthdate, $nacionalidade, $birthplace, $gender, $transporte, $idnumber, $taxnumber, $habilitacao, $employee, $employer, $status, $data_criacao);

        if ($stmt->execute()) {
            echo '<script>alert("Registo efetuado com sucesso!!!");</script>';
            echo '<script>window.location.href="../Moodle/login.html";</script>';
        } else {
            echo "Erro ao inserir o registo no banco de dados: " . $stmt->error;
        }
    } else {
        echo '<script>alert("Já existe conta com este endereço e-mail");</script>';
        echo '<script>window.location.href="index.php";</script>';
    }

    $stmt->close();
    $conn->close();
}
?>
