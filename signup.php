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
    $nacionalidade = $_POST['nacionalidades']; // alterei para singular "nacionalidade"
    $birthplace = $_POST['birthplace'];
    $gender = $_POST['gender'];
    $transporte = $_POST['transporte'];
    $idnumber = $_POST['idnumber'];
    $taxnumber = $_POST['taxnumber'];
    $habilitacao = $_POST['habilitacao'];
    $employee = $_POST['employee'];
    $employer = isset($_POST['employer']) ? $_POST['employer'] : '';
    $status = 'Offline'; // definido manualmente como 'Ativo'
    $data_criacao = date('Y-m-d'); // data atual

    // Configurações de conexão com o banco de dados (exemplo)
    $servername = "localhost";
    $username = "root";
    $password_db = "";
    $dbname = "moodle_accounts";

    // Conexão com o banco de dados utilizando PDO
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password_db);
        // Configura o PDO para lançar exceções em caso de erros
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepara a query SQL usando prepared statements
        $stmt = $conn->prepare("INSERT INTO aluno 
                                (name, email, password, phone, address, postalcode, birthdate, nacionalidade, birthplace, gender, transporte, idnumber, taxnumber, habilitacao, employee, employer, status, Data_criacao) 
                                VALUES 
                                (:name, :email, :password, :phone, :address, :postalcode, :birthdate, :nacionalidade, :birthplace, :gender, :transporte, :idnumber, :taxnumber, :habilitacao, :employee, :employer, :status, :data_criacao)");

        // Bind dos parâmetros
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':postalcode', $postalcode);
        $stmt->bindParam(':birthdate', $birthdate);
        $stmt->bindParam(':nacionalidade', $nacionalidade);
        $stmt->bindParam(':birthplace', $birthplace);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':transporte', $transporte);
        $stmt->bindParam(':idnumber', $idnumber);
        $stmt->bindParam(':taxnumber', $taxnumber);
        $stmt->bindParam(':habilitacao', $habilitacao);
        $stmt->bindParam(':employee', $employee);
        $stmt->bindParam(':employer', $employer);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':data_criacao', $data_criacao);

        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "moodle_accounts";
    
        $conn = mysqli_connect($servername, $username, $password, $database);
    
        if ($conn == false){
            echo "Error Trying Connect to Database Server\n";
            print "<script>console.log('Error Trying Connect to Database Server\n')</script>;";
        }

       $verifica = 'select * from alunos where email = ' . $email;
       $sql = mysqli_query($conn, $verifica) or die ("Erro: Base de dados");

        if (mysqli_num_rows($sql) == 0) {
             // Executa a query
            $stmt->execute();
       } else {
            print '<script>alert("Já existe conta com este endereço e-mail");</script>';
            print '<script>window.location.href="index.php";</script>';
       }

       print '<script>alert("Registo efetuado com sucesso!!!");</script>';
       print '<script>window.location.href="../Moodle/login.html";</script>';
    } catch(PDOException $e) {
        echo "Erro ao inserir o registo no banco de dados: " . $e->getMessage();
    }

    // Fecha a conexão com o banco de dados
    $conn = null;
}
?>
