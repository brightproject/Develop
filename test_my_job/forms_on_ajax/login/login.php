<?php
header( 'Content-type: text/xml' );
if ( $_POST['user'] == 'jack' && $_POST['password'] == 'password' )
  echo( "<ok/>" );
else
  echo( "<bad/>" );
?>
