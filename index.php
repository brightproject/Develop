<?php
		require_once ("safemysql.class.php");
		$db = new SafeMySQL();
		$name = "Petr";
		$user = $db->getRow("SELECT * FROM first where name=?s",$_GET['name']);
		echo $user;
?>