<?php
  // Функция, подсчитывающая количество байтов, занимаемых каталогом $dir
  function list_100_files($ftp_handle, $dir)
  {
    $file_list = ftp_rawlist($ftp_handle, $dir);
    if(!empty($file_list))
    {
      foreach($file_list as $file)
      {
        // Разбиваем строку по пробельным символам
        list($acc,
             $bloks,
             $group,
             $user,
             $size, 
             $month, 
             $day, 
             $year, 
             $file) = preg_split("/[\s]+/", $file);
        $path = trim($dir."/".$file,"/");
        if($acc[0] == 'd' && $file != ".." && $file != ".")
        {
          // Если перед нами каталог, рекурсивно вызываем функцию
          $global_size = list_100_files($ftp_handle, 
                                        $path);
        }
        else
        {
          // Если перед нами файл, учитываем его объем
          if($global_size > 102400) echo "$path<br>";
        }
      }
    }
    return $global_size;
  }
?>
