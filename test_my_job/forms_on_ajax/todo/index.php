<html>
<head>
<script src="prototype.js"></script>
</head>
<body>

<div id="result" style="padding:5px;">
<?php
$fh = fopen( 'list.txt', 'r' );
while( $str = fgets( $fh ) ) {
?>
<?php echo( $str ); ?><br/>
<?php
}
?>
</div>

<form id="myform">
<input type="text" name="todo">
</form>

<input type="button" onclick="dosubmit()" value="Submit">

<script>
function dosubmit( ) {
  new Ajax.Updater( 'result', 'add.php',
    { method: 'post', parameters: $('myform').serialize() } );
  $('myform').reset();
}
</script>

</body>
</html>