<?php
class simpleCMS {  // класс управления

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
    $this->buildDB();
	return $link;
  }
  
//Создаем новую таблицу для сообщений
  
		public function buildDB(){
	$sql = "CREATE TABLE Messages
	(
	mid int NOT NULL AUTO_INCREMENT,
	PRIMARY KEY(mid),
	title varchar(15),
	bodytext text,
	created  int(11)
	) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1";

		$result = mysql_query($sql);   
		print_r($result);	//Вернет 1 если таблица создана и ничего если таблица уже существует
	  }

  public function display_public() { // метод вывода сообщений из файлов в папке
    $content = '';
	if (is_dir('messages')) { // проверяем наличие папки
		if ($dh = opendir('messages')) { // открываем папку на чтение
			while (($file = readdir($dh)) !== false) { // пока файлы существуют читаем их
			  if(substr($file, -4) == '.txt'){ // берем только .txt файлы
				$filename = 'messages/' . $file; // полное имя файла
			    $message = fopen($filename, 'r'); // открываем файл
				$title = fgets($message); // читаем первую строку
				$body = fgets($message);  // читаем вторую строку
				$time = fgets($message);  // читаем третью строку
				print '<div class="post">'; // div оборачивающий запись
				print '<span class="time">' . date('d-m-Y', $time) . '</span><h2>' . $title . '</h2>'; 	// выводим время и заголовок
			    print '<p>' . $body . '</p>'; // выводим текст сообщения
				print '</div>'; // конец оборачивающего div'a
				fclose($message); // закрываем файл
			  }	
			}
			closedir($dh); //закрываем директорию
		}
	}   	
	$content .= '<p><a href=index.php?admin=1">Добавить сообщение</a></p>';
    return $content;
  }
  
  public function display_public_DB() { // метод вывода сообщений из таблицы БД
    $content = '';
	$sql = 'SELECT * FROM Messages ORDER BY mid DESC'; //запрос выборки
	$result = mysql_query($sql) or die(mysql_error());  // результат выполнения запроса выборки мы сохраняем в переменную
	while($row = mysql_fetch_array($result)){ // переменную запроса выборки необходимо обработать специальной функцией mysql_fetch_array()
	  print '<div class="post">'; // div оборачивающий запись
	  print '<span class="time">#' . $row['mid'] . ' от ' . date('d-m-Y', $row['created']) . '</span><h2>' . $row['title'] . '</h2>'; 	// выводим время и заголовок
	  print '<p>' . $row['bodytext'] . '</p>'; // выводим текст сообщения
	  print '</div>'; // конец оборачивающего div'a
	}
	$content .= '<p><a href="index.php?admin=1">Добавить сообщение</a></p>';
    return $content;
  }
  
  public function display_admin() { // метод ввода сообщения
	 $content = '';

	$content .=	'<form action="' . $_SERVER['PHP_SELF'] . '" method="post">'; // $_SERVER['PHP_SELF'] возвращает имя файла из которого был вызван класс		
	$content .=	  '<label for="title">Имя:</label><br />';
	$content .=	  '<input name="title" id="title" type="text" maxlength="150" />';
	$content .=	  '<div class="clear"></div>';		 
	$content .=	  '<label for="bodytext">Сообщение:</label><br />';
	$content .=	  '<textarea name="bodytext" id="bodytext"></textarea>';
	$content .=	  '<div class="clear"></div>';		  
	$content .=	  '<input type="submit" value="Добавить сообщение" />';
	$content .=	'</form>';		
	$content .=	'<p><a href="index.php">Вернуться на главную</a></p>';

    return $content;
  }
  public function write($p) { // метод записи сообщения в файл в папке
	$message = fopen('messages/'. time() . '.txt',"w");  // открываем файл
	fputs ($message, $p['title']. "\r\n");
	fputs ($message, $p['bodytext']. "\r\n");
	fputs ($message, time());
	fclose ($message); //закрываем файл
  }  
   public function write_DB($p) { // метод записи сообщения в таблицу БД
    $sql = 'INSERT INTO Messages (title, bodytext, created) VALUES ("'. $p["title"] . '", "' . $p["bodytext"] . '", ' . time() . ')';
    return mysql_query($sql);
  }  
}
?>