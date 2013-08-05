<?php
define('IN_SK',true);
require ('includes/init.php');
include "header.php";
$curlang = "en";

if(isset($_GET['id'])){
	$id = $_GET['id'];
}else{
	$id = "";
}

$where = " WHERE enticement_id = '".$id."'";
$param = "title_".$curlang." as name,description_".$curlang." as description , enticement_id, website";
$infoquery = $db->query("SELECT ".$param." FROM ".$ros->table('enticement').$where);
$infoB = $db->fetch_array($infoquery);
$eid = $infoB['enticement_id'];
?>
<script type="text/javascript" src="js/sea.js"></script>
<style type="text/css">
    body{background-color: #fafafa;}
</style>
</head>
<body>
    <div id="lightdetail" class="pop-detail">
        <div class="popClose"></div>
        <ul id="img_plus">
        	<?php 
        		$phowhere = " WHERE enticement_id = '".$eid."'";
				$phoparam = "*";
				$phoquery = $db->query("SELECT ".$phoparam." FROM ".$ros->table('enticement_photo').$phowhere);
				while($phoThisB = $db->fetch_array($phoquery)) {
			?>
            <li><img src="<?php echo "http://www.bund22.com/uploadfiles/enticement_photo/".$phoThisB['photo']; ?>" alt="" width="750" height="500"></li>
            <?php
				}
			?>
            
        </ul>
        <a class="prev" href="javascript:;"></a>
        <a class="next" href="javascript:;"></a>
        <h1 class="style2_h1">
        	<?php echo $infoB['name']; ?>
        </h1>
		<script type="text/javascript" >
					var jiathis_config={
						summary:"",
						pic:$("#img_plus").find("img").eq(0).attr("src"),
						hideMore:true,
						url: "http://www.bund22.com/enticements.php?id=<?php echo $eid; ?>",
						title: "<?php echo $infoB['name']; ?>"
			            //summary:"分享的文本摘要"
					}					
		</script>
        <div class="txtbox fn-clear">
            <div class="fn-left left">
                <p><span class="h">Website: </span><span class="r"><?php echo $infoB['website']; ?></span></p>
                <div class="hdlw"></div>
                <ul class="dwlist">
					<?php 
        			$pdfwhere = " WHERE enticement_id = '".$eid."'";
					$pdfparam = "*";
					$pdfquery = $db->query("SELECT ".$pdfparam." FROM ".$ros->table('enticement_pdf').$pdfwhere);
					while($pdfThisB = $db->fetch_array($pdfquery)) {
					?>
                    <li><a 
                    	<?php
                    	if($loginType){
                    		echo 'href="'.$file_dir."/enticement_pdf/".$pdfThisB['pdf'].'"';
                    	}else{
							echo 'onclick=" "';
                    	}
                    	?>
                    	><?php echo $pdfThisB['name']; ?></a></li>
                    <?php
					}
                    ?>
                </ul>
				<div class="shareit">
					<!-- JiaThis Button BEGIN -->
					<div class="jiathis_style"><span class="jiathis_txt">分享到：</span>
					<a class="jiathis_button_qzone" onclick="jiathis_sendto('qzone');return false;"><span class="jiathis_txt jtico jtico_qzone"></span></a>
					<a class="jiathis_button_tsina" onclick="jiathis_sendto('tsina');return false;"><span class="jiathis_txt jtico jtico_tsina"></span></a>
					<a class="jiathis_button_tqq" onclick="jiathis_sendto('tqq');return false;"><span class="jiathis_txt jtico jtico_tqq"></span></a>
					<a class="jiathis_button_weixin" onclick="jiathis_sendto('weixin');return false;"><span class="jiathis_txt jtico jtico_weixin"></span></a>
					<a class="jiathis_button_renren" onclick="jiathis_sendto('renren');return false;"><span class="jiathis_txt jtico jtico_renren"></span></a>
					<a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jiathis_separator jtico jtico_jiathis" target="_blank"></a>
					</div>
					
					<!-- JiaThis Button END -->

				</div>
            </div>
            <div class="fn-left right">
                <p>
                    <?php echo dhtmlspecialchars($infoB['description']);?>
                </p>
            </div>
        </div>
    </div>
</body>

</html>
