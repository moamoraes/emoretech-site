<?php
    libxml_use_internal_errors(true);
    $dom = new \DOMDocument();
    $dom->loadHTMLFile("./index.html");

    $nome = addslashes($_POST['nome']);
    $email = addslashes($_POST['email']);
    $telefone = addslashes($_POST['telefone']);
    $mensagem = addslashes($_POST['mensagem']);

    // $to = "contato@emoretech.com.br";
    $to = "moacir.rodrigs@gmail.com";

    $subject = "Contato $nome";

    $body = "$mensagem \n Telefone: $telefone";

    $header = "From: $to \n Reply-to: $email \n X=Mailer:PHP/".phpversion();

    $message = "";

    if(mail($to, $subject, $body, $header)){
        $message = "Email enviado!";
    }
    else{
        $message = "Erro ao enviar e-mail";
    }
   
    $alertElement = $dom->getElementById('alert');

    if ($alertElement) {
        $alertMessage = $dom->createElement("p", $message);

        $alertElement->setAttribute('class', 'alert open');
        $alertElement->appendChild($alertMessage);        
    } else {        
        echo "Elemento #alert não encontrado.";
    }

    echo $dom->saveHTML();
?>