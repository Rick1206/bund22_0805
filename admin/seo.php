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
$pic_doc = 'seo';
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
	require_once('./left_menu_seo.php');	
	?>
	<div class="main">
<?php
	if($action == "seo") {
		if (!isset($param['Submit']) && !isset($_GET['edit'])) {
	?>
			<p>SEO信息</p>
			<div class="blist">
				<div class="tit">SEO信息列表</div>
				<div class="itm">
				<form id="seo_list" name="seo_list" method="post" action="seo.php?action=seo">
				<table class="tb-01">
					<thead>
						<tr>
							<th width="5%">删除</th>
							<th width="10%">PageName</th>
							<th width="25%">Title</th>
							<th width="20%">keywords</th>
							<th width="30%">Description</th>
							<th width="10%">操作</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$join = "";
						$where = "";
						$all_date_num = page_1::page_all_num('seo',$join.$where);
						$page = isset($_GET['page']) ? $_GET['page'] : 1 ;
						$page_a = 8;
						$offset = ($page - 1) * $page_a;
						$param = "*";
						$query = $db->query("SELECT ".$param." FROM ".$ros->table('seo').$join.$where." ORDER BY page_id LIMIT $offset, $page_a");
						while($this_sql = $db->fetch_array($query)) {
						?>
						<tr>
							<td height="50"> <input type="checkbox" name="del_seo_a[]" id="del_seo_a" value="<?php echo $this_sql['page_id'];?>" /></td>
							<td><?php echo $this_sql['pname'];?></td>
							<td><?php echo $this_sql['ptitle'];?></td>
							<td><?php echo $this_sql['pkeyword_cn'];?></td>
							<td><?php echo $this_sql['pdescription_cn'];?></td>
							<td><a href="seo.php?action=seo&edit=<?php echo $this_sql['page_id'];?>"><img src="./images/modify.gif" width="16" height="16" border="0" alt="<?php echo $_L['edit'];?>" title="<?php echo $_L['edit'];?>" /></a></td>
						</tr>
						<?php
						}
						?>
					</tbody>
					<tr>
					  <td height="25" class="page" id="page" colspan="6">
					  <?php  echo page::page_num($all_date_num,$page_a,$page,'seo.php?action=seo');?>
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
				$query = $db->query("SELECT * FROM ".$ros->table('seo')." WHERE page_id='".$_GET['edit']."'");
				if($this_sql = $db->fetch_array($query)) {

?>
				<p><a href="seo.php?action=seo">SEO信息</a> > 修改SEO信息</p>
				<div class="blist">
					<div class="tit">修改SEO信息</div>
					<form id="form1" name="form1" method="post" action="seo.php?action=seo&edit=<?php echo $_GET['edit'];?>" enctype="multipart/form-data">
					<div class="itm">
						<div style="padding:20px 0;">
							<div class="tabs"><a href="javascript:void(0);">内容</a></div>
							<div class="panes ol">
							<table class="tb-02" style="border-top: none;">
								<tbody>
									<tr>
										<td width="60" height="40" valign="top">Title:</td> 
										<td><textarea name="title" rows="8" style="width:480px;"><?php echo $this_sql['ptitle'];?></textarea></td>    
									</tr>
									<tr>
										<td width="60" height="40" valign="top">关键词:</td> 
										<td><textarea name="keyword_cn" rows="8" style="width:480px;"><?php echo $this_sql['pkeyword_cn'];?></textarea></td>    
									</tr>
									<tr>
										<td width="60" height="40" valign="top">keyWords:</td> 
										<td><textarea name="keyword_en" rows="8" style="width:480px;"><?php echo $this_sql['pkeyword_en'];?></textarea></td>    
									</tr>
									<tr>
										<td width="60" height="40" valign="top">描述:</td> 
										<td><textarea name="description_cn" rows="8" style="width:480px;"><?php echo $this_sql['pdescription_cn'];?></textarea></td>    
									</tr>
									<tr>
										<td width="60" height="40" valign="top">Description:</td> 
										<td><textarea name="description_en" rows="8" style="width:480px;"><?php echo $this_sql['pdescription_en'];?></textarea></td>    
									</tr>
									<tr>
										<td width="60"></td> 
										<td>* 如果要粗体字，请使用&lt;strong&gt;&lt;/strong&gt;标签</td>    
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
				
				$back_data = $db->query("UPDATE ".$ros->table('seo')." SET ptitle='".addslashes($param['title'])."', pkeyword_cn='".addslashes($param['keyword_cn']).
				"', pkeyword_en='".addslashes($param['keyword_en'])."', pdescription_cn='".addslashes($param['description_cn'])."', pdescription_en='".addslashes($param['description_en'])."' WHERE page_id='".$_GET['edit']."'");
				
				if($back_data) {
					show_msg('修改成功!','seo.php?action=seo');  
				} else {
					show_msg('请重试!','seo.php?action=seo');
				}
			}
		} else {
			if(isset($param['del_seo_a'])) {
				if( is_array($param['del_seo_a'])) {
					foreach($param['del_seo_a'] as $k) {
						$db->query("DELETE FROM ".$ros->table('seo')." WHERE page_id = '$k'");
					}
				}
			}
			
			if(isset($param['cg_seo_a'])) {
				if( is_array($param['cg_seo_a'])) {
					foreach($param['cg_seo_a'] as $key => $value) {
						$query_order = $db->query("SELECT page_id FROM ".$ros->table('seo')." WHERE page_id='".$key."' AND orderby='".$value."' LIMIT 0, 1");
						if (!$this_order = $db->fetch_array($query_order)) {
							$db->query("UPDATE ".$ros->table('seo')." SET orderby = '".$value."' WHERE page_id = '".$key."'");
						}
					}
				}
			}

			show_msg('更新成功!','seo.php?action=seo');
		}
	}
?>
	</div>
</div>
</body>
</html>
