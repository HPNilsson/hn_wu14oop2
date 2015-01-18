<?php
//save_character.php
include_once("autoloader.php");
//Content queries är en metod miseur
$cq = New character_Queries("127.0.0.1","wu14oop2","root","mysql");

//save content if told to do so (by receiving correct AJAX data)
if (isset($_REQUEST["character_data"])) {
  echo(json_encode($cq->createNewCharacter($_REQUEST["character_data"])));
}