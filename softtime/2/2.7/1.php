<form method=post>
  <input size=60 type=text name=name value=<?= $_POST['name']; ?>>
  <input type=submit value='Проверить'>
</form><br>
<?php
// Обработчик HTML-формы
if(isset($_POST['name']))
{
  $pattern = "#^(http://)?[-a-z0-9\.]+([-a-z0-9]+\.(html|php|pl|cgi))?".
             "([-a-z0-9_:@&\?=+\.!/~*'%$]+)?$#i";
  if(preg_match($pattern, $_POST['name']))
  {
    echo "URL верен";
  }
  else
  {
    echo "URL неверен";
  }
}
?>
