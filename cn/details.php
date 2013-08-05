<?php
$wTitle = "Bund 22";
define('IN_SK',true);

require ('../includes/init.php');
include "header.php";

$curlang = "cn";
$file_dir = "../uploadfiles";



if(isset($_GET['id'])){
	$id = $_GET['id'];
}else{
	$id = "";
}

if(isset($_SESSION["userName"]) && $_SESSION["userName"] != ""){
	$loginType = TRUE;
}else{
	$loginType = FALSE;
}


$where = " WHERE discover_id = '".$id."'";

$param = "discover_id, title_".$curlang." as name, hours, contact, website, telephone, description_".$curlang." as description";

$infoquery = $db->query("SELECT ".$param." FROM ".$ros->table('discover').$where);

$infoB = $db->fetch_array($infoquery);

$did = $infoB['discover_id'];

?>
<script type="text/javascript" src="js/sea.js"></script>
<style type="text/css">
    body{
        background-color: #fafafa;}
</style>
</head>
  <body>
    <div id="lightdetail" class="pop-detail">
        <div class="popClose"></div>
        <ul id="img_plus">
        	<?php 
        		$phowhere = " WHERE discover_id = '".$did."'";
				$phoparam = "*";
				$phoquery = $db->query("SELECT ".$phoparam." FROM ".$ros->table('discover_photo').$phowhere);
				while($phoThisB = $db->fetch_array($phoquery)) {
			?>
            <li><img src="<?php echo $file_dir."/discover_photo/".$phoThisB['photo']; ?>" alt="" width="750" height="500"></li>
            <?php
				}
			?>
            
            <!-- <li><img src="images/update/dt_02.jpg" alt="" width="750" height="500"></li> -->
        </ul>
        <a class="prev" href="javascript:;"></a>
        <a class="next" href="javascript:;"></a>
        <h1><?php echo $infoB['name'];?></h1>
        <div class="txtbox fn-clear">
            <div class="fn-left left">
                <p><span class="h">营业时间:</span><span class="r"><?php echo $infoB['hours'];?></span></p>
                <p><span class="h">联系: </span><span class="r"> <?php echo $infoB['contact'];?></span></p>
                <p><span class="h">电话: </span><span class="r"> <?php echo $infoB['telephone'];?></span></p>
                <p><span class="h">网址: </span><span class="r"><?php echo $infoB['website']; ?></span></p>
                <div class="hdlw"></div>
                <ul class="dwlist">
                	
                	<?php 
        			$pdfwhere = " WHERE discover_id = '".$did."'";
					$pdfparam = "*";
					$pdfquery = $db->query("SELECT ".$pdfparam." FROM ".$ros->table('discover_pdf').$pdfwhere);
					while($pdfThisB = $db->fetch_array($pdfquery)) {
					?>
                    <li><a 
                    	<?php
                    	if($loginType){
                    		echo 'href="'.$file_dir."/discover_pdf/".$pdfThisB['pdf'].'"';
                    	}else{
							echo 'href="loginfo.php?order=login"'.'class="dtlogin" ';
                    	}
                    	?>
                    	><?php echo $pdfThisB['name']; ?></a></li>
                    <?php
					}
                    ?>
                    <!-- <li><a href="#">Chef</a></li> -->
                </ul>
            </div>
            <div class="fn-left right">
                <p>
                	<?php  echo dhtmlspecialchars($infoB['description']);?>

            </div>
        </div>
	</div>
<script type="text/javascript">
        _lightdd.tohref($(".dtlogin"));
</script>
	
</body>
</html>
