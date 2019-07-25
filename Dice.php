<?php

class Dice {
	//Un dé a un nombre de cotés
	private $_nb_of_sides;
	//Un dé à une valeur
	private $_current_value;

	// Je veux pouvoir construire un dé de 6 faces
	public function __construct(){
		$ctp = func_num_args();
    	$args = func_get_args();
    	switch ($ctp){    		
    		case 1:
	    		$this->_nb_of_sides = $args[0];
				$this->rollDice();
				break;
			default:
				// j'attribue 6 au nombre de cotés du dé
				$this->_nb_of_sides = 6;
				$this->rollDice();
				break;
    	}
	}
	// Je veux pouvoir lancé le dé
	public function rollDice() {
		// J'attribue un nombre aléatoire de 1 à 6 (nb de cotés du dé) à la valeur du dé
		$this->_current_value = rand(1,$this->_nb_of_sides);
	}

	// Je veux pouvoir récupérer la valeur du dé
	public function getCurrentValue(){
		return $this->_current_value;
	}
}