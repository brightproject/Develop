<?php
  // ��� ����� ������
  $filename = "text.txt"; 
  // ���������� ��������� FIRST ���
  // ����, ����� ����� ����������, 
  // ��� �� �������� ���� 1.php
  define("FIRST",1);
  // ���������, �� ����� �� ����������
  // ������� $_POST - ���� ��� ���, 
  // ������� ����� ��� �����������
  if(empty($_POST))
  {
    ?>
    <table>
      <form method=post>
      <tr>
        <td>���:</td>
        <td><input type=text name=name></td>
      </tr>
      <tr>
        <td>������:</td>
        <td><input type=password name=pass></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input type=submit value='�����'></td>
      </tr>
      </form>
   </table>
   <?php
  }
  // � ��������� ������, ���� POST-������
  // �������� - ������������ ��
  else
  {
    // ��������� ������������ ���������� �����
    // � ������
    $arr = file($filename);
    $i = 0;
    $temp = array();
    foreach($arr as $line)
    {
      // ��������� ������ �� ����������� ::
      $data = explode("::",$line);
      // � ������ $temp �������� ����� � ������
      // ������������������ �����������
      $temp['name'][$i]     = $data[0];
      $temp['password'][$i] = $data[1];
      $temp['email'][$i]    = $data[2];
      $temp['url'][$i]      = trim($data[3]);
      // ����������� �������
      $i++;
    }
    // ���� � ������� $temp['name'] ��� ����������
    // ������ - ������������� ������ �������
    if(!in_array($_POST['name'],$temp['name']))
    {
      exit("������������ � ����� ������ �� ���������������");
    }
    // ���� ������������ � ������ $_POST['name'] ���������,
    // ��������� ������������ ���������� ������
    $index = array_search($_POST['name'],$temp['name']);
    if($_POST['pass'] != $temp['password'][$index])
    {
      exit("������ �� ������������� ������");
    }
    // ���� ���������� ������ ������������� ������ ��
    // ����� text.txt, ������� ����� ��� ��������������
    // ������
    include "2.php"; // ���������� ������ HTML-�����
    ?>
    <table>
      <form method=post>
        <input type=hidden name=name
         value='<?= htmlspecialchars($temp['name'][$index]); ?>'>
        <input type=hidden name=pass
         value='<?= htmlspecialchars($temp['password'][$index]); ?>'>
        <input type=hidden name=edit value=edit>
      <tr>
        <td>������:</td>
        <td><input type=password name=passw
         value='<?= htmlspecialchars($temp['password'][$index]); ?>'>
        </td>
      </tr>
      <tr>
        <td>������:</td>
        <td><input type=password name=pass_again
         value='<?= htmlspecialchars($temp['password'][$index]); ?>'>
        </td>
      </tr>
      <tr>
        <td>E-mail:</td>
        <td><input type=text name=email
             value=<?= htmlspecialchars($temp['email'][$index]); ?>></td>
      </tr>
      <tr>
        <td>URL:</td>
        <td><input type=text name=url
             value=<?= htmlspecialchars($temp['url'][$index]); ?>></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input type=submit value='�������������'></td>
      </tr>
      </form>
    </table>
<?php
  }
?>
