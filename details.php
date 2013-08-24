<?php
$wTitle = "Bund 22";
define('IN_SK',true);

require ('includes/init.php');
include "header.php";

$curlang = "en";
$file_dir = "./uploadfiles";



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
				$order = "ORDER BY orderby";
				$phoquery = $db->query("SELECT ".$phoparam." FROM ".$ros->table('discover_photo').$phowhere.$order);
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
                <p><span class="h">Business Hours:</span><span class="r"><?php echo $infoB['hours'];?></span></p>
                <p><span class="h">Contact: </span><span class="r"> <?php echo $infoB['contact'];?></span></p>
                <p><span class="h">Telephone: </span><span class="r"> <?php echo $infoB['telephone'];?></span></p>
                <p><span class="h">Website: </span><span class="r"><?php echo $infoB['website']; ?></span></p>
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
<!--                 	//dhtmlspecialchars
Bund 22 prepares a wide range of food from all over the world for you. International food offers not only exquisite taste experience, but also a pleasant journey of mind.
</p><p>
You can enjoy Japanese cuisine at YAWARGI and TENYAN on the third floor. French seafood dishes are also on the same floor from L'ECAILLER. Except for French food, other European cuisines on the fifth floor are also excellent choices----Spanish EL WILLY, Italian BOCCA and Belgium Brasserie BRIX. When the evening light is on, Dubai's ZEAL'S open bar merges perfectly into the fantastic Bund night view. Take a seat at ZEAL on the top floor and you will definitely linger here to enjoy the amazing mix of scenery, food and sound.
</p>
<p>
Bund 22 includes a variety of high-end custom brands, ranging from wedding dress to daily outfit. You will find the most suitable ones for yourself. Every single piece is endowed with artistic spirit and declines uniformity. GUO PEI China Couture Wedding Grown and Customized Design Wedding Dress make luxury and high-quality dresses for brides-to-be. TIAN FUHaute Couture Fashion, ELEGANZA UOMO Bespoke Tailor and SHEME Customade Women Shoe are all ideal options for a high-profile life. 
</p><p>
Customization is not a concept limited merely to clothes or shoes. BLACK MAGIC Handmade Chocolate and HENKELL&CO Champagne can serve you with extraordinary gourmet experience according to your preference.</p> -->
            </div>
        </div>
	</div>
<script type="text/javascript">
        _lightdd.tohref($(".dtlogin"));
</script>
	
</body>
</html>
