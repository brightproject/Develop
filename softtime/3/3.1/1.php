<form enctype='multipart/form-data' method=post>
<table>
  <tr>
    <td><input type="file" size="50" name="att[]" class=input></td>
    <td><input type="button" name="drop" 
         value=" &minus; " onclick="dropFile(this);">
        <input type="button" value=" + " onclick="addFile(this);"></td>
  </tr>
</table>
<input class=button type=submit value='Загрузить'>
</form>
<script language='JavaScript1.1' type='text/javascript'>
<!--
function dropFile(btn)
{
  if(document.getElementById)
  {
    while (btn.tagName != 'TR') btn = btn.parentNode;
    btn.parentNode.removeChild(btn);
  }
}
function addFile(btn)
{
  if(document.getElementById)
  {
    while (btn.tagName != 'TR') btn = btn.parentNode;
    var newTr = btn.parentNode.insertBefore(btn.cloneNode(true),
                                            btn.nextSibling);
    thisChilds = newTr.getElementsByTagName('td');
    for (var i = 0; i < thisChilds.length; i++)
    {
      if (thisChilds[i].className == 'files')
      thisChilds[i].innerHTML = '<input size="50" name="att[]"' +
                                'class=input type="file">';
    }
  }
}
//-->
</script>
<?php
  // Обработчик HTML-формы
  // Загружаем все файлы на сервер
  for($i = 0; $i < count($_FILES['att']['name']); $i++)
  {
    // Перемещаем файл из временного каталога сервера в
    // каталог files Web-приложения
    if (copy($_FILES['att']['tmp_name'][$i],
             "files/".$_FILES['att']['name'][$i]))
    {
      // Уничтожаем файл во временном каталоге
      unlink($_FILES['att']['tmp_name'][$i]);
      // Изменяем права доступа к файлу
      chmod("files/".$_FILES['att']['name'][$i], 0644);
    }
  }

  // Осуществляем автоматическую перезагрузку страницы,
  // если содержимое суперглобального массива $_POST
  // не является пустым
  if(!empty($_POST))
  {
    echo "<HTML><HEAD>
    <META HTTP-EQUIV='Refresh' CONTENT='0; URL=".$_SERVER['PHP_SELF']."'>
          </HEAD></HTML>";
  }
?>
