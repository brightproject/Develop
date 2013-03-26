<?php 
  // Имя файла
  $filename = "image.jpg"; 
  // Открываем файл 
  $img = imagecreatefromjpeg($filename); 
  // Определяем размеры изображения
  list($width, $height) = getimagesize($filename); 
   
  // Назначаем цвет 
  $color = imagecolorallocatealpha($img, 255, 255, 255, 80); 
 
  // Линия из верхнего левого угла в нижний правый
  imageline($img, 0, $height, $width, 0, $color);
  // Линия из нижнего левого угла в верхний правый
  imageline($img, 0, 0, $width, $height, $color);

  for($i = 1; $i < 5; $i++)
  {
    // Линия из верхнего левого угла в нижний правый
    imageline($img, -$i, $i, $width - $i, $height + $i, $color);
    imageline($img, $i, -$i, $width + $i, $height - $i, $color);

    // Линия из нижнего левого угла в верхний правый
    imageline($img, -$i, $height - $i, $width - $i, -$i, $color);
    imageline($img, $i, $height + $i, $width + $i, $i, $color);
  }

  // Выводим изображение в браузер 
  header('Content-type: image/jpeg'); 
  imagejpeg($img);       
?>
