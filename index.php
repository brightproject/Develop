<?php
		include 'safemysql.class.php';
		$db = new SafeMySQL();
		//$db = new SafeMysql(array('user' => $user, 'pass' => $pass,'db' => $db, 'charset' => 'cp1251'));
		$profile .= "<form action=\"index.php\" method=\"post\">";
		$profile .= "<p><b>Введите имя:</b></p>";
		$profile .= "<p><textarea rows=\"1\" cols=\"45\" name=\"name\"></textarea></p>";
		$profile .= "<p><input type=\"submit\" value=\"Отправить\"></p>";
		$profile .= "</form>";
		$profile .= "Можете написать на почту <a href=\"mailto:obmanka@antispam.com\" onmouseover=\"this.href='mail' + 'to:' + 'sh.magomedow' + '@' + 'yandex' + '.ru'\">e-mail</a>";
		$user = $db->getAll("SELECT * FROM first where name=?s", $_POST['name']);
		$profile .= "<ul>";
				 foreach ($user as $m)
					 {
						$profile .= "<ol>".$m."</ol>";
					 }
		$profile .= "</ul>";
		echo $profile;
		echo $name;
?>