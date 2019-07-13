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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat&display=swap">
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
        $primary = $pistol = $knife = $equip = "";
        for($i = 0; $i < count($bitItems); $i++) {
          $classitem = "item_locked";
          if($bitItems[$i][2] == -1 || $bitItems[$i][2] != -1 && $player->bitsum & 1<<$bitItems[$i][2])
            $classitem = "item_unlocked";

          echo "<div class='$classitem'>";
            echo "<img style='max-height: 25px;' src='images/items/".$bitItems[$i][3]."' alt='wpn' />", $bitItems[$i][1], "<br />";
          echo "</div>";

          if($player->primary == $bitItems[$i][0]) $primary = $i;
          if($player->pistol == $bitItems[$i][0]) $pistol = $i;
          if($player->knife == $bitItems[$i][0]) $knife = $i;
          if($player->equip == $bitItems[$i][0]) $equip = $i;
        }

        if($primary != -1 || $primary != "")
          echo "<p>Основное оружие: <i><b>".$bitItems[$primary][1]."</b></i></p>";
        if($pistol != -1 || $pistol != "")
          echo "<p>Пистолет: <i><b>".$bitItems[$pistol][1]."</b></i></p>";
        if($knife != -1 || $knife != "")
          echo "<p>Нож: <i><b>".$bitItems[$knife][1]."</b></i></p>";
        if($equip != -1 || $equip != "")
          echo "<p>Экипировка: <i><b>".$bitItems[$equip][1]."</b></i></p>";
      } ?>
    </div>
  </body>
</html>
