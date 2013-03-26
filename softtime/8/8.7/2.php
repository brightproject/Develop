<?php 
  // ≈сли посетитель "вошел" - приветствуем его 
  if(isset($_COOKIE['user']))
  {
    echo "ƒоступ к вашим секретным данным";
  }
  else
  {
    // ќсуществл€ем автоматическую переадресацию на страницу
    // авторизации
      echo "<HTML><HEAD>
         <META HTTP-EQUIV='Refresh' CONTENT='0; URL=1.php'>
            </HEAD></HTML>";
  }
?>
