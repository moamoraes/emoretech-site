<?php

    $nome = addslashes($_POST['nome']);
    $email = addslashes($_POST['email']);
    $telefone = addslashes($_POST['telefone']);
    $mensagem = addslashes($_POST['mensagem']);

    $to = "contato@emoretech.com.br";
    $subject = "Contato $nome";

    $body = "$mensagem \n Telefone: $telefone";

    $header = "From: $to \n Reply-to: $email \n X=Mailer:PHP/".phpversion();

    if(mail($to, $subject, $body, $header)){
        echo("Email enviado!");
    }
    else{
        echo("Erro ao enviar e-mail");
    }
?>