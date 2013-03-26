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
    if($data[0] == $temp['name'][$index])
    {
      // Формируем новую строку вместо старой
      $linefile[] = $_POST['name']."::".md5($_POST['passw'])."::".
                          $_POST['email']."::".$_POST['url'];
      $_POST['pass'] = $_POST['passw'];
      $temp['email'][$index]    = $_POST['email'];
      $temp['url'][$index]      = $_POST['url'];
    }
    else $linefile[] = trim($line);
  }
?>
