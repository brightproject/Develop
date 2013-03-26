<form method=post>
<table>
<tr><td>Название</td><td><input type=text name=name></td></tr>
<tr>
  <td>Права доступа:</td>
  <td>
    <input type=checkbox title='Чтение файла для пользователя' name=ur>
    <input type=checkbox title='Запись файла для пользователя' name=uw>
    <input type=checkbox title='Выполнение файла для пользователя'
     name=ux>
    &nbsp;&nbsp;
    <input type=checkbox title='Чтение файла для группы' name=gr>
    <input type=checkbox title='Запись файла для группы' name=gw>
    <input type=checkbox title='Выполнение файла для группы' name=gx>
    &nbsp;&nbsp;
    <input type=checkbox title='Чтение файла для пользователей, 
                                не входящих в группу' name=or>
    <input type=checkbox title='Запись файла для пользователей, 
                                не входящих в группу' name=ow>
    <input type=checkbox title='Выполнение файла для пользователей, 
                                не входящих в группу' name=ox>
  </td>
</tr>
<tr><td>&nbsp;</td><td><input type=submit value='Установить'></td></tr>
</table>
</form>
<?php
  if(!empty($_POST))
  {
    // Преобразуем права доступа пользователя
    // в числовую форму
    $user = 0;
    if($_POST['ur'] == 'on') $user += 4;
    if($_POST['uw'] == 'on') $user += 2;
    if($_POST['ux'] == 'on') $user += 1;
    // Преобразуем права доступа для группы
    // в числовую форму
    $group = 0;
    if($_POST['gr'] == 'on') $group += 4;
    if($_POST['gw'] == 'on') $group += 2;
    if($_POST['gx'] == 'on') $group += 1;
    // Права доступа по умолчанию для
    // остальных пользователей (не входящих в группу)
    $other = 0;
    if($_POST['or'] == 'on') $other += 4;
    if($_POST['ow'] == 'on') $other += 2;
    if($_POST['ox'] == 'on') $other += 1;

    // Устнавливаем права доступа к файлу

    // Создаем восьмеричную переменную $mode
    // с правами доступа к каталогу
    eval("\$mode=$user$group$other;");    
    // Изменяем права доступа к только что
    // созданному каталогу
    exec("chmod $mode $_POST[name]");
  }
?>
