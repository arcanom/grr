<?php

$con=mysqli_connect("localhost", "legrand", "legrand", "legrand") ;

   if (mysqli_connect_errno($con)) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
   }
	else{
	   
	    $login = $_GET['login'];
		$nom = $_GET['nom'];
		$prenom = $_GET['prenom'];
		$password1 = $_GET['password'];
		$password = md5($password1) ;
        $email = $_GET['email'] ;
		var_dump($_GET);
		$result = mysqli_query($con,"INSERT INTO  grr_utilisateurs (login, nom, prenom, password, email, statut, etat, default_site, default_area, default_room, default_list_type, default_language)
		VALUES ('$login', '$nom', '$prenom', '$password','$email', 'utilisateur', 'actif', '-1', '-1', '-1', 'item', 'fr')");
		$row = mysqli_fetch_array($result);
		$data = $row[0];
		if($result == true){
		  echo $data;
	   }
	   else   
		   {
			   echo "Erreur de communication";
		   }
		mysqli_close($con);
	}
?>
