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
  // bitsum, itemname, sysname, image
  array("-1", "Seal Knife", "KNIFE", "Sealknife.png"),
  array("-1", "Граната Напалм", "NAPALM", "Napalm.png"),
  array("-1", "Граната Заморозка", "FROST", "Frost.png"),
  array("-1", "Infinity Black", "INFINITYBLACK", "Infinity_black_icon.png"),
  array("-1", "Winchester M1887", "M1887", "Icon_m1887_cso.png"),
  array("-1", "USAS-12 Camo", "USAS12", "Usas12camo.png"),
  array("0", "JANUS-11", "JANUS11", "Janus11.png"),
  array("1", "Coil Gun", "COILGUN", "Coilmg.png"),
  array("-1", "HK-416", "HK416", "M4a1hk416.png"),
  array("-1", "StG 44", "STG44", "Stg44.png"),
  array("1", "Brick Piece V2", "BLOCKAR", "Blockar_gfx.png"),
  array("0", "JANUS-5", "JANUS5", "Janus-5.png"),
  array("3", "Plasma Gun", "PLASMAGUN", "Plasma.png"),
  array("-1", "VSK-94 Auto-Sniper", "VSK94", "Vsk94.png"),
  array("5", "M95 White Tiger", "M95TIGER", "Buffm95.png"),
  array("6", "Святая граната", "HOLYBOMB", "Holybomb.png"),
  array("7", "Dread Nova", "DREADNOVA", "Dreadnova.png")
);
