<?php
  if(!empty($_POST))
  {
    $x1 = $_POST['x1'];
    $x2 = $_POST['x2'];
    $x3 = $_POST['x3'];
    $x4 = $_POST['x4'];
    $y1 = $_POST['y1'];
    $y2 = $_POST['y2'];
    $y3 = $_POST['y3'];
    $y4 = $_POST['y4'];
    if(!empty($x1) && !empty($y1) &&
       !empty($x2) && !empty($y2) &&
       !empty($x3) && !empty($y3) &&
       !empty($x4) && !empty($y4))
    for($t = 0.0; $t <= 1.0; $t += 0.001)
    {
      $x[] = (1 - $t) * (1 - $t) * (1 - $t) * $x1 +
          3 * $t * (1 - $t) * (1 - $t) * $x2 +
          3 * $t * $t * (1 - $t) * $x3 +
          $t * $t * $t * $x4;
      $y[] = (1 - $t) * (1 - $t) * (1 - $t) * $y1 +
          3 * $t * (1 - $t) * (1 - $t) * $y2 +
          3 * $t * $t * (1 - $t) * $y3 +
          $t * $t * $t * $y4;
    }
    // Определяем максимальные и минимальные
    // значения по осям X и Y
    $max_x = $min_x = $x[0];
    $max_y = $min_y = $y[0];
    for($i = 0; $i < count($x); $i++)
    {
      if($max_x < $x[$i]) $max_x = $x[$i];
      if($min_x > $x[$i]) $min_x = $x[$i];
      if($max_y < $y[$i]) $max_y = $y[$i];
      if($min_y > $y[$i]) $min_y = $y[$i];
    }

    // Ширина изображения
    $width = 100;
    // Высота изображения
    $height = 100;
    // Создаем пустое изображение с 10 пиксельными 
    // отступами по краям
    $img = imagecreatetruecolor($width + 20, $height + 20);
    // Заливаем фон белым цветом
    $white = imagecolorallocate($img, 255, 255, 255);
    imagefill($img, 0, 0, $white);
    // Черный цвет для линии
    $black = imagecolorallocate($img, 0, 0, 0);
    // В цикле отрисовываем линию
    for($i = 0; $i < count($x) - 1; $i++)
    {
      // Масштабируем координаты
      $x1 = 10 + intval(($x[$i] - $min_x)*$width/($max_x - $min_x));
      $y1 = 10 + intval(($max_y - $y[$i])*$height/($max_y - $min_y));
      $x2 = 10 + intval(($x[$i + 1] - $min_x)*$width/($max_x - $min_x));
      $y2 = 10 + intval(($max_y - $y[$i + 1])*$height/($max_y - $min_y));
      // Рисуем линию
      imageline($img, $x1, $y1, $x2, $y2, $black);
    }
    // Вычисляем координаты исходных точек
    $x1 = 10 + intval(($_POST['x1'] - $min_x)*$width/($max_x - $min_x));
    $y1 = 10 + intval(($max_y - $_POST['y1'])*$height/($max_y - $min_y));
    $x2 = 10 + intval(($_POST['x2'] - $min_x)*$width/($max_x - $min_x));
    $y2 = 10 + intval(($max_y - $_POST['y2'])*$height/($max_y - $min_y));
    $x3 = 10 + intval(($_POST['x3'] - $min_x)*$width/($max_x - $min_x));
    $y3 = 10 + intval(($max_y - $_POST['y3'])*$height/($max_y - $min_y));
    $x4 = 10 + intval(($_POST['x4'] - $min_x)*$width/($max_x - $min_x));
    $y4 = 10 + intval(($max_y - $_POST['y4'])*$height/($max_y - $min_y));
    // Отрисовываем точки
    imagefilledellipse($img, $x1, $y1, 7, 7, $black);
    imagefilledellipse($img, $x2, $y2, 7, 7, $black);
    imagefilledellipse($img, $x3, $y3, 7, 7, $black);
    imagefilledellipse($img, $x4, $y4, 7, 7, $black);

    // Выводим изображение в браузер 
    header('Content-type: image/jpeg'); 
    imagejpeg($img);       
    exit();
  }
?>
<table>
<form method=post>
  <tr align=center>
    <td>Координата (x1, y1)</td>
    <td><input type=text name=x1 size=3 value="<?= $_POST['x1'] ?>"></td>
    <td><input type=text name=y1 size=3 value="<?= $_POST['y1'] ?>"></td>
  </tr>
  <tr align=center>
    <td>Координата (x2, y2)</td>
    <td><input type=text name=x2 size=3 value="<?= $_POST['x2'] ?>"></td>
    <td><input type=text name=y2 size=3 value="<?= $_POST['y2'] ?>"></td>
  </tr>
  <tr align=center>
    <td>Координата (x3, y3)</td>
    <td><input type=text name=x3 size=3 value="<?= $_POST['x3'] ?>"></td>
    <td><input type=text name=y3 size=3 value="<?= $_POST['y3'] ?>"></td>
  </tr>
  <tr align=center>
    <td>Координата (x4, y4)</td>
    <td><input type=text name=x4 size=3 value="<?= $_POST['x4'] ?>"></td>
    <td><input type=text name=y4 size=3 value="<?= $_POST['y4'] ?>"></td>
  </tr>
  <tr>
    <td></td>
    <td cols=2><input type=submit value="Сгладить"></td>
  </tr>
</form>
</table>
