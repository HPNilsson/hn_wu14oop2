<?php

class Challenges extends Base {


  protected $description;
  protected $skills;


 public function __construct($description,$skills){
  $this->description = $description;
  $this->skills = $skills;
 }

	public function howGoodIsCharacterAtChallenge($person){
		$sum = 0;
		$max = 0;

		foreach ($this->skills as $skill => $points){
			$needed = $points;
			$has = $person->{$skill.'Skill'};

			if (count($person->tools) > 0){
				for ($i = 0; $i < count($person->tools); $i++){
					foreach ($person->tools[$i]->skills as $toolSkill => $value){
						if ($toolSkill == $skill){
							$has += $value;
						}
					}
				}
			}
		


			$sum += $has > $needed ? $needed : $has;
			$max += $needed;

		}

		return $sum/$max;
	}


	public function winChances($persons){
   $matches = array();
   //count is used to create a range of win intervals for all characters
   $count = 0;
   //calculate chance to win using howGoodIsCharacterAtChallenge()
   foreach($persons as $person){
     $howGoodIsCharacterAtChallenge = $this->howGoodIsCharacterAtChallenge($person);
     //and store result in matches
     $matches[] = array(
       "person" => $person,
       "howGoodIsCharacterAtChallenge" => $howGoodIsCharacterAtChallenge,
     );
     //increase count to create an interval
     $count += $howGoodIsCharacterAtChallenge;
   }
   //also create a percentage to be nice (better to count with)
   foreach($matches as &$match){
     $match["winChancePercent"] = round(100*($match["howGoodIsCharacterAtChallenge"]/$count));
   }
   //return win chances
   return $matches;
 }

  // Randomize a winner according to win chances for each person
  public function playChallenge($persons){
    //get chances to win for each person
    $matches = $this->winChances($persons);
    //once again we are using intervals to check for a winner
    $count = 0;
    //pick a random number (between 0 and 100 since we are using percent)
    $rand = rand(0,100);

    //then check which person interval contains the random number
    foreach($matches as $match){
      if(
        $rand >= $count && 
        $rand <= $match["winChancePercent"] + $count
      ){
        //if a persons interval contains the random number
        // we have a winner, end function using return
        return $match["person"];
      }
      //if this person was not a winner, increase interval and try again...
      $count += $match["winChancePercent"];
    }	

  $challenges = array();
	$persons = array();
	$tools = array();



	$ds->$challenges[] = new Challenge(
		  "Balance a knife on your head. ",
		  array(
		    "agility" => 80,
		    "luck" => 70,
		    "strength" => 0,
		    "cunning" => 50
		  )
		);

  $ds->$challenges[] = new Challenge(
      "Guess what is in the box. ",
      array(
        "agility" => 0,
        "luck" => 80,
        "strength" => 50,
        "cunning" => 70
      )
    );

  $ds->$challenges[] = new Challenge(
      "Wrestle the king's pet bear. ",
      array(
        "agility" => 40,
        "luck" => 60,
        "strength" => 80,
        "cunning" => 70
      )
    );

  $ds->$challenges[] = new Challenge(
      "Bow and arrow target competition. ",
      array(
        "agility" => 80,
        "luck" => 50,
        "strength" => 50,
        "cunning" => 60
      )
    );

  $ds->$challenges[] = new Challenge(
      "Solve the puzzle. ",
      array(
        "agility" => 20,
        "luck" => 60,
        "strength" => 50,
        "cunning" => 80
      )
    );

  $ds->$challenges[] = new Challenge(
      "Smash the barrels. ",
      array(
        "agility" => 40,
        "luck" => 50,
        "strength" => 80,
        "cunning" => 10
      )
    );
  $ds->$challenges[] = new Challenge(
      "Dodge the spear. ",
      array(
        "agility" => 70,
        "luck" => 60,
        "strength" => 30,
        "cunning" => 40
      )
    );

  $ds->$challenges[] = new Challenge(
      "Write a Haiku. ",
      array(
        "agility" => 20,
        "luck" => 50,
        "strength" => 40,
        "cunning" => 80
      )
    );

  $ds->$challenges[] = new Challenge(
      "Walk a tightrope. ",
      array(
        "agility" => 70,
        "luck" => 40,
        "strength" => 60,
        "cunning" => 50
      )
    );

  $ds->$challenges[] = new Challenge(
      "Fight ALL those guys. DO IT!. ",
      array(
        "agility" => 60,
        "luck" => 80,
        "strength" => 70,
        "cunning" => 70
      )
    );

  $ds->$challenges[] = new Challenge(
      "Look sad, very very sad. ",
      array(
        "agility" => 40,
        "luck" => 20,
        "strength" => 30,
        "cunning" => 50
      )
    );

  

    $persons[] = new Team("Team1", $persons[0], $persons[1]);

    $winChances = $challenges[0] -> winChances($persons);
    $testPersons = array();
    foreach($winChances as $chance){
    $testPersons[$chance["person"]->name] = $chance;
    $testPersons[$chance["person"]->name]["actualWins"]=0;
    }

    echo('<pre>');
    var_export($testPersons);
    echo('</pre>');

  }


}