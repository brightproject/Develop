<?php header("Content-Type: text/html; charset=utf-8"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel='stylesheet' type='text/css' href='userguide.css'>
<title>Сдвигающееся меню</title>
</head>
<script type="text/javascript" src="nav/prototype.lite.js"></script>
<script type="text/javascript" src="nav/moo.fx.js"></script>
<script type="text/javascript" src="nav/user_guide_menu.js"></script>

</head>

<body>
<div style="overflow: hidden; height: 0px;" id="nav">
	<div id="nav_inner">
		<script type="text/javascript">create_menu('null');</script>
		<table cellspacing="0" style="width: 98%;" border="0" cellpadding="0">
			<tr>
			   <td>
    <center>
    <h4>АВТОРИЗАЦИЯ</h4><br>
    <form action="index.php" method="post">
    <h4>Имя:</h4>
       <input type="text" name="name" value=""><br><br>
    <h4>Password:</h4>
       <input type="password" name="pass"><br><br>
       <input type="submit" name="enter" value="Войти">
    </form>
	</center>
			   </td>
			</tr>
		</table>
	</div>
</div>
<div id="nav2"><a name="top"></a><a href="javascript:void(0);" onclick="myHeight.toggle();"><img src="images/nav_toggle.jpg" width="153" height="44" border="0" title="Форма авторизации" alt="Форма авторизации" /></a></div>

</body>
</html>
