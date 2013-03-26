<?php
  // Разбиваем содержимое файла links на массив
  // $links, каждый элемент которого соответствует
  // отдельной строке файла
  $links = file("links");

  $fd = fopen("link.log","a");
  if($fd)
  {
    foreach($links as $link)
    {
      $link = trim($link);
      $arr = parse_url($link);
      $code = get_code($arr['host'], $arr['path']);
      $str = date("d.m.Y H:i:s ").trim($code)." ".$link."\r\n";
      fwrite($fd,$str);
    }
    fclose($fd);
  }
?>
