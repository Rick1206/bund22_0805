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
$pic_doc = 'product';
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
	require_once('./left_menu3.php');	
	?>
	<div class="main">
<?php
	if($action == "addproduct") {
		if (!isset($param['Submit'])) {
?>
			<p><a href="product.php?action=product">产品信息</a> > 添加产品信息</p>
			<div class="blist">
				<div class="tit">添加产品信息</div>
				<form action="product.php?action=addproduct" method="post" enctype="multipart/form-data" name="form1" id="form1">
				<div class="itm">
					<div class="tabs"></div>
					<table class="tb-02">
						<tbody>
							<tr>
								<td colspan="4" height="10"></td>     
							</tr>
							<tr>
								<td height="40" width="12%">产品类别:</td>
								<td width="38%"><select name="type_id">
								  <?php
								  foreach ($_product_type as $key => $value) {
								  ?>
								  <option value="<?php echo $key;?>"><?php echo $value;?></option>
								  <?php
								  }
								  ?>
							  </select></td>
								<td width="12%">产品图片:</td>
								<td width="38%"><span class="input01"><input name="photo[]" type="file" /></span> ('gif','jpg','jpeg','png',尺寸:200*265px)</td>
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
										<td height="40" width="60">产品名称:</td> 
										<td><span class="input01"><input name="name_cn" type="text" style="width:480px;" /></span></td>    
									</tr>
									<tr>
										<td height="40" width="60">简要介绍:</td> 
										<td><span class="input01"><input name="detail_cn" type="text" style="width:480px;" /></span></td>    
									</tr>
									<tr>
										<td width="60" height="40" valign="top">产品特点:</td> 
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
										<td height="40" width="60">产品名称:</td> 
										<td><span class="input01"><input name="name_en" type="text" style="width:480px;" /></span></td>
									</tr>
									<tr>
										<td height="40" width="60">简要介绍:</td>
										<td><span class="input01"><input name="detail_en" type="text" style="width:480px;" /></span></td>
									</tr>
									<tr>
										<td width="60" height="40" valign="top">产品特点:</td>
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
										<td height="40" width="60">产品名称:</td>
										<td><span class="input01"><input name="name_gb" type="text" style="width:480px;" /></span></td>
									</tr>
									<tr>
										<td height="40" width="60">简要介绍:</td>
										<td><span class="input01"><input name="detail_gb" type="text" style="width:480px;" /></span></td>
									</tr>
									<tr>
										<td width="60" height="40" valign="top">产品特点:</td>
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
				resize_image($pic, 's_'.$pic, 60, 80, $attachdir);
			}
			
			$back_data = $db->query("INSERT INTO ".$ros->table('product')." (name_en, name_cn, name_gb, type_id, photo, detail_en, detail_cn, detail_gb, description_en, description_cn, description_gb, orderby) VALUES ('".$param['name_en']."', '".$param['name_cn']."', '".$param['name_gb']."', '".$param['type_id']."', '".$pic."', '".$param['detail_en']."', '".$param['detail_cn']."', '".$param['detail_gb']."', '".$param['description_en']."', '".$param['description_cn']."', '".$param['description_gb']."', '".$param['orderby']."')");
			if($back_data) {
				show_msg('添加成功!','product.php?action=addproduct');  
			} else {
				show_msg('请重试!','product.php?action=addproduct');
			}
		}
	} elseif($action == "product") {
		if (!isset($param['Submit']) && !isset($_GET['edit'])) {
			if(isset($_GET['type_id'])) {
				$type_id = $_GET['type_id'];
			} else {
				$type_id = "";
			}
	?>
			<p>产品信息</p>
			<div class="blist">
				<div class="tit">产品信息列表<s><a href="product.php?action=addproduct">添加产品信息</a></s></div>
				<div class="itm">
				<form id="form1" name="form1" method="get" action="product.php">
				<input name="action" type="hidden" value="product" />
				<p style="padding:5px 0;text-align:right;"><span class="txt">产品类型:</span>
				<span>
				<select name="type_id">
				  <option value="">所有</option>
				  <?php
				  foreach ($_product_type as $key => $value) {
				  ?>
				  <option value="<?php echo $key;?>"<?php echo $type_id==$key ? " selected=\"selected\"" : "";?>><?php echo $value;?></option>
				  <?php
				  }
				  ?>
				</select></span>
				<span class="input02"><label><input type="submit" value=""></label></span></p>
				</form>
				<form id="product_list" name="product_list" method="post" action="product.php?action=product">
				<table class="tb-01">
					<thead>
						<tr>
							<th width="5%">删除</th>
							<th width="10%">产品类别</th>
							<th width="25%">产品名称</th>
							<th width="40%">简要介绍</th>
							<th width="10%">排序</th>
							<th width="10%">操作</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$where = empty($type_id) ? "" : " WHERE type_id = '".$type_id."'";
						$all_date_num = page_1::page_all_num('product',$where);
						//$last_page = intval (($all_date_num - 1) / $page_a) + 1; //获得总页数
						$page = isset($_GET['page']) ? $_GET['page'] : 1 ;
						$page_a = 8;
						$offset = ($page - 1) * $page_a;
						$query = $db->query("SELECT * FROM ".$ros->table('product').$where." ORDER BY type_id, orderby, product_id LIMIT $offset, $page_a");
						while($this_sql = $db->fetch_array($query)) {
						?>
						<tr>
							<td height="50"> <input type="checkbox" name="del_product_a[]" id="del_product_a" value="<?php echo $this_sql['product_id'];?>" /></td>
							<td><?php echo $_product_type[$this_sql['type_id']];?></td>
							<td><?php echo $this_sql['name_cn'] ? $this_sql['name_cn'] : $this_sql['name_en'];?></td>
							<td><?php echo $this_sql['detail_cn'] ? $this_sql['detail_cn'] : $this_sql['detail_en'];?></td>
							<td><span class="input01" style="width:20px;"><input name="cg_product_a[<?php echo $this_sql['product_id'];?>]" type="text" value="<?php echo $this_sql['orderby'];?>" style="width:20px;" /></span></td>
							<td><a href="product.php?action=product&edit=<?php echo $this_sql['product_id'];?>"><img src="./images/modify.gif" width="16" height="16" border="0" alt="<?php echo $_L['edit'];?>" title="<?php echo $_L['edit'];?>" /></a></td>
						</tr>
						<?php
						}
						?>
					</tbody>
					<tr>
					  <td height="25" class="page" id="page" colspan="6">
					  <?php  echo page::page_num($all_date_num,$page_a,$page,'product.php?action=product&type_id='.$type_id);?>
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
				$query = $db->query("SELECT * FROM ".$ros->table('product')." WHERE product_id='".$_GET['edit']."'");
				if($this_sql = $db->fetch_array($query)) {

?>
				<p><a href="product.php?action=product">产品信息</a> > 修改产品信息</p>
				<div class="blist">
					<div class="tit">修改产品信息</div>
					<form id="form1" name="form1" method="post" action="product.php?action=product&edit=<?php echo $_GET['edit'];?>" enctype="multipart/form-data">
					<div class="itm">
						<div class="tabs"></div>
						<table class="tb-02">
							<tbody>
								<tr>
									<td colspan="4" height="10"></td>     
								</tr>
								<tr>
									<td height="40" width="12%">产品类别:</td>
									<td width="38%"><select name="type_id">
									  <?php
									  foreach ($_product_type as $key => $value) {
									  ?>
									  <option value="<?php echo $key;?>"<?php echo $this_sql['type_id']==$key ? " selected=\"selected\"" : "";?>><?php echo $value;?></option>
									  <?php
									  }
									  ?>
								  </select></td>
									<td width="12%">产品图片:</td>
									<td width="38%"><a href="<?php echo $attachdir.$this_sql['photo'];?>" target="_blank"><?php echo $this_sql['photo'];?></a><br /><span class="input01"><input name="photo[]" type="file" /></span> ('gif','jpg','jpeg','png',尺寸:200*265px)</td>
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
										<td height="40" width="60">产品名称:</td> 
										<td><span class="input01"><input name="name_cn" type="text" style="width:480px;" value="<?php echo $this_sql['name_cn'];?>" /></span></td>    
									</tr>
									<tr>
										<td height="40" width="60">简要介绍:</td> 
										<td><span class="input01"><input name="detail_cn" type="text" style="width:480px;" value="<?php echo $this_sql['detail_cn'];?>" /></span></td>    
									</tr>
									<tr>
										<td width="60" height="40" valign="top">产品特点:</td> 
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
										<td height="40" width="60">产品名称:</td> 
										<td><span class="input01"><input name="name_en" type="text" style="width:480px;" value="<?php echo $this_sql['name_en'];?>" /></span></td>
									</tr>
									<tr>
										<td height="40" width="60">简要介绍:</td>
										<td><span class="input01"><input name="detail_en" type="text" style="width:480px;" value="<?php echo $this_sql['detail_en'];?>" /></span></td>
									</tr>
									<tr>
										<td width="60" height="40" valign="top">产品特点:</td>
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
										<td height="40" width="60">产品名称:</td>
										<td><span class="input01"><input name="name_gb" type="text" style="width:480px;" value="<?php echo $this_sql['name_gb'];?>" /></span></td>
									</tr>
									<tr>
										<td height="40" width="60">简要介绍:</td>
										<td><span class="input01"><input name="detail_gb" type="text" style="width:480px;" value="<?php echo $this_sql['detail_gb'];?>" /></span></td>
									</tr>
									<tr>
										<td width="60" height="40" valign="top">产品特点:</td>
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
				$query = $db->query("SELECT photo FROM ".$ros->table('product')." WHERE product_id='".$_GET['edit']."'");
				$this_sql = $db->fetch_array($query);
				
				$attachment_s = ($attachments_arg_s = attach_upload(array('gif','jpg','jpeg','png'), 'photo')) ? 1 : 0;
				if($attachment_s){
					$pic = $attachments_arg_s[0]['attachment'];
					resize_image($pic, 's_'.$pic, 60, 80, $attachdir);
					@unlink($attachdir.$this_sql['photo']);
					@unlink($attachdir.'s_'.$this_sql['photo']);
					$db->query("UPDATE ".$ros->table('product')." SET photo='".$pic."' WHERE product_id='".$_GET['edit']."'");
				}
				
				$back_data = $db->query("UPDATE ".$ros->table('product')." SET name_en='".$param['name_en']."', name_cn='".$param['name_cn']."', name_gb='".$param['name_gb']."', type_id='".$param['type_id']."', detail_en='".$param['detail_en']."', detail_cn='".$param['detail_cn']."', detail_gb='".$param['detail_gb']."', description_en='".$param['description_en']."', description_cn='".$param['description_cn']."', description_gb='".$param['description_gb']."', orderby='".$param['orderby']."' WHERE product_id='".$_GET['edit']."'");
				if($back_data) {
					show_msg('修改成功!','product.php?action=product');  
				} else {
					show_msg('请重试!','product.php?action=product');
				}
			}
		} else {
			if(isset($param['del_product_a'])) {
				if( is_array($param['del_product_a'])) {
					foreach($param['del_product_a'] as $k) {
						$query = $db->query("SELECT photo FROM ".$ros->table('product')." WHERE product_id='$k'");
						$this_sql = $db->fetch_array($query);
						@unlink($attachdir.$this_sql['photo']);
						@unlink($attachdir.'s_'.$this_sql['photo']);
						$db->query("DELETE FROM ".$ros->table('product')." WHERE product_id = '$k'");
					}
				}
			}
			
			if(isset($param['cg_product_a'])) {
				if( is_array($param['cg_product_a'])) {
					foreach($param['cg_product_a'] as $key => $value) {
						$query_order = $db->query("SELECT product_id FROM ".$ros->table('product')." WHERE product_id='".$key."' AND orderby='".$value."' LIMIT 0, 1");
						if (!$this_order = $db->fetch_array($query_order)) {
							$db->query("UPDATE ".$ros->table('product')." SET orderby = '".$value."' WHERE product_id = '".$key."'");
						}
					}
				}
			}

			show_msg('更新成功!','product.php?action=product');
		}
	}
?>
	</div>
</div>
</body>
</html>
