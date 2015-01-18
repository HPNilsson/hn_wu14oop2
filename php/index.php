<?php

	include_once("nodebite-swiss-army-oop.php");

	$ds = new DBObjectSaver(array(
	  "host" => "127.0.0.1",
	  "dbname" => "wu14oop2",
	  "username" => "root",
	  "password" => "mysql",
	  "prefix" => "hn_jultenta"
	));

		unset($ds->players);
		unset($ds->have_won);
		unset($ds->have_lost);
		unset($ds->challenges);
		unset($ds->available_tools);

		//Kolla på:
		//function sendSelectedOption
	 //$_request
	 //ajax anropen på fight.php

	$ds->players[] = New $player_class($player_name, $ds);

//then make random bots (can also be done with a while loop)
	$available_classes = array("Thief", "Acrobat", "Warrior" "Cleric");
	for ($i=0; $i < count($available_classes); $i++) { 
	  if ($available_classes[$i] != $player_class) {
	    $ds->players[] = New $available_classes[$i]("Bot".$i, $ds);
	  }
	}


	echo(json_encode($array_to_echo));
	echo(json_encode($ds->players[0]));
