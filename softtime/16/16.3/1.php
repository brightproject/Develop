<form method="post"><table>
<tr><td>IP-адрес</td><td><input type="text" name="ipaddress" 
                    value=<?php echo $_POST['ipaddress']; ?>></td></tr>
<tr><td>Число</td><td><input type="text" name="count" 
                    value=<?php echo $_POST['count']; ?>></td></tr>
<tr><td></td><td><input type="submit" value="Проверить"></td></tr>
</table></form>
<?php
  if(!empty($_POST))
  {
    // Проверяем корректность IP-адреса
    $pattern = "|^[\d]{1,3}\.[\d]{1,3}\.[\d]{1,3}\.[\d]{1,3}$|i";
    if(!preg_match($pattern, $_POST['ipaddress']))
    {
      exit("Недопустимый формат IP-адреса");
    }
    $pattern = "|^[\d]+$|i";
    if(!preg_match($pattern, $_POST['count']))
    {
      exit("Недопустимый формат количества проходов");
    }
    echo "<pre>";
    system("ping $_POST[ipaddress] -c $_POST[count]");
    echo "</pre>";
  }
?>
