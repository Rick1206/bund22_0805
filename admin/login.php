<?php
//user login backend

define('IN_SK',true);
	
require(dirname(__FILE__) . '/includes/init.php');	
//echo dirname(__FILE__) . '/includes/init.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $system_name;?></title>
<link href="css/base2012.css" type="text/css" rel="stylesheet">
<link href="css/login.css" type="text/css" rel="stylesheet">
<script>

 function check_login()
 {
 	f = document;
	
	if(f.getElementById('user').value == '')
	{
		alert('用户名不能为空');
		f.getElementById('user').focus();
		return false;
	}
	else if(f.getElementById('psw').value == '')
	{
		alert('密码不能为空');
		f.getElementById('psw').focus();
		return false;
	}
	else
	{
		return true;
	}
 
 }
</script>
</head>

<body>
<div class="header">
	<div class="wrap">
		<div class="logo1" style="padding-top:17px;"><a href="../"><img src="../images/logo.png" alt=""></a></div>
	</div>
</div>
<div class="content">
	<h1>后台登录系统</h1>
	<div class="loginbox">
		<form id="form1" name="form1" method="post" action="login.php">
		<ul>
			<li><label><span class="txt">用户:</span><span class="input01"><input name="user" type="text" id="user" /></span></label></li>
			<li><label><span class="txt">密码:</span><span class="input01"><input name="psw" type="password" id="psw" /></span></label></li>
			<li><input type="submit" name="Submit" class="but" value="登录" onclick="return check_login();" /></li>
		</ul>
		</form>
		<div class="img"></div>
	</div>
</div>
<div class="footer">
	<div class="wrap">
		<p><?php echo $system_right;?></p>
	</div>
</div>
<?php
//get user psw to select admin
$user = isset($_POST['user']) ? $_POST['user'] : '';
$psw = isset($_POST['psw']) ? $_POST['psw'] : '';

			
if(!empty($user) & !empty($psw)) {
	$psw =  md5($psw);
	$back_data	= login_backend($user,$psw);
	if(empty($back_data)) {
?>
<script>
alert("登录失败！");
</script>
<?php
	} else {	
		$_SESSION['admin_name'] = $user;
		$_SESSION['admin_id'] = $back_data;
		
		header('Location: index.php');
		exit;
	}
}
?>
</body>
</html>
