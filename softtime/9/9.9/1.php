<?php
  // Обработчик HTML-формы
  if($_POST)
  {
    // Устанавливаем содинение с СУБД MySQL
    require_once("config.php");

    // Обрабатываем спецсимволы
    if (!get_magic_quotes_gpc())
    {
      $_POST['title'] = mysql_escape_string($_POST['title']);
      $_POST['description'] = mysql_escape_string($_POST['description']);
    }

    // Добавляем новостную позицию
    $query = "INSERT INTO news 
              VALUES(NULL, 
                     '$_POST[title]',
                     '$_POST[description]',
                     NOW())";
    if(mysql_query($query)) header("Location: $_SERVER[PHP_SELF]");
    else echo "Ошибка при добавлении новостной позиции - ".mysql_error();
    exit();
  }
?>
<form method=post>
<table>
  <tr>
    <td>Заголовок</td>
    <td><input type=text name=title></td>
  </tr>
  <tr>
    <td>Содержимое</td>
    <td><textarea cols=40 
                  rows=5 
                  name=description></textarea></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type=submit value="Добавить"></td>
  </tr>
</table>
</form>
