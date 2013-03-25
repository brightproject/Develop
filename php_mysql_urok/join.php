<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Изучаем PHP || Загружаем файлы</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
  </head>
  <body>
  	<div id="page-wrap">
	
<?php
      include_once('class/loadfile.php'); // подключаем файл с классом
      $obj = new loadfile(); // создаем объект класса управления
	  $db_connection = $obj->connectDB();
	$content = '';
    $content .= '<h2>INNER JOIN</h2>';
	$sql = 'SELECT * FROM Messages INNER JOIN Files ON Messages.fid=Files.fid ORDER BY mid DESC';
	$result = mysql_query($sql) or die(mysql_error());  
	while($row = mysql_fetch_array($result)){ // переменную запроса выборки необходимо обработать специальной функцией mysql_fetch_array()
	  $content .= '<div class="post" id="mid-' . $row['mid'] . '">'; // div оборачивающий запись
	  $content .= '<span class="time">#' . $row['mid'] . ' от ' . date('d-m-Y', $row['created']) . '</span><h2>' . $row['title'] . '</h2>'; 	// выводим время и заголовок
	  $content .= '<p>' . $row['bodytext'] . '</p>'; // выводим текст сообщения
	  if(!empty($row['filename'])){
	    $content .= '<p>Приложение: <a target="_blank" href="/'. $row['filepath'] .'">'. $row['filename'] .'</a></p>';
	  }
	  $content .= '<a href="index.php?admin=update&mid=' . $row['mid'] . '">Редактировать сообщение</a>'; // добавляем ссылку на редактирование сообщения
	  $content .= '<a href="index.php?admin=delete&mid=' . $row['mid'] . '">Удалить сообщение</a>'; //добавляем ссылку на удаление сообщения
	  $content .= '</p>';
	  $content .= '</div>'; // конец оборачивающего div'a
	}
	$content .= '<p><a href="index.php?admin=add">Добавить сообщение</a></p>';
	
	$content .= '<h2>LEFT JOIN</h2>';
	$sql = 'SELECT * FROM Messages LEFT JOIN Files ON Messages.fid=Files.fid ORDER BY mid DESC';
	$result = mysql_query($sql) or die(mysql_error());  
	while($row = mysql_fetch_array($result)){ // переменную запроса выборки необходимо обработать специальной функцией mysql_fetch_array()
	  $content .= '<div class="post" id="mid-' . $row['mid'] . '">'; // div оборачивающий запись
	  $content .= '<span class="time">#' . $row['mid'] . ' от ' . date('d-m-Y', $row['created']) . '</span><h2>' . $row['title'] . '</h2>'; 	// выводим время и заголовок
	  $content .= '<p>' . $row['bodytext'] . '</p>'; // выводим текст сообщения
	  if(!empty($row['filename'])){
	    $content .= '<p>Приложение: <a target="_blank" href="/'. $row['filepath'] .'">'. $row['filename'] .'</a></p>';
	  }
	  $content .= '<a href="index.php?admin=update&mid=' . $row['mid'] . '">Редактировать сообщение</a>'; // добавляем ссылку на редактирование сообщения
	  $content .= '<a href="index.php?admin=delete&mid=' . $row['mid'] . '">Удалить сообщение</a>'; //добавляем ссылку на удаление сообщения
	  $content .= '</p>';
	  $content .= '</div>'; // конец оборачивающего div'a
	}
	$content .= '<p><a href="index.php?admin=add">Добавить сообщение</a></p>';
	
	$content .= '<h2>LEFT JOIN без пересечений</h2>';	
	$sql = 'SELECT * FROM Messages LEFT JOIN Files ON Messages.fid=Files.fid WHERE Files.fid IS NULL ORDER BY mid DESC';
	$result = mysql_query($sql) or die(mysql_error());  
	while($row = mysql_fetch_array($result)){ // переменную запроса выборки необходимо обработать специальной функцией mysql_fetch_array()
	  $content .= '<div class="post" id="mid-' . $row['mid'] . '">'; // div оборачивающий запись
	  $content .= '<span class="time">#' . $row['mid'] . ' от ' . date('d-m-Y', $row['created']) . '</span><h2>' . $row['title'] . '</h2>'; 	// выводим время и заголовок
	  $content .= '<p>' . $row['bodytext'] . '</p>'; // выводим текст сообщения
	  if(!empty($row['filename'])){
	    $content .= '<p>Приложение: <a target="_blank" href="/'. $row['filepath'] .'">'. $row['filename'] .'</a></p>';
	  }
	  $content .= '<a href="index.php?admin=update&mid=' . $row['mid'] . '">Редактировать сообщение</a>'; // добавляем ссылку на редактирование сообщения
	  $content .= '<a href="index.php?admin=delete&mid=' . $row['mid'] . '">Удалить сообщение</a>'; //добавляем ссылку на удаление сообщения
	  $content .= '</p>';
	  $content .= '</div>'; // конец оборачивающего div'a
	}
	$content .= '<p><a href="index.php?admin=add">Добавить сообщение</a></p>';


	$content .= '<h2>RIGHT JOIN</h2>';	
	$sql = 'SELECT * FROM Messages RIGHT JOIN Files ON Messages.fid=Files.fid ORDER BY mid DESC';
	$result = mysql_query($sql) or die(mysql_error());  
	while($row = mysql_fetch_array($result)){ // переменную запроса выборки необходимо обработать специальной функцией mysql_fetch_array()
	  $content .= '<div class="post" id="mid-' . $row['mid'] . '">'; // div оборачивающий запись
	  $content .= '<span class="time">#' . $row['mid'] . ' от ' . date('d-m-Y', $row['created']) . '</span><h2>' . $row['title'] . '</h2>'; 	// выводим время и заголовок
	  $content .= '<p>' . $row['bodytext'] . '</p>'; // выводим текст сообщения
	  if(!empty($row['filename'])){
	    $content .= '<p>Приложение: <a target="_blank" href="/'. $row['filepath'] .'">'. $row['filename'] .'</a></p>';
	  }
	  $content .= '<a href="index.php?admin=update&mid=' . $row['mid'] . '">Редактировать сообщение</a>'; // добавляем ссылку на редактирование сообщения
	  $content .= '<a href="index.php?admin=delete&mid=' . $row['mid'] . '">Удалить сообщение</a>'; //добавляем ссылку на удаление сообщения
	  $content .= '</p>';
	  $content .= '</div>'; // конец оборачивающего div'a
	}
	$content .= '<p><a href="index.php?admin=add">Добавить сообщение</a></p>';	
	
	$content .= '<h2>RIGHT JOIN без пересечений</h2>';	
	$sql = 'SELECT * FROM Messages RIGHT JOIN Files ON Messages.fid=Files.fid WHERE Messages.fid IS NULL ORDER BY mid DESC';
	$result = mysql_query($sql) or die(mysql_error());  
	while($row = mysql_fetch_array($result)){ // переменную запроса выборки необходимо обработать специальной функцией mysql_fetch_array()
	  $content .= '<div class="post" id="mid-' . $row['mid'] . '">'; // div оборачивающий запись
	  $content .= '<span class="time">#' . $row['mid'] . ' от ' . date('d-m-Y', $row['created']) . '</span><h2>' . $row['title'] . '</h2>'; 	// выводим время и заголовок
	  $content .= '<p>' . $row['bodytext'] . '</p>'; // выводим текст сообщения
	  if(!empty($row['filename'])){
	    $content .= '<p>Приложение: <a target="_blank" href="/'. $row['filepath'] .'">'. $row['filename'] .'</a></p>';
	  }
	  $content .= '<a href="index.php?admin=update&mid=' . $row['mid'] . '">Редактировать сообщение</a>'; // добавляем ссылку на редактирование сообщения
	  $content .= '<a href="index.php?admin=delete&mid=' . $row['mid'] . '">Удалить сообщение</a>'; //добавляем ссылку на удаление сообщения
	  $content .= '</p>';
	  $content .= '</div>'; // конец оборачивающего div'a
	}
	$content .= '<p><a href="index.php?admin=add">Добавить сообщение</a></p>';		

	$content .= '<h2>Эмуляция запроса FULL OUTER JOIN</h2>';	 
	$sql = 'SELECT * FROM Messages LEFT JOIN Files ON Messages.fid = Files.fid UNION SELECT * FROM Messages RIGHT JOIN Files ON Messages.fid = Files.fid';
	$result = mysql_query($sql) or die(mysql_error());  
	while($row = mysql_fetch_array($result)){ // переменную запроса выборки необходимо обработать специальной функцией mysql_fetch_array()
	  $content .= '<div class="post" id="mid-' . $row['mid'] . '">'; // div оборачивающий запись
	  $content .= '<span class="time">#' . $row['mid'] . ' от ' . date('d-m-Y', $row['created']) . '</span><h2>' . $row['title'] . '</h2>'; 	// выводим время и заголовок
	  $content .= '<p>' . $row['bodytext'] . '</p>'; // выводим текст сообщения
	  if(!empty($row['filename'])){
	    $content .= '<p>Приложение: <a target="_blank" href="/'. $row['filepath'] .'">'. $row['filename'] .'</a></p>';
	  }
	  $content .= '<a href="index.php?admin=update&mid=' . $row['mid'] . '">Редактировать сообщение</a>'; // добавляем ссылку на редактирование сообщения
	  $content .= '<a href="index.php?admin=delete&mid=' . $row['mid'] . '">Удалить сообщение</a>'; //добавляем ссылку на удаление сообщения
	  $content .= '</p>';
	  $content .= '</div>'; // конец оборачивающего div'a
	}
	$content .= '<p><a href="index.php?admin=add">Добавить сообщение</a></p>';	
	
	$content .= '<h2>Эмуляция запроса FULL OUTER JOIN без пересечений</h2>';	 
$sql = 'SELECT * FROM Messages LEFT JOIN Files ON Messages.fid = Files.fid WHERE Files.fid IS NULL 
UNION 
SELECT * FROM Messages RIGHT JOIN Files ON Messages.fid = Files.fid WHERE Messages.fid IS NULL';
	$result = mysql_query($sql) or die(mysql_error());  
	while($row = mysql_fetch_array($result)){ // переменную запроса выборки необходимо обработать специальной функцией mysql_fetch_array()
	  $content .= '<div class="post" id="mid-' . $row['mid'] . '">'; // div оборачивающий запись
	  $content .= '<span class="time">#' . $row['mid'] . ' от ' . date('d-m-Y', $row['created']) . '</span><h2>' . $row['title'] . '</h2>'; 	// выводим время и заголовок
	  $content .= '<p>' . $row['bodytext'] . '</p>'; // выводим текст сообщения
	  if(!empty($row['filename'])){
	    $content .= '<p>Приложение: <a target="_blank" href="/'. $row['filepath'] .'">'. $row['filename'] .'</a></p>';
	  }
	  $content .= '<a href="index.php?admin=update&mid=' . $row['mid'] . '">Редактировать сообщение</a>'; // добавляем ссылку на редактирование сообщения
	  $content .= '<a href="index.php?admin=delete&mid=' . $row['mid'] . '">Удалить сообщение</a>'; //добавляем ссылку на удаление сообщения
	  $content .= '</p>';
	  $content .= '</div>'; // конец оборачивающего div'a
	}
	$content .= '<p><a href="index.php?admin=add">Добавить сообщение</a></p>';		
	
	print $content;
	
?>
	</div>
  </body>
</html>