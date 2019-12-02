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
