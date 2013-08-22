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
<script type="text/javascript" src="js/jquery.min.js"></script>
<link href="css/base2012.css" type="text/css" rel="stylesheet">
<link href="css/common.css" type="text/css" rel="stylesheet">
</head>
<body>
<div class="content fn-clear">
	<?php
	require_once('./left_menu.php');	
	?>
	<div class="main">
		<div class="blist">
			<div class="tit">系统信息</div>
			<div class="info">
    	<table width="98%"  border="0" align="center" cellpadding="0" cellspacing="0" class="table">
          <tr>
            <td width="4" height="25"  class="m_t_c">&nbsp;</td>
            <td colspan="2"  class="m_t_c">系统配置信息</td>
          </tr>
          <tr>
            <td height="25"></td>
            <td width="87" height="30" align="right">服务器环境：</td>
            <td width="384"><?php echo $serverinfo;?></td>
          </tr>
          <tr>
            <td height="25">&nbsp;</td>
            <td height="30" align="right">数据库版本：</td>
            <td height="25"><?php echo $dbversion;?></td>
          </tr>
          <tr>
            <td height="25">&nbsp;</td>
            <td height="30" align="right">允许上传数：</td>
            <td height="25"><?php echo $fileupload; ?></td>
          </tr>
          <tr>
            <td height="25">&nbsp;</td>
            <td height="30" align="right">数据库使用：</td>
            <td height="25"><?php echo $dbsize; ?></td>
          </tr>
        </table>
			</div>
		</div>
	</div>
</div>
</body>
</html>
