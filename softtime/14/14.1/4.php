<?php
  // Проверяемая ссылка
  $http = "http://www.softtime.ru/forum/";
  // Адрес страницы, за которой следит скрипт
  $url = "http://ru.wikipedia.org/wiki/PHP";

  // Загружаем содержимое страницы $url
  $contents = file_get_contents($url);
  $http = str_replace(".","\.",$http);
  $pattern = "|<a[\s]+href=\"$http\"|is";

  if(preg_match($pattern,$contents))
  {
    $str = date("d.m.Y H:i:s")." - Ссылка присутствует на странице\r\n";
  }
  else
  {
    $str = date("d.m.Y H:i:s")." - Ссылка отсутствует на странице\r\n";
    if(date("G") == 0 && date("i") > 0 && date("i") < 10)
    {
      mail("admin@somewhere.ru","Отсутствует ссылка",$str);
    }
  }

  $fd = fopen("link.log","a");
  if($fd)
  {
    fwrite($fd,$str);
    fclose($fd);
  }
?>
