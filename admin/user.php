<?php
define('IN_SK',true);	
require(dirname(__FILE__) . '/includes/init.php');
if( empty($_SESSION['admin_id']) ) {
	echo "<script>top.location.href='login.php';</script>";
	exit();
}
require(dirname(__FILE__) .'/lib/lib_right.php');
if( @!in_array('1',$a_right) ) {
	echo "<script>top.location.href='index.php';</script>";
	exit();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $system_name;?></title>
<link href="css/base2012.css" type="text/css" rel="stylesheet">
<link href="css/common.css" type="text/css" rel="stylesheet">
<link href="css/jquery.cleditor.css" rel="stylesheet" type="text/css" />
<link href="css/jquery.calendar.css" rel="stylesheet" type="text/css" />
<link href="css/jquery.calendar.css" rel="stylesheet" type="text/css" />
<link href="css/jquery.selectStyle.css" rel="stylesheet" type="text/css" />
<link href="css/banneredit.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.cleditor.min.js"></script>
<script type="text/javascript" src="js/fileEveryWhere.js"></script>
<script type="text/javascript" src="js/cal.js"></script>
<script type="text/javascript" src="js/jquery.select.js"></script>
<script type="text/javascript" src="js/jquery.Jcrop.js"></script>
<script type="text/javascript" src="js/Jcrop.customer.js"></script>
<script type="text/javascript" src="js/tabs.js"></script>
<script type="text/javascript" src="js/jquery.lightbox.js"></script>
<script type="text/javascript" src="js/newspic.select.js"></script>
</head>
<body>
<?php
$pic_doc = 'user';
$attachdir = "../uploadfiles/".$pic_doc."/";

if(isset($_GET['action'])) {
	$action = $_GET['action'];
} else {
	$action = "";
}
?>
<div class="content fn-clear">
	<?php
	require_once('./left_menu.php');	
	?>
	<div class="main">
<?php
	if($action == "adduser") {
		if (!isset($param['Submit'])) {
?>
			<p><a href="user.php?action=user">用户管理</a> > 添加用户信息</p>
			<div class="blist">
				<div class="tit">添加用户信息</div>
				<form action="user.php?action=adduser" method="post" enctype="multipart/form-data" name="form1" id="form1">
				<div class="itm">
					<div class="tabs"></div>
					<table class="tb-02">
						<tbody>
							<tr>
								<td colspan="4" height="10"></td>     
							</tr>
							<tr>
								<td height="40" width="12%">用户组:</td>
								<td width="38%"><select name="type_id">
								  <?php
								  $query_type = $db->query("SELECT g_id, name FROM ".$ros->table('user_group')." ORDER BY g_id");
								  while($this_type = $db->fetch_array($query_type)) {
								  ?>
								  <option value="<?php echo $this_type['g_id'];?>"><?php echo $this_type['name'];?></option>
								  <?php
								  }
								  ?>
								</select></td>
								<td width="12%">用户名:</td>
								<td width="38%"><span class="input01"><input name="name" type="text" /></span></td>
							</tr>
							<tr>
								<td height="40" width="12%">用户密码:</td>
								<td width="38%"><span class="input01"><input name="psw" type="password" /></span></td>
								<td width="12%">备注:</td>
								<td width="38%"><span class="input01"><input name="note" type="text" /></span></td>
							</tr>
							<tr>
								<td colspan="4" height="10"></td>     
							</tr>
						</tbody>
					</table>
				</div>
				<p class="pl5"><input type="submit" class="but2" name="Submit" value="保存"></p>
			  </form>
			</div>
			<script type="text/javascript">
			  $(function() {
				$('#smidate').simpleDatepicker({ startdate: 2005, enddate: 2032 });	
				$("select").sSelect();
				imageChoose();
			  });
			</script>
	<?php
		} else {
			
			$back_data = $db->query("INSERT INTO ".$ros->table('admin')." (name, psw, user_group, note) VALUES ('".$param['name']."', '".$param['psw']."', '".$param['type_id']."', '".$param['note']."')");
			if($back_data) {
				show_msg('添加成功!','user.php?action=adduser');  
			} else {
				show_msg('请重试!','user.php?action=adduser');
			}
		}
	} elseif($action == "user") {
		if (!isset($param['Submit']) && !isset($_GET['edit'])) {
			if(isset($_GET['type_id'])) {
				$type_id = $_GET['type_id'];
			} else {
				$type_id = "";
			}
	?>
			<p>用户管理</p>
			<div class="blist">
				<div class="tit">用户信息列表<s><a href="user.php?action=adduser">添加用户信息</a></s></div>
				<div class="itm">
				<form id="form1" name="form1" method="get" action="user.php">
				<input name="action" type="hidden" value="user" />
				<p style="padding:5px 0;text-align:right;"><span class="txt">用户组:</span>
				<span>
				<select name="type_id">
				  <option value="">所有</option>
				  <?php
				  $query_type = $db->query("SELECT g_id, name FROM ".$ros->table('user_group')." ORDER BY g_id");
				  while($this_type = $db->fetch_array($query_type)) {
				  ?>
				  <option value="<?php echo $this_type['g_id'];?>"<?php echo $type_id==$this_type['g_id'] ? " selected=\"selected\"" : "";?>><?php echo $this_type['name'];?></option>
				  <?php
				  }
				  ?>
				</select></span>
				<span class="input02"><label><input type="submit" value=""></label></span></p>
				</form>
				<form id="user_list" name="user_list" method="post" action="user.php?action=user">
				<table class="tb-01">
					<thead>
						<tr>
							<th width="10%">删除</th>
							<th width="30%">用户名</th>
							<th width="25%">用户组</th>
							<th width="25%">备注</th>
							<th width="10%">操作</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$where = empty($type_id) ? "" : " WHERE user_group = '".$type_id."'";
						$all_date_num = page_1::page_all_num('admin',$where);
						//$last_page = intval (($all_date_num - 1) / $page_a) + 1; //获得总页数
						$page = isset($_GET['page']) ? $_GET['page'] : 1 ;
						$page_a = 8;
						$offset = ($page - 1) * $page_a;
						$user_list = page_1::page_array('admin',$where,' ORDER BY user_group, admin_id',$offset,$page_a);
						foreach($user_list as $k=>$v) {
						if($v['admin_id']!=1) {
						?>
						<tr>
						  <td height="50"><input type="checkbox" name="del_user_a[]" id="del_user_a" value="<?php echo $v['admin_id'];?>" /></td>
						  <td><?php echo $v['name'];?></td>
						  <td><?php echo get_user_group($v['user_group']);?></td>
						  <td><?php echo $v['note'];?>&nbsp;</td>
						  <td><a href="user.php?action=user&edit=<?php echo $v['admin_id'];?>"><img src="./images/modify.gif" width="16" height="16" border="0" alt="<?php echo $_L['edit'];?>" title="<?php echo $_L['edit'];?>" /></a></td>
						</tr>
						<?php
						}
						}
						?>
					</tbody>
					<tr>
					  <td height="25" class="page" id="page" colspan="5">
					  <?php  echo page::page_num($all_date_num,$page_a,$page,'user.php?action=user');?>
					  </td>
					</tr>
				</table>
				<p style="padding-top:10px;"><input type="submit" class="but2" name="Submit" value="更新"><input type="button" name="rfd" value="刷新" class="but2" onclick="window.location.reload();"></p>
				</form>
				</div>
			</div>
<?php
		} elseif(isset($_GET['edit'])) {
			if (!isset($param['editSubmit'])) {
				$query = $db->query("SELECT * FROM ".$ros->table('admin')." WHERE admin_id='".$_GET['edit']."'");
				if($this_sql = $db->fetch_array($query)) {

?>
				<p><a href="user.php?action=user">用户管理</a> > 修改用户信息</p>
				<div class="blist">
					<div class="tit">修改用户信息</div>
					<form id="form1" name="form1" method="post" action="user.php?action=user&edit=<?php echo $_GET['edit'];?>" enctype="multipart/form-data">
					<div class="itm">
						<div class="tabs"></div>
						<table class="tb-02">
							<tbody>
								<tr>
									<td colspan="4" height="10"></td>     
								</tr>
							<tr>
								<td height="40" width="12%">用户组:</td>
								<td width="38%"><select name="user_group_id">
								  <?php
								  $query_type = $db->query("SELECT g_id, name FROM ".$ros->table('user_group')." ORDER BY g_id");
								  while($this_type = $db->fetch_array($query_type)) {
								  ?>
								  <option value="<?php echo $this_type['g_id'];?>"<?php echo $this_sql['user_group']==$this_type['g_id'] ? " selected=\"selected\"" : "";?>><?php echo $this_type['name'];?></option>
								  <?php
								  }
								  ?>
								</select></td>
								<td width="12%">用户名:</td>
								<td width="38%"><span class="input01"><input name="user_name" type="text" value="<?php echo $this_sql['name'];?>" disabled="disabled" /></span></td>
							</tr>
							<tr>
								<td height="40" width="12%">新密码:</td>
								<td width="38%"><span class="input01"><input name="new_psw" type="password" /></span><input type="hidden" name="user_psw" value="<?php echo $user_password;?>" /></td>
								<td width="12%">备注:</td>
								<td width="38%"><span class="input01"><input name="user_note_s" type="text" value="<?php echo $this_sql['note'];?>" /></span></td>
							</tr>
								<tr>
									<td colspan="4" height="10"></td>     
								</tr>
							</tbody>
						</table>
					</div>
					<p class="pl5"><input type="submit" class="but2" name="editSubmit" value="保存"></p>
					</form>
				</div>
				<script type="text/javascript">
				  $(function() {
					$('#smidate').simpleDatepicker({ startdate: 2005, enddate: 2032 });	
					$("select").sSelect();
					imageChoose();
				  });
				</script>
		<?php
				}
			} else {
				$back_data = change_psw($_GET['edit'],$param);
				if($back_data) {
					show_msg('修改成功!','user.php?action=user');  
				} else {
					show_msg('请重试!','user.php?action=user');
				}
			}
		} else {
			if(isset($param['del_user_a'])) {
				if( is_array($param['del_user_a'])) {
					foreach($param['del_user_a'] as $k) {
						$db->query("DELETE FROM ".$ros->table('admin')." WHERE admin_id = '$k'");
					}
				}
			}
			
			show_msg('更新成功!','user.php?action=user');
		}
	}
?>
	</div>
</div>
</body>
</html>
