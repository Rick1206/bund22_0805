<?php
define('IN_SK',true);	
require(dirname(__FILE__) . '/includes/init.php');
if( empty($_SESSION['admin_id']) ) {
	echo "<script>top.location.href='login.php';</script>";
	exit();
}
require(dirname(__FILE__) .'/lib/lib_right.php');
if( @!in_array('4',$a_right) ) {
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
$pic_doc = 'history';
$attachdir = "../uploadfiles/".$pic_doc."/";

if(isset($_GET['action'])) {
	$action = $_GET['action'];
} else {
	$action = "";
}
?>
<div class="content fn-clear">
	<?php
	$left_nav = 1;
	require_once('./left_menu2.php');	
	?>
	<div class="main">
<?php
	if($action == "addhistory") {
		if (!isset($param['Submit'])) {
?>
			<p><a href="history.php?action=history">发展历程</a> > 添加发展历程</p>
			<div class="blist">
				<div class="tit">添加发展历程</div>
				<form action="history.php?action=addhistory" method="post" enctype="multipart/form-data" name="form1" id="form1">
				<div class="itm">
					<div class="tabs"></div>
					<table class="tb-02">
						<tbody>
							<tr>
								<td colspan="4" height="10"></td>     
							</tr>
							<tr>
								<td height="40" width="12%">时间:</td>
								<td width="38%"><span class="input01"><input type="text" name="dateline" id="smidate" readOnly="true" ><span class="icn1"></span></span></td>
								<td width="12%">图片:</td>
								<td width="38%"><span class="input01"><input name="photo[]" type="file" /></span> ('gif','jpg','jpeg','png',尺寸:418*250px)</td>
							</tr>
							<tr>
								<td colspan="4" height="10"></td>     
							</tr>
						</tbody>
					</table>
				</div>
				<div class="itm">
					<div style="padding:20px 0;">
						<div class="tabs"><a href="javascript:void(0);">简体中文</a><a href="javascript:void(0);">英文</a><a href="javascript:void(0);">繁体中文</a></div>
						<div class="panes ol">
							<table class="tb-02" style="border-top: none;">
								<tbody>
									<tr>
										<td width="60" height="40" valign="top">标题:</td> 
										<td><textarea name="name_cn" rows="5" style="width:480px;"></textarea></td>    
									</tr>
								</tbody>
							</table>
							<table class="tb-02" style="border-top: none;">
								<tbody>
									<tr>
										<td width="60" height="40" valign="top">标题:</td> 
										<td><textarea name="name_en" rows="5" style="width:480px;"></textarea></td>    
									</tr>
								</tbody>
							</table>
							<table class="tb-02" style="border-top: none;">
								<tbody>
									<tr>
										<td width="60" height="40" valign="top">标题:</td> 
										<td><textarea name="name_gb" rows="5" style="width:480px;"></textarea></td>    
									</tr>
								</tbody>
							</table>
					</div>
					</div>
				</div>
				<p class="pl5"><input type="submit" class="but2" name="Submit" value="保存"></p>
			  </form>
			</div>
			<script type="text/javascript">
			  $(document).ready(function() {
				$("div.tabs").tabs("div.panes > table",{current: 'active',  effect: 'fade'});
				selectCustom({obj:".dropdownlist",objitem:".dropdownlist-item",showitem:".dropdownlist span",set:"#JcSize"});
			  });
			  $(function() {
				$('#smidate').simpleDatepicker({ startdate: 2005, enddate: 2032 });	
				$("select").sSelect();
				imageChoose();
			  });
			</script>
	<?php
		} else {
			
			$pic = "";
			$attachment_s = ($attachments_arg_s = attach_upload(array('gif','jpg','jpeg','png'), 'photo')) ? 1 : 0;
			if($attachment_s){
				$pic = $attachments_arg_s[0]['attachment'];
			}
			
			$back_data = $db->query("INSERT INTO ".$ros->table('history')." (name_en, name_cn, name_gb, photo, dateline) VALUES ('".$param['name_en']."', '".$param['name_cn']."', '".$param['name_gb']."', '".$pic."', '".$param['dateline']."')");
			if($back_data) {
				show_msg('添加成功!','history.php?action=addhistory');  
			} else {
				show_msg('请重试!','history.php?action=addhistory');
			}
		}
	} elseif($action == "history") {
		if (!isset($param['Submit']) && !isset($_GET['edit'])) {
			if(isset($_GET['type_id'])) {
				$type_id = $_GET['type_id'];
			} else {
				$type_id = "";
			}
	?>
			<p>发展历程</p>
			<div class="blist">
				<div class="tit">发展历程列表<s><a href="history.php?action=addhistory">添加发展历程</a></s></div>
				<div class="itm">
				<form id="history_list" name="history_list" method="post" action="history.php?action=history">
				<table class="tb-01">
					<thead>
						<tr>
							<th width="5%">删除</th>
							<th width="75%">标题</th>
							<th width="10%">时间</th>
							<th width="10%">操作</th>
						</tr>
					</thead>
					<tbody>
						<?php
						//$where = empty($type_id) ? "" : " WHERE type_id = '".$type_id."'";
						$all_date_num = page_1::page_all_num('history','');
						//$last_page = intval (($all_date_num - 1) / $page_a) + 1; //获得总页数
						$page = isset($_GET['page']) ? $_GET['page'] : 1 ;
						$page_a = 8;
						$offset = ($page - 1) * $page_a;
						$query = $db->query("SELECT * FROM ".$ros->table('history')." ORDER BY dateline DESC, history_id DESC LIMIT $offset, $page_a");
						while($this_sql = $db->fetch_array($query)) {
						?>
						<tr>
							<td height="50"> <input type="checkbox" name="del_history_a[]" id="del_history_a" value="<?php echo $this_sql['history_id'];?>" /></td>
							<td><?php echo $this_sql['name_cn'] ? $this_sql['name_cn'] : $this_sql['name_en'];?></td>
							<td><?php echo $this_sql['dateline'];?></td>
							<td><a href="history.php?action=history&edit=<?php echo $this_sql['history_id'];?>"><img src="./images/modify.gif" width="16" height="16" border="0" alt="<?php echo $_L['edit'];?>" title="<?php echo $_L['edit'];?>" /></a></td>
						</tr>
						<?php
						}
						?>
					</tbody>
					<tr>
					  <td height="25" class="page" id="page" colspan="4">
					  <?php  echo page::page_num($all_date_num,$page_a,$page,'history.php?action=history');?>
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
				$query = $db->query("SELECT * FROM ".$ros->table('history')." WHERE history_id='".$_GET['edit']."'");
				if($this_sql = $db->fetch_array($query)) {

?>
				<p><a href="history.php?action=history">发展历程</a> > 修改发展历程</p>
				<div class="blist">
					<div class="tit">修改发展历程</div>
					<form id="form1" name="form1" method="post" action="history.php?action=history&edit=<?php echo $_GET['edit'];?>" enctype="multipart/form-data">
					<div class="itm">
						<div class="tabs"></div>
						<table class="tb-02">
							<tbody>
								<tr>
									<td colspan="4" height="10"></td>     
								</tr>
								<tr>
									<td height="40" width="12%">时间:</td>
									<td width="38%"><span class="input01"><input type="text" name="dateline" id="smidate" readOnly="true" value="<?php echo $this_sql['dateline'];?>" ><span class="icn1"></span></span></td>
									<td width="12%">图片:</td>
									<td width="38%"><a href="<?php echo $attachdir.$this_sql['photo'];?>" target="_blank"><?php echo $this_sql['photo'];?></a><br /><span class="input01"><input name="photo[]" type="file" /></span> ('gif','jpg','jpeg','png',尺寸:418*250px)</td>
								</tr>
								<tr>
									<td colspan="4" height="10"></td>     
								</tr>
							</tbody>
						</table>
					</div>
					<div class="itm">
						<div style="padding:20px 0;">
							<div class="tabs"><a href="javascript:void(0);">简体中文</a><a href="javascript:void(0);">英文</a><a href="javascript:void(0);">繁体中文</a></div>
							<div class="panes ol">
							<table class="tb-02" style="border-top: none;">
								<tbody>
									<tr>
										<td width="60" height="40" valign="top">标题:</td> 
										<td><textarea name="name_cn" rows="5" style="width:480px;"><?php echo $this_sql['name_cn'];?></textarea></td>    
									</tr>
								</tbody>
							</table>
							<table class="tb-02" style="border-top: none;">
								<tbody>
									<tr>
										<td width="60" height="40" valign="top">标题:</td> 
										<td><textarea name="name_en" rows="5" style="width:480px;"><?php echo $this_sql['name_en'];?></textarea></td>    
									</tr>
								</tbody>
							</table>
							<table class="tb-02" style="border-top: none;">
								<tbody>
									<tr>
										<td width="60" height="40" valign="top">标题:</td> 
										<td><textarea name="name_gb" rows="5" style="width:480px;"><?php echo $this_sql['name_gb'];?></textarea></td>    
									</tr>
								</tbody>
							</table>
						</div>
						</div>
					</div>
					<p class="pl5"><input type="submit" class="but2" name="editSubmit" value="保存"></p>
					</form>
				</div>
				<script type="text/javascript">
				  $(document).ready(function() {
					$("div.tabs").tabs("div.panes > table",{current: 'active',  effect: 'fade'});
					selectCustom({obj:".dropdownlist",objitem:".dropdownlist-item",showitem:".dropdownlist span",set:"#JcSize"});
				  });
				  $(function() {
					$('#smidate').simpleDatepicker({ startdate: 2005, enddate: 2032 });	
					$("select").sSelect();
					imageChoose();
				  });
				</script>
		<?php
				}
			} else {
				$query = $db->query("SELECT photo FROM ".$ros->table('history')." WHERE history_id='".$_GET['edit']."'");
				$this_sql = $db->fetch_array($query);
				
				$attachment_s = ($attachments_arg_s = attach_upload(array('gif','jpg','jpeg','png'), 'photo')) ? 1 : 0;
				if($attachment_s){
					$pic = $attachments_arg_s[0]['attachment'];
					@unlink($attachdir.$this_sql['photo']);
					$db->query("UPDATE ".$ros->table('history')." SET photo='".$pic."' WHERE history_id='".$_GET['edit']."'");
				}
				
				$back_data = $db->query("UPDATE ".$ros->table('history')." SET name_en='".$param['name_en']."', name_cn='".$param['name_cn']."', name_gb='".$param['name_gb']."', dateline='".$param['dateline']."' WHERE history_id='".$_GET['edit']."'");
				if($back_data) {
					show_msg('修改成功!','history.php?action=history');  
				} else {
					show_msg('请重试!','history.php?action=history');
				}
			}
		} else {
			if(isset($param['del_history_a'])) {
				if( is_array($param['del_history_a'])) {
					foreach($param['del_history_a'] as $k) {
						$query = $db->query("SELECT photo FROM ".$ros->table('history')." WHERE history_id='$k'");
						$this_sql = $db->fetch_array($query);
						@unlink($attachdir.$this_sql['photo']);
						$db->query("DELETE FROM ".$ros->table('history')." WHERE history_id = '$k'");
					}
				}
			}
			
			show_msg('更新成功!','history.php?action=history');
		}
	}
?>
	</div>
</div>
</body>
</html>
