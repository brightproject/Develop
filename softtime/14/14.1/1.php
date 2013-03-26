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
    echo "Ссылка присутствует на странице";
  }
  else
  {
    echo "Ссылка отсутствует на странице";
  }
?>
