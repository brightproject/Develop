<?php require_once ("connection.php"); ?>
<?php require_once ("mysql.class.php"); ?>
<?php

	$db = new db_class;
	$getpage['id'] = (int)$_GET['page'];
	$getpage['sub'] = (int)$_GET['subject'];
	
	// vertical
	$sql = $db->query('SELECT * FROM test_goriz_menu ');
	$gorizont .= "<ul>";				
	while($row = $db->get_row($sql))
	    if($getpage['sub'] == $row['id'])
    {
		$gorizont .= "<a href=\"index.php?subject=".urlencode($row["id"])."\"style=\"color:yellow; font: bold 14px Tahoma padding: 0 50px\">{$row["title"]}</a>&nbsp&nbsp|&nbsp&nbsp";
	$gorizont .= "</ul>";
	}
	else
	{
		$gorizont .= "<a href=\"index.php?subject=".urlencode($row["id"])."\">{$row["title"]}</a>&nbsp&nbsp|&nbsp&nbsp";
	$gorizont .= "</ul>";
	}
	
	
	//horizont
	$getpage['sub'] = ($getpage['sub'] == 0)? 1 : $getpage['sub'];
	$sql = $db->query('SELECT * FROM test_vertik_menu WHERE subj_id = '.$getpage['sub'].' ');
	$vertical .= "<ol>";			
	while($row = $db->get_row($sql))
	    if($getpage['id'] == $row['id'])
    {
		$vertical .= "<li><a href=\"index.php?subject=".$getpage['sub']."&page=".urlencode($row["id"])."\"style=\"color:green; font: bold 14px Tahoma padding: 0 50px\">{$row["title"]}</a></li>&nbsp&nbsp|&nbsp&nbsp";
	$vertical .= "</ol>";
	}
	else
	{
		$vertical .= "<li><a href=\"index.php?subject=".$getpage['sub']."&page=".urlencode($row["id"])."\">{$row["title"]}</a></li>&nbsp&nbsp|&nbsp&nbsp";
	$vertical .= "</ol>";
	}
	//text
	if(!$getpage['id'])
	{
		$sql = $db->query('SELECT * FROM test_goriz_menu WHERE id = '.$getpage['sub'].' ');
		$row = $db->get_row($sql);
		$text = $row['text'];
	}
	else
	{
		$getpage['id'] = ($getpage['id'] == 0)? 1 : $getpage['id'];
		$sql = $db->query('SELECT * FROM test_vertik_menu WHERE id = '.$getpage['id'].' ');
		$row = $db->get_row($sql);
		$text = $row['text'];
	}
	
	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<title>Проверка меню</title>
</head>

<body>
<table width="450" align="center" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <th colspan="2" scope="col">
      <?php echo $gorizont ?>
	</th>
  </tr>
  <tr>
    <th width="61">
	<?php echo $vertical ?>
	</th>
    <th width="383">

	<?php echo $text ?>

	</th>
  </tr>
</table>
</body>
</html>