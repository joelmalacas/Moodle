<?php
    $User = $_POST["email"];
    $senha = $_POST["password"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "moodle_accounts";

   $conn = mysqli_connect($servername, $username, $password, $database);

    if ($conn === false) {
        echo "Error connecting to Database...";
    }

    session_start();    
    
    $test = "SELECT * FROM aluno WHERE email ='$User' AND password = '$senha'";
    $result = "SELECT * FROM aluno WHERE name LIKE" ;
    $result .= "('$User')" . "LIMIT 5";  
    $resultado = mysqli_query($conn, $test) or die ("Erro ao verificar conta na base de dados...");

    if (mysqli_num_rows($resultado)<=0){
        print "<script>alert ('As credenciais inseridas estão inválidas... Tente Novamente!!!'); window.location.href = 'login.html'</script>";
    } else {
        $_SESSION["autenticado"] = true;
        $_SESSION["autenticado"] = $_POST['email'];
        $url = "index.php";
        header("location: " . $url);
    }
    mysqli_close($conn);
?>