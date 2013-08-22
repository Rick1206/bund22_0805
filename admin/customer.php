<?php
define('IN_SK',true);	
require(dirname(__FILE__) . '/includes/init.php');
if( empty($_SESSION['admin_id']) ) {
	echo "<script>top.location.href='login.php';</script>";
	exit();
}
require(dirname(__FILE__) .'/lib/lib_right.php');
if( @!in_array('9',$a_right) ) {
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
$pic_doc = 'customer';
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
	require_once('./left_menu_customer.php');	
	?>
	<div class="main">
<?php
	if($action == "customer") {
		if (!isset($param['Submit']) && !isset($_GET['edit'])) {
	?>
			<p>Customer信息</p>
			<div class="blist">
				<div class="tit">Customer信息列表<s></s></div>
				<div class="itm">
				
				<form id="customer_list" name="customer_list" method="post" action="customer.php?action=customer">
				<table class="tb-01">
					<thead>
						<tr>
							<th width="5%">Delete</th>
							<th width="5%">Email</th>
							<th width="15%">Name</th>
							<th width="45%">Address</th>
							<th width="10%">Contact</th>
							<th width="10%">Deate</th>
							
						</tr>
					</thead>
					<tbody>
						<?php
						$where = empty($type_id) ? "" : " WHERE type_id = '".$type_id."'";
						$all_date_num = page_1::page_all_num('customers',$where);
						$page = isset($_GET['page']) ? $_GET['page'] : 1 ;
						$page_a = 8;
						$offset = ($page - 1) * $page_a;
						$query = $db->query("SELECT * FROM ".$ros->table('customers').$where." ORDER BY date_created desc, customer_id LIMIT $offset, $page_a");
						while($this_sql = $db->fetch_array($query)) {
						?>
						<tr>
							<td height="50"> <input type="checkbox" name="del_customer_a[]" id="del_customer_a" value="<?php echo $this_sql['customer_id'];?>" /></td>
							<td><?php echo $this_sql["email"]; ?></td>
							<td><?php echo $this_sql['first_name']." ".$this_sql['last_name'];?></td>
							<td><?php echo $this_sql['address']." ".$this_sql['city']." ".$this_sql['country'];?></td>
							<td><?php echo $this_sql['phone']." ".$this_sql['mobile']; ?></td>
							<td><?php echo $this_sql['date_created'];?></td>
						</tr>
						<?php
						}
						?>
					</tbody>
					
					<tr>
					  <td height="25" class="page" id="page" colspan="6">
					  <?php  echo page::page_num($all_date_num,$page_a,$page,'customer.php?action=customer');?>
					  </td>
					</tr>
				</table>
				<p style="padding-top:10px;"><input type="submit" class="but2" name="Submit" value="更新"><input type="button" name="rfd" value="刷新" class="but2" onclick="window.location.reload();"></p>
				</form>
				</div>
			</div>
		<?php
		} elseif(isset($_GET['edit'])) {
			
		} else {
			if(isset($param['del_customer_a'])) {
				if( is_array($param['del_customer_a'])) {
					foreach($param['del_customer_a'] as $k) {
						$db->query("DELETE FROM ".$ros->table('customers')." WHERE customer_id = '$k'");
					}
				}
			}
			
			if(isset($param['cg_customer_a'])) {
				if( is_array($param['cg_customer_a'])) {
					foreach($param['cg_customer_a'] as $key => $value) {
						$query_order = $db->query("SELECT customer_id FROM ".$ros->table('customers')." WHERE customer_id='".$key."' AND orderby='".$value."' LIMIT 0, 1");
						if (!$this_order = $db->fetch_array($query_order)) {
							$db->query("UPDATE ".$ros->table('customers')." SET orderby = '".$value."' WHERE customer_id = '".$key."'");
						}
					}
				}
			}

			show_msg('更新成功!','customer.php?action=customer');
		}
	}
?>
	</div>
</div>
</body>
</html>
