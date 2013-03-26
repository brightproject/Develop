<?php
  $filename = array("all.php", "auth.php",
                    "auth.txt", "base.txt",
                    "chat.html", "config.php",
                    "count.txt", "count_new.txt",
                    "counter.dat", "counter.php",
                    "create.php", "dat.db");
  // ��������� ���������� ��������� � �������
  $total = count($filename);
  // ���������� �������� � �������
  $numcols = 3;

  // ��������� ���������� �����
  $number = (int)($total/$numcols);
  if((float)($total/$numcols) - $number != 0) $number++;

  // ��������� ������������� ��������� ������
  for($i = 0; $i < $number; $i++)
  {
    for($j = 0; $j < $numcols; $j++)
    {
      $arr[$i][$j] = $filename[$j*$number + $i];
    }
  } 

  // ������� �������
  echo "<table border=1>";
  for($i = 0; $i < $number; $i++)
  {
    echo "<tr>";
    for($j = 0; $j < $numcols; $j++)
    {
      echo "<td>".$arr[$i][$j]."</td>";
    }
    echo "</tr>";
  } 
  echo "</table>";
?>
