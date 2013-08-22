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
$pic_doc = 'enticement';
$attachdir = "../uploadfiles/".$pic_doc."/";

$_enticement_type  = array('1' => "Events","2"=>"Promotion");

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
		if (!isset($param['Submit'])) {
?>
			<p><a href="enticement.php?action=enticement">Enticement</a> > 添加Enticement</p>
			<div class="blist">
				<div class="tit">添加Enticement</div>
				<form action="enticement.php?action=addenticement" method="post" enctype="multipart/form-data" name="form1" id="form1">
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
								  foreach ($_enticement_type as $key => $value) {
								  ?>
								  <option value="<?php echo $key;?>"><?php echo $value;?></option>
								  <?php
								  }
								  ?>
							  </select></td>
								<td width="12%">图片:</td>
								<td width="38%"><span class="input01"><input name="photo[]" type="file" /></span> ('gif','jpg','jpeg','png',尺寸:500*375px)</td>
							</tr>
							<tr>
								<td height="40" width="12%">新闻日期：</td>
								<td width="38%"><span class="input01"><input name="date" id="smidate" type="text" /></span> </td>
								<td>排序:</td>
								<td><span class="input01"><input type="text" name="orderby" value="0"></span></td>
							</tr>
							<tr>
								<td height="40">Website:</td>
								<td><span class="input01"><input type="text" name="website" value="http://"></span></td>
								<td></td>
								<td></td>
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
										<td height="40" width="60">名称:</td> 
										<td><span class="input01"><input name="name_cn" type="text" style="width:480px;" /></span></td>    
									</tr>
								
									<tr>
										<td width="60" height="40" valign="top">介绍:</td> 
										<td><textarea name="description_cn" rows="8" style="width:480px;"></textarea></td>    
									</tr>
									<tr>
										<td width="60"></td> 
										<td>* 如果要粗体字，请使用&lt;strong&gt;&lt;/strong&gt;标签</td>    
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
										<td width="60" height="40" valign="top">介绍:</td>
										<td><textarea name="description_en" rows="8" style="width:480px;"></textarea></td>
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
			
			$back_data = $db->query("INSERT INTO ".$ros->table('enticement')." (title_en, title_cn, type_id, photo, website, description_en, description_cn, orderby,dateline) VALUES ('".param('name_en')."', '".
			param('name_cn')."', '".param('type_id')."', '".$pic."', '".param('website')."', '".param('description_en')."', '".param('description_cn')."', '".$param['orderby']."', '".$param['date']."')");
			
			if($back_data) {
				show_msg('添加成功!','enticement.php?action=addenticement');  
			} else {
				show_msg('请重试!','enticement.php?action=addenticement');
			}
		}
	} elseif($action == "enticement") {
		if (!isset($param['Submit']) && !isset($_GET['edit'])) {
			if(isset($_GET['type_id'])) {
				$type_id = $_GET['type_id'];
			} else {
				$type_id = "";
			}
	?>
			<p>Enticement</p>
			<div class="blist">
				<div class="tit">Enticement列表<s><a href="enticement.php?action=addenticement">添加Enticement</a></s></div>
				<div class="itm">
				<form id="form1" name="form1" method="get" action="enticement.php">
				<input name="action" type="hidden" value="enticement" />
				<p style="padding:5px 0;text-align:right;"><span class="txt">类型:</span>
				<span>
				<select name="type_id">
				  <option value="">所有</option>
				  <?php
				  foreach ($_enticement_type as $key => $value) {
				  ?>
				  <option value="<?php echo $key;?>"<?php echo $type_id==$key ? " selected=\"selected\"" : "";?>><?php echo $value;?></option>
				  <?php
				  }
				  ?>
				</select></span>
				<span class="input02"><label><input type="submit" value=""></label></span></p>
				</form>
				<form id="enticement_list" name="enticement_list" method="post" action="enticement.php?action=enticement">
				<table class="tb-01">
					<thead>
						<tr>
							<th width="5%">删除</th>
							<th width="10%">类别</th>
							<th width="25%">名称</th>
							<th width="15%">添加图片</th>
							<th width="15%">添加Pdf</th>
							<th width="10%">日期</th>
							<th width="10%">排序</th>
							<th width="10%">操作</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$where = empty($type_id) ? "" : " WHERE type_id = '".$type_id."'";
						$all_date_num = page_1::page_all_num('enticement',$where);
						//$last_page = intval (($all_date_num - 1) / $page_a) + 1; //获得总页数
						$page = isset($_GET['page']) ? $_GET['page'] : 1 ;
						$page_a = 8;
						$offset = ($page - 1) * $page_a;
						$query = $db->query("SELECT * FROM ".$ros->table('enticement').$where." ORDER BY type_id, orderby, enticement_id LIMIT $offset, $page_a");
						while($this_sql = $db->fetch_array($query)) {
						?>
						<tr>
							<td height="50"> <input type="checkbox" name="del_enticement_a[]" id="del_enticement_a" value="<?php echo $this_sql['enticement_id'];?>" /></td>
							<td><?php echo $_enticement_type[$this_sql['type_id']];?></td>
							<td><?php echo $this_sql['title_en'] ? $this_sql['title_cn'] : $this_sql['title_en'];?></td>
							<td><a href="enticement_photo.php?action=enticement&e_id=<?php echo $this_sql['enticement_id'];?>"><div class="icn_pho"></div></a></td>
							<td><a href="enticement_pdf.php?action=enticement&e_id=<?php echo $this_sql['enticement_id'];?>"><div class="icn_pdf"></div></a></td>
							<td><?php echo 	$this_sql['dateline'];?></td>
							<td><span class="input01" style="width:20px;"><input name="cg_enticement_a[<?php echo $this_sql['enticement_id'];?>]" type="text" value="<?php echo $this_sql['orderby'];?>" style="width:20px;" /></span></td>
							<td><a href="enticement.php?action=enticement&edit=<?php echo $this_sql['enticement_id'];?>"><img src="./images/modify.gif" width="16" height="16" border="0" alt="<?php echo $_L['edit'];?>" title="<?php echo $_L['edit'];?>" /></a></td>
						</tr>
						<?php
						}
						?>
					</tbody>
					<tr>
					  <td height="25" class="page" id="page" colspan="8">
					  <?php  echo page::page_num($all_date_num,$page_a,$page,'enticement.php?action=enticement&type_id='.$type_id);?>
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
				$query = $db->query("SELECT * FROM ".$ros->table('enticement')." WHERE enticement_id='".$_GET['edit']."'");
				if($this_sql = $db->fetch_array($query)) {

?>
				<p><a href="enticement.php?action=enticement">Enticement</a> > 修改Enticement</p>
				<div class="blist">
					<div class="tit">修改Enticement</div>
					<form id="form1" name="form1" method="post" action="enticement.php?action=enticement&edit=<?php echo $_GET['edit'];?>" enctype="multipart/form-data">
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
									  foreach ($_enticement_type as $key => $value) {
									  ?>
									  <option value="<?php echo $key;?>"<?php echo $this_sql['type_id']==$key ? " selected=\"selected\"" : "";?>><?php echo $value;?></option>
									  <?php
									  }
									  ?>
								  </select></td>
									<td width="12%">图片:</td>
									<td width="38%"><a href="<?php echo $attachdir.$this_sql['photo'];?>" target="_blank"><?php echo $this_sql['photo'];?></a><br /><span class="input01"><input name="photo[]" type="file" /></span> ('gif','jpg','jpeg','png',尺寸:500*375px)</td>
								</tr>
								
								
								<tr>
									<td height="40" width="12%">新闻日期：</td>
									<td width="38%"><span class="input01"><input name="date" id="smidate" type="text" value="<?php echo $this_sql['dateline']; ?>" /></span> </td>
									
									
									<td>排序:</td>
									<td><span class="input01"><input type="text" name="orderby" value="<?php echo $this_sql['orderby'];?>"></span></td>
								
								</tr>
								<tr>
									<td height="40">Website:</td>
									<td><span class="input01"><input type="text" name="website" value="<?php echo $this_sql['website'];?>"></span></td>
									<td></td>
									<td></td>
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
										<td height="40" width="60">名称:</td> 
										<td><span class="input01"><input name="name_cn" type="text" style="width:480px;" value="<?php echo $this_sql['title_cn'];?>" /></span></td>    
									</tr>
									<tr>
										<td width="60" height="40" valign="top">介绍:</td> 
										<td><textarea name="description_cn" rows="8" style="width:480px;"><?php echo $this_sql['description_cn'];?></textarea></td>    
									</tr>
									<tr>
										<td width="60"></td> 
										<td>* 如果要粗体字，请使用&lt;strong&gt;&lt;/strong&gt;标签</td>    
									</tr>
								</tbody>
							</table>
							<table class="tb-02" style="border-top: none;">
								<tbody>
									<tr>
										<td height="40" width="60">名称:</td> 
										<td><span class="input01"><input name="name_en" type="text" style="width:480px;" value="<?php echo $this_sql['title_en'];?>" /></span></td>
									</tr>
									<tr>
										<td width="60" height="40" valign="top">介绍:</td>
										<td><textarea name="description_en" rows="8" style="width:480px;"><?php echo $this_sql['description_en'];?></textarea></td>
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
				$query = $db->query("SELECT photo FROM ".$ros->table('enticement')." WHERE enticement_id='".$_GET['edit']."'");
				$this_sql = $db->fetch_array($query);
				
				$attachment_s = ($attachments_arg_s = attach_upload(array('gif','jpg','jpeg','png'), 'photo')) ? 1 : 0;
				if($attachment_s){
					$pic = $attachments_arg_s[0]['attachment'];
					//resize_image($pic, 's_'.$pic, 215, 136, $attachdir);
					@unlink($attachdir.$this_sql['photo']);
					//@unlink($attachdir.'s_'.$this_sql['photo']);
					$db->query("UPDATE ".$ros->table('enticement')." SET photo='".$pic."' WHERE enticement_id='".$_GET['edit']."'");
				}
				
				$back_data = $db->query("UPDATE ".$ros->table('enticement')." SET title_en='".param('name_en')."', title_cn='".param('name_cn')."', type_id='".$param['type_id'].
				"', dateline='".param('date')."', website='".param('website')."', description_en='".param('description_en')."', description_cn='".param('description_cn')."', orderby='".$param['orderby']."' WHERE enticement_id='".$_GET['edit']."'");
				
				if($back_data) {
					show_msg('修改成功!','enticement.php?action=enticement');  
				} else {
					show_msg('请重试!','enticement.php?action=enticement');
				}
			}
		} else {
			if(isset($param['del_enticement_a'])) {
				if( is_array($param['del_enticement_a'])) {
					foreach($param['del_enticement_a'] as $k) {
						$query = $db->query("SELECT photo FROM ".$ros->table('enticement')." WHERE enticement_id='$k'");
						$this_sql = $db->fetch_array($query);
						@unlink($attachdir.$this_sql['photo']);
						//@unlink($attachdir.'s_'.$this_sql['photo']);
						$db->query("DELETE FROM ".$ros->table('enticement')." WHERE enticement_id = '$k'");
					}
				}
			}
			
			if(isset($param['cg_enticement_a'])) {
				if( is_array($param['cg_enticement_a'])) {
					foreach($param['cg_enticement_a'] as $key => $value) {
						$query_order = $db->query("SELECT enticement_id FROM ".$ros->table('enticement')." WHERE enticement_id='".$key."' AND orderby='".$value."' LIMIT 0, 1");
						if (!$this_order = $db->fetch_array($query_order)) {
							$db->query("UPDATE ".$ros->table('enticement')." SET orderby = '".$value."' WHERE enticement_id = '".$key."'");
						}
					}
				}
			}

			show_msg('更新成功!','enticement.php?action=enticement');
		}
	}
?>
	</div>
</div>
</body>
</html>
