<?php
/*
$n = 7185512;
echo $n;
if($n & (1<<3))
  echo "<br>yes";
*/
require_once('php/config.php');
require_once('php/funcs.php');

$data = loadFromTable("zp_weapon_system", "6");
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
      <?php foreach ($data as $player) { ?>

      <?php } ?>
    </div>
  </body>
</html>
