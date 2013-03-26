<?php
  // Инициируем сессию
  session_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;
      charset=windows-1251">
<title>Пример</title>
</head>
<body>
<?php
  if(isset($_POST['code']) && isset($_SESSION['code']))
  {
    if(strtolower($_POST['code']) == $_SESSION['code'])
	  echo '<font color="green">Защитный код верен!</font>';
	else
	  echo '<font color="red">Неверный защитный код!</font>';
  }
  else
  {
    ?>
      <form method="post">
        <img src="img.php" border="0" alt="Введите защитный код"><br>
        <input type="text" name="code"><br>
        <input type="submit" value="Ввести">
      </form>
    <?php
  }
?>
</body>
</html>
