<?php
  // Значение столбцов от 0 до 100
  $rows = array(80, 75, 54, 32, 20);

  // Ширина изображения
  $width = 200;
  // Высота изображения
  $height = 200;
  // Ширина одного столбца
  $row_width = 30;
  // Ширина интервала между столбцами
  $row_interval = 5;

  // Создание пустое изображение
  $img =  imagecreatetruecolor ($width, $height);

  // Заливаем изображение белым цветом
  $white = imagecolorallocate($img, 255, 255, 255); 
  imagefill($img, 0, 0, $white);


  for($i = 0, $y1 = $height, $x1 = 0; $i < count($rows); $i++)
  {
    // Формируем случайный цвет для каждого из столбца
    $color = imagecolorallocate($img, 
                    rand(0, 255), rand(0, 255), rand(0, 255)); 

    // Нормирование высоты столбца
    $y2 = $y1 - $rows[$i]*$height/100;
    // Определение второй координаты столбца
    $x2 = $x1 + $row_width;

    // Отрисовываем столбец
    imagefilledrectangle($img, $x1, $y1, $x2, $y2, $color);

    // Между столбцами создаём интервал в $row_interval пикселей
    $x1 = $x2 + $row_interval;
  }

  // Выводим изображение в браузер, в формате GIF
  header ("Content-type: image/gif"); 	
  imagegif($img);
?>