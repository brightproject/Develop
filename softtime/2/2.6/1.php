<form method=post>
  <input size=60 type=text name=name value=<?= $_POST['name']; ?>>
  <input type=submit value='���������'>
</form><br>
<?php
// ���������� HTML-�����
if(isset($_POST['name']))
{
  if(preg_match("|^[-0-9a-z_]+@[-0-9a-z^\.]+\.[a-z]{2,6}$|i",
                $_POST['name']))
  {
    echo "e-mail �����";
  }
  else
  {
    echo "e-mail �������";
  }
}
?>
