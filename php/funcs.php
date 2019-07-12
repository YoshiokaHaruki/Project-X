<?php
require_once('classes/SteamID.php');

function loadFromTable($sql_table, $searchId = "id", $searchWord = "") {
  global $sql_connection;
  $searchWord = addslashes(stripslashes($searchWord));

  if($sql_table == "zp_weapon_system") {
    $sql_query = $sql_connection->prepare("
      SELECT id, steamid, bitsum, slot1, slot2, slot3, slot4
      FROM $sql_table
      WHERE (steamid LIKE '%$searchWord%')
      AND id = $searchId;");
    $sql_query->bind_result($id, $steamid, $bitsum, $primary, $secondary, $melee, $equipment);
    $sql_query->execute();

    $count = array();
    while ($sql_query->fetch()) {
      $player = new stdClass();

      $player->id = $id;
      $player->steamid = $steamid;
      $player->bitsum = $bitsum;
      $player->primary = $primary;
      $player->pistol = $secondary;
      $player->knife = $melee;
      $player->equip = $equipment;

      array_push($count, $player);
    }

    return $count;
  }
}
?>
