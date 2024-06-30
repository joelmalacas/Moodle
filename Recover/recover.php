<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    $numero_quatro_digitos = mt_rand(1000, 9999); // Gerar Código

    // Credenciais da API do Mailjet
    $api_key = 'bb6973848e1533938a38472090532822'; // Substitua pela sua chave de API
    $api_secret = '51cb26f43484b4b05ceb0bbbbefbac4f'; // Substitua pelo seu segredo da API

    // Dados do e-mail
    $from_email = 'joelmalacas@gmail.com'; // Substitua pelo seu endereço de e-mail
    $from_name = 'Darwin School';
    $subject = 'Recuperação de Conta';
    $text = '<h1>Recuperação Password</h1>';
    $html = '<p>Insira o código'. $numero_quatro_digitos .'na plataforma para recuperar palavra-passe. Obrigado!</p>';

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
        echo 'E-mail enviado com sucesso!';
    } else {
        echo 'Erro ao enviar o e-mail: ' . $result;
    }
}
?>
