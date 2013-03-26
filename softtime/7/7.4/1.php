<?php
  // Если реферер не пуст - помещаем его в базу данных
  if(!empty($_SERVER['HTTP_REFERER']))
  {
    // Выясняем принадлежность к поисковым системам
    $search = 'none';
    if(strpos($reff,"yandex"))  $search = 'yandex';
    if(strpos($reff,"rambler")) $search = 'rambler';
    
    $text = "";
    if($search == "yandex")
    {
      eregi("text=([^&]*)", $reff."&", $query); 
      if(strpos($reff,"yandpage")!=null)
        $text = convert_cyr_string(urldecode($query[1]),"k","w");
      else
        $text = $query[1];
    }
    if($search == "rambler")
    {
      eregi("words=([^&]*)", $reff."&", $query); 
      $text = $query[1];
    }

    if(!empty($text))
    {
      $query = "INSERT INTO referer VALUES (NULL, '$text')";
    }
  }
?>
