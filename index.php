<?php

//J'ouvre une session
session_start();
//J'inclue la page Bucket.php dont je vais avoir besoin
include_once 'Bucket.php';

//Si j'ai une session ouverte
if(isset($_SESSION['bucket'])){
	// je "déverouille" l'objet de cette session
	$bucket = unserialize($_SESSION['bucket']);
} else {
	// sinon je crée un nouvel objet
	$bucket = new Bucket(5);
}

//si j'ai coché un ou plusieurs n°de dé(s)
if(isset($_POST['indexOfDice'])){
	//pour chaque index de ces numéros de dés
	foreach ($_POST['indexOfDice'] as $index) {
		//je relance mon bucket
		$bucket->rerollDice($index);
	}
	$bucket->incrementCount();
}

//J'affiche les valeurs des dés de mon bucket
$bucket->displayDicesValues();


//J'affiche le nombre de jets relancés
echo '<br> Nombre de jets de dés : '. $bucket->getCount();

// mon résultat est constitué du total des valeurs de dés similaires
$result = array_count_values($bucket->getDicesValues());
// si le total des valeurs de dés similaires est >= à 4
if (max($result)>=4){
	//gagné
	echo '<br>Vous avez gagné en ' . $bucket->getCount() . ' jet(s)';
	// on deconnecte pour renouveler la prochaine partie
	session_destroy();
}else{
	// Je "reverouille" l'objet bucket
	$_SESSION['bucket']= serialize($bucket);
}


?>

<!-- ------------------HTML--------------------- -->

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Dices Game</title>
</head>
<body>


	<form action="" method="post">
		<label for="">Dice 1</label>
		<input type="checkbox" name="indexOfDice[]" value="1">
		<label for="">Dice 2</label>
		<input type="checkbox" name="indexOfDice[]" value="2">
		<label for="">Dice 3</label>
		<input type="checkbox" name="indexOfDice[]" value="3">
		<label for="">Dice 4</label>
		<input type="checkbox" name="indexOfDice[]" value="4">
		<label for="">Dice 5</label>
		<input type="checkbox" name="indexOfDice[]" value="5">
		<button type="submit">Relancer</button>
	</form>
<a href="reset.php">Nouvelle partie</a>


</body>
</html>