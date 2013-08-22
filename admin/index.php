<?php
define('IN_SK',true);	
require(dirname(__FILE__) . '/includes/init.php');
if( empty($_SESSION['admin_id']) ) {
	header('Location: login.php');
	exit();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $system_name;?></title>
</head>

<frameset rows="141,*,43" frameborder="no" border="0" framespacing="0">
  <frame src="top.php" name="topFrame" scrolling="No" noresize="noresize" id="topFrame" />
  <frame src="main.php" name="mainFrame" id="mainFrame" />
  <frame src="footer.php" name="bottomFrame" scrolling="No" noresize="noresize" id="bottomFrame" />
</frameset><noframes></noframes>
</html>
