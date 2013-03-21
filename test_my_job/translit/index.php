
<?php
$folder_name = $_POST['folder_name'];
function ru2Lat($folder_name)
{
$rus = array('ё','ж','ц','ч','ш','щ','ю','я','Ё','Ж','Ц','Ч','Ш','Щ','Ю','Я',' ');
$lat = array('yo','zh','tc','ch','sh','sh','yu','ya','YO','ZH','TC','CH','SH','SH','YU','YA','_');
$folder_name = str_replace($rus,$lat,$folder_name);
$folder_name = strtr($folder_name,
    "АБВГДЕЗИЙКЛМНОПРСТУФХЪЫЬЭабвгдезийклмнопрстуфхъыьэ",
    "ABVGDEZIJKLMNOPRSTUFH_I_Eabvgdezijklmnoprstufh_i_e");
 
return($folder_name);
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<title>Админка</title>
<style type="text/css">
#main {
margin: 0 auto;
width:400px;
border:1px solid #000000; background-color:#ffffff;
padding:10px;
}
#headerCenter {
	height: 50px;
	background: url(images/header.png) no-repeat;
	background-position: 50% 0;
}
#contentcolumn{
	width: 100%;
	background: white;
	color: green;
	margin-bottom:50px;
	text-align: center;
	padding: 4px 0;
}
</style>
</head>
<body>
<div id="main">
<div id="headerCenter"></div>
<div id="contentcolumn">
<p>Введите любое слово</p>
<p>
<?php
    if (!isset($_POST["create"]))
    {
	?>
	    <form action="index.php" method="post">
       <input type="text" name="folder_name" value="Напишите слово"><br><br>
       <input type="submit" name="create" value="-=Транслит=-">
    </form>
</p>
<?php	
	} else {
	$folder = ru2Lat($folder_name);	 
	 // Создаем папку и делаем добавление в БД		
     echo "<p style=\"color:black; font: bold 16px Comic padding: 0 50px\">{$folder}</p>";
	}
?>

<br />
</div>
</div>
</body>
</html>