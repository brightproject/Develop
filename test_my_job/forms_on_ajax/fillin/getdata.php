<?php
header( "content-type: text/xml" );

$first = ' ';
$last = ' ';
$email = ' ';

if ( $_POST['id'] == '1' )
{
  $first = 'Jack';
  $last = 'Herrington';
  $email = 'jherr@pobox.com';
}
?>
<data>
<first><?php echo( $first ) ?></first>
<last><?php echo( $last ) ?></last>
<email><?php echo( $email ) ?></email>
</data>