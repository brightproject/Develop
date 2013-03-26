<?php
  // Получаем отражение ядра PHP
  $obj = new ReflectionExtension("standard");
  // Выводим в окно браузера версию PHP
  echo $obj->getVersion();
?>
