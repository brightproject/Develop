<?php
  if(isset($_COOKIE['name']))
  {
     if(isset($_COOKIE['admin']))
     {
        echo "������������, ������������� $_COOKIE[name] !<br>";
     }
     if(isset($_COOKIE['editor']))
     {
        echo "������������, �������� $_COOKIE[name] !<br>";
     }
     if(isset($_COOKIE['user']))
     {
        echo "������������, ������������ $_COOKIE[name] !<br>";
     }
  }
?>
