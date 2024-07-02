<?php
session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $_SESSION['Recover_email'] = $email;

        //Condição EMAIL BD
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "moodle_accounts";

        $conn = mysqli_connect($servername, $username, $password, $database);

        if ($conn == false){
            echo "Error Trying Connect to Database Server\n";
            print "<script>console.log('Error Trying Connect to Database Server\n')</script>;";
        }
        $verifica = "SELECT email FROM aluno WHERE email = '" . $_SESSION['Recover_email'] . "'";
        $resultado = mysqli_query($conn, $verifica);

        if (mysqli_num_rows($resultado) == 0) {
            print '<script>alert("Não existe nenhuma conta com endereço e-mail inserido\nPor favor tente novamente!!!")</script>';
            print '<script>window.location.href="index.html"</script>';
            mysqli_close($conn);
        }

        // Credenciais da API do Mailjet
        $api_key = '0ba2306831835e689d7a7b9b2b079971'; // Substitua pela sua chave de API
        $api_secret = '6c5a027fb4fc3f54688fc5e1528c3135'; // Substitua pelo seu segredo da API
        $numero_quatro_digitos = mt_rand(1000, 9999); // Gerar Código
        $_SESSION['numero_quatro_digitos'] = $numero_quatro_digitos;
    
        // Dados do e-mail
        $from_email = 'estaslixada1999@gmail.com'; // Substitua pelo seu endereço de e-mail
        $from_name = 'Darwin School';
        $subject = 'Recuperação de Conta';
        $text = '<h1>Recuperação Password</h1>';
        $html = '<p>Insira o código:  '. $numero_quatro_digitos .' na plataforma para recuperar palavra-passe. Obrigado!</p>';
    
        // Dados da requisição
        $postData = [
            'Messages' => [
                [
                    'From' => [
                        'Email' => $from_email,
                        'Name' => $from_name
                    ],
                    'To' => [
                        [
                            'Email' => $email
                        ]
                    ],
                    'Subject' => $subject,
                    'TextPart' => $text,
                    'HTMLPart' => $html
                ]
            ]
        ];
    
        // Inicializa cURL
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD, $api_key . ':' . $api_secret);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_URL, 'https://api.mailjet.com/v3.1/send');
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json'
        ]);
    
        // Executa a requisição e captura a resposta
        $result = curl_exec($ch);
        $info = curl_getinfo($ch);
    
        // Fecha a conexão cURL
        curl_close($ch);
    
        // Verifica se o e-mail foi enviado com sucesso
        if ($info['http_code'] == 200) {
            echo '<script>alert("E-mail enviado com sucesso!");</script>';
            print '<script>const mainContent = document.querySelector(".container"); mainContent.innerHTML = ""</script>';
            print '<script>window.location.href="code.html"</script>';
        } else {
            echo '<script>alert("Erro ao enviar o e-mail: ' . $result . '")</script>';
        }
    }
?>