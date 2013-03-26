<?php
	//Вывод всех ошибок
	// error_reporting(E_ALL); 
	// error_reporting(0); 
class loadfile {  // класс управления

  public $host = 'localhost'; //переменные для работы с БД
  public $username = 'root';
  public $password = '';
  public $db = 'testDB';

  public function connectDB() {
	$link = mysql_connect($this->host, $this->username, $this->password); // подключаемся к серверу MySQL
	if (!$link) {
		die('Ошибка соединения: ' . mysql_error());
	}    
	mysql_set_charset('utf8');//решение проблем с русской кодировкой при записи в БД
	mysql_select_db($this->db) or die("Не могу найти БД. " . mysql_error()); //подсоединяем БД
    // $this->buildDB();
	return $link;
  }
  
  // public function buildDB(){
  // /*
    // $sql = <<<MySQL_QUERY
// CREATE TABLE IF NOT EXISTS messages (
// mid int(11) NOT NULL AUTO_INCREMENT,
// title VARCHAR(150),
// bodytext TEXT,
// created VARCHAR(100),
// PRIMARY KEY ("mid")
// ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1";	
// MySQL_QUERY;
// */

// $sql = "CREATE TABLE IF NOT EXISTS Messages
// (
// mid int NOT NULL AUTO_INCREMENT,
// PRIMARY KEY(mid),
// title varchar(15),
// bodytext text,
// created  int(11),
// file int(11)
// ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1";
// $sql = "CREATE TABLE IF NOT EXISTS Files
// (
// fid int NOT NULL AUTO_INCREMENT,
// PRIMARY KEY(fid),
// filename varchar(255),
// filepath varchar(255),
// filemime varchar(255),
// filesize int(10),
// timestamp int(11)
// )ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1";

    // $result = mysql_query($sql);   
    // print_r($result);	
  // }

  public function display_public() { // метод вывода сообщений
    $content = '';
	$sql = 'SELECT * FROM Messages LEFT JOIN Files ON Messages.fid=Files.fid ORDER BY mid DESC';
	$result = mysql_query($sql) or die(mysql_error());  
	while($row = mysql_fetch_array($result)){ // переменную запроса выборки необходимо обработать специальной функцией mysql_fetch_array()
	  $content .= '<div class="post" id="mid-' . $row['mid'] . '">'; // div оборачивающий запись
	  $content .= '<span class="time"><b>Запись №</b>' . $row['mid'] . ' от ' . date('d-m-Y', $row['created']) . '</span><h2>' . $row['title'] . '</h2>'; 	// выводим время и заголовок
	  $content .= '<p>' . $row['bodytext'] . '</p>'; // выводим текст сообщения
	  if(!empty($row['filename'])){
	    $content .= '<p>Приложение: <a target="_blank" href="'. $row['filepath'] .'">'. $row['filename'] .'</a></p>';
	  }
	  $content .= '<a href="join.php?admin=update&mid=' . $row['mid'] . '">Редактировать сообщение</a>'; // добавляем ссылку на редактирование сообщения
	  $content .= '<a href="join.php?admin=delete&mid=' . $row['mid'] . '">Удалить сообщение</a>'; //добавляем ссылку на удаление сообщения
	  $content .= '</p>';
	  $content .= '</div>'; // конец оборачивающего div'a
	}
	$content .= '<p><a href="join.php?admin=add">Добавить сообщение</a></p>';
    return $content;
  }
  
  public function display_admin() { // метод ввода сообщения
	$content = '';	
	$content .=	'<form action="' . $_SERVER['PHP_SELF'] . '" method="post" enctype="multipart/form-data">'; 
	$content .=	  '<label for="title">Имя:</label><br />';
	$content .=	  '<input name="title" id="title" type="text" maxlength="150" />';
	$content .=	  '<div class="clear"></div>';
	$content .=	  '<label for="bodytext">Сообщение:</label><br />';
	$content .=	  '<textarea name="bodytext" id="bodytext"></textarea>';
	$content .=   '<input type="file" name="filename">'; // поле загрузки файла
	$content .=	  '<div class="clear"></div>';
	$content .=	  '<input type="submit" value="Добавить сообщение" />';
	$content .=	'</form>';	
	$content .=	'<p><a href="join.php">Вернуться на главную</a></p>';

    return $content;
  }
  
  public function display_update(){
    $message_id = $_GET['mid']; //записываем mid в переменную
	if(!empty($message_id)){
	  $result = mysql_query('SELECT * FROM Messages WHERE mid='.$message_id); // запрашиваем нужную нам строку где mid совпадает с нашим значением
	  $message = mysql_fetch_object($result); // обрабатываем результат в переменную message
	  $content = '';
	  $content .=	'<form action="join.php?admin=update" method="post" enctype="multipart/form-data">'; // отправляем результаты формы на эту же страницу
	  $content .=	  '<label for="title">Имя:</label><br />';
	  $content .=	  '<input name="title" id="title" type="text" maxlength="150" value=' . $message->title .' />'; // добавляем значение заголовка
	  $content .=	  '<div class="clear"></div>';
	  $content .=     '<input name="mid" id="mid" type="hidden" value="'.$message->mid.'" />'; // добавляем скрытое поле для хранения mid
	  $content .=	  '<label for="bodytext">Сообщение:</label><br />';
	  $content .=	  '<textarea name="bodytext" id="bodytext">'. $message->bodytext .'</textarea>'; // добавляем значение текста
	  $content .=	  '<div class="clear"></div>';
	  $content .=	  '<input type="submit" value="Сохранить" />';
	  $content .=	'</form>';	
	  $content .=	'<p><a href="join.php">Вернуться на главную</a></p>';
	}else{
	  if($_POST){ // проверяем результаты отправки формы
		mysql_query('UPDATE Messages SET title="'.$_POST["title"].'", bodytext="'.$_POST["bodytext"].'" WHERE mid='.$_POST["mid"]);
		$content .= '<p>Сообщение изменено!';
		$content .=	'<p><a href="join.php?mid-'.$_POST['mid'].'">Перейти к записи</a></p>';
	  }else{
	    $content .=   '<p>Нет значения mid!</p>';
	    $content .=	'<p><a href="join.php">Вернуться на главную</a></p>';
	  }
	}
	return $content;
  }  
  
  public function write($p) { 
	print_r($p); // распечатаем массив формы
	print_r($_FILES); // распечатываем массив файлов	
    if($_FILES["filename"]["size"] > 1024*3*1024){
       echo ("Размер файла превышает три мегабайта");
       exit;
    }
   if(is_uploaded_file($_FILES["filename"]["tmp_name"])){    // Проверяем загружен ли файл
     // Если файл загружен успешно, перемещаем его
     // из временной директории в конечную
     move_uploaded_file($_FILES["filename"]["tmp_name"], "./files/".$_FILES["filename"]["name"]);
   } else {
      echo("Ошибка загрузки файла");
   }	
   
	$sql = 'INSERT INTO Files (filename, filepath, filemime, filesize, timestamp) 
	VALUES ("'. $_FILES['filename']['name'] . '", 
	 "files/' . $_FILES['filename']['name'] . '",
	 "'. $_FILES['filename']['type'] .'",
	 '. $_FILES['filename']['size'] .',
	 '. time() . ')';  

	mysql_query($sql);   

   $sql = 'INSERT INTO Messages (title, bodytext, created, fid) VALUES ("'. $p["title"] . '", "' . $p["bodytext"] . '", ' . time() . ',LAST_INSERT_ID())';
   return mysql_query($sql) ;
  }  
  
  public function delete($mid){
    mysql_query('DELETE FROM Messages WHERE mid='.$mid) or die(mysql_error());
  }  
}
?>