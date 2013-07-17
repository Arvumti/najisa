<?php
	ini_set("SMTP","smtp.gmail.com");
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
        $seEnvio = false;
?>