<?php
  // Значения столбцов от 0 до 100
  $rows = array(80, 75, 54, 32, 20);
  // Нормируем значения массива $rows
  // таким образом, чтобы их сумма 
  // составляла 360 градусов
  $summ = array_sum($rows);
  for($i = 0; $i < count($rows); $i++)
  {
    $rows[$i] = $rows[$i]*360/$summ;
  }

  // Создаем пустое изображение, 
  // размером 201x201 пикселей
  $img =  imagecreatetruecolor(201, 201);

  // Определение белого цвета на изображении
  $white = imagecolorallocate($img, 255, 255, 255); 
  imagefill($img, 0, 0, $white);

  // Переменные $cy и $cy определяют 
  // центр круговой диаграммы
  $cx = $cy = 100;
  // Переменные $w и $h определяют 
  // ширину и высоту диаграммы
  $w = $h = 200;

  $start = 0;
  foreach ($rows as $value)
  {
    // Формируем случайный цвет для 
    // каждого сектора
    $color = imagecolorallocate($img, 
                                rand(0, 255), 
                                rand(0, 255), 
                                rand(0, 255)); 
    // Определяем конечный угол сектора
    $angle_sector = $start + $value;
    // Отрисовываем сектор
    imagefilledarc($img, $cx, $cy, $w, $h, $start, $angle_sector, 
                   $color, "IMG_ARC_PIE || IMG_ARC_EDGED");
    // Увеличиваем значение начального угла сектора
    $start += $value;
  }
  // Вывод изображения в окно браузера
  header ("Content-type: image/gif"); 	
  imagegif($img);                      
?>
