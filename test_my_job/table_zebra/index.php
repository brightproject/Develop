<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<link rel='stylesheet' type='text/css' href='style.css'>
<center>
  <table cellspacing=0 cellpadding=0 width=400px>
	 <tr>
<td id=head_t>№</td><td id=head_t>Название кода(проекта)</td>
	 </tr>
<?php
$db = mysql_connect("localhost", "root","" );
mysql_select_db("testing", $db);
$result = mysql_query("SELECT * FROM test_folder");
while ($myrow = mysql_fetch_array ($result)) {
$class = (($i%2)==0 ? ('col_2') : ('col_1'));     
$i++;
printf ("<tr class=\"{$class}\" ONMOUSEOVER=\"this.className='col_selected';\" ONMOUSEOUT=\"this.className='{$class}'\">
<td>%s</td><td><b>%s</b>
</tr>",$myrow["id"],$myrow["name"]);}
?>

	</table>
</center>
</body>
</html>