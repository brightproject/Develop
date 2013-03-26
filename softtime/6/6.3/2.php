<?php
  // Инициируем сессию
  session_start();
  // Текущий SID и переданный из HTML-формы не совпадают,
  // останавливаем работу скрипта
  if($_POST['session_id'] != session_id()) exit();
  if($_POST['name'] == 'admin' && $_POST['pass'] == 'admin')
  {
     echo "<br><br>Письмо отправлено<br><br>";
     @mail("admin@somewhere.ru", "Статистика", "тело письма");
  }
?>
