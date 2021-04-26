<?php

$con=mysqli_connect("localhost", "legrand", "legrand", "legrand") ;

   if (mysqli_connect_errno($con)) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
   }
   {
	   $login = $_GET['login'];
	   $resultat = mysqli_query($con,"SELECT email FROM grr_utilisateurs WHERE login='$login'"); 
	   
	   
	// Génération d'une chaine aléatoire
	function chaine_aleatoire($nb_car='5', $chaine = 'azertyuiopqsdfghjklmwxcvbn123456789')
		{
			$nb_lettres = strlen($chaine) - 1;
			$generation = '';
		for($i=0; $i < $nb_car; $i++)
			{
				$pos = mt_rand(0, $nb_lettres);
				$car = $chaine[$pos];
				$generation .= $car;
    }
    return $generation;
	
}>

$mdp = md5($generation);

	   require 'phpmailer2/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.laposte.net';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'projetlegrand@laposte.net';                 // SMTP username
$mail->Password = 'Legrand62';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('projetlegrand@laposte.net', 'Projet Legrand');
$mail->addAddress($resultat, 'Destinataire du Message');     // Add a recipient
$mail->addAddress('projetlegrand@laposte.net');               // Name is optional
$mail->addReplyTo('alexandreleclercq62400@gmail.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Mot de passe temporaire';
$mail->Body    = 'Veuillez trouvez ci joint votre mot de passe temporaire:' . $mdp ;
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
 /* include("class.phpmailer.php");
  include("class.smtp.php");
  date_default_timezone_set("Europe/Paris"); 
  $mail             = new PHPMailer(); 
  $body             = "Votre Mot de Passe Temporaire sur Grr"; 
  $mail->IsSMTP();
  $mail->SMTPAuth   = true;
  $mail->SMTPOptions = array('ssl' => array('verify_peer' => false,'verify_peer_name' => false,'allow_self_signed' => true)); // ignorer l'erreur de certificat.
  $mail->Host       = "mail.votredomaine.tld";  
  $mail->Port       = 25;
  $mail->Username   = "legrandprojetbethune@gmx.fr";
  $mail->Password   = "legrand62";        
  $mail->From       = "legrandprojetbethune@gmx.fr"; //adresse d’envoi correspondant au login entré précédemment
  $mail->FromName   = "legrand"; // nom qui sera affiché
  $mail->Subject    = "changement de mot de passe"; // sujet
  $mail->AltBody    = "votre mot de passe temporaire est $mdp, veuillez vous connecter sur Grr pou pouvoir le modifier"; //Body au format texte
  $mail->WordWrap   = 50; // nombre de caractères pour le retour à la ligne automatique
  $mail->MsgHTML($body); 
  $mail->AddReplyTo("votre mail","votre nom");
  $mail->AddAttachment("./examples/images/phpmailer.gif");// pièce jointe si besoin
  $mail->AddAddress("adresse destinataire 1","adresse destinataire 2");
  $mail->IsHTML(true); // envoyer au format html, passer a false si en mode texte 
  if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
  } else {
    echo "Le message à bien été envoyé";
  } 

}
*/

	$result = mysqli_query($con, "UPDATE grr_utilisateurs SET password='$mdp' WHERE login='$login'"); 
	   		$row = mysqli_fetch_array($result);
   $data = $row[0];
   
	if($data){
      echo $data;
   }
   else
	   
	   {
		   echo "Erreur de communication";
	   }
   mysqli_close($con);
?>
