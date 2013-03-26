<?php
  function resizeimg($filename, $smallimage, $w, $h) 
  { 
    // 1. Коррекция параметров $w и $h
    // Определим коэффициент сжатия изображения
    $ratio = $w / $h; 
    // Получим размеры исходного изображения 
    list($width, $height) = getimagesize($filename); 
    // Если размеры меньше, то масштабирования не нужно 
    if (($width < $w) && ($height < $h))
    {
      copy($filename, $smallimage);
      return true; 
    }
    // получим коэффициент сжатия исходного изображения 
    $src_ratio = $width/ $height; 

    // Вычисляем размеры уменьшенной копии, чтобы 
    // при масштабировании сохранились 
    // пропорции исходного изображения 
    if ($ratio < $src_ratio) $h = $w/$src_ratio; 
    else $w = $h*$src_ratio; 

    // 2. Создание уменьшенной копии изображения
    // Создаем пустое изображение 
    // размером $w x $h пикселов
    $dest_img = imagecreatetruecolor($w, $h);   
    // Открываем файл, который будет подвергаться сжатию
    $src_img = imagecreatefromjpeg($filename);                       

    // Масштабируем изображение
    imagecopyresampled($dest_img, 
                       $src_img, 
                       0, 
                       0, 
                       0, 
                       0, 
                       $w, 
                       $h, 
                       $width, 
                       $height);
    // Сохраняем уменьшенную копию в файл 
    imagejpeg($dest_img, $smallimage);                       
    // Чистим память от созданных изображений 
    imagedestroy($dest_img); 
    imagedestroy($src_img); 
    return true;          
  }   
?>
