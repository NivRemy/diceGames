<?php
session_start();
include_once 'Bucket.php';

if(isset($_SESSION['bucket'])){
	$bucket = unserialize($_SESSION['bucket']);
} else {
	$bucket = new Bucket(5);
}

if(isset($_POST['index'])){
	foreach ($_POST['index'] as $index) {
		$bucket->rerollDice($index);
	}
	$bucket->incrementCount();
}



$bucket->displayDicesValues();

echo '<br> Nombre de jets: ' . $bucket->getCount();

$result = array_count_values($bucket->getDicesValues());
if (max($result)>=4){
	echo '<br>Vous avez gagné en ' . $bucket->getCount() . ' jets';
	session_destroy();
}else{
	$_SESSION['bucket']= serialize($bucket);
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Dices Game</title>
</head>
<body>
	<form action="" method="post">
		<label for="">Dice 1</label>
		<input type="checkbox" name="index[]" value="1">
		<label for="">Dice 2</label>
		<input type="checkbox" name="index[]" value="2">
		<label for="">Dice 3</label>
		<input type="checkbox" name="index[]" value="3">
		<label for="">Dice 4</label>
		<input type="checkbox" name="index[]" value="4">
		<label for="">Dice 5</label>
		<input type="checkbox" name="index[]" value="5">
		<button type="submit">Relancer</button>
	</form>

	<a href="reset.php">Nouvelle partie</a>
</body>
</html>