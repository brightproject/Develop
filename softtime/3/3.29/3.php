<?php
  // ���������� �����
  if(!empty($_POST['name']) && !empty($_POST['msg']))
  {
    $_POST['name'] = htmlspecialchars($_POST['name']);
    $_POST['msg'] = htmlspecialchars($_POST['msg']);
    $msg = "<tr><td><b>$_POST[name]</b></td></tr>";
    $msg .= "<tr><td>$_POST[msg]</td></tr>";
    // ��������� ���� � ��������� ����� ������
    $fd = fopen("msg.txt", "a");
    if($fd)
    {
      fwrite($fd,$msg);
      fclose($fd);
    }
  }
  // ������� ���������, ����������� � ��������� ����
  echo "<table>";
  if(file_exists("msg.txt")) include "msg.txt";
  echo "</table>";
?>
<form method=post>
<table align=center>
<tr>
  <td>���</td>
  <td><input type=text name=name></td>
</tr>
<tr>
  <td colspan=2>���������<br>
                <textarea cols=42 rows=5 name=msg></textarea></td>
</tr>   
<tr>
  <td><input type="submit" value="��������"></td>
</tr>           
</table>
