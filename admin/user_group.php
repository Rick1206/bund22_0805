<?php
define('IN_SK',true);	
require(dirname(__FILE__) . '/includes/init.php');
if( empty($_SESSION['admin_id']) ) {
	echo "<script>top.location.href='login.php';</script>";
	exit();
}
require(dirname(__FILE__) .'/lib/lib_right.php');
if( @!in_array('2',$a_right) ) {
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
$pic_doc = 'user_group';
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
	if($action == "adduser_group") {
		if (!isset($param['Submit'])) {
?>
			<p><a href="user_group.php?action=user_group">用户组管理</a> > 添加用户组信息</p>
			<div class="blist">
				<div class="tit">添加用户组信息</div>
				<form action="user_group.php?action=adduser_group" method="post" enctype="multipart/form-data" name="form1" id="form1">
				<div class="itm">
					<div class="tabs"></div>
					<table class="tb-02">
						<tbody>
							<tr>
								<td colspan="4" height="10"></td>     
							</tr>
							<tr>
								<td height="40" width="17%">用户组名称:</td>
								<td width="83%"><span class="input01"><input name="right_name" type="text" /></span></td>
							</tr>
							<tr>
								<td height="40" width="17%">拥有权限:</td>
								<td width="83%"><table width="98%" border="0" cellpadding="0" cellspacing="0">
									<tr>
									  <td width="18%" height="30" align="right">系统设置：</td>
									  <td width="82%">
										<input type="checkbox" name="right_set[]" id="right_set1" value="1" />用户管理 
										<input type="checkbox" name="right_set[]" id="right_set2" value="2" />用户组管理
									  </td>
									</tr>
									<tr>
									  <td height="30" align="right">模块权限：</td>
									  <td>
									    <!--
										<input type="checkbox" name="right_set[]" id="right_set3" value="3" />
										首页信息
										-->
										<input type="checkbox" name="right_set[]" id="right_set4" value="4" />
										关于保利协鑫
										<input type="checkbox" name="right_set[]" id="right_set5" value="5" />
										产品与服务
										<!--
										<input type="checkbox" name="right_set[]" id="right_set6" value="6" />
										技术研发
										-->
										<input type="checkbox" name="right_set[]" id="right_set7" value="7" />
										投资者关系
										<input type="checkbox" name="right_set[]" id="right_set8" value="8" />
										联系我们
										</td>
									</tr>
								  </table></td>
							</tr>
							<tr>
							  <td height="40">备注：</td>
							  <td><textarea name="desc" rows="8" style="width:480px;"></textarea></td>
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
			if( empty($param['right_name']) ) {
				show_msg('请填写用户组名称','user_group.php?action=adduser_group');
			} else {
				if( isset($param['right_set']) ) {
					if( is_array($param['right_set']) ) {
						//print_r($param['right_set']);
						$right_list = implode(',',$param['right_set']);
						$back_data = create_news_group($param,$right_list,$_SESSION['admin_id']);
						if($back_data==0) {
							show_msg('用户组名称已存在','user_group.php?action=adduser_group');
						} elseif($back_data) {
							show_msg('添加成功','user_group.php?action=user_group');
						} else {
							show_msg('请重试','user_group.php?action=adduser_group');
						}
					} else {
						show_msg('没有选择用户组拥有的权限','user_group.php?action=adduser_group');
					}
				} else {
					show_msg('没有选择用户组拥有的权限','user_group.php?action=adduser_group');
				}
			}
		}
	} elseif($action == "user_group") {
		if (!isset($param['Submit']) && !isset($_GET['edit'])) {
	?>
			<p>用户组管理</p>
			<div class="blist">
				<div class="tit">用户组信息列表<s><a href="user_group.php?action=adduser_group">添加用户组信息</a></s></div>
				<div class="itm">
				<form id="user_group_list" name="user_group_list" method="post" action="user_group.php?action=user_group">
				<table class="tb-01">
					<thead>
						<tr>
							<th width="5%">删除</th>
							<th width="25%">用户组名称</th>
							<th width="60%">备注</th>
							<th width="10%">操作</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$where = '';
						$all_date_num = page_1::page_all_num('user_group',$where);
						$last_page = intval (($all_date_num - 1) / $page_a) + 1; //获得总页数
						$page = isset($_GET['page']) ? $_GET['page'] : 1 ;	
						$offset = ($page - 1) * $page_a;
						$user_list = page_1::page_array('user_group',$where,'',$offset,$page_a);
						foreach($user_list as $k=>$v) {
						?>
						<tr>
							<td height="50"><input type="checkbox" name="del_group_a[]" id="del_group_a" value="<? echo $v['g_id'];?>" /></td>
							<td><?php echo $v['name'];?></td>
							<td><?php echo $v['desc'];?></td>
							<td><a href="user_group.php?action=user_group&edit=<?php echo $v['g_id'];?>"><img src="./images/modify.gif" width="16" height="16" border="0" alt="<?php echo $_L['edit'];?>" title="<?php echo $_L['edit'];?>" /></a></td>
						</tr>
						<?php
						}
						?>
					</tbody>
					<tr>
					  <td height="25" class="page" id="page" colspan="4">
					  <?php  echo page::page_num($all_date_num,$page_a,$page,'user_group.php?action=user_group');?>
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
				$query = $db->query("SELECT * FROM ".$ros->table('user_group')." WHERE g_id='".$_GET['edit']."'");
				if($this_sql = $db->fetch_array($query)) {
				$right_list = get_right_list($_GET['edit'])

?>
				<p><a href="user_group.php?action=user_group">用户组管理</a> > 修改用户组信息</p>
				<div class="blist">
					<div class="tit">修改用户组信息</div>
					<form id="form1" name="form1" method="post" action="user_group.php?action=user_group&edit=<?php echo $_GET['edit'];?>" enctype="multipart/form-data">
					<div class="itm">
						<div class="tabs"></div>
						<table class="tb-02">
							<tbody>
								<tr>
									<td colspan="4" height="10"></td>     
								</tr>
								<tr>
									<td height="40" width="17%">拥有用户:</td>
									<td width="83%">
									<?php
									//get user in group
									$get_group_user = search_group_user($_GET['edit']);
									foreach($get_group_user as $k=>$v ) {
										echo "(".$v['name'].') ';
									} 
								   ?>
								   </td>
								</tr>
								<tr>
									<td height="40" width="17%">用户组名称:</td>
									<td width="83%"><span class="input01"><input name="right_name1" type="text" value="<?php echo $this_sql['name'];?>" /></span><input name="right_name2" type="hidden" value="<?php echo $this_sql['name'];?>" /></td>
								</tr>
								<tr>
									<td height="40" width="17%">拥有权限:</td>
									<td width="83%"><table width="98%" border="0" cellpadding="0" cellspacing="0">
										<tr>
										  <td width="18%" height="30" align="right">系统设置：</td>
										  <td width="82%">
											<input type="checkbox" name="right_set[]" id="right_set1" value="1"<?php echo in_array('1',$right_list) ? " checked=\"checked\"" : "";?> />用户管理 
											<input type="checkbox" name="right_set[]" id="right_set2" value="2"<?php echo in_array('2',$right_list) ? " checked=\"checked\"" : "";?> />用户组管理
										  </td>
										</tr>
										<tr>
										  <td height="30" align="right">模块权限：</td>
										  <td>
											<!--
											<input type="checkbox" name="right_set[]" id="right_set3" value="3"<?php echo in_array('3',$right_list) ? " checked=\"checked\"" : "";?> />首页信息
											-->
											<input type="checkbox" name="right_set[]" id="right_set4" value="4"<?php echo in_array('4',$right_list) ? " checked=\"checked\"" : "";?> />关于保利协鑫
											<input type="checkbox" name="right_set[]" id="right_set5" value="5"<?php echo in_array('5',$right_list) ? " checked=\"checked\"" : "";?> />产品与服务
											<!--
											<input type="checkbox" name="right_set[]" id="right_set6" value="6"<?php echo in_array('6',$right_list) ? " checked=\"checked\"" : "";?> />技术研发
											-->
											<input type="checkbox" name="right_set[]" id="right_set7" value="7"<?php echo in_array('7',$right_list) ? " checked=\"checked\"" : "";?> />投资者关系
											<input type="checkbox" name="right_set[]" id="right_set8" value="8"<?php echo in_array('8',$right_list) ? " checked=\"checked\"" : "";?> />联系我们
											</td>
										</tr>
									  </table></td>
								</tr>
								<tr>
								  <td height="40">备注：</td>
								  <td><textarea name="desc" rows="8" style="width:480px;"><?php echo $this_sql['desc'];?></textarea></td>
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
				if( empty($param['right_name1']) ) {
					show_msg('用户组名不能空','user_group.php?action=user_group&edit='.$_GET['edit']);
				} else {
					//echo $param['right_name1']."<br>".$param['right_name2']."<br>";
					if( @is_array($param['right_set']) ) {
						$right_list = implode(',',$param['right_set']);
						$back_data = modify_group($param,$right_list,$_GET['edit'],$_SESSION['admin_id']);
						if($back_data==0) {
							show_msg('用户组名已存在！','user_group.php?action=user_group&edit='.$_GET['edit']);
						} elseif($back_data) {
							show_msg('修改成功','user_group.php?action=user_group');
						} else {
							show_msg('请重试','user_group.php?action=user_group&edit='.$_GET['edit']);
						}
					} else {
						show_msg('没有分配权限列表','user_group.php?action=user_group&edit='.$_GET['edit']);
					}
				}
			}
		} else {
			if(isset($param['del_group_a'])) {
				if( is_array($param['del_group_a'])) {
					foreach($param['del_group_a'] as $k) {
						$back_data = del_user_group($k);
					}
					if($back_data == 0) {
						show_msg('不能删除，该用户组下存在用户。','user_group.php?action=user_group');
					} elseif($back_data) {
						show_msg('更新成功!','user_group.php?action=user_group');
					} else {
						show_msg('请重试','user_group.php?action=user_group');
					}
					
				}
				
			}
		}
	}
?>
	</div>
</div>
</body>
</html>
