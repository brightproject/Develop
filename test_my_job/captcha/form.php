<?php
	include('captchac_lib.php');   
	$Turing_code = $_REQUEST["Turing"]; 
	if ( CheckCaptcha($Turing_code) !=1 )
    {
        print '<center>��������, �� ����� �� ������ ���. <a href="index.php">������</a></center>';
	return 1;
    }
    print '<center>�����������!!! <a href="index.php">����������� �����</a></center>';
?>