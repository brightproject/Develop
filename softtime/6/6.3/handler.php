<?php
  if($_POST['name'] == 'admin' && $_POST['pass'] == 'admin')
  {
     echo "<br><br>Письмо отправлено<br><br>";
     @mail("admin@somewhere.ru", "Статистика", "тело письма");
  }
?>
