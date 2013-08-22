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
$pic_doc = 'enticement_pdf';
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
	require_once('./left_menu_enticement.php');	
	?>
	<div class="main">
<?php
	if($action == "addenticement") {
		
		if(isset($_GET['e_id'])) {
				$e_id = $_GET['e_id'];
		} else {
				$e_id = "";
		}
		
		if (!isset($param['Submit'])) {
				
?>
			<p><a href="enticement_pdf.php?action=enticement&e_id=<?php echo $e_id;?>">Enticement Pdf</a> > 添加Enticement Pdf</p>
			<div class="blist">
				<div class="tit">添加Enticement Pdf</div>
				<form action="enticement_pdf.php?action=addenticement" method="post" enctype="multipart/form-data" name="form1" id="form1">
				<input type="hidden" name="id" value="<?php echo $e_id; ?>" />
				<div class="itm">
					<div class="tabs"></div>
					<table class="tb-02">
						<tbody>
							<tr>
								<td colspan="4" height="10"></td>     
							</tr>
								<td width="12%">名称:</td>
								<td width="38%"><span class="input01"><input name="name" type="text" /></span></td>
								<td width="12%">Pdf:</td>
								<td width="38%"><span class="input01"><input name="pdf_file[]" type="file" /></span> ('pdf')</td>
							</tr>
							</tr>
								<td>排序:</td>
								<td><span class="input01"><input type="text" name="orderby" value="0"></span></td>
								<td></td>
								<td></td>
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
		
			$pdf = "";
			$attachment_s = ($attachments_arg_s = attach_upload(array('pdf'), 'pdf_file')) ? 1 : 0;
			
			if($attachment_s){
				$pdf = $attachments_arg_s[0]['attachment'];
			}else{
				show_msg('上传文件失败!','enticement_pdf.php?action=addenticement&e_id='.$param['id']);
			}
			
			$back_data = $db->query("INSERT INTO ".$ros->table('enticement_pdf')." (enticement_id, name, pdf, orderby) VALUES ('".param("id")."', '".$param['name'].
			"', '".$pdf."', '".$param['orderby']."')");
			
			if($back_data) {
				show_msg('添加成功!','enticement_pdf.php?action=addenticement&e_id='.$param['id']);  
			} else {
				show_msg('请重试!','enticement_pdf.php?action=addenticement&e_id='.$param['id']);
			}
		}
	} elseif($action == "enticement") {
		if (!isset($param['Submit']) && !isset($_GET['edit'])) {
			
			if(isset($_GET['e_id'])) {
				$e_id = $_GET['e_id'];
			} else {
				$e_id = "";
			}
	?>
			<p>Enticement Pdf</p>
			<div class="blist">
				<div class="tit">Enticement Pdf列表<s><a href="enticement_pdf.php?action=addenticement&e_id=<?php echo $e_id;?>">添加Enticement Pdf</a></s></div>
				<div class="itm">
				<form id="enticement_list" name="enticement_list" method="post" action="enticement_pdf.php?action=enticement">
				<table class="tb-01">
					<thead>
						<tr>
							<th width="5%">删除</th>
							<th width="45%">名称</th>
							<th width="10%">排序</th>
							<th width="10%">操作</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$where = empty($e_id) ? "" : " WHERE enticement_id = '".$e_id."'";
						$all_date_num = page_1::page_all_num('enticement_pdf',$where);
						$page = isset($_GET['page']) ? $_GET['page'] : 1 ;
						$page_a = 8;
						$offset = ($page - 1) * $page_a;
						$query = $db->query("SELECT * FROM ".$ros->table('enticement_pdf').$where." ORDER BY orderby, enticement_id LIMIT $offset, $page_a");
						while($this_sql = $db->fetch_array($query)) {
						?>
						<tr>
							<td height="50"> <input type="checkbox" name="del_enticement_a[]" id="del_enticement_a" value="<?php echo $this_sql['id'];?>" /></td>
							<td><?php echo $this_sql['name'];?></td>
							<td><span class="input01" style="width:20px;"><input name="cg_enticement_a[<?php echo $this_sql['id'];?>]" type="text" value="<?php echo $this_sql['orderby'];?>" style="width:20px;" /></span></td>
							<td><a href="enticement_pdf.php?action=enticement&edit=<?php echo $this_sql['id'];?>&e_id=<?php echo $e_id;?>"><img src="./images/modify.gif" width="16" height="16" border="0" alt="<?php echo $_L['edit'];?>" title="<?php echo $_L['edit'];?>" /></a></td>
						</tr>
						<?php
						}
						?>
					</tbody>
					<tr>
					  <td height="25" class="page" id="page" colspan="4">
					  <?php  echo page::page_num($all_date_num,$page_a,$page,'enticement_pdf.php?action=enticement&type_id='.$e_id);?>
					  </td>
					</tr>
				</table>
				<p style="padding-top:10px;"><input type="submit" class="but2" name="Submit" value="更新"><input type="button" name="rfd" value="刷新" class="but2" onclick="window.location.reload();"></p>
				</form>
				</div>
			</div>
<?php
		} elseif(isset($_GET['edit'])) {
			
			if(isset($_GET['e_id'])) {
				$e_id = $_GET['e_id'];
			} else {
				$e_id = "";
			}
			
			
			if (!isset($param['editSubmit'])) {
				$query = $db->query("SELECT * FROM ".$ros->table('enticement_pdf')." WHERE id='".$_GET['edit']."'");
				if($this_sql = $db->fetch_array($query)) {

?>
				<p><a href="enticement_pdf.php?action=enticement&e_id=<?php echo $e_id;?>">Enticement Pdf</a> > 修改Enticement Pdf</p>
				<div class="blist">
					<div class="tit">修改Enticement Pdf</div>
					<form id="form1" name="form1" method="post" action="enticement_pdf.php?action=enticement&edit=<?php echo $_GET['edit'];?>" enctype="multipart/form-data">
					<div class="itm">
						<div class="tabs"></div>
						<table class="tb-02">
							<tbody>
								<tr>
									<td colspan="4" height="10"></td>     
								</tr>
								<tr>
									<td width="12%">名称:</td>
									<td width="38%"><span class="input01"><input name="name" type="text" value="<?php echo $this_sql['name'];?>" /></span></td>
									
									
									<td width="12%">Pdf:</td>
									<td width="38%"><a href="<?php echo $attachdir.$this_sql['pdf'];?>" target="_blank"><?php echo $this_sql['pdf'];?></a><br /><span class="input01"><input name="pdf_file[]" type="file" /></span> ('pdf')</td>
								</tr>
								<tr>
									<td>排序:</td>
									<td><span class="input01"><input type="text" name="orderby" value="<?php echo $this_sql['orderby'];?>"></span></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td colspan="4" height="10"></td>     
								</tr>
							</tbody>
						</table>
					</div>
					<input type="hidden" name="id" value="<?php echo $e_id; ?>" />
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
				$query = $db->query("SELECT pdf FROM ".$ros->table('enticement_pdf')." WHERE id='".$_GET['edit']."'");
				$this_sql = $db->fetch_array($query);
				
				$attachment_s = ($attachments_arg_s = attach_upload(array('pdf'), 'pdf_file')) ? 1 : 0;
				
				if($attachment_s){
					$pdf = $attachments_arg_s[0]['attachment'];
					@unlink($attachdir.$this_sql['pdf']);
					$db->query("UPDATE ".$ros->table('enticement_pdf')." SET pdf='".$pdf."' WHERE id='".$_GET['edit']."'");
				}
				
				$back_data = $db->query("UPDATE ".$ros->table('enticement_pdf')." SET name='".$param['name']."', orderby='".$param['orderby']."' WHERE id='".$_GET['edit']."'");
				
				if($back_data) {
					show_msg('修改成功!',('enticement_pdf.php?action=enticement&e_id='.$param['id']));  
				} else {
					show_msg('请重试!',('enticement_pdf.php?action=enticement&e_id='.$param['id']));
				}
			}
		} else {
			if(isset($param['del_enticement_a'])) {
				if( is_array($param['del_enticement_a'])) {
					foreach($param['del_enticement_a'] as $k) {
						$query = $db->query("SELECT pdf FROM ".$ros->table('enticement_pdf')." WHERE id='$k'");
						$this_sql = $db->fetch_array($query);
						@unlink($attachdir.$this_sql['pdf']);
						$db->query("DELETE FROM ".$ros->table('enticement_pdf')." WHERE id = '$k'");
					}
				}
			}
			
			if(isset($param['cg_enticement_a'])) {
				if( is_array($param['cg_enticement_a'])) {
					foreach($param['cg_enticement_a'] as $key => $value) {
						$query_order = $db->query("SELECT enticement_id FROM ".$ros->table('enticement_pdf')." WHERE id='".$key."' AND orderby='".$value."' LIMIT 0, 1");
						if (!$this_order = $db->fetch_array($query_order)) {
							$db->query("UPDATE ".$ros->table('enticement_pdf')." SET orderby = '".$value."' WHERE id = '".$key."'");
						}
					}
				}
			}

			show_msg('更新成功!',('enticement_pdf.php?action=enticement&e_id='.$param['id']));
		}
	}
?>
	</div>
</div>
</body>
</html>
