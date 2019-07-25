<?php

include_once 'Dice.php';


class Bucket {

	private $_diceList=[];
	private $_count=0;

	public function __construct($nbDice){
		for($i=0;$i<$nbDice;$i++){
			$this->_diceList[]= new Dice(6);
		}
	}

	public function rollDices(){
		foreach($this->_diceList as $dice){
			$dice->rollDice();
		}
	}

	public function displayDicesValues(){
		foreach($this->_diceList as $dice){
			echo $dice->getCurrentValue() . '<br>';
		}
	}

	public function getDicesValues(){
		$values = [];
		foreach($this->_diceList as $dice){
			$values[]= $dice->getCurrentValue();
		}
		return $values;
	}

	public function rerollDice($index){
		$this->_diceList[($index-1)]->rollDice();
	}

	public function getCount(){
		return $this->_count;
	}

	public function incrementCount(){
		$this->_count += 1;
	}
}