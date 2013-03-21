<?php require_once ("includes/connection.php"); ?>
<?php require_once ("includes/mysql.class.php"); ?>

<?php
	$db = new db_class;
	$sql = $db->query('SELECT * FROM test_main ');			
	while($row = $db->get_row($sql)) {
	$class = (($i%2)==0 ? ('col_2') : ('col_1'));     
	$i++;
	$table_zebra .= "<tr class=\"{$class}\" ONMOUSEOVER=\"this.className='col_selected';\" ONMOUSEOUT=\"this.className='{$class}'\">
<td>".urlencode($row["id"])."</td><td><b>{$row["name"]}</b>
	<td><a href=\"javascript:window.open('{$row["path"]}','example','scrollbars,resizable=no,left=300,top=200,width=750,height=400');void(0);\">Тзынь</a></td>
</tr>";	
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<link rel='stylesheet' type='text/css' href='css/style.css'>
<title>Исходники проектов</title>
</head>

<body>
<h2 align=center>Список проектов<h2/>
<div id="main">
  <table cellspacing=0 cellpadding=0 width=400px>
	 <tr>
<td id=head_t>№</td><td id=head_t>Название кода(проекта)</td><td id=head_t>Ссылка</td>
	 </tr>

<?php echo $table_zebra ?>

	</table>
</div>
<h2 align=center>Добавить проект<h2/>
<div id="new">
<form name="form1" method="post" action="new_project.php">
        <p align="center">
          <label>Название проекта(работы)<br /><br />
            <input value="" type="text" name="title" id="title">
            </label>
          </p>
        <p align="center">
          <label>Ссылка<br /><br />
          <input value="" type="text" name="m_desc" id="m_desc">
          </label>
        </p>
        <p align="center">
          <label>
          <input type="submit" name="submit" id="submit" value="Сохранить изменения">
          </label>
        </p>
      </form>  

</div>
</body>
</html>