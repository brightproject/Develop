<?php
  // ���������� ������
  session_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;
      charset=windows-1251">
<title>������</title>
</head>
<body>
<?php
  if(isset($_POST['code']) && isset($_SESSION['code']))
  {
    if(strtolower($_POST['code']) == $_SESSION['code'])
	  echo '<font color="green">�������� ��� �����!</font>';
	else
	  echo '<font color="red">�������� �������� ���!</font>';
  }
  else
  {
    ?>
      <form method="post">
        <img src="img.php" border="0" alt="������� �������� ���"><br>
        <input type="text" name="code"><br>
        <input type="submit" value="������">
      </form>
    <?php
  }
?>
</body>
</html>
