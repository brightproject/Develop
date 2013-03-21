<?php
		require_once ("includes/connection.php");
		require_once ("classes/mysql.class.php");


$errorMsg = "";
$nickname = "";
$firstname = "";
$country = "";
$city = "";
$phone = "";
$email = "";
$password1 = "";
$password2 = "";
$website = "";
$group_type = "";
$info = "";


// This code runs only if the form submit button is pressed
if (isset ($_POST['firstname'])){

	$nickname = $_POST['nickname'];
	$firstname = $_POST['firstname'];
	$country = $_POST['country'];
	$city = $_POST['city'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$password1 = $_POST['password1'];
	$password2 = $_POST['password2'];
	$website = $_POST['website'];
	$group_type = $_POST['group_type'];
	$info = $_POST['info'];


	$nickname = stripslashes($nickname);
	$firstname = stripslashes($firstname);
	$country = stripslashes($country);
	$city = stripslashes($city);
	$phone = stripslashes($phone);
	$email = stripslashes($email);
	$password1 = stripslashes($password1);
	$password2 = stripslashes($password2);
	$website = stripslashes($website);
	$group_type = stripslashes($group_type);
	$info = stripslashes($info);

	$nickname = strip_tags($nickname);
	$firstname = strip_tags($firstname);
	$country = strip_tags($country);
	$city = strip_tags($city);
	$phone = strip_tags($phone);
	$email = strip_tags($email);
	$password1 = strip_tags($password1);
	$password2 = strip_tags($password2);
	$website = strip_tags($website);
	$group_type = strip_tags($group_type);
	$info = strip_tags($info);

     // Connect to database
     $emailCHecker = mysql_real_escape_string($email);
	 $emailCHecker = eregi_replace("`", "", $emailCHecker);
     // Database duplicate e-mail check setup for use below in the error handling if else conditionals
	 $db = new db_class;
     $sql_email_check = $db->query("SELECT email FROM userlist WHERE email = '$emailCHecker' ");
     $email_check = $db->num_rows($sql_email_check); 

     // Error handling for missing data
     if ((!$nickname) || (!$firstname) || (!$country) || (!$city) || (!$phone) || (!$email) || (!$password1)  || (!$website) || (!$group_type) || (!$info)) { 

     $errorMsg = '������: �� �� ����� ��������� ����������:<br /><br />';
  
     if(!$nickname){ 
       $errorMsg .= ' * ��� ���<br />';
     } 
	 if(!$firstname){ 
       $errorMsg .= ' * ���� ���<br />';
     } 
     if(!$country){ 
       $errorMsg .= ' * ������<br />';
     } 	
	 if(!$city){ 
       $errorMsg .= ' * �����<br />';      
     }
	 if(!$phone){ 
       $errorMsg .= ' * �������<br />';        
     } 
	 if(!$email){ 
       $errorMsg .= ' * Email<br />';        
     } 		
	 if(!$password1){ 
       $errorMsg .= ' * ������<br />';      
     }
	 // if(!$password2){ 
       // $errorMsg .= ' * ������<br />';        
     // } 	
	 if(!$website){ 
       $errorMsg .= ' * ��� ����<br />';      
     }
	 if(!$group_type){ 
       $errorMsg .= ' * ��� ��<br />';        
     } 
	 if(!$info){ 
       $errorMsg .= ' * ���� � ���<br />';        
     }	 
     } 
	 // else if ($password1 != $password2){ 
              // $errorMsg = "<u>������:</u><br />���� ������ �� ���������.<br />";   
     // } 
	 else if ($email_check > 0){ 
              $errorMsg = "<u>������:</u><br />����� email ��� ���������������.���������� ������ �����.<br />"; 	
			  
     } else { // Error handling is ended, process the data and add member to database
     ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	 $nickname = mysql_real_escape_string($nickname);
	 $firstname = mysql_real_escape_string($firstname);
     $country = mysql_real_escape_string($country);
     $city = mysql_real_escape_string($city);
	 $phone = mysql_real_escape_string($phone);
	 $email = mysql_real_escape_string($email);
	 $password1 = mysql_real_escape_string($password1);
	 $password2 = mysql_real_escape_string($password2);
     $website = mysql_real_escape_string($website);
	 $group_type = mysql_real_escape_string($group_type);
     $info = mysql_real_escape_string($info);
	 
	 $nickname = eregi_replace("`", "", $nickname);
	 $firstname = eregi_replace("`", "", $firstname);
	 $country = eregi_replace("`", "", $country);
	 $city = eregi_replace("`", "", $city);
	 $phone = eregi_replace("`", "", $phone);
	 $email = eregi_replace("`", "", $email);
	 $password1 = eregi_replace("`", "", $password1);
	 $password2 = eregi_replace("`", "", $password2);
	 $website = eregi_replace("`", "", $website);
	 $group_type = eregi_replace("`", "", $group_type);
	 $info = eregi_replace("`", "", $info);

     $website = eregi_replace("http://", "", $website);
	 
     // Add MD5 Hash to the password variable
     $password = md5($password1); 

     // Add user info into the database table for the main site table(audiopeeps.com)
	 $sign_up_date=date("Y",time()) ."-".date("m",time()) ."-".date("d",time())."-".date("H",time())."-".date("i",time())."-".date("s",time());
	 
	$sql = $db->query("SELECT * FROM userlist ORDER BY id DESC LIMIT 1 ");		
	$row = $db->get_row($sql);
	
    $user_id = $row["id"] + 1001;
	$user_id = mysql_real_escape_string($user_id);
	$user_id = eregi_replace("`", "", $user_id);
	$last_log_date = $sign_up_date;
	$project_number = 0;
	$name_avatar = "default_pic";
	$bit_delete = 0;
	$ip_user = "0.0.0.0";
	$browser = "no_browser";
	$os = "no_os";
	$email_activated = 0;
	
	 $sql = $db->insert('userlist', array($user_id, $nickname, $firstname, $country, $city, $phone, $email, $password, $sign_up_date, $last_log_date, $website, $group_type, $project_number, $info, $name_avatar, $bit_delete, $ip_user, $browser, $os, $email_activated));  
 
     $id = $db->insert_id();

	 // Create directory(folder) to hold each user's files(pics, MP3s, etc.)		
     mkdir("freelancers/$group_type/$user_id", 0755);	

    //!!!!!!!!!!!!!!!!!!!!!!!!!    Email User the activation link    !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    $to = "$email";
										 
    $from = "admin@yourdomain.com";
    $subject = "���������� �����������";
    //Begin HTML Email Message
    $message = "������ $firstname,

   ����� ���� ���, ��� ���������� �����������.

   ����� �� ������,������������� ����, ��� ��������� ����� ������� ������.

   {$_SERVER['HTTP_HOST']}/Tests/team_cms/activation.php?id=$id&sequence=$password
   ���� ���� ���� �� �������, �� �������� ��� � ������ � ���� ����� Url � ��������.

   ����� ��������� �� ������� ����� � �������, ��������� ������:  
   ����������� �����: $email 
   ������: $password1 ";
   //end of message
	$headers  = "From: $from\r\n";
    $headers .= "Content-type: text\r\n";

    mail($to, $subject, $message, $headers);


     }

  } else { // if the form is not posted with variables, place default empty variables

  	  
		$errorMsg = "��������� ���� ��������� ������� * ";
		$nickname = "";
		$firstname = "";
		$country = "";
		$city = "";
		$phone = "";
		$email = "";
		$password1 = "";
		$password2 = "";
		$website = "";
		$group_type = "";
		$info = "";
       }
 ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>:::�����������::: ����������</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Ajax Contact form using CheckForm2 and NiceForms." />
<meta name="keywords" content="php, contact form, Ajax, mootools, checkform2, niceforms, Moo Floor, class, javascript, spamcheck, badboy.ro" />
<meta name="author" content="Jeremie Tisseau" />

<link rel="stylesheet" href="css/main.css" type="text/css" media="screen" />

<script type="text/javascript" src="js/mootools.js"></script>

<!-- Formcheck2 / Moo.Floor.ch -->
<!-- http://moo.floor.ch/?p=18 -->
<script type="text/javascript" src="js/formcheck.js"></script>
<script type="text/javascript">
	window.addEvent('domready', function(){check = new FormCheck('third', {
		display : {
			fadeDuration : 500,
			errorsLocation : 1,
			indicateErrors : 1,
			showErrors : 1
		}
	})});
</script>

<!-- NiceForms / BadBoy.ro -->
<!-- http://www.badboy.ro/articles/2005-07-23/niceforms_preview/ -->
<script type="text/javascript" src="js/niceforms.js"></script>

</style>

</head>
<body>
<font color="#FF0000"><?php print "$errorMsg"; ?></font>
<?php
if ($sql) {

         	if  (mail($to, $subject, $message, $headers))

	  	//Message sent!
	  	//It the message that will be displayed when the user click the sumbit button
	  	//You can modify the text if you want
      	echo nl2br("
	   	<div class=\"MsgSent\">
			<h1>�����������!!</h1>
			<p>��������� <b><?=$firstname;?></b>,!<br /> �� ������������������ �� ����� www.site.ru.</p>
		</div>
	   ");
	   
       	else

	    // Display error message if the message failed to send
        echo "
	   	<div class=\"MsgError\">
			<h1>������!!</h1>
			<p>�������� <b><?=$firstname;?></b>, �� ����������� ����������. ���������� �����!</p>
		</div>";
		} else {
?>
    <!-- Start HTML form -->
   	<form name="form" method="post" id="third" action="index.php"  class="niceform">
		<h1>:::�����������::: ����������</h1>
        <!-- Nickname -->
		<label for="nickname"><strong><span class="blue">*</span> Nickname : </strong></label>
			<input id="nickname" name="nickname" type="text" class="validate['required','length[3,-1]','nodigit']" value="<?php print "$nickname"; ?>" size="20" />
			
        <!-- Firstname -->
		<label for="firstname"><strong><span class="blue">*</span> ��� : </strong></label>
			<input id="firstname" name="firstname" type="text" class="validate['required','length[3,-1]','nodigit']" value="<?php print "$firstname"; ?>" size="20" />
			
        <!-- Password1 -->
		<label for="password1"><strong><span class="blue">*</span> ������� ������ : </strong></label>
			<input id="password1" name="password1" type="password" class="validate['required','length[6,-1]','digitmin']" size="20" />
			
		<!-- Email -->
		<label for="email"><strong><span class="blue">*</span> Email : </strong></label>
			<input id="email" name="email" type="text" class="validate['required','length[5,-1]','email']" value="<?php print "$email"; ?>" size="20" />
			
		<!-- Country -->
		<label for="country"><strong><span class="blue">*</span> ������ : </strong></label>
		<select name="country" id="country">
            <option value="<?php print "$country"; ?>"> - �������� -</option>
            <option value="������">������</option>
            <option value="���">���</option>
            <option value="������">������</option>
            <option value="������">������</option>
            <option value="������">������</option>
            <option value="�������">�������</option>
            <option value="���������">���������</option>
            <option value="���������">���������</option>
            <option value="�����">�����</option>
            <option value="������">������</option>
            <option value="���������">���������</option>
            <option value="�����">�����</option>
         </select>

		<!-- City -->
		<label for="country"><strong><span class="blue">*</span> ����� : </strong></label>
			<input id="city" name="city" type="text" class="validate['required','nodigit']" value="<?php print "$city"; ?>" size="20" />
				
		<!-- Phone -->
		<label for="phone">������� : </label>
			<input id="phone" name="phone" type="text" class="validate['phone']" value="<?php print "$phone"; ?>" size="20" />
		
		<!-- Website -->
		<label for="site">������� : </label>
			<input id="website" name="website" type="text" class="validate['url']" value="<?php print "$website"; ?>" size="20" />
			
		<!-- Group_type -->
		<label for="group_type"><strong><span class="blue">*</span> ������������� : </strong></label>
		<select name="group_type" id="group_type">
            <option value="<?php print "$group_type"; ?>"> - �������� -</option>
			<option value="b">��������</option>
			<option value="c">�����������</option>
			<option value="d">������</option>
			<option value="e">�����������</option>
			<option value="f">Java-�����������</option>
         </select>

		
		<!-- Info -->
		<label for="info">� ���� : </label>
		<textarea id="info" name="info" type="text" class="validatenodigit']" value="<?php print "$info"; ?>" cols="25" rows="2"/></textarea>

		<!-- Spam Check -->
	    <label for="spamcheck"><span class="blue">*</span> <acronym  title="[ Spam prevention ]"><strong>�� �������?</acronym> : <span class="blue">2 + 3 = ???</span></strong></label>
			<input id="spamcheck" name="spamcheck" type="text" size="5" class="validate['required','number','spamcheck']" />

		<br /><br />
		<input type="submit" class="buttonSubmit" name="buttonSubmit" value="�����������!" />

	    <!-- Niceforms: mouse over effect -->
		<!-- Do not remove the line below -->
		<div id="stylesheetTest"></div>

	</form>
<?php
	}
?>
</body>
</html>