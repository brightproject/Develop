<?php
  $filename = array("all.php", "auth.php",
                    "auth.txt", "base.txt",
                    "chat.html", "config.php",
                    "count.txt", "count_new.txt",
                    "counter.dat", "counter.php",
                    "create.php", "dat.db");
  // Вычисляем количество элементов в массиве
  $total = count($filename);
  // Вычисляем, сколько элементов должно быть
  // в одном столбце
  $half = $total/2;

  // Обходим массив и выясняем
  // количество символов в самом длинном
  // имени файла в первом столбце
  $max_lenght_first = 0;
  for($i = 0; $i < $half; $i++)
  {
    $lenght = strlen($filename[$i]);
    if($lenght > $max_lenght_first) $max_lenght_first = $lenght;
  } 

  // Обходим массив и выясняем
  // количество символов в самом длинном
  // имени файла во втором столбце
  $max_lenght_second = 0;
  for($i = $half; $i < $total; $i++)
  {
    $lenght = strlen($filename[$i]);
    if($lenght > $max_lenght_second) $max_lenght_second = $lenght;
  } 

  // В цикле формируем строки для
  // вывода в окно браузера
  echo "<pre>";
  for($i = 0; $i < $half; $i++)
  {
    printf($filename[$i] . 
              str_repeat(" ", 
                         $max_lenght_first - strlen($filename[$i])) .
              "%{$max_lenght_second}s\n",
           $filename[$half + $i]);
  } 
  echo "</pre>";
?>
