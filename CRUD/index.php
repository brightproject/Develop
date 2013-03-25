<?
//Вывод всех ошибок
error_reporting(E_ALL);  
//Решение проблем с русской кодировкой
//header("Content-Type: text/html; charset=cp1251"); 
//Либо создаем файл .htaccess
//И пишем в нем AddDefaultCharset cp1251
// $db    = new SafeMysql();
include 'safemysql.class.php';
$newtablename = 'new';
$table = 'new';
$db = 'test';
$db    = new SafeMysql(array('db' => $db));
//Создание новой таблицы
$db->query("CREATE TABLE IF NOT EXISTS ?n (id INTEGER(2) NOT NULL AUTO_INCREMENT PRIMARY KEY, name VARCHAR(15))",$newtablename);
// CREATE TABLE IF NOT EXISTS `test` (
  // `id` int(2) NOT NULL AUTO_INCREMENT,
  // `name` varchar(15) COLLATE utf8_bin NOT NULL,
  // PRIMARY KEY (`id`)
// ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=8 ;
// $db->query("CREATE TABLE IF NOT EXISTS ?n (id INTEGER PRIMARY KEY, name TEXT)",$newtablename);
	
if($_SERVER['REQUEST_METHOD']=='POST') {
  if (isset($_POST['delete'])) {
    $db->query("DELETE FROM ?n WHERE id=?i",$table,$_POST['delete']);
  } elseif ($_POST['id']) { 
    $db->query("UPDATE ?n SET name=?s WHERE id=?i",$table,$_POST['name'],$_POST['id']);
  } else { 
    $db->query("INSERT INTO ?n SET name=?s",$table,$_POST['name']);
  } 
  header("Location: http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']);  
  exit;  
}  
if (!isset($_GET['id'])) {
  $LIST = $db->getAll("SELECT * FROM ?n",$table);
  include 'list.php'; 
} else {
  if ($_GET['id']) {
    $row = $db->getRow("SELECT * FROM ?n WHERE id=?i",$table,$_GET['id']);
    foreach ($row as $k => $v) $row[$k]=htmlspecialchars($v); 
  } else { 
    $row['name']=''; 
    $row['id']=0; 
  } 
  include 'form.php'; 
}