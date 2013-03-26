<?php
  $filename = array("all.php", "auth.php",
                    "auth.txt", "base.txt",
                    "chat.html", "config.php",
                    "count.txt", "count_new.txt",
                    "counter.dat", "counter.php",
                    "create.php", "dat.db");
  // Объединяем элементы массива в строку вида
  // filename[]=first&filename[]=second&:
  $url = implode("&filename[]=", $filename);
  $url = "second.php?filename[]=".$url;
  echo "<a href=$url>Ссылка на файл second.php</a>";
?>
