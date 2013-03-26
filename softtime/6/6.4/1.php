<?php
if(!isset($_GET['probe']))
{
  // Устанавливаем cookie с именем "test"
  if(setcookie("test","set"))
  {
    // Посылаем заголовок переадресации на страницу,
    // с которой будет предпринята попытка установить cookie 
    header("Location: $_SERVER[PHP_SELF]?probe=set");
  }
}
else
{
  if(!isset($_COOKIE["test"]))
  {
    echo("Для корректной работы приложения необходимо включить cookie");
  }
  else
  {
    // cookie включены, переходим на нужную страницу,
    // послав заголовок, содержащий адрес нужной страницы 
    header("Location: $_SERVER[PHP_SELF]");
  }
}
?>
