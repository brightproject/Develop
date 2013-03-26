<form enctype='multipart/form-data' method=post>
<input type="file" name="image"><br>
<input type=submit value='Загрузить'>
</form>
<?php
  // Количество изображений на странице
  $pnumber = 3;

  // Устанавливаем соединение с базой данных
  require_once("config.php");

  // Обработчик HTML-формы
  if(!empty($_FILES))
  {
    // Проверяем, является ли переданный файл графическим
    if(substr($_FILES['image']['type'],0,5) == 'image')
    {
      // Читаем содержимое файла
      $content = file_get_contents($_FILES['image']['tmp_name']);
      // Уничтожаем файл во временном каталоге
      unlink($_FILES['image']['tmp_name']);

      // Экранируем спецсимволы в двоичном содержимом файла
      $content = mysql_escape_string($content);

      // Формируем запрос на добавление файла в таблицу
      $query = "INSERT INTO image VALUES(NULL,
                                         '".$_FILES['image']['name']."',
                                         '$content')";
      if(mysql_query($query))
      {
        // Осуществляем автоматическую перезагрузку страницы
        echo "<HTML><HEAD>
          <META HTTP-EQUIV='Refresh' CONTENT='0; URL=$_SERVER[PHP_SELF]'>
             </HEAD></HTML>";
      } else exit(mysql_error());
    }
  }

  // Проверяем, передан ли номер текущей страницы
  if(isset($_GET['page'])) $page = $_GET['page'];
  else $page = 1;

  // Начальная позиция
  $start = (($page - 1)*$pnumber + 1);

  // Выводим список файлов
  $query = "SELECT * FROM image LIMIT $start, $pnumber";
  $img = mysql_query($query);
  if(!$img) exit(mysql_error());
  // Если имеется хотя бы одна запись,
  // выводим 
  if(mysql_num_rows($img) > 0)
  {
    while($image = mysql_fetch_array($img))
    {
      echo "<img src=get.php?id_image=$image[id_image]>&nbsp;";
    }
  }
  echo "<br><br>";

  // Количество страниц
  $query = "SELECT COUNT(*) FROM image";
  $tot = mysql_query($query);
  if(!$tot) exit(mysql_error());
  $total = mysql_result($tot,0);
  $number = (int)($total/$pnumber);
  if((float)($total/$pnumber) - $number != 0) $number++;

  // Постраничная навигация
  for($i = 1; $i <= $number; $i++)
  {
    if($i != $number)
    {
      if($page == $i)
      {
        echo "[".(($i - 1)*$pnumber + 1)."-".$i*$pnumber."]&nbsp;";
      }
      else
      {
        echo "<a href=$_SERVER[PHP_SELF]?page=".$i.
             ">[".(($i - 1)*$pnumber + 1)."-".$i*$pnumber."]</a>&nbsp;";
      }
    }
    else
    {
      if($page == $i)
      {
        echo "[".(($i - 1)*$pnumber + 1)."-".($total - 1)."]&nbsp;";
      }
      else
      {
        echo "<a href=$_SERVER[PHP_SELF]?page=".$i.
             ">[".(($i - 1)*$pnumber + 1)."-".($total - 1)."]</a>&nbsp;";
      }
    }
  }
?>
