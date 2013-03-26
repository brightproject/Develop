<?php
  // Имя файла данных
  $filename = "text.txt"; 
  // Проверяем, не было ли переданное имя
  // зарегистрировано ранее
  $arr = file($filename);
  foreach($arr as $line)
  {
    // Разбиваем строку по разделителю ::
    $data = explode("::",$line);
    // Если файл сформирован в Windows,
    // последний элемент будет содержать 
    // на конце символ \r - избавляемся от него
    $data[3] = trim($data[3]);
    // В массив $temp помещаем имена уже зарегистрированных
    // посетителей
    echo "Имя - ".htmlspecialchars($data[0])."<br>";
    if(!empty($data[2])) echo "e-mail - ".
                               htmlspecialchars($data[2])."<br>";
    if(!empty($data[3])) echo "URL - ".htmlspecialchars($data[3])."<br>";
    echo "<br>";
  }
?>
