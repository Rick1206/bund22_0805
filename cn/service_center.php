<?php
define('IN_SK',true);

require_once('../includes/init.php');
require_once('../phpmailer/class.phpmailer.php');

if($_POST["funtype"] != ""){	
	$funType = $_POST["funtype"];
}else{
	die( "{\"error\":1,\"data\":{\"message\":\"数据不完整\"}}" );
}

switch($funType){
	case "login":
	$pass = md5(addslashes($_POST["password"]));
	$name = addslashes($_POST["username"]);
	$query  = $db->query("SELECT customer_id, password, email , first_name , last_name  FROM ".$ros->table('customers')." WHERE email = '".$name."' AND password = '".$pass."' LIMIT 1");
	if ($thisB = $db->fetch_array($query)) {
		session_start();
		$_SESSION['userId'] = $thisB['customer_id'];
		$_SESSION['userName'] = $thisB['first_name'];
		echo "{\"error\":0,\"data\":{\"success\":1,\"username\":\"".$thisB['first_name']."\"}}";
	}else{
		echo "{\"error\":1,\"data\":{\"message\":\"登陆失败\"}}";
	}
	break;
	case "register":
		
		$email = addslashes($_POST["username"]);
		$query  = $db->query("select count(*) as totalrow from ".$ros->table('customers')." where email='".$email."'");
		$thisB = $db->fetch_array($query);
		
		if($thisB['totalrow']>=1){
			echo "Exist";
		}else{
			
		$pass = md5(addslashes($_POST["password"]));
		$name = addslashes($_POST['firstname']);
		$query = $db->query("INSERT INTO ".$ros->table('customers').
		" (email, password, first_name, last_name, country, city, address, phone, mobile) VALUES ('"
		.param("username")."', '".$pass."', '".$name."', '".param("lastname")."', '".param("country")."', '"
		.param("city")."', '".param("adress")."', '".param("phone")."', '".param("mobile")."')");
		
		if($query){
			session_start();
			$_SESSION['userId'] = mysql_insert_id();
			$_SESSION['userName'] = $name; 
			echo "{\"error\":0,\"data\":{\"success\":1,\"username\":\"".$name."\"}}";
		}else{
			echo "{\"error\":1,\"data\":{\"message\":\"注册失败\"}}";
		}
		
		}
	break;
	case "email":
		$email = addslashes($_POST["username"]);
		$query  = $db->query("select count(*) as totalrow from ".$ros->table('customers')." where email='".$email."'");
		$thisB = $db->fetch_array($query);
		
		if($thisB['totalrow']>=1){
			echo "Exist";
		}else{
			echo "Right";
		}
		
	break;
	case "reservation":
		
	 	$emaiBody = "Company name: ".$_POST['secompanyName']."<br />"
		."Email: ".$_POST['email']."<br />"
		."Event: ".$_POST['event']."<br />"
		."Menber: ".$_POST['menber']."<br />"
		."Name: ".$_POST['name']."<br />"	
		."Date: ".$_POST['date']."<br />"
		."Time: ".$_POST['time']."<br />"
		."PartySize: ".$_POST['partySize']."<br />"	
		."Telelphone: ".$_POST['tel']."<br />"	
		."Smoking: ".$_POST['smoking']."<br />"
		."Service: ".$_POST['service']."<br />"
		."Notes: ".$_POST['notes']."<br />"	
		."WidthChildren:".$_POST['widthChildren'];	
		
		echo sendEmail($emaiBody,"contact@bund22.com");
		
	break;
	
	case "forgotpd":
		
		$email = param("email");
		
		$query  = $db->query("select customer_id,email,password from ".$ros->table('customers')." where email='".$email."'");
		
		if($thisB = $db->fetch_array($query)){
			
			$newPass = create_password();
			
			$db->query("UPDATE ".$ros->table('customers')." SET password='".md5($newPass)."' WHERE email ='".$email."'");
			
			$emaiBody = "Password(密码)：".$newPass;
			
			echo sendEmail($emaiBody,$email);
		}else{
			echo "{\"error\":1,\"data\":{\"message\":\"用户不存在\"}}";
		}
		break;
}

function param($str){
	$info = addslashes($_POST[$str]);
	return $info;
}

function sendEmail($userEmail,$userAddress){
	
	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->SetLanguage('zh_cn','phpmailer/language/');
    $mail->CharSet 		 = "utf-8"; 
    $mail->Encoding		 = "base64";
	$mail->SMTPSecure 	 = "ssl";
	$mail->SMTPAuth      = true;                  
	$mail->SMTPKeepAlive = true;                  
	$mail->Host          = "box841.bluehost.com";
			  
	$mail->Port          = 465;                    
	$mail->Username      = "contact@bund22.com";    
	$mail->Password      = "P@ss1234";            
	
	$mail->SetFrom('events@bund22.com', 'Bund22Email');
	$mail->Subject       = "Bund22Service";
	$body = preg_replace("/[\/]/",'',$userEmail);
	$mail->MsgHTML($body);
	$address = $userAddress;
	$mail->AddAddress($address, "");
	
	if($mail->Send()) {
	  return "Ok";
	} else {
	  return "Wrong";
	}
	
}


function create_password($pw_length = 8 ){
	$randpwd ='';
	for ($i = 0; $i < $pw_length; $i++){
		$randpwd .= chr(mt_rand(33, 126));
	}
	return $randpwd;
}

?>