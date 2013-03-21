<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru" dir="ltr">
  <head>
	<meta http-equiv="Content-Type" con	tent="text/html; charset=utf-8" />
    <title>Изучаем PHP</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
  </head>
  <body>
  	<div id="page-wrap">
    <?php
	
      include_once('class/simpleCMS.php'); // подключаем файл с классом
      $obj = new simpleCMS(); // создаем объект класса управления
	  $db_connection = $obj->connectDB();
	  
      if( $_GET['admin'] == 1 ){ // если есть в URL переменная admin
	    print $obj->display_admin(); // если есть переменная, то отображаем форму
	  }else{
	    print $obj->display_public(); // если переменной нет, то отображаем сообщения
	  }
	  
	  if($_POST){
        $obj->write($_POST);
	  }
	  
	  mysql_close($db_connection);
     
    ?>	  
	</div>
  </body>
</html>