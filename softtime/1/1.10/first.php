<?php
  $filename = array("all.php", "auth.php",
                    "auth.txt", "base.txt",
                    "chat.html", "config.php",
                    "count.txt", "count_new.txt",
                    "counter.dat", "counter.php",
                    "create.php", "dat.db");
  // ”паковываем массив в строку
  $content = serialize($filename);
  // ”станавливаем cookie, последний параметр
  // time() + 3600 - это врем€ жизни cookie
  // устанавливаетс€ на час
  setcookie('filename',$content, time() + 3600);
  // ¬ыводим ссылку на страницу second.php
  echo "<a href=second.php>ѕереход на страницу second.php</a>";
?>
