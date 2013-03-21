<?php

session_name("fancyform");
session_start();


$_SESSION['n1'] = rand(1,20);
$_SESSION['n2'] = rand(1,20);
$_SESSION['expect'] = $_SESSION['n1']+$_SESSION['n2'];


$str='';
if($_SESSION['errStr'])
{
	$str='<div class="error">'.$_SESSION['errStr'].'</div>';
	unset($_SESSION['errStr']);
}

$success='';
if($_SESSION['sent'])
{
	$success='<h1>������� �� �����������!</h1>';
	
	$css='<style type="text/css">#contact-form{display:none;}</style>';
	
	unset($_SESSION['sent']);
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Fancy Contact Form | Tutorialzine demo</title>

<link rel="stylesheet" type="text/css" href="jqtransformplugin/jqtransform.css" />
<link rel="stylesheet" type="text/css" href="formValidator/validationEngine.jquery.css" />
<link rel="stylesheet" type="text/css" href="demo.css" />

<?=$css?>

<script type="text/javascript" src="jquery/jquery.min.js"></script>
<script type="text/javascript" src="jqtransformplugin/jquery.jqtransform.js"></script>
<script type="text/javascript" src="formValidator/jquery.validationEngine.js"></script>

<script type="text/javascript" src="script.js"></script>

</head>

<body>

<div id="main-container">

	<div id="form-container">
    <h1>����� �����������</h1>
    <h2>�� ��������������� ��� ���������</h2>
    
    <form id="contact-form" name="contact-form" method="post" action="submit.php">
      <table width="100%" border="0" cellspacing="0" cellpadding="5">
        <tr>
          <td width="15%"><label for="nickname">Nickname</label></td>
          <td width="70%"><input type="text" class="validate[required,custom[onlyLetter]]" name="nickname" id="nickname" value="<?=$_SESSION['post']['nickname']?>" /></td>
          <td width="15%" id="errOffset">&nbsp;</td>
        </tr>
        <tr>
          <td width="15%"><label for="firstname">���</label></td>
          <td width="70%"><input type="text" class="validate[required,custom[onlyLetter]]" name="firstname" id="firstname" value="<?=$_SESSION['post']['firstname']?>" /></td>
          <td width="15%" id="errOffset">&nbsp;</td>
        </tr>
        <tr>
          <td width="15%"><label for="password1">������� ������</label></td>
          <td width="70%"><input type="password" class="validate[password,noSpecialCaracters]" name="password1" id="password1" value="<?=$_SESSION['post']['password1']?>" /></td>
          <td width="15%" id="errOffset">&nbsp;</td>
        </tr>
        <tr>
          <td width="15%"><label for="password2">��������� ������</label></td>
          <td width="70%"><input type="password" class="validate[password]" name="password2" id="password2" value="<?=$_SESSION['post']['password2']?>" /></td>
          <td width="15%" id="errOffset">&nbsp;</td>
        </tr>		
        <tr>
          <td><label for="email">Email</label></td>
          <td><input type="text" class="validate[required,custom[email]]" name="email" id="email" value="<?=$_SESSION['post']['email']?>" /></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><label for="country">������</label></td>
          <td><select name="country" id="country">
            <option value="" selected="selected"> - �������� -</option>
            <option value="������">������</option>
            <option value="���">���</option>
            <option value="������">������</option>
            <option value="������">������</option>
            <option value="������">������</option>
            <option value="�������">�������</option>
            <option value="���������">���������</option>
            <option value="���������">���������</option>
            <option value="�����">�����</option>
            <option value="������">������</option>
            <option value="���������">���������</option>
            <option value="�����">�����</option>
          </select>          </td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td width="15%"><label for="city">�����</label></td>
          <td width="70%"><input type="text" class="validate[required,custom[onlyLetter]]" name="city" id="city" value="<?=$_SESSION['post']['city']?>" /></td>
          <td width="15%" id="errOffset">&nbsp;</td>
        </tr>
        <tr>
          <td width="15%"><label for="phone">�������</label></td>
          <td width="70%"><input type="text" class="validate[norequired]" name="phone" id="phone" value="<?=$_SESSION['post']['phone']?>" /></td>
          <td width="15%" id="errOffset">&nbsp;</td>
        </tr>
        <tr>
          <td width="15%"><label for="website">Web-����</label></td>
          <td width="70%"><input type="text" class="validate[norequired]" name="website" id="website" value="<?=$_SESSION['post']['website']?>" /></td>
          <td width="15%" id="errOffset">&nbsp;</td>
        </tr>
        <tr>
          <td><label for="group_type">�������������</label></td>
          <td><select name="group_type" id="group_type">
            <option value="" selected="selected"> - �������� -</option>
			<option value="b">��������</option>
			<option value="c">�����������</option>
			<option value="d">������</option>
			<option value="e">�����������</option>
			<option value="f">Java-�����������</option>
          </select>          </td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td valign="top"><label for="info">���������� � ����</label></td>
          <td><textarea name="info" id="info" class="validate[norequired]" cols="35" rows="2"><?=$_SESSION['post']['info']?></textarea></td>
          <td valign="top">&nbsp;</td>
        </tr>
        <tr>
          <td><label for="captcha"><?=$_SESSION['n1']?> + <?=$_SESSION['n2']?> =</label></td>
          <td><input type="text" class="validate[required,custom[onlyNumber]]" name="captcha" id="captcha" /></td>
          <td valign="top">&nbsp;</td>
        </tr>
        <tr>
          <td valign="top">&nbsp;</td>
          <td colspan="2"><input type="submit" name="button" id="button" value="Submit" />
          <input type="reset" name="button2" id="button2" value="Reset" />
          
          <?=$str?>          <img id="loading" src="img/ajax-load.gif" width="16" height="16" alt="loading" /></td>
        </tr>
      </table>
      </form>
      <?=$success?>
    </div>

</div>

</body>
</html>
