<form method=post>
  ����� <input size=60 type=text name=number
               value=<?= $_POST['number']; ?>><br>
  ���� <input size=60 type=text name=price 
              value=<?= $_POST['price']; ?>><br>
  <input type=submit value='���������'>
</form><br>
<?php
  // ���������� HTML-�����
  if(isset($_POST['number']) && isset($_POST['price']))
  {
    if(!preg_match("|^[\d]*$|", $_POST['number']))
    {
      exit("������� ������ ����� �������� �������");
    }
    if(!preg_match("|^[\d]*[\.,]?[\d]*$|", $_POST['price']))
    {
      exit("������� ������ ����");
    }
    echo number_format($_POST['number']*$_POST['price'], 2, '.', ' ');
  }
?>
