<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<title>Главная</title>
<style type="text/css">
#main {
margin: 0 auto;
width:800px;
border:1px solid #000000; background-color:#ffffff;
}
#headerCenter {
	height: 200px;
	background: url(images/header.png) no-repeat;
	background-position: 50% 0;
}
#contentcolumn{
	width: 100%;
	background: white;
	color: red;
	margin-bottom:20px;
	text-align: center;
	padding: 4px 0;
}
#footerCenter {
	height: 60px;
	background: url(images/footer.png) no-repeat;
	background-position: 50% 0;
}

.thumbnails
{
/* Компенсируем отступы между float-блоками, чтобы они занимали все доступное пространство */
margin: -3em 0 0 -2em;

/* Выравнивание по центру */
text-align: center;
}

.thumbnail
{
/* Убираем подчеркивание у элемента ins,
который был использован для совместимости со старыми версиями Internet Explorer */
text-decoration: none;

/* Следующее правило для Firefox 2 */
display: -moz-inline-box;

/* а это для остальных */
display: inline-block;

vertical-align: top;

/* Отступы между блоками */
margin: 2em 2em 0 3em;
}

.thumbnail .r
{
/* Если есть необходимость, то свойства padding, border, background и position со значением relative
лучше задавать у этого элемента -- это несколько расширит количество поддерживаемых версий браузеров */

/* Задаем минимальную ширину по тексту */
width: 14em;

/* Минимальная ширина в пикселях будет автоматически рассчитываться по ширине картинки */
float: left;
}
</style>
</head>
<body>
<div id="main">
<div id="headerCenter"></div>
<div id="contentcolumn">
<?php 


/* Соединяемся с базой. Естественно, данные подставляете свои */
// $db = mysql_connect(localhost, dbuser, dbpass);
// mysql_select_db(dbname, $db);

$db = mysql_connect("localhost", "root","" );
mysql_select_db("testing", $db);
/* Определяем количество сообщений на странице */
$lim = "6";
@$page = $_GET['page'];
/* Меняем table на название вашей таблицы и не забываем указывать дополнительные параметры выборки (если они у вас есть) */
$res = mysql_query("SELECT COUNT(*) FROM test_folder");
$row = mysql_fetch_array($res);
$posts = $row[0];
$str = ceil($posts/$lim);
if(empty($page) or $page < 0) $page = 1;
if($page > $str) $page = $str;
$start = $page * $lim - $lim;
/* Дальше подставляете свой код вывода данных из базы в цикле, но обязательно укажите LIMIT $start, $lim */
$result = mysql_query("SELECT * FROM test_folder LIMIT $start, $lim");
$myrow = mysql_fetch_array($result);
echo "<div class=\"thumbnails\">"; 
do
{printf ("<ins class=\"thumbnail\"><div class=\"r\"><a href=\"index.php?articles=%s\"><img src=\"images/test_folder.png\" border=\"0\" alt=\"%s\" onfocus=\"this.blur()\" /></a><br /></div></ins>",urlencode($myrow["folder"]),$myrow["name"]);}
while ($myrow = mysql_fetch_array ($result)); 
echo "</div>";
echo $text;
$getpage['id'] = (int)$_GET['articles'];
	//text
	if(!$getpage['id'])
	{
		$sql = mysql_query('SELECT * FROM test_folder WHERE folder = '.$getpage['id'].' ');
		$row = mysql_fetch_array($sql);
		$text = $row['text'];
	}
	else
	{
		$getpage['id'] = ($getpage['id'] == 0)? 1 : $getpage['id'];
		$sql = mysql_query('SELECT * FROM test_folder WHERE folder = '.$getpage['id'].' ');
		$row = mysql_fetch_array($sql);
		$text = $row['text'];
	}
/* Дальше все остается без изменений */
// echo '<a href=?page='. ($page - 1) .'>Назад</a>  ';
$i=1;
while ($i <= $str)
{
if ($i==$page)
{echo '<strong><a href=?page='.$i.'>'.$i.'</a></strong> ';}
else
{echo '<a href=?page='.$i.'>'.$i.'</a> ';}
$i = $i+1;
}
// echo '  <a href=?page='. ($page + 1) .'>Вперед</a>';
?>
</div>

<div id="footerCenter"></div>
</div>
</body>
</html>