<?php
require_once('php/config.php');
require_once('php/funcs.php');

$data = loadFromTable("zp_weapon_system", $_GET['id']);
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
    <link rel="stylesheet" href="/css/master.css">
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-header">Профиль</div>
            <div class="card-body">
              <div class="h3">
                <?php if($steam_link != null) {
                  $json = file_get_contents(sprintf("http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=3B30DE69513DAE0E4219F25A10E06CC7&steamids=%s", $steam_link));
                  $parsed = json_decode($json);
                  $parsed_info = $parsed->response->players[0];
                  $avatar = $parsed_info->avatarfull;
                ?>
                  <a href="https://steamcommunity.com/profiles/<?=$steam_link?>/" target="_blank" title="Steam профиль {name}">
                    <img src="<?=$avatar?>" alt="avatar" class="img-fluid rounded-circle" style="height: 128px; width: auto;"></a>
                <?php } ?>
                Статистика игрока {name}
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-12">
          <div class="card">
            <div class="card-header">Коллекция</div>
            <div class="card-body" style="padding: 1px;">
              <div class="table-responsive">
                <table class="table table-borderless table-hover table-sm collection">
                  <thead>
                    <tr>
                      <td><center>Изображение</center></td>
                      <td><center>Название</center></td>
                    </tr>
                  </thead>
                  <tbody>
                    <?php for($i = 0; $i < count($bitItems); $i++) {
                      if($bitItems[$i][2] == -1 || $bitItems[$i][2] != -1 && $player->bitsum & 1<<$bitItems[$i][2]) {
                      ?>
                        <tr>
                          <td><center><img style="height: 25px;" src="images/items/<?=$bitItems[$i][3]?>" alt="wpn" /></center></td>
                          <td><span><?=$bitItems[$i][1]?></span></td>
                        </tr>
                    <?php } } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
