<?php
//ContentQueries class extends PDOHelper, 
//aka gets all PDOHelpers methods
class character_Queries extends PDOHelper {

  // Maybe useful to save the game.?
  // public function saveNewPage($page_data) {

  //   //adding user_id before insert
  //   $page_data[":user_id"] = $this->user_info["user_id"];

  //   $sql = "INSERT INTO pages (title, body, user_id) VALUES (:title, :body, :user_id)";
  //   //since we are using prepared SQL statements, 
  //   //SQL and data is sent separately to the query method
  //   return $this->query($sql, $page_data);
  // }

  // fråga hugo om detta:
  public function createCharacters() {
    $sql = "INSERT INTO hn_jultenta_characters (class, name) VALUES (:name, :class)";
  }

  public function getAllCharacters() {
    $sql = "SELECT * FROM hn_jultenta_characters";
    //since we are using prepared SQL statements, 
    //SQL and data is sent separately to the query method
    return $this->query($sql);
  }

  public function searchForPages($search_param) {
    $search_param = array(":search_param" => "%".$search_param."%");
    $sql = "SELECT * FROM pages WHERE title LIKE :search_param";
    //since we are using prepared SQL statements, 
    //SQL and data is sent separately to the query method
    return $this->query($sql, $search_param);
  }
}










