<?php
  // Открываем файл archive.tar
  $filename = "archive.tar";
  $fd = fopen($filename,"r");
  if(!$fd) exit("Невозможно открыть файл archive.tar");
  $str = fread($fd,filesize($filename));
  fclose($fd);
  // Распаковываем массив из строки
  $arr = unserialize($str);
  // Создаем файлы
  foreach($arr as $file => $contents)
  {
    $fd = fopen($file, "w");
    if(!$fd) exit("Невозможно открыть файл $file");
    fwrite($fd, $contents);
    fclose($fd);
  }
?>
