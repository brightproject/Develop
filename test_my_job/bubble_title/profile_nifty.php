<?php header("Content-Type: text/html; charset=cp1251"); ?>
<?php
		require_once ("includes/connection.php");
		require_once ("classes/mysql.class.php");
	    include("includes/img_resize.php");
	$getpage['id'] = (int)$_GET['order'];
	$db = new db_class;
	// profile
	// $sql = $db->query("SELECT * FROM userlist WHERE nickname = 'first' ");
	// $profile .= "<ul>";
	// $row = $db->get_row($sql);
		// foreach ($row as $m)
			// {
				// $profile .= "<ol>".$m."</ol>";
			// }
	// $profile .= "</ul>";
	$id = 3;
	$user_id = $id+1000;
	$user_id = mysql_real_escape_string($user_id);
	$user_id = eregi_replace("`", "", $user_id);
	$sql = $db->query("SELECT * FROM userlist WHERE user_id  = '$user_id' ");
	$row = $db->get_row($sql);
			$profile .= "<div id=\"headertab\" class=\"toptabs\">";
			$profile .= "<ul class=\"spanel\">";
			$profile .= "<li><a href=\"#main\">������ ����������</a></li>";
			$profile .= "<li><a href=\"#change\">�������</a></li>";
			$profile .= "<li><a href=\"#info\">���������� � ����</a></li>";
			$profile .= "</ul>";
			$profile .= "<div id=\"main\" align=\"center\" class=\"tabdiv2\">";
			$profile .= "<form id=\"tab_1\">
			<p><label>���� ��� <span class=\"brightRed\"> *</span><br /><br />
            <input value=\"{$row["firstname"]}\" type=\"text\" name=\"firstname\" id=\"firstname\">
            </label></p>
			<p><label>������ <span class=\"brightRed\"> *</span><br /><br />
              <select name=\"country\" class=\"formFields\">
                <option value=\"{$row["country"]}\">{$row["country"]}</option>
                <option value=\"���\">���</option>
                <option value=\"������\">������</option>
                <option value=\"������\">������</option>
                <option value=\"������\">������</option>
                <option value=\"�������\">�������</option>
              </select>
			  </label></p>
			<p><label>����� <span class=\"brightRed\"> *</span><br /><br />
              <select name=\"city\" class=\"formFields\">
                <option value=\"{$row["city"]}\">{$row["city"]}</option>
                <option value=\"������\">������</option>
                <option value=\"������������\">������������</option>
                <option value=\"�����-���������\">�����-���������</option>
                <option value=\"�����������\">�����������</option>
                <option value=\"����������\">����������</option>
                <option value=\"�������\">�������</option>
                <option value=\"����\">����</option>
                <option value=\"���������\">���������</option>
              </select>
			  </label></p>
			<p><label>������� <span class=\"brightRed\"> *</span><br /><br />
            <input value=\"{$row["phone"]}\" type=\"text\" name=\"phone\" id=\"phone\">
            </label></p>
			<p><label>���� <span class=\"brightRed\"> *</span><br /><br />
            <input value=\"{$row["website"]}\" type=\"text\" name=\"website\" id=\"website\">
            </label></p>
            <p>���� ������������ ��� ���������� <span class=\"brightRed\"> *</span></p><div id=\"result_1\" style=\"padding:5px;\">
</div><input value=\"{$row["id"]}\" type=\"hidden\" name=\"id\">
            <input type=\"button\" onclick=\"but_1()\" value=\"���������\">
            </form>";
			$profile .= "</div>";
			$profile .= "<div id=\"change\" align=\"center\" class=\"tabdiv2\">";
			$group_type = $row["group_type"];
			$check_pic = "freelancers/$group_type/$user_id/pic_1.png";
			$profile .= "<img width=\"45%\" src=\"$check_pic\"/><br /><br />";
			$profile .= "<form action=\"profile_nifty.php?menu=profile#tabs-2\" enctype=\"multipart/form-data\" method=\"post\">";
			$profile .= "<input name=\"file\" type=\"file\" class=\"formFields\" id=\"fileField\" size=\"42\" /><input name=\"parse_var\" type=\"hidden\" value=\"pic\" /><input type=\"submit\" name=\"button\" id=\"button\" value=\"���������\" />";
			$profile .= "</form>";
			$profile .= "</div>";
			$profile .= "<div id=\"change\" align=\"center\" class=\"tabdiv2\">
			<form id=\"tab_3\">
						<p><label>���������� � ���� <span class=\"brightRed\"> *</span><br /><br />
            <textarea name=\"info\" id=\"info\" class=\"mini\">
{$row["info"]}
	</textarea>
            </label></p><div id=\"result_3\" style=\"padding:5px;\">
</div><input value=\"{$row["id"]}\" type=\"hidden\" name=\"id\"><input type=\"button\" onclick=\"but_3()\" value=\"���������\">
			</form></div>";
			$profile .= "</div>";
			$color .= "{$row["group_type"]}";




	// messages
	$sql_outbox = $db->query("SELECT * FROM messages WHERE outbox  = '$user_id' ");
	$sql_inbox = $db->query("SELECT * FROM messages WHERE inbox  = '$user_id' ");
					
		$messages .= "<div align=\"center\" id=\"container-1\">";
			$messages .= "<div id=\"headertab\" class=\"toptabs\">";
			$messages .= "<ul class=\"spanel\">";
			$messages .= "<li><a href=\"#inbox\">��������</a></li>";
			$messages .= "<li><a href=\"#outbox\">���������</a></li>";
			$messages .= "</ul>";
			$messages .= "<div id=\"inbox\" class=\"tabdiv2\">";
			$messages .= "<div id=\"msgs\"><ol>";
			while ($row = $db->get_row($sql_inbox)) {
						$messages .= "<li class=\"admin\"><div class=\"m-i\">
						<div class=\"m-ii\">
						<div class=\"m-iii\">";
			$sql_path = $db->query("SELECT ava_path FROM userlist WHERE user_id  = '".$row["outbox"]."' ");
					$row_path = $db->get_row($sql_path);
						$messages .= "<img src=\"{$row_path["ava_path"]}\" height=\"55\" align=\"left\" style=\"margin-right:10px;\"/>";

						$messages .= "����: <strong>{$row["thema"]}</strong><br />
						����: <b>{$row["date_create"]}</b><br />";
			$sql_name = $db->query("SELECT nickname FROM userlist WHERE user_id  = '".$row["outbox"]."' ");
					while ($row_name = $db->get_row($sql_name)) {
						$messages .= "�� ����: <b>".$row_name["nickname"]."</b>";
						}
						$messages .= "<div class=\"msg\">����� ���������:<p> {$row["text"]}</p></div></div></div></div></li>";
						}
						$messages .= "</ol><div class=\"cleaner\"></div></div>";
			$messages .= "</div>";
			$messages .= "<div id=\"outbox\" class=\"tabdiv2\">";
			$messages .= "<div id=\"msgs\"><ol>";
			while ($row = $db->get_row($sql_outbox)) {
						$messages .= "<li class=\"admin\"><div class=\"m-i\">
						<div class=\"m-ii\">
						<div class=\"m-iii\">";
						          if ($color == "a")
		  {
		  $style = "border-color:magenta;border-width:5px;width:90%;";
		  $special = "�����";
		  } elseif ($color == "b")
		  {
		  $style = "border-color:green;border-width:5px;width:90%;";
		  $special = "��������";
		  $default_pic = "freelancers/default/designer.jpg";
		  } elseif ($color == "c")
		  {
		  $style = "border-color:blue;border-width:5px;width:90%;";
		  $special = "�����������";
		  $default_pic = "freelancers/default/programer.jpg";
		  } elseif ($color == "d")
		  {
		  $style = "border-color:yellow;border-width:5px;width:90%;";
		  $special = "������";
		  $default_pic = "freelancers/default/flasher.jpg";
		  } elseif ($color == "e")
		  {
		  $style = "border-color:grey;border-width:5px;width:90%;";
		  $special = "�����������";
		  $default_pic = "freelancers/default/verstal.jpg";
		  } elseif ($color == "f")
		  {
		  $style = "border-color:red;border-width:5px;width:90%;";
		  $special = "Java-�����������";
		  $default_pic = "freelancers/default/java-prog.jpg";
		  }
						$check_pic = "freelancers/$group_type/$user_id/pic_1.png";
				if (file_exists($check_pic)) {
					$ava = $check_pic ;
					// forces picture to be 100px wide and no more
					} else {
					$ava = $default_pic ;
					// forces default picture to be 100px wide and no more
					}
					$messages .= "<img src=\"$ava\" height=\"55\" align=\"left\" style=\"margin-right:10px;\"/>
						����: <strong>{$row["thema"]}</strong><br />
						����: <b>{$row["date_create"]}</b><br />";
			$sql_name = $db->query("SELECT nickname,user_id FROM userlist WHERE user_id  = '".$row["outbox"]."' ");
					while ($row_name = $db->get_row($sql_name)) {
						$messages .= "�� ����: <b>".$row_name["nickname"]."</b>";
						}
						$messages .= "<div class=\"msg\">����� ���������:<p> {$row["text"]}</p></div></div></div></div></li>";
						}
						$messages .= "</ol><div class=\"cleaner\"></div></div>";
			$messages .= "</div>";
		$messages .= "</div>";

			

			$messages .= "<form id=\"send\">
			<p><label>���� ��������� <span class=\"brightRed\"> *</span><br /><br />
            <input value=\"\" type=\"text\" name=\"thema\" id=\"thema\">
            </label></p>
			<p><label>���� ��������� <span class=\"brightRed\"> *</span><br /><br />
              <select name=\"outbox\" class=\"formFields\">
                <option value=\"\">-=���� ��������=-</option>
                <option value=\"1002\">���� ������</option>
                <option value=\"1004\">����</option>
                <option value=\"1010\">�������</option>
                <option value=\"1014\">������</option>
                <option value=\"1015\">������</option>
                <option value=\"1003\">����</option>
              </select>
			  </label></p>
			<p><label>����� ��������� <span class=\"brightRed\"> *</span><br /><br />
		    <p><textarea id=\"text\" name=\"text\" type=\"text\" value=\"������� ����� ���������,����� ������\" cols=\"25\" rows=\"2\"/></textarea></p>
            <p>���� ������������ ��� ���������� <span class=\"brightRed\"> *</span></p>
			<div id=\"send_view\" style=\"padding:5px;\"></div>
			<input value=\"$user_id\" type=\"hidden\" name=\"user_id\">
            <input type=\"button\" onclick=\"send_message()\" value=\"��������� ���������\">
            </form>";
	$messages .= "</div>";

	// orders
	$zero = NULL;
	$sql = $db->query("SELECT id FROM orders WHERE user_id = '$zero' AND group_type = '$color' ");
	$orders .= "<div style=\"margin:20px 0 0 180px\">
<ul id=\"mycarousel\" class=\"jcarousel-skin-tango\">";
	while ($row = $db->get_row($sql))
	{
		$orders .= "<li><a href=\"?order={$row["id"]}\" target=\"_parent\"><img src=\"images/orders_pic/{$row["id"]}.jpg\" alt=\"#\" width=\"180\" height=\"135\" border=\"0\" /></a></li>";
	}
	$orders .= "</ul></div>";

	// num_rows
		$sql = $db->query("SELECT * FROM orders WHERE user_id = '$user_id' ");
		$num = $db->num_rows($sql);
			// while ($row = $db->get_row($sql))
				// {
				// echo $row["user_id"]."<br />";
				// }


	// ����������� �������
          if ($color == "a")
		  {
		  $style = "border-color:magenta;border-width:5px;width:90%;";
		  $special = "�����";
		  } elseif ($color == "b")
		  {
		  $style = "border-color:green;border-width:5px;width:90%;";
		  $special = "��������";
		  $default_pic = "freelancers/default/designer.jpg";
		  } elseif ($color == "c")
		  {
		  $style = "border-color:blue;border-width:5px;width:90%;";
		  $special = "�����������";
		  $default_pic = "freelancers/default/programer.jpg";
		  } elseif ($color == "d")
		  {
		  $style = "border-color:yellow;border-width:5px;width:90%;";
		  $special = "������";
		  $default_pic = "freelancers/default/flasher.jpg";
		  } elseif ($color == "e")
		  {
		  $style = "border-color:grey;border-width:5px;width:90%;";
		  $special = "�����������";
		  $default_pic = "freelancers/default/verstal.jpg";
		  } elseif ($color == "f")
		  {
		  $style = "border-color:red;border-width:5px;width:90%;";
		  $special = "Java-�����������";
		  $default_pic = "freelancers/default/java-prog.jpg";
		  }
		$check_pic = "freelancers/$group_type/$user_id/pic_1.png";

		if (file_exists($check_pic)) {
		$avatar_pic = "<div class=\"dis-image\"><a href=\"profile_nifty.php\"><img style=\"$style\" src=\"$check_pic\"/></a><b><center>{$special}</center></b></div>";
		// forces picture to be 100px wide and no more
		} else {
		$avatar_pic = "<div class=\"dis-image\"><a href=\"profile_nifty.php\"><img style=\"$style\" src=\"$default_pic\"/></a><b>{$special}</b></div>";
		// forces default picture to be 100px wide and no more
		}
  //������� ��������

if ($_POST['parse_var'] == "pic"){

        if (!$_FILES['file']['tmp_name']) {

            echo "<div id=\"myBox\" class=\"glassbox\">������: �������� ����������� �� ������� �� ������.</div>";

        } else {

            $maxfilesize = 81200; // 51200 bytes equals 50kb
            if($_FILES['file']['size'] > $maxfilesize ) {
                        echo "<div id=\"myBox\" class=\"glassbox\">������: ���� ����������� �������, ���������� �����.</div>";
                        unlink($_FILES['file']['tmp_name']);

            } else if (!preg_match("/\.(gif|jpg|png)$/i", $_FILES['file']['name'] ) ) {
						echo "<div id=\"myBox\" class=\"glassbox\">������: ��� �� ��������, ���������� �����.</div>";

                        unlink($_FILES['file']['tmp_name']);

            } else {

                        $newname = "pic_1.png";
                        $place_file = move_uploaded_file( $_FILES['file']['tmp_name'], "freelancers/$group_type/$user_id/".$newname);
						echo "<div id=\"myBox\" class=\"glassbox\">����������� �����������, ��� ������ ��������� ������ ... ���������...  ������ �����������.</div>";
            }

        } // close else that checks file exists

} // close the condition that checks the posted "parse_var" value for image upload or replace

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=cp1251" />
<title>�������</title>
	<link href="style/1main.css" rel="stylesheet" type="text/css" />
	
	<link rel="stylesheet" href="style/styles.css" type="text/css" media="screen" />

	<link rel="stylesheet" type="text/css" href="style/jcarousel.css" />
	<link rel="stylesheet" type="text/css" href="style/jcarousel.skin.css" />
	<link rel="stylesheet" type="text/css" href="style/css_messages.css" />
	<script type="text/javascript" src="scripts/tabs_opasity/jquery-1.3.2.min.js"></script>
	<script src="scripts/prototype.js" type="text/javascript"></script>
	<script src="scripts/scriptaculous/effects.js" type="text/javascript"></script>
	<script src="scripts/glassbox/glassbox.js" type="text/javascript"></script>
	<style type="text/css">
		#myBox_contentBoxBg {
			filter: alpha(opacity=50);
			-moz-opacity:.50;
			opacity:.50;
		}
		#myBox_content {
		  padding: 20px;
		}
		#myBox h3 {
		  font-size: 17px;
		  margin: 0px;
		  text-align: center
		}
	</style>
<script type="text/javascript">
path_to_root_dir = "";
function flashnotice() {
	var myBox = new GlassBox();
	myBox.init( 'myBox', '500px', '100px', 'hidden', '', true, true );
	myBox.lbo( false, 0.50 );
	myBox.appear(3000);
}
jQuery(document).observe("dom:loaded", function(){
	flashnotice();
});
</script>

<script src="scripts/jquery.jcarousel.pack.js" type="text/javascript"></script>
<script type="text/javascript">
jQuery(document).ready(function() {
    jQuery('#mycarousel').jcarousel({
        vertical: true,
        auto: 3,
        scroll: 1,
        wrap: "both"
    });
});

</script>
<!--[if IE]>
<style type="text/css">
/* place css fixes for all versions of IE in this conditional comment */
.thrColHybHdr #sidebar1, .thrColHybHdr #sidebar2 { padding-top: 30px; }
.thrColHybHdr #mainContent { zoom: 1; padding-top: 15px; }
/* the above proprietary zoom property gives IE the hasLayout it needs to avoid several bugs */
</style>
<![endif]-->
	
	<script type="text/javascript" src="scripts/tabs_opasity/jquery-ui-personalized-1.5.2.packed.js"></script>
	<script type="text/javascript" src="scripts/tabs_opasity/init.js"></script>
<script>
function but_1( ) {
  new Ajax.Updater( 'result_1', 'ajax_query/userlist.php', { method: 'post',
    parameters: $('tab_1').serialize() } );
  $('tab_1').reset();
}
</script>
<script>
function send_message( ) {
  new Ajax.Updater( 'send_view', 'ajax_query/messages.php', { method: 'post',
    parameters: $('send').serialize() } );
  $('send').reset();
}
</script>
<script>
function but_3( ) {
  new Ajax.Updater( 'result_3', 'ajax_query/userlist.php', { method: 'post',
    parameters: $('tab_3').serialize() } );
  $('tab_3').reset();
}
</script>

<style type="text/css">
body{padding: 20px;background: #707883;color: #222;text-align: center;
    font: 85% "Trebuchet MS",Arial,sans-serif}
h1,h2,p{margin: 0;padding: 0 10px;font-weight:normal}
p{padding: 0 10px 15px}
h1{font-size: 250%;color: #FFF;letter-spacing: 1px}
h2{font-size: 200%;line-height:1;color:#002455 }
div#container{width:1010px !important; width /**/:460px;
    margin: 0 auto;padding:5px;text-align:left;background:#FFF}
div#container-1{width:550px; margin: 0 auto;}
div#header{background: #BFDDED;padding: 10px;text-align:center}
div#content{float:left;width:600px;padding:10px 0;margin:5px 0 0 5px;background: #778CCA}
div#left{float:left;width:200px;padding:10px 0;margin:5px 0;background: #FFD154}
div#left h2{font-size: 120%;color: #9E4A24}
div#right{float:right;width:200px;padding:10px 0;margin:5px 0;background: #FFD154}
div#right h2{font-size: 120%;color: #9E4A24}
div#footer{clear:both;width:1010px;background: #C4E786;padding:5px 0;text-align:center}
</style>
<script type="text/javascript" src="scripts/nifty/niftycube.js"></script>
<script type="text/javascript">
window.onload=function(){
Nifty("div#container");
Nifty("div#content,div#right","same-height small");
Nifty("div#content,div#left","same-height small");
Nifty("div#header,div#footer","small");
}
</script>

</head>
<body>
<div id="container">
<div id="header"><h1>RusEntu - ���������� ������� �����������</h1></div>
<div id="left">
    	<div style="margin-left:10px;">
		 <?php echo $avatar_pic; ?>
		 </div>
        <table align="center">
        <tr>
		<td class="prof">��� �������</td><td><a href="?menu=profile" ><sup>���</sup></a></td>
		</tr>
        <tr>
		<td class="prof"><a href="?menu=messages">���������</a></td><td>(1/4)</td>
		</tr>
        <tr>
		<td class="prof"> <a href="?menu=you_orders">������</a></td>
		<td class="number"><?php echo $num; ?></td>
		</tr>
        <tr>
		<td class="prof"><a href="?menu=moneys">������</a></td><td>2vx</td>
		</tr>
        <tr>
		<td class="prof"><a href="#">������</a></td>
		</tr>
        </table>
</div>
<div id="content">
		<?php
			$case = $_GET['menu'];
				switch ($case)
				{
				 case profile:
					echo "���� �������";
					echo $profile;
				 break;
				 case messages:
					echo "���� ���������";
					echo $messages;
				 break;
				 case you_orders:
					echo "���� ������";
					echo $you_orders;
				 break;
				 case moneys:
					echo "���� �����";
					echo $moneys;
				 break;
				 case logout:
				 echo "<script language=javascript>alert('�� ������� {$_SESSION["role"]}');</script>";
				 echo "�����";
				 // echo logout();
				 break;
				default:
				if (!$getpage['id'])
					{
					 echo $orders;
					}
					else
					{
			$getpage['id'] = ($getpage['id'] == 0)? 1 : $getpage['id'];
			$sql = $db->query('SELECT * FROM orders WHERE id = '.$getpage['id'].' LIMIT 1 ');
			$row = $db->get_row($sql);
			echo "<center>";
			echo "�������� ������: {$row["order_info"]}<br />";
		echo "<div id=\"result\" style=\"padding:5px;\"><form id=\"myform\">
		<input value=\"{$user_id}\" type=\"hidden\" name=\"user_id\">
		<input value=\"{$_GET['order']}\" type=\"hidden\" name=\"order\">
		<input type=\"button\" onclick=\"dosubmit()\" value=\"��\"></form>";
		echo "<input type=\"submit\" onclick=\"history.back()\" value=\"���\"></div>";
		echo "</center>";
					}
				}
?>
<script>
function dosubmit( ) {
  new Ajax.Updater( 'result', 'ajax_query/order.php', { method: 'post',
    parameters: $('myform').serialize() } );
  $('myform').reset();
}
</script>
</div>
<div id="right">
				<p class="date">
				<?php
				echo date('�������: d-M-Y');
				echo "<br />";
				echo date('�����: H-i-s');
				$today = mktime();
				//$today = mktime(12,0,0,6,25,1999);
				echo '<br />';
				echo '� ��� ������ '.date('g:i:s a, F, d, Y',$today);
				echo '<br />';
				echo '�� �������� ������ '.gmdate('g:i:s a, F, d, Y',$today);
				?></p>
                <p class="title">������</p>
<?php
echo "<p>IP ����� - <b>".$_SERVER['REMOTE_ADDR']."</b></p>";
echo "<p>���� - <b>".$_SERVER['REMOTE_PORT']."</b></p>";
echo "<p>������� - <b>".$_SERVER['HTTP_USER_AGENT']."</b></p>";
  echo "��� ������� - ".$_SERVER['SERVER_NAME']."<br />";
  echo "IP-����� ������� - ".$_SERVER['SERVER_ADDR']."<br />";
  echo "���� ������� - ".$_SERVER['SERVER_PORT']."<br />";
  echo "Web-������ - ".$_SERVER['SERVER_SOFTWARE']."<br />";
  echo "������ HTTP-��������� - ".$_SERVER['SERVER_PROTOCOL']."<br />";
  echo "���� - ".$_SERVER['HTTP_HOST']."<br />";
  echo "������ ����� - ".$_SERVER['DOCUMENT_ROOT']."<br />";
?>
                </p>
</div>
<div id="footer">footer here</div>
</div>
</body>
</html>