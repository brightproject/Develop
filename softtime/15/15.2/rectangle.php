<?php
  // Создаём изображение 100х100 пикселов
  $img = imagecreatetruecolor(100, 100);

  // Преобразуем входные GET-параметры к
  // целому числу
  $_GET['red']   = intval($_GET['red']);
  $_GET['green'] = intval($_GET['green']);
  $_GET['blue']  = intval($_GET['blue']);

  // Формируем цвет
  $color = imagecolorallocate($img, 
                              $_GET['red'], 
                              $_GET['green'], 
                              $_GET['blue']);

  // Заполняем изображение выбранным
  // цветом
  imagefill($img, 0, 0, $color);

  header('Content-type: image/png'); 
  imagejpeg($img);
?> 