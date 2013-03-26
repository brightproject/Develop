<?php
  function my_ip2long($ip)
  {
    // Получаем отдельные элементы IP-адреса
    $arr = explode(".", $ip);
    // Возвращаем целое число
    return 256*256*256*$arr[0] +
           256*256*$arr[1] +
           256*$arr[2] +
           $arr[3];
  }
?>
