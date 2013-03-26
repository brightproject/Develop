<?php
  $useragent = $_SERVER['HTTP_USER_AGENT'];
  // ¬ы€сн€ем принадлежность к поисковым роботам
  $os = '';
  if(substr($useragent, 0, 12) == "StackRambler") $os = 'robot_rambler';
  if(substr($useragent, 0, 9) == "Googlebot")     $os = 'robot_google';
  if(substr($useragent, 0, 6) == "Yandex")        $os = 'robot_yandex';
  if(substr($useragent, 0, 5) == "Aport")         $os = 'robot_aport';
  if(substr($useragent, 0, 6) == "msnbot")        $os = 'robot_msnbot';
  // ≈сли временна€ переменна€ $os не пуста€, заполн€ем 
  // таблицу useragent
  if(!empty($os))
  {
    $query = "INSERT INTO useragent VALUES (NULL, '$useragent')";
    if(!mysql_query($query)) exit(mysql_error());
  }    
?>
