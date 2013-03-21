<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<title>Кнопочки на аяксе</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="js/prototype/prototype.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>

<script type="text/javascript">
				jQuery.noConflict()
			</script>
<style type = "text/css">
img {
	padding: 0px;
	margin: 0px;
	border: none;
}
#demo {
	margin : 0 auto;
	width:100%;
}
#demo .extra {
	padding-left:30px;
}
#demo .options {
	padding-left:10px;
}
#demo .getOption {
	padding-left:10px;
	padding-right:20px;
}
</style>
</head>
<div style="width:540px; margin: 0 auto; text-align:left;" >
  <div id="demo"> <span style="color:#006600;font-weight:bold;">Кнопочки</span> <br /><br />
  <span class="extra"><a href="#" onclick="plus(10)"><img src="images/icons/minus.gif"/></a></span> <span class="options"><a href="#" onclick="minus(10)"><img src="images/icons/add.gif"/></a></span>
    <br />
  </div>
</div>
<script type="text/javascript">
	function plus(num){
		jQuery.post('ajax_button.php',{par: num, act: 'max'}, function(data){ manualPB1.setPercentage('-'+num);return false; });
	}
	function minus(num){
		jQuery.post('ajax_button.php',{par: num, act: 'min'}, function(data){ manualPB1.setPercentage('+'+num); return false; });
	}
</script>


</body>
</html>