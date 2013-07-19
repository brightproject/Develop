<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<html>
    <head>
        <title>Edit by user</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript" src="jquery.inlineEdit.js"></script>
	<script type="text/javascript" src="1jquery.inlineEdit.min.js"></script>
	<script type="text/javascript">
		$(function(){
			$.inlineEdit({
				categoryName: 'test.php?type=name&categoryId=',
				categoryPrice: 'test.php?type=price&categoryId=',
				remove: 'test.php?remove&type=price&categoryId='
			}, {
				animate: false,
				filterElementValue: function($o){
					if ($o.hasClass('categoryPrice')) {
						return $o.html().match(/\$(.+)/)[1];
					} else {
						return $o.html();
					}
				},
				afterSave: function(o){
					if (o.type == 'categoryPrice') {
						$('.categoryPrice.id' + o.id).prepend('$');
					}
				}
			});
		});
	</script>
	<style type="text/css">
		#data td {
			width: 150px;
			vertical-align: top;
			cursor: pointer;
		}
		.editFieldSaveControllers {
			width: 250px;
			font-size: 80%;
		}
		.editableSingle button, .editableSingle input {
			padding: 3px;
		}
		a.editFieldRemove {
			color: red;
		}
	</style>
    </head>
    
    <body>
<table id="data">
			<tr>
				<th>Список покупок</th>
				<th>Цена</th>
			</tr>
			<tr>
				<td class="editableSingle categoryName removable id1">Чемодан</td>
				<td class="editableSingle categoryPrice removable id1">$12</td>
			</tr>
			<tr>
				<td class="editableSingle categoryName removable id2">Купальник</td>
				<td class="editableSingle categoryPrice removable id2">$2</td>
			</tr>
			<tr>
				<td class="editableSingle categoryName removable id3">Полотенце</td>
				<td class="editableSingle categoryPrice removable id3">$3</td>
			</tr>
			<tr>
				<td class="editableSingle categoryName removable id4">Зонтик</td>
				<td class="editableSingle categoryPrice removable id4">$1</td>
			</tr>
</table>
	</body>
</html>