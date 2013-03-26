<?php
  // Извлекаем количество посещений
  $count = file_get_contents("count.txt");
  // Увеличиваем значение на единицу
  $count = intval($count) + 1;
  // Сохраняем файл
  file_put_contents("count.txt", $count);

  // Формируем динамическое изображение
  // на основе файла blue.jpg
  $img = imagecreatefromjpeg("blue.jpg");

  // Задаём чёрный цвет для текста
  $color = imagecolorallocate($img,0,0,0);

  // Размещаем текст на изображении
  imagestring($img, 3, 27, 10, $count, $color);

  // Выводим изображение в окно браузера
  header("Content-type: image/jpeg");
  imagejpeg($img);
?>