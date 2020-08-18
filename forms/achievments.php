<?php
$achiev_data = loadAchiev($_GET['id']);
print_r($achiev_data);
?>
<div class="card">
  <div class="card-header">Достижения</div>
  <div class="card-body">
    <?php
    // все
    drawAchievement(1, "?", "Достичь максимального уровня в игре", "2.12.2019 – 13:37", "https://i.redd.it/tyhrngisvqv31.png", 1, 30);
    drawAchievement(2, "Коллекционер", "Добавить любое оружие в вашу коллекцию", "2.12.2019 – 13:37", "https://i.redd.it/tyhrngisvqv31.png", 0, 1);

    // hm
    drawAchievement(3, "Миллионер", "Заработать в общем 1 000 000$", "2.12.2019 – 13:37", "https://i.redd.it/tyhrngisvqv31.png", $player->value1, 1000000);
    drawAchievement(4, "Убийца немезид", "Убить 10 немезид", "2.12.2019 – 13:37", "https://i.redd.it/tyhrngisvqv31.png", $player->kill_nems, 10);
    drawAchievement(5, "Убийца зомби: Новичок", "Убить 100 зомби", "2.12.2019 – 13:37", "https://i.redd.it/tyhrngisvqv31.png", $player->kill_zombies, 100);
    drawAchievement(6, "Убийца зомби: Опытный", "Убить 500 зомби", "2.12.2019 – 13:37", "https://i.redd.it/tyhrngisvqv31.png", $player->kill_zombies, 500);
    drawAchievement(7, "Убийца зомби: Мастер", "Убить 1000 зомби", "2.12.2019 – 13:37", "https://i.redd.it/tyhrngisvqv31.png", $player->kill_zombies, 1000);
    drawAchievement(8, "Последний выживший", "Остаться последним человеком в раунде и выиграть раунд 100 раз", "2.12.2019 – 13:37", "https://i.redd.it/tyhrngisvqv31.png", 0, 100);
    drawAchievement(9, "?", "Нанести в общем 100кк урона", "2.12.2019 – 13:37", "https://i.redd.it/tyhrngisvqv31.png", $player->damage, 100000000);
    drawAchievement(10, "Мастер холодного оружия", "Убить 100 зомби с ножа", "2.12.2019 – 13:37", "https://i.redd.it/tyhrngisvqv31.png", 0, 100);
    drawAchievement(11, "Мастер на все руки", "Убить с каждого вида оружия 100 раз", "2.12.2019 – 13:37", "https://i.redd.it/tyhrngisvqv31.png", 0, 100);
    drawAchievement(12, "Головорез", "Убить 5 зомби в голову за раунд 100 раз", "2.12.2019 – 13:37", "https://i.redd.it/tyhrngisvqv31.png", 0, 100);
    drawAchievement(13, "Подрывник", "Убить 300 зомби гранатой или миной", "2.12.2019 – 13:37", "https://i.redd.it/tyhrngisvqv31.png", 0, 300);

    // zm
    drawAchievement(14, "Инфектор", "Заразить 500 человек", "2.12.2019 – 13:37", "https://i.redd.it/tyhrngisvqv31.png", $player->infect, 500);
    drawAchievement(15, "Успешный инфектор", "Заразить 5 людей за раунд 100 раз", "2.12.2019 – 13:37", "https://i.redd.it/tyhrngisvqv31.png", 0, 100);
    drawAchievement(16, "Убийца выживших", "Убить 10 выживших", "2.12.2019 – 13:37", "https://i.redd.it/tyhrngisvqv31.png", $player->kill_survs, 10);
    ?>
  </div>
</div>
