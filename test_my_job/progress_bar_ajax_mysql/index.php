<?php
$db = mysql_connect("localhost", "root","" );
mysql_select_db("testing", $db);
$result = mysql_query("SELECT * FROM test_progress_bar WHERE id = '1'");
$row = mysql_fetch_array($result);
$output_1 = "{$row["parametr_1"]}";
$output_2 = "{$row["parametr_2"]}";  
$output_3 = "{$row["parametr_3"]}";  
// print mysql_error();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<title></title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<!-- jsProgressBarHandler prerequisites : prototype.js -->
<script type="text/javascript" src="js/prototype/prototype.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<!-- jsProgressBarHandler core -->
<script type="text/javascript" src="js/bramus/jsProgressBarHandler.js"></script>
<script type="text/javascript">
				jQuery.noConflict()
			</script>
<style type = "text/css">
/* General Links */
		a:link {
	text-decoration : none;
	color : #3366cc;
	border: 0px;
}
a:active {
	text-decoration : underline;
	color : #3366cc;
	border: 0px;
}
a:visited {
	text-decoration : none;
	color : #3366cc;
	border: 0px;
}
a:hover {
	text-decoration : underline;
	color : #ff5a00;
	border: 0px;
}
img {
	padding: 0px;
	margin: 0px;
	border: none;
}
body {
	margin : 0 auto;
	width:100%;
	font-family: 'Verdana';
	color: #40454b;
	font-size: 12px;
	text-align:center;
}
.content {
	margin:20px;
	line-height:20px;
}
body h1 {
	font-size:14px;
	font-weight:bold;
	color:#CC0000;
	padding:5px;
	border-bottom:solid;
	border-bottom-width:1px;
	border-bottom-color:#333333;
}
body h2 {
	font-size:14px;
	font-weight:bold;
	color:#CC0000;
	padding:5px;
	border-bottom:solid;
	border-bottom-width:1px;
	border-bottom-color:#333333;
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
<body>
<div style="width:540px; margin: 0 auto; text-align:left;" >
<!--Этот блок копируем-->
  <div id="demo"> <span style="color:#006600;font-weight:bold;">Multi Color Bar</span> <br/>
    <span id="element_1">[ Loading Progress Bar ]</span> <span class="extra"><a href="#" onclick="plus_1(10)"><img src="images/icons/minus.gif"/></a></span> <span class="options"><a href="#" onclick="minus_1(10)"><img src="images/icons/add.gif"/></a></span> <span id="Text6" style="font-weight:bold">&laquo; Select Options</span> <br />
    <br />
  </div>
<!--Этот блок копируем-->

  <div id="demo"> <span style="color:#006600;font-weight:bold;">Multi Color Bar</span> <br/>
    <span id="element_2">[ Loading Progress Bar ]</span> <span class="extra"><a href="#" onclick="plus_2(10)"><img src="images/icons/minus.gif"/></a></span> <span class="options"><a href="#" onclick="minus_2(10)"><img src="images/icons/add.gif"/></a></span> <span id="Text6" style="font-weight:bold">&laquo; Select Options</span> <br />
    <br />
</div>

  <div id="demo"> <span style="color:#006600;font-weight:bold;">Multi Color Bar</span> <br/>
    <span id="element_3">[ Loading Progress Bar ]</span> <span class="extra"><a href="#" onclick="plus_3(10)"><img src="images/icons/minus.gif"/></a></span> <span class="options"><a href="#" onclick="minus_3(10)"><img src="images/icons/add.gif"/></a></span> <span id="Text6" style="font-weight:bold">&laquo; Select Options</span> <br />
    <br />
</div>
    <script type="text/javascript">
document.observe('dom:loaded', function() {
<!--Этот блок копируем-->
	// second manual example : multicolor (and take all other default paramters)
	manualPB1 = new JS_BRAMUS.jsProgressBar(
			$('element_1'),  <?php echo $output_1 ?>, {
				barImage : Array(
					'images/bramus/percentImage_back4.png',
					'images/bramus/percentImage_back3.png',
					'images/bramus/percentImage_back2.png',
					'images/bramus/percentImage_back1.png'
				),
			}
		);
<!--Этот блок копируем-->	
	manualPB2 = new JS_BRAMUS.jsProgressBar(
			$('element_2'),  <?php echo $output_2 ?>, {
				barImage : Array(
					'images/bramus/percentImage_back4.png',
					'images/bramus/percentImage_back3.png',
					'images/bramus/percentImage_back2.png',
					'images/bramus/percentImage_back1.png'
				),
			}
		);
		
	manualPB3 = new JS_BRAMUS.jsProgressBar(
			$('element_3'),  <?php echo $output_3 ?>, {
				barImage : Array(
					'images/bramus/percentImage_back4.png',
					'images/bramus/percentImage_back3.png',
					'images/bramus/percentImage_back2.png',
					'images/bramus/percentImage_back1.png'
				),
									onTick : function(pbObj) {

										switch(pbObj.getPercentage()) {

											case 90:
												alert('Eshe chut chut!!!');
											break;

											case 100:
												alert('Progressbar full at 100% ... maybe do a redirect or sth like that here?');
											break;

										}

										return true;
									}
			}
		);
	}, false);
<!--Этот блок копируем-->	
	function plus_1(num_1){
		jQuery.post('ajax.php',{par_1: num_1, act_1: 'max'}, function(data_1){ manualPB1.setPercentage('-'+num_1);return false; });
	}
	function minus_1(num_1){
		jQuery.post('ajax.php',{par_1: num_1, act_1: 'min'}, function(data_1){ manualPB1.setPercentage('+'+num_1); return false; });
	}
<!--Этот блок копируем-->	
	function plus_2(num_2){
		jQuery.post('ajax.php',{par_2: num_2, act_2: 'max'}, function(data_2){ manualPB2.setPercentage('-'+num_2);return false; });
	}
	function minus_2(num_2){
		jQuery.post('ajax.php',{par_2: num_2, act_2: 'min'}, function(data_2){ manualPB2.setPercentage('+'+num_2); return false; });
	}
	
	function plus_3(num_3){
		jQuery.post('ajax.php',{par_3: num_3, act_3: 'max'}, function(data_3){ manualPB3.setPercentage('-'+num_3);return false; });
	}
	function minus_3(num_3){
		jQuery.post('ajax.php',{par_3: num_3, act_3: 'min'}, function(data_3){ manualPB3.setPercentage('+'+num_3); return false; });
	}
</script>
</div>
<!-- STATS -->
</body>
</html>
