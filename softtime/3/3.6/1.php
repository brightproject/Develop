<?php
  // Регистрируем имена файлов в массиве
  $file_name = array('archive1.zip','archive2.zip','archive3.zip');

  // Имя файла, где хранится статистика
  $countname = "filecount.txt";
  // Если файл существует - считываем текущую 
  // статистику в массив
  if(file_exists($countname))
  {
    $fd = fopen($countname,"r");
    $content = fread($fd,filesize($countname));
    fclose($fd);
    // Распаковываем массив
    $count = unserialize($content);
  }
  // Если такого файла нет - создаем его,
  // а статистику обнуляем
  else
  {
    // Заполняем массив $count нулевыми значениями
    foreach($file_name as $file)
    {
      $count[$file] = 0;
    }
    // Создаем статистический файл
    $fd = fopen($countname,"w");
    // Упаковываем массив
    fwrite($fd, serialize($count));
    fclose($fd);
  }

  // Проверяем, не передано ли значение параметра down
  // через метод GET
  if(isset($_GET['down']))
  {
    // Проверяем, входит ли значение параметра $_GET['down']
    // в массив $file_name
    if(in_array($_GET['down'],$file_name))
    {
      // Регистрируем факт загрузки данного файла
      // Увеличиваем значение счетчика с ключом
      // $_GET['down'] на единицу
      $count[$_GET['down']]++;
      // Перезаписываем файл счетчика
      $fd = fopen($countname,"w");
      // Упаковываем массив
      fwrite($fd, serialize($count));
      fclose($fd);

      // Предоставляем ссылку на его загрузку
      header("Location: $_GET[down]");
    }
  }
  // Выводим ссылки на файлы
  foreach($file_name as $file)
  {
    echo "Файл <a href=$_SERVER[PHP_SELF]?down=$file>$file</a> 
          был загружен ".$count[$file]." раз<br>";
  }
?>
