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
$pic_doc = 'dtype';
$attachdir = "../uploadfiles/".$pic_doc."/";

if(isset($_GET['action'])) {
	$action = $_GET['action'];
} else {
	$action = "";
}
?>
<div class="content fn-clear">
	<?php
	$left_nav = 2;
	require_once('./left_menu2.php');	
	?>
	<div class="main">
<?php
	if($action == "adddtype") {
		if (!isset($param['Submit'])) {
?>
			<p><a href="dtype.php?action=dtype">图片下载类型</a> > 添加图片下载类型</p>
			<div class="blist">
				<div class="tit">添加图片下载类型</div>
				<form action="dtype.php?action=adddtype" method="post" enctype="multipart/form-data" name="form1" id="form1">
				<div class="itm">
					<div style="padding:20px 0;">
						<div class="tabs"><a href="javascript:void(0);">简体中文</a><a href="javascript:void(0);">英文</a><a href="javascript:void(0);">繁体中文</a></div>
						<div class="panes ol">
							<table class="tb-02" style="border-top: none;">
								<tbody>
									<tr>
										<td height="40" width="60">标题:</td> 
										<td><span class="input01"><input name="title_cn" type="text" style="width:480px;" /></span></td>    
									</tr>
								</tbody>
							</table>
							<table class="tb-02" style="border-top: none;">
								<tbody>
									<tr>
										<td height="40" width="60">标题:</td> 
										<td><span class="input01"><input name="title_en" type="text" style="width:480px;" /></span></td>
									</tr>
								</tbody>
							</table>
							<table class="tb-02" style="border-top: none;">
								<tbody>
									<tr>
										<td height="40" width="60">标题:</td>
										<td><span class="input01"><input name="title_gb" type="text" style="width:480px;" /></span></td>
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
			
			$back_data = $db->query("INSERT INTO ".$ros->table('dtype')." (title_en, title_cn, title_gb) VALUES ('".$param['title_en']."', '".$param['title_cn']."', '".$param['title_gb']."')");
			if($back_data) {
				show_msg('添加成功!','dtype.php?action=adddtype');  
			} else {
				show_msg('请重试!','dtype.php?action=adddtype');
			}
		}
	} elseif($action == "dtype") {
		if (!isset($param['Submit']) && !isset($_GET['edit'])) {
	?>
			<p>图片下载类型</p>
			<div class="blist">
				<div class="tit">图片下载类型列表<s><a href="dtype.php?action=adddtype">添加图片下载类型</a></s></div>
				<div class="itm">
				<form id="dtype_list" name="dtype_list" method="post" action="dtype.php?action=dtype">
				<table class="tb-01">
					<thead>
						<tr>
							<th width="10%">删除</th>
							<th width="25%">标题(简体中文)</th>
							<th width="25%">标题(英文)</th>
							<th width="25%">标题(繁体中文)</th>
							<th width="15%">操作</th>
						</tr>
					</thead>
					<tbody>
						<?php
						//$where = empty($type_id) ? "" : " WHERE type_id = '".$type_id."'";
						$all_date_num = page_1::page_all_num('dtype','');
						//$last_page = intval (($all_date_num - 1) / $page_a) + 1; //获得总页数
						$page = isset($_GET['page']) ? $_GET['page'] : 1 ;
						$page_a = 8;
						$offset = ($page - 1) * $page_a;
						$query = $db->query("SELECT * FROM ".$ros->table('dtype')." ORDER BY dtype_id LIMIT $offset, $page_a");
						while($this_sql = $db->fetch_array($query)) {
						?>
						<tr>
							<td height="50"> <input type="checkbox" name="del_dtype_a[]" id="del_dtype_a" value="<?php echo $this_sql['dtype_id'];?>" /></td>
							<td><?php echo $this_sql['title_cn'];?></td>
							<td><?php echo $this_sql['title_en'];?></td>
							<td><?php echo $this_sql['title_gb'];?></td>
							<td><a href="dtype.php?action=dtype&edit=<?php echo $this_sql['dtype_id'];?>"><img src="./images/modify.gif" width="16" height="16" border="0" alt="<?php echo $_L['edit'];?>" title="<?php echo $_L['edit'];?>" /></a></td>
						</tr>
						<?php
						}
						?>
					</tbody>
					<tr>
					  <td height="25" class="page" id="page" colspan="5">
					  <?php  echo page::page_num($all_date_num,$page_a,$page,'dtype.php?action=dtype');?>
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
				$query = $db->query("SELECT * FROM ".$ros->table('dtype')." WHERE dtype_id='".$_GET['edit']."'");
				if($this_sql = $db->fetch_array($query)) {

?>
				<p><a href="dtype.php?action=dtype">图片下载类型</a> > 修改图片下载类型</p>
				<div class="blist">
					<div class="tit">修改图片下载类型</div>
					<form id="form1" name="form1" method="post" action="dtype.php?action=dtype&edit=<?php echo $_GET['edit'];?>" enctype="multipart/form-data">
					<div class="itm">
						<div style="padding:20px 0;">
							<div class="tabs"><a href="javascript:void(0);">简体中文</a><a href="javascript:void(0);">英文</a><a href="javascript:void(0);">繁体中文</a></div>
							<div class="panes ol">
							<table class="tb-02" style="border-top: none;">
								<tbody>
									<tr>
										<td height="40" width="60">标题:</td> 
										<td><span class="input01"><input name="title_cn" type="text" style="width:480px;" value="<?php echo $this_sql['title_cn'];?>" /></span></td>    
									</tr>
								</tbody>
							</table>
							<table class="tb-02" style="border-top: none;">
								<tbody>
									<tr>
										<td height="40" width="60">标题:</td> 
										<td><span class="input01"><input name="title_en" type="text" style="width:480px;" value="<?php echo $this_sql['title_en'];?>" /></span></td>
									</tr>
								</tbody>
							</table>
							<table class="tb-02" style="border-top: none;">
								<tbody>
									<tr>
										<td height="40" width="60">标题:</td>
										<td><span class="input01"><input name="title_gb" type="text" style="width:480px;" value="<?php echo $this_sql['title_gb'];?>" /></span></td>
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
				$back_data = $db->query("UPDATE ".$ros->table('dtype')." SET title_en='".$param['title_en']."', title_cn='".$param['title_cn']."', title_gb='".$param['title_gb']."' WHERE dtype_id='".$_GET['edit']."'");
				if($back_data) {
					show_msg('修改成功!','dtype.php?action=dtype');  
				} else {
					show_msg('请重试!','dtype.php?action=dtype');
				}
			}
		} else {
			if(isset($param['del_dtype_a'])) {
				if( is_array($param['del_dtype_a'])) {
					foreach($param['del_dtype_a'] as $k) {
						$db->query("DELETE FROM ".$ros->table('dtype')." WHERE dtype_id = '$k'");
					}
				}
			}
			
			show_msg('更新成功!','dtype.php?action=dtype');
		}
	}
?>
	</div>
</div>
</body>
</html>
