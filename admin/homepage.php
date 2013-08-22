<?php
define('IN_SK',true);	
require(dirname(__FILE__) . '/includes/init.php');
if( empty($_SESSION['admin_id']) ) {
	echo "<script>top.location.href='login.php';</script>";
	exit();
}
require(dirname(__FILE__) .'/lib/lib_right.php');
if( @!in_array('5',$a_right) ) {
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
$home_doc = 'banner';
$attachdir = "../uploadfiles/".$home_doc."/";

if(isset($_GET['action'])) {
	$action = $_GET['action'];
} else {
	$action = "banner";
}
?>
<div class="content fn-clear">
<?php
	$left_nav = 1;
	require_once('./left_menu_home.php');	
	?>
	<div class="main">
<?php
	if($action == "addbanner") {
		if (!isset($param['Submit'])) {
?>
			<p><a href="homepage.php?action=banner">首页信息</a>> 添加Banner</p>
			<div class="blist">
				<div class="tit">添加Banner</div>
				<form action="homepage.php?action=addbanner" method="post" enctype="multipart/form-data" name="form1" id="form1">
				<div class="itm">
					<div class="tabs"></div>
					<table class="tb-02">
						<tbody>
							<tr>
								<td colspan="4" height="10"></td>     
							</tr>
							<tr>
								<td width="12%">Banner图片:</td>
								<td width="38%"><span class="input01"><input name="photo[]" type="file" /></span> ('gif','jpg','jpeg','png',尺寸:1052*459px)</td>
							</tr>
							
							<tr>
								<td colspan="4" height="10"></td>     
							</tr>
						</tbody>
					</table>
				</div>
				<div class="itm">
					<div style="padding:20px 0;">
						<div class="tabs"><a href="javascript:void(0);">简体中文</a><a href="javascript:void(0);">英文</a></div>
						<div class="panes ol">
							<table class="tb-02" style="border-top: none;">
								<tbody>
									<tr>
										<td height="40" width="60">Banner名称:</td> 
										<td><span class="input01"><input name="name_cn" type="text" style="width:480px;" /></span></td>    
									</tr>
									<tr>
										<td height="40" width="60">简要介绍:</td> 
										<td><span class="input01"><input name="detail_cn" type="text" style="width:480px;" /></span></td>    
									</tr>
									
								</tbody>
							</table>
							<table class="tb-02" style="border-top: none;">
								<tbody>
									<tr>
										<td height="40" width="60">Banner名称:</td> 
										<td><span class="input01"><input name="name_en" type="text" style="width:480px;" /></span></td>
									</tr>
									<tr>
										<td height="40" width="60">简要介绍:</td>
										<td><span class="input01"><input name="detail_en" type="text" style="width:480px;" /></span></td>
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
			$back_data = $db->query("INSERT INTO ".$ros->table('banners')." (title_en, title_cn, photo, orderby) VALUES ('".$param['name_en']."', '".$param['name_cn']."', '".$pic."', '".$param['orderby']."')");

			if($back_data) {
				show_msg('添加成功!','homepage.php?action=addbanner');  
			} else {
				show_msg('请重试!','homepage.php?action=addbanner');
			}
		}
	} elseif($action == "banner") {
		if (!isset($param['Submit']) && !isset($_GET['edit'])) {
			if(isset($_GET['type_id'])) {
				$type_id = $_GET['type_id'];
			} else {
				$type_id = "";
			}
	?>
			<p>首页管理</p>
			<div class="blist">
				<div class="tit">Banner列表<s></s></div>
				<div class="itm">
				<!-- content -->
				<form id="banner_list" name="banner_list" method="post" action="homepage.php?action=banner">
				<table class="tb-01">
					<thead>
						<tr>
							<th width="10%">Banner Id</th>
							<th width="30%">Banner名称</th>
							<th width="40%">Banner介绍</th>
							<th width="10%"></th>
							<th width="10%">操作</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$where = empty($type_id) ? "" : " WHERE type_id = '".$type_id."'";
						$all_date_num = page_1::page_all_num('banners',$where);
						$page = isset($_GET['page']) ? $_GET['page'] : 1 ;
						$page_a = 8;
						$offset = ($page - 1) * $page_a;
						$query = $db->query("SELECT * FROM ".$ros->table('banners').$where." ORDER BY orderby, banner_id LIMIT $offset, $page_a");
						while($this_sql = $db->fetch_array($query)) {
						?>
						<tr>
							<td><?php echo $this_sql['banner_id']; ?></td>
							<td><?php echo $this_sql['title_cn'] ? $this_sql['title_cn'] : $this_sql['title_en'];?></td>
							<td><?php echo $this_sql['intro_en'];?>
							<td></td>
							<td><a href="homepage.php?action=banner&edit=<?php echo $this_sql['banner_id'];?>"><img src="./images/modify.gif" width="16" height="16" border="0" alt="<?php echo $_L['edit'];?>" title="<?php echo $_L['edit'];?>" /></a></td>
						</tr>
						<?php
						}
						?>
					</tbody>
					<tr>
					  <td height="25" class="page" id="page" colspan="6">
					  <?php  echo page::page_num($all_date_num,$page_a,$page,'homepage.php?action=banner&type_id='.$type_id);?>
					  </td>
					</tr>
				</table>
				<p style="padding-top:10px;"><input type="button" name="rfd" value="刷新" class="but2" onclick="window.location.reload();"></p>
				</form>
				</div>
			</div>
	<?php
		} elseif(isset($_GET['edit'])) {
			if (!isset($param['editSubmit'])) {
				$query = $db->query("SELECT * FROM ".$ros->table('banners')." WHERE banner_id='".$_GET['edit']."'");
				if($this_sql = $db->fetch_array($query)) {

	?>
				<p><a href="homepage.php?action=banner">产品信息</a> 修改banner</p>
				<div class="blist">
					<div class="tit">修改Banner</div>
					<form id="form1" name="form1" method="post" action="homepage.php?action=banner&edit=<?php echo $_GET['edit'];?>" enctype="multipart/form-data">
					<div class="itm">
						<div class="tabs"></div>
						<table class="tb-02">
							<tbody>
								<tr>
									<td colspan="4" height="10"></td>     
								</tr>
									<td width="12%">Banner图片:</td>
									<td width="38%"><a href="<?php echo $attachdir.$this_sql['photo'];?>" target="_blank"><?php echo $this_sql['photo'];?></a><br /><span class="input01"><input name="photo[]" type="file" /></span> ('gif','jpg','jpeg','png',尺寸:1052*459px)</td>
								</tr>
								
								<tr>
									<td colspan="4" height="10"></td>     
								</tr>
							</tbody>
						</table>
					</div>
					<div class="itm">
						<div style="padding:20px 0;">
							<div class="tabs"><a href="javascript:void(0);">简体中文</a><a href="javascript:void(0);">英文</a></div>
							<div class="panes ol">
							<table class="tb-02" style="border-top: none;">
								<tbody>
									<tr>
										<td height="40" width="60">简要介绍:</td> 
										<td><span class="input01"><input name="detail_cn" type="text" style="width:480px;" value="<?php echo $this_sql['intro_cn']; ?>" /></span></td>    
									</tr>
								</tbody>
							</table>
							<table class="tb-02" style="border-top: none;">
								<tbody>
									<tr>
										<td height="40" width="60">简要介绍:</td>
										<td><span class="input01"><input name="detail_en" type="text" style="width:480px;" value="<?php echo $this_sql['intro_en']; ?>" /></span></td>
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
				$query = $db->query("SELECT photo FROM ".$ros->table('banners')." WHERE banner_id='".$_GET['edit']."'");
				$this_sql = $db->fetch_array($query);
				
				$attachment_s = ($attachments_arg_s = attach_upload(array('gif','jpg','jpeg','png'), 'photo')) ? 1 : 0;
				if($attachment_s){
					$pic = $attachments_arg_s[0]['attachment'];
					@unlink($attachdir.$this_sql['photo']);
					$db->query("UPDATE ".$ros->table('banners')." SET photo='".$pic."' WHERE banner_id='".$_GET['edit']."'");
				}
				
				$back_data = $db->query("UPDATE ".$ros->table('banners')." SET intro_en='".$param['detail_en']."', intro_cn='".
				$param['detail_cn']."' WHERE banner_id='".$_GET['edit']."'");
				
				if($back_data) {
					show_msg('修改成功!','homepage.php?action=banner');  
				} else {
					show_msg('请重试!','homepage.php?action=banner');
				}
			}
		} else {
			
			if(isset($param['cg_banner_a'])) {
				if( is_array($param['cg_banner_a'])) {
					foreach($param['cg_banner_a'] as $key => $value) {
						$query_order = $db->query("SELECT banner_id FROM ".$ros->table('banners')." WHERE banner_id='".$key."' AND orderby='".$value."' LIMIT 0, 1");
						if (!$this_order = $db->fetch_array($query_order)) {
							$db->query("UPDATE ".$ros->table('banners')." SET orderby = '".$value."' WHERE banner_id = '".$key."'");
						}
					}
				}
			}

			show_msg('更新成功!','homepage.php?action=banner');
		}
	}
?>
	</div>
</div>
</div>

</body>
</html>


