<form enctype='multipart/form-data' method=post>
  <input type="file" size="32" name="filename"><br> 
  <input class=button type=submit value='���������'> 
</form>
<?php
  // ���������� �����
  if(!empty($_FILES['filename']['tmp_name']))
  {
     // ��������� ���� � ������� ��������
     if(copy($_FILES['filename']['tmp_name'],
             $_FILES['filename']['name']))
     {
       echo "���� ������� �������� - <a href=" . 
             $_FILES['filename']['name'] . ">" . 
             $_FILES['filename']['name']."</a>";  
     }
  }
?>
