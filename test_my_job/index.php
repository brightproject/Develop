<?php
	header("Content-Type: text/html; charset=cp1251"); 
/* Определяем количество сообщений на странице */
	$db = mysql_connect("localhost", "root","" );
	mysql_select_db("testing", $db);
	$lim = "6";
	@$page = $_GET['page'];
	$res = mysql_query("SELECT COUNT(*) FROM test_main ORDER BY id");
	$row = mysql_fetch_array($res);
	$posts = $row[0];
	$str = ceil($posts/$lim);
	if(empty($page) or $page < 0) $page = 1;
	if($page > $str) $page = $str;
	$start = $page * $lim - $lim;
	$result = mysql_query("SELECT * FROM test_main LIMIT $start, $lim");
	while($myrow = mysql_fetch_array($result)) {
	$class = (($i%2)==0 ? ('col_2') : ('col_1'));     
	$i++;
	$table_zebra .= "<tr id=\"{$myrow["tooltipid"]}\" title=\"{$myrow["title"]}\" class=\"{$class}\" ONMOUSEOVER=\"this.className='col_selected';\" ONMOUSEOUT=\"this.className='{$class}'\">
<td>".urlencode($myrow["id"])."</td><td><b>{$myrow["name"]}</b>
	<td>	
	<a class=\"modal\" href=\"{$myrow["path"]}\" rel=\"{handler: 'iframe', size: {x: 640, y: 480}}\">
<span  style=\"color: #fc0202;\" title=\"Просмотр\"></span>Просмотр</a></td>
</tr>";	
}

$i=1;
while ($i <= $str)
{
if ($i==$page)
{$exit .= '<code><a href=?page='.$i.' style="color:magenta; font: bold 16px Tahoma padding: 0 50px">'.$i.'</a></code> ';}
else
{$exit .= '<code><a style="color:black; font: bold 16px Tahoma padding: 0 50px" href=?page='.$i.'>'.$i.'</a></code> ';}
$i = $i+1;
}
$result = mysql_query("SELECT * FROM test_main LIMIT $start, $lim");
	while($tooltip_row = mysql_fetch_array($result)) {
	$tooltip_out .= "#{$tooltip_row["tooltipid"]},";
	}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel='stylesheet' type='text/css' href='css/style.css'>

<script src="jquery_ajax/jquery_tooltip/lib/jquery.js" type="text/javascript"></script>
<script src="jquery_ajax/jquery_tooltip/lib/jquery.bgiframe.js" type="text/javascript"></script>
<script src="jquery_ajax/jquery_tooltip/lib/jquery.dimensions.js" type="text/javascript"></script>
<script src="jquery_ajax/jquery_tooltip/jquery.tooltip.js" type="text/javascript"></script>
	<!--модальные окна-->
	  <link rel="stylesheet" href="css/modal.css" type="text/css" />
	  <script type="text/javascript" src="js/mootools.js"></script>
	  <script type="text/javascript" src="js/modal.js"></script>

	  <script type="text/javascript">

			window.addEvent('domready', function() {

				SqueezeBox.initialize({});

				$$('a.modal').each(function(el) {
					el.addEvent('click', function(e) {
						new Event(e).stop();
						SqueezeBox.fromElement(el);
					});
				});
			});
	  </script>
	<!--модальные окна-->
<script type="text/javascript">
jQuery(document).ready(function() {
jQuery("<?php echo $tooltip_out ?>").tooltip({
	track: true,
	delay: 0,
	showURL: false,
	fixPNG: true,
	showBody: " - ",
	extraClass: "pretty fancy",
	top: -10,
	left: 5
});

});
</script>

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
	<?php 
	echo "<center>{$exit}<center>" 
	?>
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