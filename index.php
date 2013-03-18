<?php
		require_once ("safemysql.class.php");
		$db = new SafeMySQL();
		$profile .= "<form action=\"index.php\" method=\"get\">";
		$profile .= "<p><b>Введите имя:</b></p>";
		$profile .= "<p><textarea rows=\"1\" cols=\"45\" name=\"name\"></textarea></p>";
		$profile .= "<p><input type=\"submit\" value=\"Отправить\"></p>";
		$profile .= "</form>";
		$user = isset($_GET['name']) ? $_GET['name'] : '';
		$user = $db->getCol("SELECT * FROM first where name=?s", $_GET['name']);
		$profile .= "<ul>";
				 foreach ($user as $m)
					 {
						$profile .= "<ol>".$m."</ol>";
					 }
		$profile .= "</ul>";
		echo $profile;
?>