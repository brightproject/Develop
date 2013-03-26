<?php
  // Имя файла
  $filename = "text.txt";
  // Количество позиций на странице
  $pnumber = 3;
  // Открываем файл для чтения
  $bufer = file_get_contents($filename);

  // Находим все строки при помощи регулярного выражения
  preg_match_all("#([\d]+) ([^\n]+)(\n|$)#U",
                 $bufer, 
                 $out,
                 PREG_PATTERN_ORDER);
  // Формируем промежуточный массив
  for($i = 0; $i < count($out[1]); $i++)
  {
    $temp[] = trim($out[2][$i]);
  }

  // Проверяем, передан ли номер текущей страницы
  if(isset($_GET['page'])) $page = $_GET['page'];
  else $page = 1;
  // Количество страниц
  $total = count($temp);
  $number = (int)($total/$pnumber);
  if((float)($total/$pnumber) - $number != 0) $number++;

  $start = (($page - 1)*$pnumber + 1);
  $end = $page*$pnumber + 1;
  if($end > $total) $end = $total;

  // Выводим содержимое страниц
  for($i = $start; $i < $end; $i++)
  {
    echo $temp[$i]."<br>";
  }

  // Постраничная навигация
  for($i = 1; $i <= $number; $i++)
  {
    // Если это произвольная страница, выводим ссылку в виде
    // диапазона от текущей позиции до текущей плюс $pnumber
    if($i != $number)
    {
      if($page == $i)
      {
        echo "[".(($i - 1)*$pnumber + 1)."-".$i*$pnumber."]&nbsp;";
      }
      else
      {
        echo "<a href=$_SERVER[PHP_SELF]?page=".$i.">[".
             (($i - 1)*$pnumber + 1)."-".$i*$pnumber."]</a>&nbsp;";
      }
    }
    // Если это последняя страница, заменяем последнюю цифру 
    // максимальным количеством позиций в массиве $temp
    else
    {
      if($page == $i)
      {
        echo "[".(($i - 1)*$pnumber + 1)."-".($total - 1)."]&nbsp;";
      }
      else
      {
        echo "<a href=$_SERVER[PHP_SELF]?page=".$i.">[".
             (($i - 1)*$pnumber + 1)."-".($total - 1)."]</a>&nbsp;";
      }
    }
  }
?>
