<?php 

require_once('include/brains.php');

?>
<html>
<head>
<title> Ajax Edit in Place Demo Using Prototype </title>
<link href="include/style.css" rel="stylesheet" type="text/css" />
<script src="include/prototype.js"></script>
<script src="include/functions.js"></script>
</head>
<body onLoad="fixInputSizes()">
<div id="container" class="clearfix">
<div id="inputdivs">
<?php $ai->print_records(); ?>
<!--
<input type="text" name"?" id="field1" value="something" onClick="changeClass('field1', 'show')" onBlur="changeClass('field1', 'hide')" class="text" readonly />
<input type="text" name"?" id="field2" value="something" onClick="changeClass('field2', 'show')" onBlur="changeClass('field2', 'hide')" class="text" readonly />
-->
</div>
</div>
<div id="status"></div>
</body>

</html>