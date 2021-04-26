<?php

$con=mysqli_connect("localhost", "legrand", "legrand", "legrand") ;

   if (mysqli_connect_errno($con)) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
   }
   
      $lbeneficiaire = $_GET['beneficiaire'];
	  $result = mysqli_query($con,"SELECT `start_time`, `end_time`, `room_id`, grr_room.`room_name`, `codeOuverture` FROM grr_entry, grr_room WHERE `beneficiaire`='$beneficiaire' AND grr_entry.room_id = grr_room.id"	