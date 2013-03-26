<?php 
if(!empty($_POST))
{
  // Обработчик HTML-формы
  include "handler.php";
}
?>
<table> 
<form enctype='multipart/form-data' method=post> 
<tr>
  <td width=50%>To:</td>
  <td align=right><input type=text name=mail_to maxlength=32></td>
</tr> 
<tr>
  <td width=50%>Subject:</td>
  <td align=right><input type=text name=mail_subject maxlength=64></td>
</tr> 
<tr>
  <td colspan=2>
    Сообщение:<br><textarea cols=50 rows=8 name=mail_msg></textarea>
  </td>
</tr>
<tr>
  <td width=50%>Photo:</td>
  <td align=right><input type=file name=mail_file maxlength=64></td>
</tr> 
<tr><td colspan=2><input type=submit value='Отправить'></td></tr> 
</form> 
</table>
