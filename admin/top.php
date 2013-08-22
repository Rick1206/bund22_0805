<?php
define('IN_SK',true);	
require(dirname(__FILE__) . '/includes/init.php');
if( empty($_SESSION['admin_id']) ) {
	echo "<script>top.location.href='login.php';</script>";
	exit();
}
require(dirname(__FILE__) .'/lib/lib_right.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $system_name;?></title>
<link href="css/base2012.css" type="text/css" rel="stylesheet">
<link href="css/login.css" type="text/css" rel="stylesheet">
</head>

<body>
	<div class="header">
		<div class="wrap">
			<div class="logo2" style="padding-top:17px;">
			  <a href="../" target="_top"><img src="../images/logo.png" alt=""></a>
			  <p class="user">您好, <?php echo $_SESSION['admin_name'];?> <a href="login_out.php" target="_top">登出 ></a><a href="../" target="_blank">前台 ></a></p>
			</div>
			<ul class="nav">
				<li><a href="main.php" target="mainFrame">System</a></li>
				<?php
				if( @in_array('3',$a_right)) {
				?>
				<li><a href="homepage.php" target="mainFrame">Homepage</a></li>
				<?php
				}
				if( @in_array('4',$a_right)) {
				?>
				<li><a href="gallery.php?action=gallery" target="mainFrame">Gallery</a></li>
				<?php
				}
				if( @in_array('5',$a_right)) {
				?>
				<li><a href="discover.php?action=discover" target="mainFrame">Discover</a></li>
				<?php
				}
				if( @in_array('6',$a_right)) {
				?>
				<li><a href="enticement.php?action=enticement" target="mainFrame">Enticements</a></li>
				<?php
				}
				if( @in_array('7',$a_right)) {
				?>
				<li><a href="press.php?action=press" target="mainFrame">Press</a></li>
				<?php
				}
				if( @in_array('8',$a_right)) {
				?>
				<li><a href="customer.php?action=customer" target="mainFrame">Customers</a></li>
				<?php
				}
				if( @in_array('9',$a_right)) {
				?>
				<li><a href="seo.php?action=seo" target="mainFrame">Seo</a></li>
				<?php
				}
				?>
			</ul>
		</div>
	</div>
</body>
</html>