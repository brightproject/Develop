<?php
  // ���������� ������
  session_start();
?>
<table>
   <form action=2.php method=post>
   <input type=hidden name=session_id value='<?= session_id(); ?>'>
   <tr>
     <td>���:</td>
     <td><input type=text name=name></td>
   </tr>
   <tr>
     <td>������:</td>
     <td><input type=password name=pass></td>
   </tr>
   <tr>
     <td>&nbsp;</td>
     <td><input type=submit value='�����'></td>
   </tr>
   </form>
</table>
