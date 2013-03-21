<form name="form1" method="post" action="md.php">
        <p align="center">
          <label>Введите пароль для кодировки<br /><br />
          <input value="" type="text" name="pass" id="pass">
          </label>
        </p>
        <p align="center">
          <label>
          <input type="submit" name="submit" id="submit" value="Кодировать">
          </label>
        </p>
      </form> 
<?php
     $pass = $_POST['pass'];
     $safe_pass=md5($pass);
	 echo "<center><h2>Тут отображается код</h2></center>";
	 echo "<center><p style=\"color:green; font: bold 14px Comic padding: 0 50px\">".$safe_pass."</p></center>";
?>