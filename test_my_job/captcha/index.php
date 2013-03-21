<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<title>Проверка капчи</title>
</head>
<body>
<center>
<table cellpadding=5 cellspacing=0 bgcolor="#E4F8E4">
<tr bgcolor="#AAD6AA">
<td colspan="2"><font color="#FFFFFF" face="Verdana" size="2"><b>Image Verification</b></font></td>
</tr>
<tr>
<td style="padding: 2px;" width="10"><img src="captchac_code.php" id="captcha"></td>
<td valign="top"><font color="#000000">Введите цифры с картинки</font> &nbsp; <br><form action="form.php" method="get"><input type="text" name="Turing" value="" maxlength="100" size="10"><input type="submit" name="Submit" value="Ввод" /></form>
[ <a href="#" onclick=" document.getElementById('captcha').src = document.getElementById('captcha').src + '?' + (new Date()).getMilliseconds()">Обновить картинку</a> ]
</td>
</tr>
</table>
</center>
</body>
</html>