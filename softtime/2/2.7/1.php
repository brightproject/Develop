<form method=post>
  <input size=60 type=text name=name value=<?= $_POST['name']; ?>>
  <input type=submit value='���������'>
</form><br>
<?php
// ���������� HTML-�����
if(isset($_POST['name']))
{
  $pattern = "#^(http://)?[-a-z0-9\.]+([-a-z0-9]+\.(html|php|pl|cgi))?".
             "([-a-z0-9_:@&\?=+\.!/~*'%$]+)?$#i";
  if(preg_match($pattern, $_POST['name']))
  {
    echo "URL �����";
  }
  else
  {
    echo "URL �������";
  }
}
?>
