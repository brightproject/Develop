<?php
$total = '';

$fh = fopen( 'list.txt', 'r' );
while( $str = fgets( $fh ) ) {
?>
<?php echo( $str ); ?><br/>
<?php
  $total .= $str;
}

if ( array_key_exists( 'todo', $_POST ) )
{
?>
<?php echo( $_POST['todo'] ); ?><br/>
<?php
  $fh = fopen( 'list.txt', 'w' );
  fwrite( $fh, $total."\n".$_POST['todo'] );
  fclose( $fh );
}
?>