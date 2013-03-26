<?php
  // Извлекаем содержимое из файла index.htm
  $content = file_get_contents("index.htm");

  // Массив регулярных выражений
  $search = array ("'<script[^>]*?>.*?</script>'si",   
                   "'<[\/\!]*?[^<>]*?>'si",           
                   "'([\r\n])[\s]+'",                 
                   "'&(quot|#34);'i",                
                   "'&(amp|#38);'i", 
                   "'&(lt|#60);'i", 
                   "'&(gt|#62);'i", 
                   "'&(nbsp|#160);'i", 
                   "'&(iexcl|#161);'i", 
                   "'&(cent|#162);'i", 
                   "'&(pound|#163);'i", 
                   "'&(copy|#169);'i", 
                   "'&#(\d+);'e");                     
 // Массив замены
 $replace = array ("", 
                   "", 
                   "\\1", 
                   "\"", 
                   "&", 
                   "<", 
                   ">", 
                   " ", 
                   chr(161), 
                   chr(162), 
                   chr(163), 
                   chr(169), 
                   "chr(\\1)"); 
  // Осуществляем удаление тегов и вывод текста в окно браузера
  echo preg_replace($search, $replace, $content);
?>
