<?php
		require_once ("safemysql.class.php");
		$db = new SafeMySQL();
		$profile .= "<form action=\"index.php\" method=\"post\">";
		$profile .= "<p><b>������� ���:</b></p>";
		$profile .= "<p><textarea rows=\"1\" cols=\"45\" name=\"name\"></textarea></p>";
		$profile .= "<p><input type=\"submit\" value=\"���������\"></p>";
		$profile .= "</form>";
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