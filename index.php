<?php
session_start();
include_once 'Bucket.php';

if(isset($_SESSION['bucket'])){
	$bucket = unserialize($_SESSION['bucket']);
} else {
	$bucket = new Bucket(5);
}
$bucket->displayDicesValues();

$bucket->rollDices();

echo '<br>';

$bucket->displayDicesValues();

$_SESSION['bucket']= serialize($bucket);