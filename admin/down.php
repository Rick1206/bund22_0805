<?php
define('IN_SK',true);	
require(dirname(__FILE__) . '/includes/init.php');
if( empty($_SESSION['admin_id']) ) {
	echo "<script>top.location.href='login.php';</script>";
	exit();
}
require(dirname(__FILE__) .'/lib/lib_right.php');
if( @!in_array('7',$a_right) ) {
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
$pic_doc = 'down';
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
	require_once('./left_menu5.php');	
	?>
	<div class="main">
<?php
	if($action == "adddown") {
		if (!isset($param['Submit'])) {
?>
			<p><a href="down.php?action=down">下载专区</a> > 添加下载信息</p>
			<div class="blist">
				<div class="tit">添加下载信息</div>
				<form action="down.php?action=adddown" method="post" enctype="multipart/form-data" name="form1" id="form1">
				<div class="itm">
					<div class="tabs"></div>
					<table class="tb-02">
						<tbody>
							<tr>
								<td colspan="4" height="10"></td>     
							</tr>
							<tr>
								<td height="40" width="12%">类别:</td>
								<td width="38%"><select name="type_id">
								  <?php
								  foreach ($_down_type as $key => $value) {
								  ?>
								  <option value="<?php echo $key;?>"><?php echo $value;?></option>
								  <?php
								  }
								  ?>
							  </select></td>
								<td width="12%">图片:</td>
								<td width="38%"><span class="input01"><input name="photo[]" type="file" /></span> ('gif','jpg','jpeg','png',尺寸:63*89px)</td>
							</tr>
							<tr>
								<td height="40">排序:</td>
								<td><span class="input01"><input type="text" name="orderby" value="0"></span></td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
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
										<td height="40" width="60">名称:</td> 
										<td><span class="input01"><input name="name_cn" type="text" style="width:480px;" /></span></td>    
									</tr>
									<tr>
										<td height="40" width="60">下载文件:</td> 
										<td><span class="input01"><input name="pdf_cn[]" type="file" /></span> ('pdf')</td>    
									</tr>
								</tbody>
							</table>
							<table class="tb-02" style="border-top: none;">
								<tbody>
									<tr>
										<td height="40" width="60">名称:</td> 
										<td><span class="input01"><input name="name_en" type="text" style="width:480px;" /></span></td>
									</tr>
									<tr>
										<td height="40" width="60">下载文件:</td>
										<td><span class="input01"><input name="pdf_en[]" type="file" /></span> ('pdf')</td>
									</tr>
								</tbody>
							</table>
							<table class="tb-02" style="border-top: none;">
								<tbody>
									<tr>
										<td height="40" width="60">名称:</td>
										<td><span class="input01"><input name="name_gb" type="text" style="width:480px;" /></span></td>
									</tr>
									<tr>
										<td height="40" width="60">下载文件:</td>
										<td><span class="input01"><input name="pdf_gb[]" type="file" /></span> ('pdf')</td>
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
			$file_en = "";
			$attachment_s = ($attachments_arg_s = attach_upload(array('pdf'), 'pdf_en')) ? 1 : 0;
			if($attachment_s){
				$file_en = $attachments_arg_s[0]['attachment'];
			}
			$file_cn = "";
			$attachment_s = ($attachments_arg_s = attach_upload(array('pdf'), 'pdf_cn')) ? 1 : 0;
			if($attachment_s){
				$file_cn = $attachments_arg_s[0]['attachment'];
			}
			$file_gb = "";
			$attachment_s = ($attachments_arg_s = attach_upload(array('pdf'), 'pdf_gb')) ? 1 : 0;
			if($attachment_s){
				$file_gb = $attachments_arg_s[0]['attachment'];
			}
			
			$back_data = $db->query("INSERT INTO ".$ros->table('down')." (name_en, name_cn, name_gb, type_id, photo, pdf_en, pdf_cn, pdf_gb, orderby) VALUES ('".$param['name_en']."', '".$param['name_cn']."', '".$param['name_gb']."', '".$param['type_id']."', '".$pic."', '".$file_en."', '".$file_cn."', '".$file_gb."', '".$param['orderby']."')");
			if($back_data) {
				show_msg('添加成功!','down.php?action=adddown');  
			} else {
				show_msg('请重试!','down.php?action=adddown');
			}
		}
	} elseif($action == "down") {
		if (!isset($param['Submit']) && !isset($_GET['edit'])) {
			if(isset($_GET['type_id'])) {
				$type_id = $_GET['type_id'];
			} else {
				$type_id = "";
			}
	?>
			<p>下载专区</p>
			<div class="blist">
				<div class="tit">下载信息列表<s><a href="down.php?action=adddown">添加下载信息</a></s></div>
				<div class="itm">
				<form id="form1" name="form1" method="get" action="down.php">
				<input name="action" type="hidden" value="down" />
				<p style="padding:5px 0;text-align:right;"><span class="txt">类型:</span>
				<span>
				<select name="type_id">
				  <option value="">所有</option>
				  <?php
				  foreach ($_down_type as $key => $value) {
				  ?>
				  <option value="<?php echo $key;?>"<?php echo $type_id==$key ? " selected=\"selected\"" : "";?>><?php echo $value;?></option>
				  <?php
				  }
				  ?>
				</select></span>
				<span class="input02"><label><input type="submit" value=""></label></span></p>
				</form>
				<form id="down_list" name="down_list" method="post" action="down.php?action=down">
				<table class="tb-01">
					<thead>
						<tr>
							<th width="5%">删除</th>
							<th width="20%">类别</th>
							<th width="35%">名称</th>
							<th width="20%">排序</th>
							<th width="20%">操作</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$where = empty($type_id) ? "" : " WHERE type_id = '".$type_id."'";
						$all_date_num = page_1::page_all_num('down',$where);
						//$last_page = intval (($all_date_num - 1) / $page_a) + 1; //获得总页数
						$page = isset($_GET['page']) ? $_GET['page'] : 1 ;
						$page_a = 8;
						$offset = ($page - 1) * $page_a;
						$query = $db->query("SELECT * FROM ".$ros->table('down').$where." ORDER BY type_id, orderby, down_id LIMIT $offset, $page_a");
						while($this_sql = $db->fetch_array($query)) {
						?>
						<tr>
							<td height="50"> <input type="checkbox" name="del_down_a[]" id="del_down_a" value="<?php echo $this_sql['down_id'];?>" /></td>
							<td><?php echo $_down_type[$this_sql['type_id']];?></td>
							<td><?php echo $this_sql['name_cn'] ? $this_sql['name_cn'] : $this_sql['name_en'];?></td>
							<td><span class="input01" style="width:20px;"><input name="cg_down_a[<?php echo $this_sql['down_id'];?>]" type="text" value="<?php echo $this_sql['orderby'];?>" style="width:20px;" /></span></td>
							<td><a href="down.php?action=down&edit=<?php echo $this_sql['down_id'];?>"><img src="./images/modify.gif" width="16" height="16" border="0" alt="<?php echo $_L['edit'];?>" title="<?php echo $_L['edit'];?>" /></a></td>
						</tr>
						<?php
						}
						?>
					</tbody>
					<tr>
					  <td height="25" class="page" id="page" colspan="5">
					  <?php  echo page::page_num($all_date_num,$page_a,$page,'down.php?action=down&type_id='.$type_id);?>
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
				$query = $db->query("SELECT * FROM ".$ros->table('down')." WHERE down_id='".$_GET['edit']."'");
				if($this_sql = $db->fetch_array($query)) {

?>
				<p><a href="down.php?action=down">下载专区</a> > 修改下载信息</p>
				<div class="blist">
					<div class="tit">修改下载信息</div>
					<form id="form1" name="form1" method="post" action="down.php?action=down&edit=<?php echo $_GET['edit'];?>" enctype="multipart/form-data">
					<div class="itm">
						<div class="tabs"></div>
						<table class="tb-02">
							<tbody>
								<tr>
									<td colspan="4" height="10"></td>     
								</tr>
								<tr>
									<td height="40" width="12%">类别:</td>
									<td width="38%"><select name="type_id">
									  <?php
									  foreach ($_down_type as $key => $value) {
									  ?>
									  <option value="<?php echo $key;?>"<?php echo $this_sql['type_id']==$key ? " selected=\"selected\"" : "";?>><?php echo $value;?></option>
									  <?php
									  }
									  ?>
								  </select></td>
									<td width="12%">图片:</td>
									<td width="38%"><a href="<?php echo $attachdir.$this_sql['photo'];?>" target="_blank"><?php echo $this_sql['photo'];?></a><br /><span class="input01"><input name="photo[]" type="file" /></span> ('gif','jpg','jpeg','png',尺寸:63*89px)</td>
								</tr>
								<tr>
									<td height="40">排序:</td>
									<td><span class="input01"><input type="text" name="orderby" value="<?php echo $this_sql['orderby'];?>"></span></td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
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
										<td height="40" width="60">名称:</td> 
										<td><span class="input01"><input name="name_cn" type="text" style="width:480px;" value="<?php echo $this_sql['name_cn'];?>" /></span></td>    
									</tr>
									<tr>
										<td height="40" width="60">下载文件:</td> 
										<td><a href="<?php echo $attachdir.$this_sql['pdf_cn'];?>" target="_blank"><?php echo $this_sql['pdf_cn'];?></a><br /><span class="input01"><input name="pdf_cn[]" type="file" /></span> ('pdf')</td>    
									</tr>
								</tbody>
							</table>
							<table class="tb-02" style="border-top: none;">
								<tbody>
									<tr>
										<td height="40" width="60">名称:</td> 
										<td><span class="input01"><input name="name_en" type="text" style="width:480px;" value="<?php echo $this_sql['name_en'];?>" /></span></td>
									</tr>
									<tr>
										<td height="40" width="60">下载文件:</td>
										<td><a href="<?php echo $attachdir.$this_sql['pdf_en'];?>" target="_blank"><?php echo $this_sql['pdf_en'];?></a><br /><span class="input01"><input name="pdf_en[]" type="file" /></span> ('pdf')</td>
									</tr>
								</tbody>
							</table>
							<table class="tb-02" style="border-top: none;">
								<tbody>
									<tr>
										<td height="40" width="60">名称:</td>
										<td><span class="input01"><input name="name_gb" type="text" style="width:480px;" value="<?php echo $this_sql['name_gb'];?>" /></span></td>
									</tr>
									<tr>
										<td height="40" width="60">下载文件:</td>
										<td><a href="<?php echo $attachdir.$this_sql['pdf_gb'];?>" target="_blank"><?php echo $this_sql['pdf_gb'];?></a><br /><span class="input01"><input name="pdf_gb[]" type="file" /></span> ('pdf')</td>
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
				$query = $db->query("SELECT photo, pdf_en, pdf_cn, pdf_gb FROM ".$ros->table('down')." WHERE down_id='".$_GET['edit']."'");
				$this_sql = $db->fetch_array($query);
				
				$attachment_s = ($attachments_arg_s = attach_upload(array('gif','jpg','jpeg','png'), 'photo')) ? 1 : 0;
				if($attachment_s){
					$pic = $attachments_arg_s[0]['attachment'];
					@unlink($attachdir.$this_sql['photo']);
					$db->query("UPDATE ".$ros->table('down')." SET photo='".$pic."' WHERE down_id='".$_GET['edit']."'");
				}
				$attachment_s = ($attachments_arg_s = attach_upload(array('pdf'), 'pdf_en')) ? 1 : 0;
				if($attachment_s){
					$file_en = $attachments_arg_s[0]['attachment'];
					@unlink($attachdir.$this_sql['pdf_en']);
					$db->query("UPDATE ".$ros->table('down')." SET pdf_en='".$file_en."' WHERE down_id='".$_GET['edit']."'");
				}
				$attachment_s = ($attachments_arg_s = attach_upload(array('pdf'), 'pdf_cn')) ? 1 : 0;
				if($attachment_s){
					$file_cn = $attachments_arg_s[0]['attachment'];
					@unlink($attachdir.$this_sql['pdf_cn']);
					$db->query("UPDATE ".$ros->table('down')." SET pdf_cn='".$file_cn."' WHERE down_id='".$_GET['edit']."'");
				}
				$attachment_s = ($attachments_arg_s = attach_upload(array('pdf'), 'pdf_gb')) ? 1 : 0;
				if($attachment_s){
					$file_gb = $attachments_arg_s[0]['attachment'];
					@unlink($attachdir.$this_sql['pdf_gb']);
					$db->query("UPDATE ".$ros->table('down')." SET pdf_gb='".$file_gb."' WHERE down_id='".$_GET['edit']."'");
				}
				
				$back_data = $db->query("UPDATE ".$ros->table('down')." SET name_en='".$param['name_en']."', name_cn='".$param['name_cn']."', name_gb='".$param['name_gb']."', type_id='".$param['type_id']."', orderby='".$param['orderby']."' WHERE down_id='".$_GET['edit']."'");
				if($back_data) {
					show_msg('修改成功!','down.php?action=down');  
				} else {
					show_msg('请重试!','down.php?action=down');
				}
			}
		} else {
			if(isset($param['del_down_a'])) {
				if( is_array($param['del_down_a'])) {
					foreach($param['del_down_a'] as $k) {
						$query = $db->query("SELECT photo, pdf_en, pdf_cn, pdf_gb FROM ".$ros->table('down')." WHERE down_id='$k'");
						$this_sql = $db->fetch_array($query);
						@unlink($attachdir.$this_sql['photo']);
						@unlink($attachdir.$this_sql['pdf_en']);
						@unlink($attachdir.$this_sql['pdf_cn']);
						@unlink($attachdir.$this_sql['pdf_gb']);
						$db->query("DELETE FROM ".$ros->table('down')." WHERE down_id = '$k'");
					}
				}
			}
			
			if(isset($param['cg_down_a'])) {
				if( is_array($param['cg_down_a'])) {
					foreach($param['cg_down_a'] as $key => $value) {
						$query_order = $db->query("SELECT down_id FROM ".$ros->table('down')." WHERE down_id='".$key."' AND orderby='".$value."' LIMIT 0, 1");
						if (!$this_order = $db->fetch_array($query_order)) {
							$db->query("UPDATE ".$ros->table('down')." SET orderby = '".$value."' WHERE down_id = '".$key."'");
						}
					}
				}
			}

			show_msg('更新成功!','down.php?action=down');
		}
	}
?>
	</div>
</div>
</body>
</html>
