<form method=post>
<table>
<tr><td>��������</td><td><input type=text name=name></td></tr>
<tr>
  <td>����� �������:</td>
  <td>
    <input type=checkbox title='������ ����� ��� ������������' name=ur>
    <input type=checkbox title='������ ����� ��� ������������' name=uw>
    <input type=checkbox title='���������� ����� ��� ������������'
     name=ux>
    &nbsp;&nbsp;
    <input type=checkbox title='������ ����� ��� ������' name=gr>
    <input type=checkbox title='������ ����� ��� ������' name=gw>
    <input type=checkbox title='���������� ����� ��� ������' name=gx>
    &nbsp;&nbsp;
    <input type=checkbox title='������ ����� ��� �������������, 
                                �� �������� � ������' name=or>
    <input type=checkbox title='������ ����� ��� �������������, 
                                �� �������� � ������' name=ow>
    <input type=checkbox title='���������� ����� ��� �������������, 
                                �� �������� � ������' name=ox>
  </td>
</tr>
<tr><td>&nbsp;</td><td><input type=submit value='����������'></td></tr>
</table>
</form>
<?php
  if(!empty($_POST))
  {
    // ����������� ����� ������� ������������
    // � �������� �����
    $user = 0;
    if($_POST['ur'] == 'on') $user += 4;
    if($_POST['uw'] == 'on') $user += 2;
    if($_POST['ux'] == 'on') $user += 1;
    // ����������� ����� ������� ��� ������
    // � �������� �����
    $group = 0;
    if($_POST['gr'] == 'on') $group += 4;
    if($_POST['gw'] == 'on') $group += 2;
    if($_POST['gx'] == 'on') $group += 1;
    // ����� ������� �� ��������� ���
    // ��������� ������������� (�� �������� � ������)
    $other = 0;
    if($_POST['or'] == 'on') $other += 4;
    if($_POST['ow'] == 'on') $other += 2;
    if($_POST['ox'] == 'on') $other += 1;

    // ������������ ����� ������� � �����

    // ������� ������������ ���������� $mode
    // � ������� ������� � ��������
    eval("\$mode=$user$group$other;");    
    // �������� ����� ������� � ������ ���
    // ���������� ��������
    exec("chmod $mode $_POST[name]");
  }
?>
