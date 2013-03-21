<?php
	include('captchac_lib.php');   
	$Turing_code = $_REQUEST["Turing"]; 
	if ( CheckCaptcha($Turing_code) !=1 )
    {
        print '<center>Извините, Вы ввели не верный код. <a href="index.php">Заново</a></center>';
	return 1;
    }
    print '<center>Поздравляем!!! <a href="index.php">Попробовать снова</a></center>';
?>