<?php
require_once('php/config.php');
require_once('php/funcs.php');

$data = loadFromTable("zp_save_data", $_GET['id']);
$player = $data[0];
$steam_link = SteamID::st32to64($player->steamid);
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Project X | Profile</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/darkly/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat&display=swap">
    <link rel="stylesheet" href="css/master.css">
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <!-- Профиль, достижения -->
        <div class="col-md-9 col-sm-12">
          <div class="col-md-12">
            <?php require_once('forms/profile.php'); ?>
          </div>
          <!-- Достижения -->
          <div class="col-md-12" style="padding-top: 5px;">
            <?php require_once('forms/achievments.php'); ?>
          </div>
        </div>
        <!-- Коллекция -->
        <div class="col-md-3 col-sm-12">
          <?php require_once('forms/collection.php'); ?>
        </div>
      </div>
    </div>
  </body>
</html>
