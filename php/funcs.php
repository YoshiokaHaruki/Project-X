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

$bitItems = array(
  array("-1", "Seal Knife"),
  array("-1", "Граната Напалм"),
  array("-1", "Граната Заморозка"),
  array("-1", "Infinity Black"),
  array("-1", "Winchester M1887"),
  array("-1", "USAS-12 Camo"),
  array("0", "JANUS-XI"),
  array("1", "Coil Gun"),
  array("-1", "HK-416"),
  array("-1", "StG 44"),
  array("1", "Brick Piece V2"),
  array("0", "JANUS-5"),
  array("3", "Plasma Gun"),
  array("-1", "VSK-94 Auto-Sniper"),
  array("5", "M95 White Tiger"),
  array("6", "Святая граната"),
  array("7", "Dread Nova")
);
