<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Изучаем PHP</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
  </head>
  <body>
  	<div id="page-wrap">
    <?php 
	//Вывод всех ошибок
	// error_reporting(E_ALL); 
	// error_reporting(0); 
      include_once('class/simpleCMS.php'); // подключаем файл с классом
      $obj = new simpleCMS(); // создаем объект класса управления
	  $db_connection = $obj->connectDB();
	  $obj->display_tables();
      if( $_GET['admin'] == 1 ){ // если есть в URL переменная admin
	    print $obj->display_admin(); // если есть переменная, то отображаем форму
	  }else{
	    print $obj->display_public_DB(); // если переменной нет, то отображаем сообщения
	  }
	  
	  if($_POST){
        $obj->write_DB($_POST);
	  }
	  
	  mysql_close($db_connection);
     
    ?>	  
	</div>
  </body>
</html>