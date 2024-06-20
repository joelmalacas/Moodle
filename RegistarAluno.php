<?php
// Conectar ao banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$database = "moodle";

$conn = mysqli_connect($servername, $username, $password, $database);

if ($conn === false) {
    die("Erro ao tentar conectar ao servidor de banco de dados.");
}

// Verificar se os dados foram submetidos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Dados do aluno
    $nome = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $passe = $_POST['password'] ?? '';
    $telemovel = $_POST['phone'] ?? '';
    $morada = $_POST['address'] ?? '';
    $codPostal = $_POST['postalcode'] ?? '';
    $DataNascimento = $_POST['birthdate'] ?? '';
    $DataValidadeDocumento = $_POST['idexpiry'] ?? '';
    $nacionalidade = $_POST['nationality'] ?? '';
    $naturalidade = $_POST['birthplace'] ?? '';
    $genero = $_POST['gender'] ?? '';
    $PortadorDocumento = $_POST['transporte'] ?? '';
    $NumeroDocumento = $_POST['idnumber'] ?? '';
    $contribuinte = $_POST['taxnumber'] ?? '';
    $habilitacao = $_POST['habilitacao'] ?? '';
    $situacao_profissional = $_POST['employee'] ?? '';
    $Empresa = $_POST['employer'] ?? '';
    $estado = 'Offline';
    $DataConta = date('Y-m-d');

    // Converter datas para "ano-mês-dia"
    $DataNascimento = date('Y-m-d', strtotime($DataNascimento));
    $DataValidadeDocumento = date('Y-m-d', strtotime($DataValidadeDocumento));

    // Usar prepared statements para evitar SQL Injection
    $stmt = $conn->prepare("INSERT INTO aluno (nome, email, passe, telemovel, morada, codPostal, DataNascimento, nacionalidade, naturalidade, genero, PortadorDocumento, NumeroDocumento, DataValidadeDocumento, contribuinte, habilitacao, situacao_profissional, Empresa, DataConta, estado) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssssssssssssss", $nome, $email, $passe, $telemovel, $morada, $codPostal, $DataNascimento, $nacionalidade, $naturalidade, $genero, $PortadorDocumento, $NumeroDocumento, $DataValidadeDocumento, $contribuinte, $habilitacao, $situacao_profissional, $Empresa, $DataConta, $estado);
    
    if ($stmt->execute() === TRUE) {
        echo '<script>alert("Novo registro inserido com sucesso");</script>';
        header('Location: login.php');
        exit();
    } else {
        echo '<script>alert("Erro: " . $stmt->error);</script>';
    }

    // Fecha a conexão
    $stmt->close();
}

$conn->close();
?>
