<?php
    libxml_use_internal_errors(true);
    $dom = new \DOMDocument();
    $dom->loadHTMLFile("./index.html");

    $name = addslashes($_POST['nome']);
    $clientEmail = addslashes($_POST['email']);
    $phone = addslashes($_POST['telefone']);
    $textEmail = addslashes($_POST['mensagem']);

    $from = "contato@emoretech.com.br";        

    $subject = "Contato $name";

    $body = "$textEmail \n Telefone: $phone";

    $headers .= "From: $from\n";
    $headers .= "Reply-To: $clientEmail\n";
    $headers .= "Return-Path: $from\n";

    $message = "";

    if(!mail($from, $subject, $body, $headers, "-r".$from)){ 
        $message = "Falha no envio de e-mail";
    }   
    else{
        $message = "Obrigado por entrar em contato, retornaremos em breve!";
    }

    $alertElement = $dom->getElementById('alert');    
    $alertMessage = $dom->createElement("p", $message);

    $alertElement->setAttribute('class', 'alert open');
    $alertElement->appendChild($alertMessage);   

    echo $dom->saveHTML();
?>