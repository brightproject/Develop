<?php
  // Формируем путь к HTML-форме на текущем сервере
  $html = "http://".$_SERVER['SERVER_NAME']."/test/index.php";
  // Проверяем, переданы ли данные с текущего сервера
  if($_SERVER['HTTP_REFERER'] == $html)
  {
    if($_POST['name'] == 'admin' && $_POST['pass'] == 'admin')
    {
       echo "<br><br>Письмо отправлено<br><br>";
       @mail("admin@somewhere.ru", "Статистика", "тело письма");
    }
  }
  else
  {
    echo "Результат из формы не может быть обработан";
  }
?>
