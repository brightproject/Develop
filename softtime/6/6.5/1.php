<?php
  if(isset($_COOKIE['name']))
  {
     if(isset($_COOKIE['admin']))
     {
        echo "Здравствуйте, администратор $_COOKIE[name] !<br>";
     }
     if(isset($_COOKIE['editor']))
     {
        echo "Здравствуйте, редактор $_COOKIE[name] !<br>";
     }
     if(isset($_COOKIE['user']))
     {
        echo "Здравствуйте, пользователь $_COOKIE[name] !<br>";
     }
  }
?>
