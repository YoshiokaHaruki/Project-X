<?php
require_once('php/config.php');
require_once('php/funcs.php');

$data = loadFromTable("zp_weapon_system", $_GET['id']);
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Project X | Profile</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="/css/master.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css">
  </head>
  <body>
    <div class="profile">
      <div class="steam">

      </div>
    </div>
    <div class="collection">
      <h1>Коллекция</h1>
      <?php foreach ($data as $player) {
        for($i = 0; $i < count($bitItems); $i++) {
          $classitem = "item_locked";
          if($bitItems[$i][2] == -1 || $bitItems[$i][2] != -1 && $player->bitsum & 1<<$bitItems[$i][2])
            $classitem = "item_unlocked";

          echo "<div class='$classitem'>";
            echo "<img style='max-height: 25px;' src='images/items/".$bitItems[$i][3]."' alt='wpn' />", $bitItems[$i][1], "<br />";
          echo "</div>";
        }
      } ?>
    </div>
  </body>
</html>
