<?php
error_reporting(0);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<title>Untitled Document</title>
</head>
<style type="text/css">
body {padding:15px 40px; margin:0; font:normal 11px Tahoma, Geneva, sans-serif}
.name {width:180px; float:left; font:bold 13px/20px Tahoma; border-bottom:dashed 1px #333;}
.line {width:100%; float:left; height:10px;}
.block {width:180px; float:left}
span {color:#CCC; cursor:pointer}
span:hover {color:#333	}
</style>
<body>
<?php
  ////////////////////////////////////////////////////////// 
  // Рекурсивная функция - спускаемся вниз по каталогу 
  ////////////////////////////////////////////////////////// 
  function scan_dir($dirname) 
  { 
    // Объявляем переменные замены глобальными
    GLOBAL $extentions, $count;
    // Открываем текущую директорию 
    $dir = opendir($dirname); 
    // Читаем в цикле директорию 
    while (($file = readdir($dir)) !== false) 
    { 
      // Если файл обрабатываем его содержимое 
      if($file != "." && $file != "..") 
      { 
        // Если имеем дело с файлом - производим в нём замену
        if(is_file($dirname."/".$file)) 
        { 
          // Извлекаем из имени файла расширение
          $ext = strrchr($dirname."/".$file, "."); 
          foreach($extentions as $exten)
          if(preg_match($exten, $ext))
          {
            // Читаем содержимое файла
            $content = file($dirname."/".$file); 
            // Подсчтываем число файлов
            $count += count($content);
            // Удаляем массив
            unset($content);
          }
        } 
        // Если перед нами директория, вызываем рекурсивно 
        // функцию scan_dir 
        if(is_dir($dirname."/".$file)) 
        { 
          scan_dir($dirname."/".$file); 
        } 
      } 
    } 
    // Закрываем директорию 
    closedir($dir); 
  } 
//проверка
	 // Имя корневой директории проекта
	 //$dirname = "softtime"; 
	 // Массив с расширениями файлов, для которых следует подсчитывать
	 // число строк
	 //$extentions = array("#\.php#i"); 
	 // $extentions = array("#\.cpp#i","#\.h#i");
	 // Счётчик строк - глобальная переменная
	 //$count = 0;
	 // Вызов функции, осуществляющей рекурсивный спуск по подкаталогам
	 // корневого каталога
	 //scan_dir($dirname);
	 // Записываем число строк в переменную $count
	 //file_put_contents("test",$count);	
	 //$dirname = "."; 
	 //$extentions = array('php', 'css', 'tpl', 'js'); 
	 //$k = array('all', 'null', 'nonull');
	
	foreach($extentions as $exten) {
		foreach($k as $key) {
			$count[$exten][$key] = 0;
		}
	}
	
	scan_dir($dirname);
	$all = $all_null = $all_nonull = 0;
	foreach($extentions as $exten) {
		$all += $count[$exten]['all'];
		$all_null += $count[$exten]['null'];
		$all_nonull += $count[$exten]['nonull'];
	}
	
	$per1 = round(($all_null / $all) * 100);
	
	echo '<div class="name">Общая</div>
	      <div class="line"></div>
		  <div class="block">
	        Всего строк: <strong>'.$all.'</strong><br />'.
		   'Пустых строк: <strong>'.$all_null.' - <span>'.$per1.'%</span></strong><br />'.
		   'Нормальных строк: <strong>'.$all_nonull.' - <span>'.(100 - $per1).'%</strong>
		 </div>
		 <div class="line"></div><div class="line"></div><div class="line"></div>';
	
	foreach($extentions as $exten) {
		
		$per2 = round(($count[$exten]['null'] / $count[$exten]['all'])  * 100);
		
		echo '<div class="name">Расширение: '.$exten.'</div>
		      <div class="line"></div>
			  <div class="block">
		        Всего строк: <strong>'.$count[$exten]['all'].'</strong><br />'.
			   'Пустых строк: <strong>'.$count[$exten]['null'].' - <span>'.$per2.'%</span></strong><br />'.
			   'Чистый код: <strong>'.$count[$exten]['nonull'].' - <span>'.(100 - $per2).'%</span></strong>
			 </div>
			 <div class="line"></div><div class="line"></div><div class="line"></div>';
	}
?>
</body>
</html>
