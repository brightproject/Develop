<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<title>�������</title>
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
/* ������������ ������� ����� float-�������, ����� ��� �������� ��� ��������� ������������ */
margin: -3em 0 0 -2em;

/* ������������ �� ������ */
text-align: center;
}

.thumbnail
{
/* ������� ������������� � �������� ins,
������� ��� ����������� ��� ������������� �� ������� �������� Internet Explorer */
text-decoration: none;

/* ��������� ������� ��� Firefox 2 */
display: -moz-inline-box;

/* � ��� ��� ��������� */
display: inline-block;

vertical-align: top;

/* ������� ����� ������� */
margin: 2em 2em 0 3em;
}

.thumbnail .r
{
/* ���� ���� �������������, �� �������� padding, border, background � position �� ��������� relative
����� �������� � ����� �������� -- ��� ��������� �������� ���������� �������������� ������ ��������� */

/* ������ ����������� ������ �� ������ */
width: 14em;

/* ����������� ������ � �������� ����� ������������� �������������� �� ������ �������� */
float: left;
}
</style>
</head>
<body>
<div id="main">
<div id="headerCenter"></div>
<div id="contentcolumn">
<?php 


/* ����������� � �����. �����������, ������ ������������ ���� */
// $db = mysql_connect(localhost, dbuser, dbpass);
// mysql_select_db(dbname, $db);

$db = mysql_connect("localhost", "root","" );
mysql_select_db("testing", $db);
/* ���������� ���������� ��������� �� �������� */
$lim = "6";
@$page = $_GET['page'];
/* ������ table �� �������� ����� ������� � �� �������� ��������� �������������� ��������� ������� (���� ��� � ��� ����) */
$res = mysql_query("SELECT COUNT(*) FROM test_folder");
$row = mysql_fetch_array($res);
$posts = $row[0];
$str = ceil($posts/$lim);
if(empty($page) or $page < 0) $page = 1;
if($page > $str) $page = $str;
$start = $page * $lim - $lim;
/* ������ ������������ ���� ��� ������ ������ �� ���� � �����, �� ����������� ������� LIMIT $start, $lim */
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
/* ������ ��� �������� ��� ��������� */
// echo '<a href=?page='. ($page - 1) .'>�����</a>��';
$i=1;
while ($i <= $str)
{
if ($i==$page)
{echo '<strong><a href=?page='.$i.'>'.$i.'</a></strong>�';}
else
{echo '<a href=?page='.$i.'>'.$i.'</a>�';}
$i = $i+1;
}
// echo '��<a href=?page='. ($page + 1) .'>������</a>';
?>
</div>

<div id="footerCenter"></div>
</div>
</body>
</html>