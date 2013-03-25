<form method="POST">
<input type="text" name="name" value="<?=$row['name']?>"><br>
<input type="hidden" name="id" value="<?=$row['id']?>">
<input type="submit"><br>
<a href="?">Вернуться обратно к списку</a>
</form>
<? if ($row['id']):?>
<div align=right>
<form method="POST">
<input type="hidden" name="delete" value="<?=$row['id']?>">
<input type="submit" value="Удалить"><br>
</form>
</div>
<?endif?>