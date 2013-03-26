<?php
  // Формируем динамическое изображение
  // на основе файла blue.jpg
  $img = imagecreatefromjpeg("blue.jpg");
  // Выводим изображение в окно браузера
  header("Content-type: image/jpeg");
  imagejpeg($img);
?>
