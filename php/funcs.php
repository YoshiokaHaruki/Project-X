<?php
require_once('classes/SteamID.php');

function loadFromTable($sql_table, $searchId = "id", $searchWord = "") {
  global $sql_connection;
  $searchWord = addslashes(stripslashes($searchWord));

  if($sql_table == "zp_save_data") {
    $sql_query = $sql_connection->prepare("
      SELECT id, steamid, name, zclass, value1, value2, bitsum, slot1, slot2, slot3, slot4
      FROM $sql_table
      WHERE (steamid LIKE '%$searchWord%')
      AND id = $searchId;");
    $sql_query->bind_result($id, $steamid, $name, $zclass, $value1, $value2, $bitsum, $primary, $secondary, $melee, $equipment);
    $sql_query->execute();

    $count = array();
    while ($sql_query->fetch()) {
      $player = new stdClass();

      $player->id = $id;
      $player->steamid = $steamid;
      $player->name = $name;
      $player->zclass = $zclass;
      $player->value1 = $value1;
      $player->value2 = $value2;
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
  // sysname, itemname, bitsum, image

  // pistols
  array("INFINITYBLACK", "Infinity Black", "-1", "Infinity_black_icon.png"),
  array("BALROG1", "BALROG-I", "-1", "Balrog1.png"),
  array("JANUS1", "JANUS-1", "-1", "Janus1.png"),

  // heavy
  array("M1887", "Winchester M1887", "-1", "Icon_m1887_cso.png"),
  array("USAS12", "USAS-12 Camo", "-1",  "Usas12camo.png"),
  array("JANUS11", "JANUS-11", "0", "Janus11.png"),
  array("COILGUN", "Coil Gun", "1", "Coilmg.png"),

  // assault rifles
  array("HK416", "HK-416", "-1", "M4a1hk416.png"),
  array("STG44", "StG 44", "-1", "Stg44.png"),
  array("M16A4", "M16A4", "-1", "M16a4.png"),
  array("BLOCKAR", "Brick Piece V2", "1", "Blockar_gfx.png"),
  array("JANUS5", "JANUS-5", "0", "Janus-5.png"),
  array("PLASMAGUN", "Plasma Gun", "3", "Plasma.png"),

  // sniper rifles
  array("VSK94", "VSK-94 Auto-Sniper", "-1", "Vsk94.png"),
  array("CROSSBOW", "Арбалет", "-1", "Crossbow_gfx.png"),
  array("M95TIGER", "M95 White Tiger", "5",  "Buffm95.png"),

  // equipments
  array("NAPALM", "Граната Напалм", "-1", "Napalm.png"),
  array("FROST", "Граната Заморозка", "-1", "Frost.png"),
  array("HOLYBOMB", "Святая граната", "6", "Holybomb.png"),
  array("CANNONEX", "Red Cannon Dragon", "-1", "Reddragoncannon.png"),
  array("CLAYMORE", "Claymore Mine MDS", "-1", "claymore.png"),

  // knives
  array("KNIFE", "Seal knife", "-1", "Sealknife.png"),
  array("NEWKATANA", "Катана", "-1", "Katana.png"),
  array("DUALSWORD", "Dual Phantom Slayer", "-1", "Dualswordphantomslayer.png")
);
