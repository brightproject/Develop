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
	$success='<h1>Спасибо за регистрацию!</h1>';
	
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
    <h1>Форма регистрации</h1>
    <h2>Вы регистрируетесь как фрилансер</h2>
    
    <form id="contact-form" name="contact-form" method="post" action="submit.php">
      <table width="100%" border="0" cellspacing="0" cellpadding="5">
        <tr>
          <td width="15%"><label for="nickname">Nickname</label></td>
          <td width="70%"><input type="text" class="validate[required,custom[onlyLetter]]" name="nickname" id="nickname" value="<?=$_SESSION['post']['nickname']?>" /></td>
          <td width="15%" id="errOffset">&nbsp;</td>
        </tr>
        <tr>
          <td width="15%"><label for="firstname">Имя</label></td>
          <td width="70%"><input type="text" class="validate[required,custom[onlyLetter]]" name="firstname" id="firstname" value="<?=$_SESSION['post']['firstname']?>" /></td>
          <td width="15%" id="errOffset">&nbsp;</td>
        </tr>
        <tr>
          <td width="15%"><label for="password1">Введите пароль</label></td>
          <td width="70%"><input type="password" class="validate[password,noSpecialCaracters]" name="password1" id="password1" value="<?=$_SESSION['post']['password1']?>" /></td>
          <td width="15%" id="errOffset">&nbsp;</td>
        </tr>
        <tr>
          <td width="15%"><label for="password2">Повторите пароль</label></td>
          <td width="70%"><input type="password" class="validate[password]" name="password2" id="password2" value="<?=$_SESSION['post']['password2']?>" /></td>
          <td width="15%" id="errOffset">&nbsp;</td>
        </tr>		
        <tr>
          <td><label for="email">Email</label></td>
          <td><input type="text" class="validate[required,custom[email]]" name="email" id="email" value="<?=$_SESSION['post']['email']?>" /></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><label for="country">Страна</label></td>
          <td><select name="country" id="country">
            <option value="" selected="selected"> - Выберите -</option>
            <option value="Россия">Россия</option>
            <option value="США">США</option>
            <option value="Польша">Польша</option>
            <option value="Япония">Япония</option>
            <option value="Турция">Турция</option>
            <option value="Украина">Украина</option>
            <option value="Австралия">Австралия</option>
            <option value="Казахстан">Казахстан</option>
            <option value="Китай">Китай</option>
            <option value="Италия">Италия</option>
            <option value="Аргентина">Аргентина</option>
            <option value="Индия">Индия</option>
          </select>          </td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td width="15%"><label for="city">Город</label></td>
          <td width="70%"><input type="text" class="validate[required,custom[onlyLetter]]" name="city" id="city" value="<?=$_SESSION['post']['city']?>" /></td>
          <td width="15%" id="errOffset">&nbsp;</td>
        </tr>
        <tr>
          <td width="15%"><label for="phone">Телефон</label></td>
          <td width="70%"><input type="text" class="validate[norequired]" name="phone" id="phone" value="<?=$_SESSION['post']['phone']?>" /></td>
          <td width="15%" id="errOffset">&nbsp;</td>
        </tr>
        <tr>
          <td width="15%"><label for="website">Web-сайт</label></td>
          <td width="70%"><input type="text" class="validate[norequired]" name="website" id="website" value="<?=$_SESSION['post']['website']?>" /></td>
          <td width="15%" id="errOffset">&nbsp;</td>
        </tr>
        <tr>
          <td><label for="group_type">Специализация</label></td>
          <td><select name="group_type" id="group_type">
            <option value="" selected="selected"> - Выберите -</option>
			<option value="b">Дизайнер</option>
			<option value="c">Программист</option>
			<option value="d">Флешер</option>
			<option value="e">Верстальщик</option>
			<option value="f">Java-программист</option>
          </select>          </td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td valign="top"><label for="info">Информация о себе</label></td>
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
