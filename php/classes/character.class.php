<?php
	
	class Character extends Challenges {
 // Thief, Cleric, Warrior, Acrobat
	public $name;
	public $agility;
	public $luck;
	public $strength;
	public $cunning;
	public $success;

	protected $tools = array();

	public function __construct($name){
		$this->name= $name;

	}

//$this kallar man bara på i klasserna. 



	public function has_won(){
		if ($this->success>=100) {
			echo($this->name." has won the game!".'<br>');
		}
		else {
			echo($this->name." has not won the game.".'<br>');
			}
	}

	public function acceptChallenge(){

	}

	public function changeChallenge(){

	}

	public function carryOutChallenge() {
			
	}
	

	public function carryOutChallengeWithCompanion(){

	}

	public function winTool(){

	}

	public function looseTool(){

	}

	public function getAgility(){
  return $this->agility;
	}

	public function getSuccess(){
		return $this->success;
	}

	public function getStrength(){
		return $this->strength;
	}

	public function getLuck(){
		return $this->luck;
	}

	public function getCunning(){
		return $this->cunning;
	}
	
}