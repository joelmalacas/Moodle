<?php
    require "valida.php";

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "moodle_accounts";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if ($conn == false){
        echo "Error Trying Connect to Database Server\n";
        print "<script>console.log('Error Trying Connect to Database Server\n')</script>;";
    }

?>