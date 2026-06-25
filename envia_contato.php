<?php

if (isset($_POST['name'])){
	
        //Variaveis de POST, Alterar somente se necessário 
        $nome = $_POST['name'];
        $email = $_POST['email'];
		$assunto = $_POST['subject'];
        $mensagem = $_POST['message']; 

        //REMETENTE --> ESTE EMAIL TEM QUE SER VALIDO DO DOMINIO
        $email_remetente = "contato@muffatao.com.br"; // deve ser um email do dominio

        //Configurações do email, ajustar conforme necessidade
        $email_destinatario = "marketingitajai@muffatao.com.br"; // qualquer email pode receber os dados
        $email_reply = "$email";
        $email_assunto = "Contato do Site CapVerão";

        //Monta o Corpo da Mensagem
        $email_conteudo = "Nome = $nome \n";
        $email_conteudo .= "Email = $email \n";
        $email_conteudo .=  "Assunto = $assunto \n";
        $email_conteudo .=  "Mensagem = $mensagem \n";

        //Seta os Headers (Alerar somente caso necessario)
        $email_headers = implode ( "\n",array ( "De: $email_remetente", "Reply-To: $email_reply", "Assunto: $email_assunto","Return-Path:  $email_remetente","MIME-Version: 1.0","X-Priority: 3","Content-Type: text/html; charset=UTF-8" ) );

        //Enviando o email
        if (mail ($email_destinatario, $email_assunto, nl2br($email_conteudo), $email_headers)){
               echo "<script type='text/javascript'> alert('Contato Enviado com Sucesso!'); window.location.href='contato.php'; </script>";
		}
		
       if( $_POST['copy'] == 'on' ){
			mail($_POST['email'], $subject, $message, $headers);
		}
}
?>