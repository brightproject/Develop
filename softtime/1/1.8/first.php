<?php
  $filename = array("all.php", "auth.php",
                    "auth.txt", "base.txt",
                    "chat.html", "config.php",
                    "count.txt", "count_new.txt",
                    "counter.dat", "counter.php",
                    "create.php", "dat.db");
?>
<form action='second.php' method=post>
<?php
  // В цикле формируем скрытые поля с 
  // элементами массива
  foreach($filename as $name)
  {
    echo "<input type=hidden name=filename[] value=$name>";
  }
?>
<input type=submit value='Переправить массив'>
</form>
