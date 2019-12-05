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
        <a href="https://steamcommunity.com/profiles/<?=$steam_link?>/" target="_blank" title="Steam профиль <?=$player->name?>">
          <img src="<?=$avatar?>" alt="avatar" class="img-fluid rounded-circle" style="height: 64px; width: 64px;"></a>
      <?php } ?>
      Статистика игрока <?=$player->name?>
    </div>
    <br>
    <h4>Экипировка игрока</h4>
    <div class="row" style="padding-top: 10px;">
      <div class="col-md-6">
        <table class="table table-hover table-stats">
          <?php
          addTableLine("Основное оружие", getWeaponData($player->primary));
          addTableLine("Второстепенное оружие", getWeaponData($player->pistol));
          addTableLine("Холодное оружие", getWeaponData($player->knife));
          addTableLine("Экипировка", getWeaponData($player->equip));
          ?>
        </table>
      </div>
    </div>
    <h4>Основная статистика</h4>
    <div class="row" style="padding-top: 10px;">
      <div class="col">
        <table class="table table-hover table-sm table-stats">
          <?php
          $eff = getEfficiency($player->kill_zombies, $player->death);

          $seconds = $player->time;
          $hours = floor($seconds / 3600);
          $mins = floor($seconds / 60 % 60);
          $secs = floor($seconds % 60);

          if($hours)
          {
            if($mins)
            {
              if($secs)
                $online_time = $hours.' ч. '.$mins.' мин. '.$secs.' сек.';
              else $online_time = $hours.' ч. '.$mins.' мин.';
            }
            else
            {
              if($secs)
                $online_time = $hours.' ч. '.$secs.' сек.';
              else $online_time = $hours.' ч.';
            }
          }
          else if($mins)
          {
            if($secs)
              $online_time = $mins.' мин. '.$secs.' сек.';
            else $online_time = $mins.' мин.';
          }
          else $online_time = $secs.' сек.';

          echo addTableLine("Ник:", $player->name);
          echo addTableLine("SteamID:", $player->steamid);
          echo addTableLine("Был в сети:", $player->online);
          echo addTableLine("Онлайн на сервере:", $online_time);
          echo addProgressToRow("Эффективность:", $eff);
          echo addTableLine("Денег/Аммо:", $player->value1);
          echo addTableLine("Нанёс урона:", number_format($player->damage, 2, '.', ''));
          ?>
        </table>
      </div>
      <div class="col">
        <table class="table table-hover table-sm table-stats">
          <?php
          echo addTableLine("Умер:", $player->death);
          echo addTableLine("Заразил:", $player->infect);
          echo addTableLine("Был заражён", $player->infected);
          echo addTableLine("Убил за человека:", $player->kill_zombies);
          echo addTableLine("Убил за зомби:", $player->kill_humans);
          echo addTableLine("Убил немезид:", $player->kill_nems);
          echo addTableLine("Убил выживших:", $player->kill_survs);
          echo addTableLine("Был немезидой:", $player->be_nem);
          echo addTableLine("Был выжившем:", $player->be_surv);
          ?>
        </table>
      </div>
    </div>
  </div>
</div>
