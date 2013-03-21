<?php
    session_start();
?>
<?php
    if (!isset($_SESSION["autorized"]) or !isset($_SESSION["name"]) or !isset($_SESSION["role"]))
     header ("location: login.php");
     
    // if (!($_SESSION["autorized"] === true and $_SESSION["name"] === "vladex" and $_SESSION["role"] === "admin"))
     // header ("location: login.php");
     
?>
<?php require_once ("connection.php"); ?>
<div class="userbox" >
<p>Пользователь: <?php echo "<span class=\"RedLogin\">{$_SESSION["role"]}</span>"; ?></p><br />
</div>
<?php
	 echo "<script language=javascript>alert('До встречи {$_SESSION["role"]}');</script>";

?>
<?php   if (!isset($_POST["logout"])) {?>
    <form action="index.php" method="post">
       <input type="submit" name="logout" value="Выйти">
    </form>
<?php	} else { ?>
<?php 
	session_destroy();
	}
?>