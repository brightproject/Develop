<?php
	session_start();
?>

 <?php
     
    // Проверка нажатия клавиши "Войти"
    if (!isset($_POST["enter"]))
    {
    // Если не нажата
    ?>

		<table cellspacing="0" style="width: 98%;" border="0" cellpadding="0">
			<tr>
			   <td>
    <center>
    <h4>АВТОРИЗАЦИЯ</h4><br>
    <form action="login.php" method="post">
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

    <?php
    }
    else
    {
     // Если кнопка нажата и если поля логина и пароля не пустые
     if ($_POST["name"] != "" and $_POST["pass"] != "")
     {
     $safe_name=mysql_escape_string($_POST['name']);
     $safe_pass=mysql_escape_string($_POST['pass']);
     
     // берем только первые 20 символов
     $safe_name = substr($safe_name, 0, 20);
     $safe_pass = substr($safe_pass, 0, 20);
     
     // преобразуем пароль в MD5-хеш
     $safe_pass=md5($safe_pass);
     
     // формируем SQL-запрос
     $sql = "SELECT name,pass,role FROM test_userlist WHERE name='" . $safe_name . "' AND pass='" . $safe_pass . "'";
     // подключаемся к базе данных
		require_once ("connection.php");
     
     // делаем запрос
     $result = mysql_query($sql);
     
     // проверка существования записи
     if(!mysql_num_rows($result))
            echo "<center><h4>Неверный логин или пароль</h4><br><a href=\"login.php\">Назад</a></center>";
     else
     {
     // записываем переменные в сессию
     $line = mysql_fetch_row($result);
     $_SESSION["autorized"]=true;
     $_SESSION["name"]=$safe_name;
     $_SESSION["role"]=$line[2];
     
     // выводим ссылку для входа в админку (можно сделать перенаправление)
    echo "<HTML><HEAD>
<META HTTP-EQUIV='Refresh' CONTENT='0; URL=index.php'>
</HEAD>";
     }
       }
       else
       {
     echo "<center><h4>Не введены данные</h4><br><a href=\"login.php\">Назад</a></center>";
       }
    }
     
    ?>
