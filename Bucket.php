<?php

//J'inclue la page Dice.php dont j'ai besoin ici
include_once 'Dice.php';


class Bucket {
	//Un Bucket a un tableau de dés
	private $_diceList=[];
	//il possède un compteur de jets de dés initialisé à 0
	private $_count=0;

	//Je veux pouvoir constuire un bucket grâce à son nombre de dés
	public function __construct($nbDices){
		 //et insérer des nouveaux dés dans le tableau de dés
		for($i=0;$i<$nbDices;$i++){
			$this->_diceList[]= new Dice(6);
		}
	}
	// On veut pouvoir les lancer
	public function rollDices(){
		// pour chaque dé du tableau de dés
		foreach($this->_diceList as $dice){
			// je lance le dé
			$dice->rollDice();
		}
	}
	// Je veux pouvoir récupérer les valeurs de tous les dés
	public function getDicesValues(){
		$values =[];
		foreach ($this->_diceList as $dice){
			$values[]= $dice->getCurrentValue();
		}return $values;
	}

	// Je veux pouvoir afficher les valeurs de tous les dés
	public function displayDicesValues(){
		//Pour chaque dé du tableau de dés
		foreach($this->_diceList as $dice){
			// j'affiche la valeur du dé
			echo $dice->getCurrentValue() . '<br>';
		}
	}

	//Je veux pouvoir relancer un dé grace à son n°
	public function rerollDice($NbOfDice){
		$this->_diceList[($NbOfDice-1)]->rollDice();
	}

	//Je veux pouvoir augementer mon compteur de 1 à chaque jet
	public function incrementCount(){
		$this->_count +=1;
	}

	//Je veux pouvoir récupérer la valeur du compteur
	public function getCount(){
		return $this->_count;
	}
	
	
} 