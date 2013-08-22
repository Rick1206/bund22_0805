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
	<?php
	if (isset($param['action']) && $param['action'] == 'change_psw') {
		
		if( empty($param['old_psw']) ) {
			show_msg('请填写旧密码','cgpass.php');
			exit;
		}
		if( empty($param['new_psw']) ) {
			show_msg('请填写新密码','cgpass.php');
			exit;
		}	
		
		if(!empty($param['new_psw'])) {		
			//to get olde password
			$back_old_psw = get_old_psw($_SESSION['admin_id'],$param);
			//ture
			if(!empty($back_old_psw)) {
				// to change new password
				$back_data = change_psw($_SESSION['admin_id'],$param);
				if($back_data) {
					show_msg('修改成功','cgpass.php');
				} else {
					show_msg('请重试','cgpass.php');
				}
			} else {
				show_msg('旧密码错误,请重新出入','cgpass.php');
			}
		}
	} else {
	?>
		<div class="blist">
			<div class="tit">修改密码</div>
			<div class="info">
            <form id="change_psw" name="change_psw" method="post" action="cgpass.php">
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td>&nbsp;</td>
                </tr>
              </table>
              <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0" class="table">
                
                <tr>
                  <td width="20%" height="40" align="right">旧密码：</td>
                  <td width="80%" height="30"><span class="input01">
                  <input type="password" name="old_psw" id="old_psw" /></span></td>
                </tr>
                <tr>
                  <td height="40" align="right">新密码：</td>
                  <td height="30"><span class="input01"><input type="password" name="new_psw" id="new_psw" /></span></td>
                </tr>
                <tr>
                  <td height="40">&nbsp;</td>
                  <td height="30">
                    <input type="submit" name="change_psw" id="change_psw" value="保存"  />
                    <input type="hidden" name="action" value="change_psw" />
                 </td>
                </tr>
              </table>
              </form>
			</div>
		</div>
	<?php
	}
	?>
	</div>
</div>
</body>
</html>
