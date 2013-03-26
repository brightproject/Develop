<?php
  $filename = array("all.php", "auth.php",
                    "auth.txt", "base.txt",
                    "chat.html", "config.php",
                    "count.txt", "count_new.txt",
                    "counter.dat", "counter.php",
                    "create.php", "dat.db");
  // Вычисляем количество элементов в массиве
  $total = count($filename);
  // Количество столбцов в таблице
  $numcols = 3;
  $counter = 0;

  echo "<table border=1>";
  for($i = 0; $i < $total; $i++)
  {
    if($counter == 0) echo "<tr>";
    if($counter == $numcols)
    {
      echo "</tr>";
      $counter = 0;
    }
    echo "<td>".$filename[$i]."</td>";
    $counter++;
  } 
  echo "</table>";
?>
