<?php
  // Если передано исправленное содержимое файла,
  // открываем файл и перезаписываем его
  if(isset($_POST['content']))
  {
    // Открываем файл
    $fd = @fopen($_POST['filename'], "w");
    // Если файл не может быть открыт - сообщаем
    // об этом предупреждением в окне браузера
    if(!$fd) exit("Такой файл отсутствует");
    // Перезаписываем содержимое файла
    fwrite($fd, stripslashes($_POST['content']));
    // Закрываем файл
    fclose($fd);
    // Помещаем в суперглобальный массив $_GET
    // имя файла
    $_GET['filename'] = $_POST['filename'];
  }
?>
<form name=first method="get">
   Имя файла <input type="text" name="filename" 
                    value=<?php echo $_GET['filename']; ?>>
  <input type="submit" value="Открыть">
</form>
<?php
  // Если в строке запроса передано имя
  // файла - открываем его для редактирования
  if(isset($_GET['filename']))
  {
    // Открываем файл
    $fd = @fopen($_GET['filename'], "r");
    // Если файл не может быть открыт - сообщаем
    // об этом предупреждением в окне браузера
    if(!$fd) exit("Такой файл отсутствует");
    // Помещаем содержимое файла в переменную $bufer
    $bufer = fread($fd, filesize($_GET['filename']));
    // Закрываем файл
    fclose($fd);
    ?>
      <form name=second method="post">
        <textarea cols=50 rows=5 name="content"><?php 
           echo htmlspecialchars($bufer); ?></textarea><br>
        <input type="hidden" name=filename 
               value='<?php echo $_GET['filename']; ?>'>
        <input type="submit" name=edit value="Редактировать">
      </form>
    <?php
  }
?>
