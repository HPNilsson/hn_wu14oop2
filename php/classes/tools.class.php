<?php

class Tools extends Base {
	public function __construct(&$owner){
		$this->owner = $owner;
		$this->owner->item = $this;
		$this->description = $description;
		$this->skills = $skills;
	}
	
	protected $owner = FALSE;

	public $description;
	public $skills;

	$tools[] = new Tool(
		"Knifejugglers Tips and Tricks",
		array(
			"agility" => 10,
			)
		);

	$tools[] = new Tool(
		"Lucky charm",
		array(
			"luck" => 10,
			)
		);

	$tools[] = new Tool(
		"Token of strength",
		array(
			"strength" => 10,
			)
		);

	$tools[] = new Tool(
		"Guidebook of knowledge",
		array(
			"cunning" => 10,
			)
		);

}