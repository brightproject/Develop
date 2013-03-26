<?php
echo getfilesize($_GET['name']);
// Функция определения размера файла
function getfilesize($filename)
{
  // Проверяем, существует ли файл
  if(!file_exists($filename)) return "файл не существует";
  // Определяем размер файла
  $filesize = filesize($filename);
  // Если размер файл превышает 1024 байта,
  // пересчитываем размер в Кбайты
  if($filesize > 1024)
  {
    $filesize = (float)($filesize/1024);
    // Если размер файл превышает 1024 Кбайта,
    // пересчитываем размер в Мбайты
    if($filesize > 1024)
    {
      $filesize = (float)($filesize/1024);
      // Округляем дробную часть до
      // первого знака после запятой
      $filesize = round($filesize, 1);
      return $filesize." Мб";
    }
    else
    {
      // Округляем дробную часть до
      // первого знака после запятой
      $filesize = round($filesize, 1);
      return $filesize." Кб";
    }
  }
  else
  {
    return $filesize." байт";
  }
}
?>
