<form method="post"><table>
<tr><td>IP-�����</td><td><input type="text" name="ipaddress" 
                    value=<?php echo $_POST['ipaddress']; ?>></td></tr>
<tr><td>�����</td><td><input type="text" name="count" 
                    value=<?php echo $_POST['count']; ?>></td></tr>
<tr><td></td><td><input type="submit" value="���������"></td></tr>
</table></form>
<?php
  if(!empty($_POST))
  {
    // ��������� ������������ IP-������
    $pattern = "|^[\d]{1,3}\.[\d]{1,3}\.[\d]{1,3}\.[\d]{1,3}$|i";
    if(!preg_match($pattern, $_POST['ipaddress']))
    {
      exit("������������ ������ IP-������");
    }
    $pattern = "|^[\d]+$|i";
    if(!preg_match($pattern, $_POST['count']))
    {
      exit("������������ ������ ���������� ��������");
    }
    echo "<pre>";
    system("ping $_POST[ipaddress] -c $_POST[count]");
    echo "</pre>";
  }
?>
