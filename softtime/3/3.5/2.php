<form enctype='multipart/form-data' method=post>
  <input type="file" size="32" name="filename"><br> 
  <input class=button type=submit value='Загрузить'> 
</form>
<?php
  // Обработчик формы
  if(!empty($_FILES['filename']['tmp_name']))
  {
    if(substr($_FILES['filename']['type'],0,5) == 'image')
    {
      // Сохраняем файл в текущем каталоге
      if(copy($_FILES['filename']['tmp_name'],
              $_FILES['filename']['name']))
      {
        echo "Файл успешно загружен - <a href=" .
             $_FILES['filename']['name'] . ">" .
             $_FILES['filename']['name'] . "</a>";
      }
    }
    else
    {
      // Файл с незарегистрированным расширением
      echo "Разрешена загрузка только изображений";
    }
  }
?>
