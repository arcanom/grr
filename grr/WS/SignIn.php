<?php

$con=mysqli_connect("localhost", "legrand", "legrand", "legrand") ;

   if (mysqli_connect_errno($con)) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
   }

   $login = $_GET['login'];
   $password = $_GET['password'];
   $result = mysqli_query($con,"SELECT statut FROM grr_utilisateurs where login='$login' 
      and Password=MD5('$password')");
   $row = mysqli_fetch_array($result);
   $data = $row[0];
   
	if($data){
      echo $data;
   }
  /* else
	   
	   {
		   echo "Compte inexistant";
	   }*/
   mysqli_close($con);
?>
