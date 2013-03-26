<form method=post>
  <input type=text name=name value="<?= $_POST['name']; ?>">
  <input type=submit value='Записать'>
</form><br>
<?php
  // Обработчик HTML-формы
  if(isset($_POST['name']))
  {
    // Создаем файл со случайным именем
    $filename = tempnam("./", "fl");
    // Открываем файл
    $fd = fopen($filename, "w");
    // Записываем в него строку, введенную
    // пользователем
    fwrite($fd, $_POST['name']);
    // Закрываем файл
    fclose($fd);
  }
?>
