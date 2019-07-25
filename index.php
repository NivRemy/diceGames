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
}


$bucket->displayDicesValues();

$_SESSION['bucket']= serialize($bucket);

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
</body>
</html>