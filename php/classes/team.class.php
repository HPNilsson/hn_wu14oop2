<?php

class Team extends Character {
	
	public $members = array();
	public $agility;
	public $luck;
	public $strength;
	public $cunning;
	public $tools = array();

	public function __construct($name, $humanPlayer, $computerPlayer){
		$this->members[] = $humanPlayer;
		$this->members[] = $computerPlayer;

		$this->agility = $humanPlayer->agility + $computerPlayer->agility;
		$this->luck = $humanPlayer->luck + $computerPlayer->luck;
		$this->strength = $humanPlayer->strength + $computerPlayer->strength;
		$this->cunning = $humanPlayer->cunning + $computerPlayer->cunning;
		
		for ($i=0; $i < count($this->members); $i++) {
			for ($j=0; $j < count ($this->members[$i]->tools); $j++) {
					$this->tools[] = $this->members[$i]->tools[$j];
			}
		}
		parent::__construct($name);
	}
}

