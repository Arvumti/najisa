<?php
	/*ini_set("SMTP","ssl://smtp.gmail.com");
	ini_set("smtp_port","587");
	ini_set('sendmail_from', 'crlomes@gmail.com');
	$seEnvio;      //Para determinar si se envio o no el correo
     $destinatario = 'crlomes@gmail.com';        //A quien se envia
     $elmensaje = 'algo';
     //Recupear el asunto
     $asunto = 'asunto';
     //Formatear un poco el texto que escribio el usuario (asunto) en la caja
     //de comentario con ayuda de HTML
     $cuerpomsg ='cuerpo';
	//Establecer cabeceras para la funcion mail()
    //version MIME
    $cabeceras = "MIME-Version: 1.0\r\n";
    //Tipo de info
    $cabeceras .= "Content-type: text/html; charset=iso-8859-1\r\n";
    //direccion del remitente
    $cabeceras .= "From: crlomes@gmail.com <crlomes@gmail.com>";
    if(mail($destinatario,$asunto,$cuerpomsg,$cabeceras))
        $seEnvio = true;
    else
        $seEnvio = false;*/

    include("class.phpmailer.php");
    include("class.smtp.php"); 
    $mail = new PHPMailer();
    $mail->IsSMTP(); 
    $mail->SMTPAuth = true;
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 465;
    $mail->Password = "215321532";
    $mail->Username = "crlomes@gmail.com";
    $mail->SMTPSecure = "ssl";
    
    $mail->From = "crlomes@gmail.com"; 
    $mail->FromName = "Nombre"; 
    $mail->Subject = "Asunto del Email"; 
    $mail->AltBody = "Este es un mensaje de prueba."; 
    $mail->MsgHTML("<b>Este es un mensaje de prueba</b>."); 
    $mail->AddAddress("crlomes@gmail.com", "Destinatario"); 
    $mail->IsHTML(true); 
    if(!$mail->Send()) { 
    echo "Error: " . $mail->ErrorInfo; 
    } else { 
    echo "Mensaje enviado correctamente"; 
    }
?>