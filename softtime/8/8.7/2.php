<?php 
  // ���� ���������� "�����" - ������������ ��� 
  if(isset($_COOKIE['user']))
  {
    echo "������ � ����� ��������� ������";
  }
  else
  {
    // ������������ �������������� ������������� �� ��������
    // �����������
      echo "<HTML><HEAD>
         <META HTTP-EQUIV='Refresh' CONTENT='0; URL=1.php'>
            </HEAD></HTML>";
  }
?>
