<?php
define('IN_SK',true);	
require(dirname(__FILE__) . '/includes/init.php');
if( empty($_SESSION['admin_id']) ) {
	echo "<script>top.location.href='login.php';</script>";
	exit();
}
require(dirname(__FILE__) .'/lib/lib_right.php');
if( @!in_array('8',$a_right) ) {
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
$pic_doc = 'job';
$attachdir = "../uploadfiles/".$pic_doc."/";

if(isset($_GET['action'])) {
	$action = $_GET['action'];
} else {
	$action = "";
}
?>
<div class="content fn-clear">
	<?php
	require_once('./left_menu6.php');	
	?>
	<div class="main">
<?php
	if($action == "addjob") {
		if (!isset($param['Submit'])) {
?>
			<p><a href="job.php?action=job">招聘信息</a> > 添加招聘信息</p>
			<div class="blist">
				<div class="tit">添加招聘信息</div>
				<form action="job.php?action=addjob" method="post" enctype="multipart/form-data" name="form1" id="form1">
				<div class="itm">
					<div class="tabs"></div>
					<table class="tb-02">
						<tbody>
							<tr>
								<td height="20" width="12%">开始时间:</td>
								<td width="38%"><span class="input01"><input type="text" name="begin_date" id="smidate" readOnly="true" ><span class="icn1"></span></span></td>
								<td width="12%">结束时间:</td>
								<td width="38%"><span class="input01"><input type="text" name="end_date" id="smidate1" readOnly="true" ><span class="icn1"></span></span></td>
							</tr>
							<tr>
								<td height="20" width="12%">所属公司:</td>
								<td width="38%"><select name="type_id">
								  <?php
								  $query_company = $db->query("SELECT company_id, company_cn FROM ".$ros->table('company')." ORDER BY company_id");
								  while($this_company = $db->fetch_array($query_company)) {
								  ?>
								  <option value="<?php echo $this_company['company_id'];?>"><?php echo $this_company['company_cn'];?></option>
								  <?php
								  }
								  ?>
								</select></td>
								<td width="12%">工作地点:</td>
								<td width="38%"><select name="type2_id">
								  <?php
								  $query_location = $db->query("SELECT location_id, location_cn FROM ".$ros->table('location')." ORDER BY location_id");
								  while($this_location = $db->fetch_array($query_location)) {
								  ?>
								  <option value="<?php echo $this_location['location_id'];?>"><?php echo $this_location['location_cn'];?></option>
								  <?php
								  }
								  ?>
								</select></td>
							</tr>
							<tr>
								<td height="20" width="12%">工作性质:</td>
								<td width="38%"><select name="type3_id">
								  <?php
								  $query_department = $db->query("SELECT department_id, department_cn FROM ".$ros->table('department')." ORDER BY department_id");
								  while($this_department = $db->fetch_array($query_department)) {
								  ?>
								  <option value="<?php echo $this_department['department_id'];?>"><?php echo $this_department['department_cn'];?></option>
								  <?php
								  }
								  ?>
								</select></td>
								<td width="12%">电邮地址:</td>
								<td width="38%"><span class="input01"><input type="text" name="email"></span></td>
							</tr>
							<tr>
								<td height="20" width="12%">电话:</td>
								<td width="38%"><span class="input01"><input type="text" name="tel"></span></td>
								<td width="12%">&nbsp;</td>
								<td width="38%">&nbsp;</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="itm">
					<div style="padding:10px 0;">
						<div class="tabs"><a href="javascript:void(0);">简体中文</a><a href="javascript:void(0);">英文</a><a href="javascript:void(0);">繁体中文</a></div>
						<div class="panes ol">
							<table class="tb-02" style="border-top: none;">
								<tbody>
									<tr>
										<td width="60" height="20">职位名称:</td> 
										<td><span class="input01"><input name="name_cn" type="text" style="width:480px;" /></span></td>    
									</tr>
									<tr>
										<td width="60" valign="top">岗位职责:</td> 
										<td><textarea name="detail_cn" rows="8" style="width:480px;"></textarea></td>    
									</tr>
									<tr>
										<td width="60" valign="top">任职资格:</td> 
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
										<td width="60" height="20">职位名称:</td> 
										<td><span class="input01"><input name="name_en" type="text" style="width:480px;" /></span></td>    
									</tr>
									<tr>
										<td width="60" valign="top">岗位职责:</td> 
										<td><textarea name="detail_en" rows="8" style="width:480px;"></textarea></td>    
									</tr>
									<tr>
										<td width="60" valign="top">任职资格:</td> 
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
										<td width="60" height="20">职位名称:</td> 
										<td><span class="input01"><input name="name_gb" type="text" style="width:480px;" /></span></td>    
									</tr>
									<tr>
										<td width="60" valign="top">岗位职责:</td> 
										<td><textarea name="detail_gb" rows="8" style="width:480px;"></textarea></td>    
									</tr>
									<tr>
										<td width="60" valign="top">任职资格:</td> 
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
				$('#smidate1').simpleDatepicker({ startdate: 2005, enddate: 2032 });	
				$("select").sSelect();
				imageChoose();
			  });
			</script>
	<?php
		} else {
			
			$back_data = $db->query("INSERT INTO ".$ros->table('job')." (name_en, name_cn, name_gb, type_id, type2_id, type3_id, email, tel, detail_en, detail_cn, detail_gb, description_en, description_cn, description_gb, begin_date, end_date) VALUES ('".$param['name_en']."', '".$param['name_cn']."', '".$param['name_gb']."', '".$param['type_id']."', '".$param['type2_id']."', '".$param['type3_id']."', '".$param['email']."', '".$param['tel']."', '".$param['detail_en']."', '".$param['detail_cn']."', '".$param['detail_gb']."', '".$param['description_en']."', '".$param['description_cn']."', '".$param['description_gb']."', '".$param['begin_date']."', '".$param['end_date']."')");
			if($back_data) {
				show_msg('添加成功!','job.php?action=addjob');  
			} else {
				show_msg('请重试!','job.php?action=addjob');
			}
		}
	} elseif($action == "job") {
		if (!isset($param['Submit']) && !isset($_GET['edit'])) {
			if(isset($_GET['type_id'])) {
				$type_id = $_GET['type_id'];
			} else {
				$type_id = "";
			}
			if(isset($_GET['type2_id'])) {
				$type2_id = $_GET['type2_id'];
			} else {
				$type2_id = "";
			}
			if(isset($_GET['type3_id'])) {
				$type3_id = $_GET['type3_id'];
			} else {
				$type3_id = "";
			}
	?>
			<p>招聘信息</p>
			<div class="blist">
				<div class="tit">招聘信息列表<s><a href="job.php?action=addjob">添加招聘信息</a></s></div>
				<div class="itm">
				<form id="form1" name="form1" method="get" action="job.php">
				<input name="action" type="hidden" value="job" />
				<p style="padding:5px 0;text-align:right;">
				<span class="txt">所属公司:</span>
				<span>
				<select name="type_id">
				  <option value="">所有</option>
				  <?php
				  $query_company = $db->query("SELECT company_id, company_cn FROM ".$ros->table('company')." ORDER BY company_id");
				  while($this_company = $db->fetch_array($query_company)) {
				  ?>
				  <option value="<?php echo $this_company['company_id'];?>"<?php echo $type_id==$this_company['company_id'] ? " selected=\"selected\"" : "";?>><?php echo $this_company['company_cn'];?></option>
				  <?php
				  }
				  ?>
				</select></span>
				<span class="txt">工作地点:</span>
				<span>
				<select name="type2_id">
				  <option value="">所有</option>
				  <?php
				  $query_location = $db->query("SELECT location_id, location_cn FROM ".$ros->table('location')." ORDER BY location_id");
				  while($this_location = $db->fetch_array($query_location)) {
				  ?>
				  <option value="<?php echo $this_location['location_id'];?>"<?php echo $type2_id==$this_location['location_id'] ? " selected=\"selected\"" : "";?>><?php echo $this_location['location_cn'];?></option>
				  <?php
				  }
				  ?>
				</select></span>
				<span class="txt">工作性质:</span>
				<span>
				<select name="type3_id">
				  <option value="">所有</option>
				  <?php
				  $query_department = $db->query("SELECT department_id, department_cn FROM ".$ros->table('department')." ORDER BY department_id");
				  while($this_department = $db->fetch_array($query_department)) {
				  ?>
				  <option value="<?php echo $this_department['department_id'];?>"<?php echo $type3_id==$this_department['department_id'] ? " selected=\"selected\"" : "";?>><?php echo $this_department['department_cn'];?></option>
				  <?php
				  }
				  ?>
				</select></span>
				<span class="input02"><label><input type="submit" value=""></label></span></p>
				</form>
				<form id="job_list" name="job_list" method="post" action="job.php?action=job">
				<table class="tb-01">
					<thead>
						<tr>
							<th width="5%">删除</th>
							<th width="25%">所属公司</th>
							<th width="10%">工作地点</th>
							<th width="10%">工作性质</th>
							<th width="25%">职位名称</th>
							<th width="20%">时间</th>
							<th width="5%">操作</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$where = "";
						$whereadd = " WHERE";
						if($type_id) {
							$where .= $whereadd." type_id = '".$type_id."'";
							$whereadd = " AND";
						}
						if($type2_id) {
							$where .= $whereadd." type2_id = '".$type2_id."'";
							$whereadd = " AND";
						}
						if($type3_id) {
							$where .= $whereadd." type3_id = '".$type2_id."'";
						}
						//$where = empty($type_id) ? "" : " WHERE type_id = '".$type_id."'";
						$all_date_num = page_1::page_all_num('job',$where);
						//$last_page = intval (($all_date_num - 1) / $page_a) + 1; //获得总页数
						$page = isset($_GET['page']) ? $_GET['page'] : 1 ;
						$page_a = 8;
						$offset = ($page - 1) * $page_a;
						$query = $db->query("SELECT c.company_en, c.company_cn, l.location_en, l.location_cn, d.department_en, d.department_cn, j.* FROM ".$ros->table('job')." j LEFT JOIN ".$ros->table('company')." c ON j.type_id=c.company_id LEFT JOIN ".$ros->table('location')." l ON j.type2_id=l.location_id LEFT JOIN ".$ros->table('department')." d ON j.type3_id=d.department_id".$where." ORDER BY begin_date DESC, job_id DESC LIMIT $offset, $page_a");
						while($this_sql = $db->fetch_array($query)) {
						?>
						<tr>
							<td height="50"> <input type="checkbox" name="del_job_a[]" id="del_job_a" value="<?php echo $this_sql['job_id'];?>" /></td>
							<td><?php echo $this_sql['company_cn'] ? $this_sql['company_cn'] : $this_sql['company_en'];?></td>
							<td><?php echo $this_sql['location_cn'] ? $this_sql['location_cn'] : $this_sql['location_en'];?></td>
							<td><?php echo $this_sql['department_cn'] ? $this_sql['department_cn'] : $this_sql['department_en'];?></td>
							<td><?php echo $this_sql['name_cn'] ? $this_sql['name_cn'] : $this_sql['name_en'];?></td>
							<td><?php echo $this_sql['begin_date']." 至 ".$this_sql['end_date'];?></td>
							<td><a href="job.php?action=job&edit=<?php echo $this_sql['job_id'];?>"><img src="./images/modify.gif" width="16" height="16" border="0" alt="<?php echo $_L['edit'];?>" title="<?php echo $_L['edit'];?>" /></a></td>
						</tr>
						<?php
						}
						?>
					</tbody>
					<tr>
					  <td height="25" class="page" id="page" colspan="7">
					  <?php  echo page::page_num($all_date_num,$page_a,$page,'job.php?action=job&type_id='.$type_id.'&type2_id='.$type2_id.'&type3_id='.$type3_id);?>
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
				$query = $db->query("SELECT * FROM ".$ros->table('job')." WHERE job_id='".$_GET['edit']."'");
				if($this_sql = $db->fetch_array($query)) {

?>
				<p><a href="job.php?action=job">招聘信息</a> > 修改招聘信息</p>
				<div class="blist">
					<div class="tit">修改招聘信息</div>
					<form id="form1" name="form1" method="post" action="job.php?action=job&edit=<?php echo $_GET['edit'];?>" enctype="multipart/form-data">
					<div class="itm">
						<div class="tabs"></div>
						<table class="tb-02">
							<tbody>
								<tr>
									<td height="20" width="12%">开始时间:</td>
									<td width="38%"><span class="input01"><input type="text" name="begin_date" id="smidate" readOnly="true" value="<?php echo $this_sql['begin_date'];?>" ><span class="icn1"></span></span></td>
									<td width="12%">结束时间:</td>
									<td width="38%"><span class="input01"><input type="text" name="end_date" id="smidate1" readOnly="true" value="<?php echo $this_sql['end_date'];?>" ><span class="icn1"></span></span></td>
								</tr>
							<tr>
								<td height="20" width="12%">所属公司:</td>
								<td width="38%"><select name="type_id">
								  <?php
								  $query_company = $db->query("SELECT company_id, company_cn FROM ".$ros->table('company')." ORDER BY company_id");
								  while($this_company = $db->fetch_array($query_company)) {
								  ?>
								  <option value="<?php echo $this_company['company_id'];?>"<?php echo $this_sql['type_id']==$this_company['company_id'] ? " selected=\"selected\"" : "";?>><?php echo $this_company['company_cn'];?></option>
								  <?php
								  }
								  ?>
								</select></td>
								<td width="12%">工作地点:</td>
								<td width="38%"><select name="type2_id">
								  <?php
								  $query_location = $db->query("SELECT location_id, location_cn FROM ".$ros->table('location')." ORDER BY location_id");
								  while($this_location = $db->fetch_array($query_location)) {
								  ?>
								  <option value="<?php echo $this_location['location_id'];?>"<?php echo $this_sql['type2_id']==$this_location['location_id'] ? " selected=\"selected\"" : "";?>><?php echo $this_location['location_cn'];?></option>
								  <?php
								  }
								  ?>
								</select></td>
							</tr>
							<tr>
								<td height="20" width="12%">工作性质:</td>
								<td width="38%"><select name="type3_id">
								  <?php
								  $query_department = $db->query("SELECT department_id, department_cn FROM ".$ros->table('department')." ORDER BY department_id");
								  while($this_department = $db->fetch_array($query_department)) {
								  ?>
								  <option value="<?php echo $this_department['department_id'];?>"<?php echo $this_sql['type3_id']==$this_department['department_id'] ? " selected=\"selected\"" : "";?>><?php echo $this_department['department_cn'];?></option>
								  <?php
								  }
								  ?>
								</select></td>
								<td width="12%">电邮地址:</td>
								<td width="38%"><span class="input01"><input type="text" name="email" value="<?php echo $this_sql['email'];?>"></span></td>
							</tr>
							<tr>
								<td height="20" width="12%">电话:</td>
								<td width="38%"><span class="input01"><input type="text" name="tel" value="<?php echo $this_sql['tel'];?>"></span></td>
								<td width="12%">&nbsp;</td>
								<td width="38%">&nbsp;</td>
							</tr>
							</tbody>
						</table>
					</div>
					<div class="itm">
						<div style="padding:10px 0;">
							<div class="tabs"><a href="javascript:void(0);">简体中文</a><a href="javascript:void(0);">英文</a><a href="javascript:void(0);">繁体中文</a></div>
							<div class="panes ol">
							<table class="tb-02" style="border-top: none;">
								<tbody>
									<tr>
										<td width="60" height="20">职位名称:</td> 
										<td><span class="input01"><input name="name_cn" type="text" style="width:480px;" value="<?php echo $this_sql['name_cn'];?>" /></span></td>    
									</tr>
									<tr>
										<td width="60" valign="top">岗位职责:</td> 
										<td><textarea name="detail_cn" rows="8" style="width:480px;"><?php echo $this_sql['detail_cn'];?></textarea></td>    
									</tr>
									<tr>
										<td width="60" valign="top">任职资格:</td> 
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
										<td width="60" height="20">职位名称:</td> 
										<td><span class="input01"><input name="name_en" type="text" style="width:480px;" value="<?php echo $this_sql['name_en'];?>" /></span></td>    
									</tr>
									<tr>
										<td width="60" valign="top">岗位职责:</td> 
										<td><textarea name="detail_en" rows="8" style="width:480px;"><?php echo $this_sql['detail_en'];?></textarea></td>    
									</tr>
									<tr>
										<td width="60" valign="top">任职资格:</td> 
										<td><textarea name="description_en" rows="8" style="width:480px;"><?php echo $this_sql['description_en'];?></textarea></td>    
									</tr>
								</tbody>
							</table>
							<table class="tb-02" style="border-top: none;">
								<tbody>
									<tr>
										<td width="60" height="20">职位名称:</td> 
										<td><span class="input01"><input name="name_gb" type="text" style="width:480px;" value="<?php echo $this_sql['name_gb'];?>" /></span></td>
									</tr>
									<tr>
										<td width="60" valign="top">岗位职责:</td> 
										<td><textarea name="detail_gb" rows="8" style="width:480px;"><?php echo $this_sql['detail_gb'];?></textarea></td>    
									</tr>
									<tr>
										<td width="60" valign="top">任职资格:</td> 
										<td><textarea name="description_gb" rows="8" style="width:480px;"><?php echo $this_sql['description_gb'];?></textarea></td>    
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
					$('#smidate1').simpleDatepicker({ startdate: 2005, enddate: 2032 });	
					$("select").sSelect();
					imageChoose();
				  });
				</script>
		<?php
				}
			} else {
				$back_data = $db->query("UPDATE ".$ros->table('job')." SET name_en='".$param['name_en']."', name_cn='".$param['name_cn']."', name_gb='".$param['name_gb']."', type_id='".$param['type_id']."', type2_id='".$param['type2_id']."', type3_id='".$param['type3_id']."', email='".$param['email']."', tel='".$param['tel']."', detail_en='".$param['detail_en']."', detail_cn='".$param['detail_cn']."', detail_gb='".$param['detail_gb']."', description_en='".$param['description_en']."', description_cn='".$param['description_cn']."', description_gb='".$param['description_gb']."', begin_date='".$param['begin_date']."' , end_date='".$param['end_date']."'WHERE job_id='".$_GET['edit']."'");
				if($back_data) {
					show_msg('修改成功!','job.php?action=job');  
				} else {
					show_msg('请重试!','job.php?action=job');
				}
			}
		} else {
			if(isset($param['del_job_a'])) {
				if( is_array($param['del_job_a'])) {
					foreach($param['del_job_a'] as $k) {
						$db->query("DELETE FROM ".$ros->table('job')." WHERE job_id = '$k'");
					}
				}
			}
			
			show_msg('更新成功!','job.php?action=job');
		}
	}
?>
	</div>
</div>
</body>
</html>
