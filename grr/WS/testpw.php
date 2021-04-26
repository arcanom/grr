<?php

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
	
}

echo chaine_aleatoire();

?>