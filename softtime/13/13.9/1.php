<?php
  // Извлекаем список загруженных расширений
  $arr = get_loaded_extensions();
  // Обходим массив расширений в цикле
  foreach($arr as $extension)
  {
     // Создаем отражение расширения
     $obj = new ReflectionExtension($extension);
     // Выводим имя расширения и его версию
     echo $extension." - ". $obj->getVersion()."<br>";
  }
?>
