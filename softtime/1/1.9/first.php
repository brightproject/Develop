<?php
  $filename = array("all.php", "auth.php",
                    "auth.txt", "base.txt",
                    "chat.html", "config.php",
                    "count.txt", "count_new.txt",
                    "counter.dat", "counter.php",
                    "create.php", "dat.db");
  // Инициируем сессию
  session_start();
  // Удаляем старые данные
  unset($_SESSION['filename']);
  // В цикле формируем скрытые поля с 
  // элементами массива
  foreach($filename as $name)
  {
    $_SESSION['filename'][] = $name;
  }
  // Выводим ссылку на страницу second.php
  echo "<a href=second.php>Переход на страницу second.php</a>";
?>
