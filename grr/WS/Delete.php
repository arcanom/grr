<?php

$con=mysqli_connect("localhost", "legrand", "legrand", "legrand") ;

   if (mysqli_connect_errno($con)) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
   }
   {
	   
	    $login = $_GET['login'];
		$result = mysqli_query($con, "DELETE FROM grr_utilisateurs WHERE login='$login'");
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