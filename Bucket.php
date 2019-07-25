<?php

include_once 'Dice.php';


class Bucket {

	private $_diceList=[];

	public function __construct($nbDice){
		for($i=0;$i<$nbDice;$i++){
			$this->_diceList[]= new Dice(6);
		}
	}

	public function rollDices(){
		foreach($this->_diceList as $dice){
			$dice->rollDice();
			echo $dice->getCurrentValue() . '<br>';
		}
	}
}