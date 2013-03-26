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
    // Если выбран текущий пользователь, 
    // сохраняем данные
    if($_GET['name'] == $data[0])
    {
      $name = $data[0];
      $email = $data[2];
      $url = $data[3];
    }

    // Формируем список посетителей
    echo "<a href=$_SERVER[PHP_SELF]?name=$data[0]>".
             htmlspecialchars($data[0])."</a><br>";
  }
  if(isset($_GET['name']))
  {
  // В массив $temp помещаем имена уже зарегистрированных
  // посетителей
  echo "Имя - ".htmlspecialchars($name)."<br>";
  if(!empty($email)) echo "e-mail - ".htmlspecialchars($email)."<br>";
  if(!empty($url)) echo "URL - ".htmlspecialchars($url)."<br>";
  echo "<br>";
  }
?> 
