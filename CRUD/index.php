<?

error_reporting(E_ALL);  
header("Content-Type: text/html; charset=cp1251"); 
include 'safemysql.class.php';
// $db    = new SafeMysql();
$table = 'test';
$db = 'test';
$newtablename = 'new';
//$nametables = 'new';
// $db->query("CREATE TABLE IF NOT EXISTS ?n (id INTEGER PRIMARY KEY, name TEXT), ",$table);
$db    = new SafeMysql(array('db' => $db));

//Создание новой таблицы
//$db->buildDB("CREATE TABLE IF NOT EXISTS ?s id int auto_increment primary key title VARCHAR(150),bodytext TEXT,created VARCHAR(100)",$newtablename);
//$db->query("CREATE TABLE IF NOT EXISTS ?s title VARCHAR(150),bodytext TEXT,created VARCHAR(100)",$newtablename);
	
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