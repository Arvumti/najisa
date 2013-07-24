<?php
    include("class.phpmailer.php");
    include("class.smtp.php"); 
	
	$user = "arvumti@gmail.com";
	$pass = "arvum2013";	
	
	$iNombre = $_POST["Nombre"];
	$iEmail = $_POST["Email"];
	$iMotivo = $_POST["Motivo"];
	$iMensaje = $_POST["Mensaje"];
	
    $mail = new PHPMailer();
    $mail->IsSMTP(); 
    $mail->SMTPAuth = true;
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587;
    $mail->Password = $pass;
    $mail->Username = $user;
    $mail->SMTPSecure = "tls";
    
	$mail->SetFrom($iEmail, $iNombre);
    $mail->From = $iEmail; 
    $mail->FromName = $iNombre; 
    $mail->Subject = $iMotivo; 
    $mail->AltBody = $iMensaje; 
    $mail->MsgHTML("<p>$iMensaje.</p>"); 
    $mail->AddAddress($user, "Najisa"); 
    $mail->IsHTML(true); 
    if(!$mail->Send()) { 
		echo "Error: " . $mail->ErrorInfo; 
    } else { 
		echo 1; 
    }
?>