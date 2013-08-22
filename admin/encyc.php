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
$pic_doc = 'encyc';
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
	if($action == "addencyc") {
		if (!isset($param['Submit'])) {
?>
			<p><a href="encyc.php?action=encyc">行业百科全书</a> > 添加行业百科全书</p>
			<div class="blist">
				<div class="tit">添加行业百科全书</div>
				<form action="encyc.php?action=addencyc" method="post" enctype="multipart/form-data" name="form1" id="form1">
				<div class="itm">
					<div class="tabs"></div>
					<table class="tb-02">
						<tbody>
							<tr>
								<td colspan="4" height="10"></td>     
							</tr>
							<tr>
								<td height="40" width="12%">图片:</td>
								<td width="38%"><span class="input01"><input name="photo[]" type="file" /></span> ('gif','jpg','jpeg','png')</td>
								<td width="12%">排序:</td>
								<td width="38%"><span class="input01"><input type="text" name="order_by" value="0"></span></td>
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
										<td><span class="input01"><input name="title_cn" type="text" style="width:480px;" /></span></td>    
									</tr>
									<tr>
										<td height="40" width="60">简要介绍:</td> 
										<td><span class="input01"><input name="detail_cn" type="text" style="width:480px;" /></span></td>    
									</tr>
									<tr>
										<td width="60" height="40" valign="top">详细介绍:</td> 
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
										<td><span class="input01"><input name="title_en" type="text" style="width:480px;" /></span></td>
									</tr>
									<tr>
										<td height="40" width="60">简要介绍:</td>
										<td><span class="input01"><input name="detail_en" type="text" style="width:480px;" /></span></td>
									</tr>
									<tr>
										<td width="60" height="40" valign="top">详细介绍:</td>
										<td><textarea name="description_en" rows="8" style="width:480px;"></textarea></td>
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
										<td><span class="input01"><input name="title_gb" type="text" style="width:480px;" /></span></td>
									</tr>
									<tr>
										<td height="40" width="60">简要介绍:</td>
										<td><span class="input01"><input name="detail_gb" type="text" style="width:480px;" /></span></td>
									</tr>
									<tr>
										<td width="60" height="40" valign="top">详细介绍:</td>
										<td><textarea name="description_gb" rows="8" style="width:480px;"></textarea></td>
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
			
			$back_data = $db->query("INSERT INTO ".$ros->table('encyc')." (title_en, title_cn, title_gb, photo, detail_en, detail_cn, detail_gb, description_en, description_cn, description_gb, order_by) VALUES ('".$param['title_en']."', '".$param['title_cn']."', '".$param['title_gb']."', '".$pic."', '".$param['detail_en']."', '".$param['detail_cn']."', '".$param['detail_gb']."', '".$param['description_en']."', '".$param['description_cn']."', '".$param['description_gb']."', '".$param['order_by']."')");
			if($back_data) {
				show_msg('添加成功!','encyc.php?action=addencyc');  
			} else {
				show_msg('请重试!','encyc.php?action=addencyc');
			}
		}
	} elseif($action == "encyc") {
		if (!isset($param['Submit']) && !isset($_GET['edit'])) {
	?>
			<p>行业百科全书</p>
			<div class="blist">
				<div class="tit">行业百科全书列表<s><a href="encyc.php?action=addencyc">添加行业百科全书</a></s></div>
				<div class="itm">
				<form id="encyc_list" name="encyc_list" method="post" action="encyc.php?action=encyc">
				<table class="tb-01">
					<thead>
						<tr>
							<th width="5%">删除</th>
							<th width="20%">名称</th>
							<th width="55%">简要介绍</th>
							<th width="10%">排序</th>
							<th width="10%">操作</th>
						</tr>
					</thead>
					<tbody>
						<?php
						//$where = empty($type_id) ? "" : " WHERE type_id = '".$type_id."'";
						$all_date_num = page_1::page_all_num('encyc','');
						//$last_page = intval (($all_date_num - 1) / $page_a) + 1; //获得总页数
						$page = isset($_GET['page']) ? $_GET['page'] : 1 ;
						$page_a = 8;
						$offset = ($page - 1) * $page_a;
						$query = $db->query("SELECT * FROM ".$ros->table('encyc')." ORDER BY order_by, encyc_id LIMIT $offset, $page_a");
						while($this_sql = $db->fetch_array($query)) {
						?>
						<tr>
							<td height="50"> <input type="checkbox" name="del_encyc_a[]" id="del_encyc_a" value="<?php echo $this_sql['encyc_id'];?>" /></td>
							<td><?php echo $this_sql['title_cn'] ? $this_sql['title_cn'] : $this_sql['title_en'];?></td>
							<td><?php echo $this_sql['detail_cn'] ? $this_sql['detail_cn'] : $this_sql['detail_en'];?></td>
							<td><span class="input01" style="width:20px;"><input name="cg_encyc_a[<?php echo $this_sql['encyc_id'];?>]" type="text" value="<?php echo $this_sql['order_by'];?>" style="width:20px;" /></span></td>
							<td><a href="encyc.php?action=encyc&edit=<?php echo $this_sql['encyc_id'];?>"><img src="./images/modify.gif" width="16" height="16" border="0" alt="<?php echo $_L['edit'];?>" title="<?php echo $_L['edit'];?>" /></a></td>
						</tr>
						<?php
						}
						?>
					</tbody>
					<tr>
					  <td height="25" class="page" id="page" colspan="5">
					  <?php  echo page::page_num($all_date_num,$page_a,$page,'encyc.php?action=encyc');?>
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
				$query = $db->query("SELECT * FROM ".$ros->table('encyc')." WHERE encyc_id='".$_GET['edit']."'");
				if($this_sql = $db->fetch_array($query)) {

?>
				<p><a href="encyc.php?action=encyc">行业百科全书</a> > 修改行业百科全书</p>
				<div class="blist">
					<div class="tit">修改行业百科全书</div>
					<form id="form1" name="form1" method="post" action="encyc.php?action=encyc&edit=<?php echo $_GET['edit'];?>" enctype="multipart/form-data">
					<div class="itm">
						<div class="tabs"></div>
						<table class="tb-02">
							<tbody>
								<tr>
									<td colspan="4" height="10"></td>     
								</tr>
								<tr>
									<td height="40" width="12%">图片:</td>
									<td width="38%"><a href="<?php echo $attachdir.$this_sql['photo'];?>" target="_blank"><?php echo $this_sql['photo'];?></a><br /><span class="input01"><input name="photo[]" type="file" /></span> ('gif','jpg','jpeg','png')</td>
									<td width="12%">排序:</td>
									<td width="38%"><span class="input01"><input type="text" name="order_by" value="<?php echo $this_sql['order_by'];?>"></span></td>
								</tr>
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
										<td><span class="input01"><input name="title_cn" type="text" style="width:480px;" value="<?php echo $this_sql['title_cn'];?>" /></span></td>    
									</tr>
									<tr>
										<td height="40" width="60">简要介绍:</td> 
										<td><span class="input01"><input name="detail_cn" type="text" style="width:480px;" value="<?php echo $this_sql['detail_cn'];?>" /></span></td>    
									</tr>
									<tr>
										<td width="60" height="40" valign="top">详细介绍:</td> 
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
										<td><span class="input01"><input name="title_en" type="text" style="width:480px;" value="<?php echo $this_sql['title_en'];?>" /></span></td>
									</tr>
									<tr>
										<td height="40" width="60">简要介绍:</td>
										<td><span class="input01"><input name="detail_en" type="text" style="width:480px;" value="<?php echo $this_sql['detail_en'];?>" /></span></td>
									</tr>
									<tr>
										<td width="60" height="40" valign="top">详细介绍:</td>
										<td><textarea name="description_en" rows="8" style="width:480px;"><?php echo $this_sql['description_en'];?></textarea></td>
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
										<td><span class="input01"><input name="title_gb" type="text" style="width:480px;" value="<?php echo $this_sql['title_gb'];?>" /></span></td>
									</tr>
									<tr>
										<td height="40" width="60">简要介绍:</td>
										<td><span class="input01"><input name="detail_gb" type="text" style="width:480px;" value="<?php echo $this_sql['detail_gb'];?>" /></span></td>
									</tr>
									<tr>
										<td width="60" height="40" valign="top">详细介绍:</td>
										<td><textarea name="description_gb" rows="8" style="width:480px;"><?php echo $this_sql['description_gb'];?></textarea></td>
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
				$query = $db->query("SELECT photo FROM ".$ros->table('encyc')." WHERE encyc_id='".$_GET['edit']."'");
				$this_sql = $db->fetch_array($query);
				
				$attachment_s = ($attachments_arg_s = attach_upload(array('gif','jpg','jpeg','png'), 'photo')) ? 1 : 0;
				if($attachment_s){
					$pic = $attachments_arg_s[0]['attachment'];
					@unlink($attachdir.$this_sql['photo']);
					$db->query("UPDATE ".$ros->table('encyc')." SET photo='".$pic."' WHERE encyc_id='".$_GET['edit']."'");
				}
				
				$back_data = $db->query("UPDATE ".$ros->table('encyc')." SET title_en='".$param['title_en']."', title_cn='".$param['title_cn']."', title_gb='".$param['title_gb']."', detail_en='".$param['detail_en']."', detail_cn='".$param['detail_cn']."', detail_gb='".$param['detail_gb']."', description_en='".$param['description_en']."', description_cn='".$param['description_cn']."', description_gb='".$param['description_gb']."', order_by='".$param['order_by']."' WHERE encyc_id='".$_GET['edit']."'");
				if($back_data) {
					show_msg('修改成功!','encyc.php?action=encyc');  
				} else {
					show_msg('请重试!','encyc.php?action=encyc');
				}
			}
		} else {
			if(isset($param['del_encyc_a'])) {
				if( is_array($param['del_encyc_a'])) {
					foreach($param['del_encyc_a'] as $k) {
						$query = $db->query("SELECT photo FROM ".$ros->table('encyc')." WHERE encyc_id='$k'");
						$this_sql = $db->fetch_array($query);
						@unlink($attachdir.$this_sql['photo']);
						$db->query("DELETE FROM ".$ros->table('encyc')." WHERE encyc_id = '$k'");
					}
				}
			}
			
			if(isset($param['cg_encyc_a'])) {
				if( is_array($param['cg_encyc_a'])) {
					foreach($param['cg_encyc_a'] as $key => $value) {
						$query_order = $db->query("SELECT encyc_id FROM ".$ros->table('encyc')." WHERE encyc_id='".$key."' AND order_by='".$value."' LIMIT 0, 1");
						if (!$this_order = $db->fetch_array($query_order)) {
							$db->query("UPDATE ".$ros->table('encyc')." SET order_by = '".$value."' WHERE encyc_id = '".$key."'");
						}
					}
				}
			}

			show_msg('更新成功!','encyc.php?action=encyc');
		}
	}
?>
	</div>
</div>
</body>
</html>
