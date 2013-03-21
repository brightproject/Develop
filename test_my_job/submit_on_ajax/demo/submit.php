<?php header("Content-Type: text/html; charset=cp1251"); ?>
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
     if ((!$nickname) || (!$firstname) || (!$country) || (!$city) || (!$phone) || (!$email) || (!$password1) || (!$password2) || (!$website) || (!$group_type) || (!$info)) { 

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
	 if(!$password2){ 
       $errorMsg .= ' * ������<br />';        
     } 	
	 if(!$website){ 
       $errorMsg .= ' * ��� ����<br />';      
     }
	 if(!$group_type){ 
       $errorMsg .= ' * ��� ��<br />';        
     } 
	 if(!$info){ 
       $errorMsg .= ' * ���� � ���<br />';        
     }	 
     } else if ($password1 != $password2){ 
              $errorMsg = "<u>������:</u><br />���� ������ �� ���������.<br />";   
     } else if ($email_check > 0){ 
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
	
   $msgToUser = "<h2>����������� ��� �����������</h2><h4>$firstname ������� ����� � ���� ������� ����� ���������:</h4><br />
   ������ ��������� ���� ���������� �� ��� email.<br /><br />
   <br />
   <strong><font color=\"#990000\">�����:</font></strong> 
   ��� ��� ���.<br /><br />
   ";


   include_once 'msgToUser.php'; 

   exit();

   } // Close else after duplication checks

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