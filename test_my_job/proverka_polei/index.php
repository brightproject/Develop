<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>	
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>�������� ����� �����</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<script type="text/javascript" src="proverka.js"></script>		
<!-- ������ -->
<script type="text/javascript">
var testObj;

function hideForm() {
	
	var Form = document.getElementById('forma_zakaza');
	Form.style.display = 'none';
	
}

function ShowForm() {

	var Form = document.getElementById('forma_zakaza');
	Form.style.display = 'block'

}

</script>
<!-- ������ -->
</head>
<body>			
			<div id="onlainZayavka">
            	<a href="javascript: void(0);" title="����� �� ������" onclick="ShowForm();" class="img"><img src="images/zayavkaImg.jpg" width="34" height="41" border="0" alt="������-������" align="middle" /></a><a href="javascript: void(0);" title="����� �� ������" onclick="ShowForm();">����� �� ������</a>

<div id="forma_zakaza">
  <div id="fzk">
    <div id="close" onclick="hideForm();"></div>

    <div id="fuckyou">� ��� ���������� �������� � ����</div>
    
    
    <div id="informload">
<form action="index.php" method="GET" ax:wrap="0">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>

      <td align="right" valign="top" class="pdr"><span class="brightRed"> *</span>���������� ����:</td>
      <td align="left" valign="top" class="yell"><input type="text" name="fio" onKeyUp="checkForm()" id="fio" class="finp" value="" /></td>
    </tr>
    <tr>
      <td align="right" valign="top" class="pdr"><span class="brightRed"> *</span>E-mail:</td>
      <td align="left" valign="top" class="yell"><input type="text" name="email" onKeyUp="checkForm()" id="email" class="finp" value="" /></td>
    </tr>
    <tr>
      <td align="right" valign="top" class="pdr"><span class="brightRed"> *</span>��������, ������� ���������� ������:</td>
      <td align="left" valign="top" class="yell"><textarea name="comment" cols="20" rows="5" id="textareaform" onKeyUp="checkForm()" class="finp"></textarea></td>
    </tr>


  </table>  
<div class="bf">
  <input name="submit" id="submitzay" type="submit" value="��������� ������" disabled="disabled" />
</div>
</form>

</div>    
    
  </div>
</div>
				
            </div>
</body>
</html>