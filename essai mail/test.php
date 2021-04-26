<?php  
	
  include("class.phpmailer.php");
  include("class.smtp.php");
  date_default_timezone_set("Europe/Paris"); 
  
  $mail             = new PHPMailer(); 
    echo "debut1";

  $body             = "Votre Mot de Passe Temporaire sur Grr"; 
  $mail->IsSMTP();
  $mail->SMTPAuth   = true;
  $mail->SMTPOptions = array('ssl' => array('verify_peer' => false,'verify_peer_name' => false,'allow_self_signed' => true)); // ignorer l'erreur de certificat.
  $mail->Host       = "smtp.laposte.net";  
  $mail->Port       = 465;
  $mail->Username   = "projetlegrand@laposte.net";
  $mail->Password   = "Legrand62";        
  $mail->From       = "projetlegrand@laposte.net"; //adresse d’envoi correspondant au login entré précédemment
  $mail->FromName   = "legrand"; // nom qui sera affiché
  $mail->Subject    = "changement de mot de passe"; // sujet
  $mail->AltBody    = "votre mot de passe temporaire est 123456, veuillez vous connecter sur Grr pou pouvoir le modifier"; //Body au format texte
  $mail->WordWrap   = 50; // nombre de caractères pour le retour à la ligne automatique
  $mail->MsgHTML($body); 
  $mail->AddReplyTo("projetlegrand@laposte.net","Legrand");
  /* $mail->AddAttachment("./examples/images/phpmailer.gif");// pièce jointe si besoin */
  $mail->AddAddress("alexandreleclercq62400@gmail.com","projetlegrand@laposte.net");
  $mail->IsHTML(true); // envoyer au format html, passer a false si en mode texte 
  if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
  } else {
    echo "Le message à bien été envoyé";
  } 
?>