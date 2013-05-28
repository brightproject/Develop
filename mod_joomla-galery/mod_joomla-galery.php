<?php
if( !defined( '_VALID_MOS' ) && !defined( '_JEXEC' ) ) die( 'Direct Access to '.basename(__FILE__).' is not allowed.' );
?>
	<script src="<?php echo $mosConfig_live_site; ?>/modules/mod_joomla-galery/jquery.min.js" type="text/javascript"></script>
	<script src="<?php echo $mosConfig_live_site; ?>/modules/mod_joomla-galery/jquery.plugin.js" type="text/javascript"></script>
	<style>
		html, body, table, tr, td, div, a, img { padding: 0; margin: 0; outline: none; }

		.group {
			margin: 0;
		}

        .galery {
			margin-left:500px;
			margin-top:-220px;
		}
		.galery img {
			width: 200px;
			height: 200px;
			border: 1px solid #0000FF;
			display: block;
			margin: 0;
		}
		
		.layer {
			margin: 0;
		}
		
		.layer a {
			color: #0000FF;
			display: block;
			margin: 20px 60px;
			text-align: center;
			line-height: 15px;
			white-space: nowrap;
		}
		.layer a:hover {
			color: #FF0000;
		}
		
		.layer a img {
			width: 200px;
			height: 200px;
			border: 1px solid #0000FF;
			display: block;
			margin: 0;
		}
		.layer a:hover img {
			border: 1px solid #FF0000;
		}
	</style>

	<div class="galery">
		<img src="<?php echo $mosConfig_live_site; ?>/modules/mod_joomla-galery/galery/1.jpg" />
	</div>
		<div id="group_4" class="group">
		
				<div class="layer layer_0">
					<a href="" target="_blank"><img src="<?php echo $mosConfig_live_site; ?>/modules/mod_joomla-galery/galery/1.jpg" /></a>
				</div>
		
				<div class="layer layer_1">
					<a href="" target="_blank"><img src="<?php echo $mosConfig_live_site; ?>/modules/mod_joomla-galery/galery/2.jpg" /></a>
				</div>
		
				<div class="layer layer_2">
					<a href="" target="_blank"><img src="<?php echo $mosConfig_live_site; ?>/modules/mod_joomla-galery/galery/3.jpg" /></a>
				</div>
		
				<div class="layer layer_3">
					<a href="" target="_blank"><img src="<?php echo $mosConfig_live_site; ?>/modules/mod_joomla-galery/galery/4.jpg" /></a>
				</div>
		
				<div class="layer layer_4">
					<a href="" target="_blank"><img src="<?php echo $mosConfig_live_site; ?>/modules/mod_joomla-galery/galery/5.jpg" /></a>
				</div>

		</div>	


<script type="text/javascript">
$(document).ready(function (){
	initializeGroup('#group_0', 'zoom', -1000, 2000, 0, 0);
	initializeGroup('#group_1', 'shuffle', -500, 2000, 220, 0);
	initializeGroup('#group_2', 'wipe', -1000, 2000, 420, 0);
	initializeGroup('#group_3', 'blindX', -1000, 2000, 0, 200);
	initializeGroup('#group_4', 'toss', -1000, 1000, -100, 100);
	initializeGroup('#group_5', 'growX', -1000, 2000, 420, 200);
});
</script>
