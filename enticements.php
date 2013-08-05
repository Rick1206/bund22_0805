<?php
define('IN_SK',true);
require ('includes/init.php');
require ('control/enticements.php');
require ('control/seo.php');
$pageName = "Enticements";
include "header.php";

$lang = "en";

if(isset($_GET['id'])){
	$id = $_GET['id'];
}else{
	$id = "";
}


if(isset($_GET['page'])){
	switch ($_GET['page']) {
		case 'Events':
			$type = "1";
			$psnum = "7";
			break;
		case 'Promotion':
			$type = "2";
			$psnum = "8";
			break;
		default:
			$type = "";
			$psnum = "7";
			break;
	}
}else{
	$type = "";
	$psnum = "11";
}
	
	
	$_enticement_type  = array('1' => "Events","2"=>"Promotion");		
?>
<link rel="stylesheet" href="css/discover.css">
<?php
$pnum = "4";
include "topnav_page.php";
?>
<div class="discover wrap mdcont">
    <div class="fn-clear">
        <h1 class="enticements fn-left">Enticements</h1>

    </div>
    
    <div class="mdbox fn-clear">
        <ul>
        	<?php
			$tmp_mdate= trim((string)date("m"));
			$tmp_ydate= trim((string)date("Y"));
			
			$mon = (int)$tmp_mdate;
			$year = (int)$tmp_ydate;
			
			$fyear = substr(get_fir_year($type),0,4);
			
			while ($year >= $fyear) {
				
			for ($i=12; $i>0; $i--){
			if($mon==0){
				$mon=12;
			}
			$num= 0;
			
			$monInfo = get_Month($year,$mon,"en",$type);
			
			while ($thisB = $db->fetch_array($monInfo)) {
				if($num ==0){
				?>
				<li class="co1">
	                <div class="ptn">
	                    <div class="ti">
	                        <img src="images/transparent.gif" alt="" width="180" height="100" class="mon<?php echo $mon;?>">
	                        <img src="images/year/ev_year_<?php echo $year;?>.png" />
	                    </div>
	                </div>
	            </li>
				<li>
                <div class="<?php if($thisB['type_id'] =="1"){
                						echo "m1";
                					}else{
                						echo "m2";
                					}
				 ?>">
                    <div class="img"><img src="<?php echo $file_dir."/enticement/".$thisB['photo']; ?>" alt="" ></div>
                    <a href="details2.php?id=<?php echo $thisB['enticement_id']; ?>" rel="<?php echo $thisB['enticement_id']; ?>" class="moredetails">
                        <div class="ptxt">
                            <h3><?php echo $_enticement_type[$thisB['type_id']]; ?></h3>
                            <p class="h2"><?php echo $thisB['name']; ?></p>
                            <p>
                            	
                            	<?php echo cut_str(dhtmlspecialchars($thisB['description']),250);?>
                            	</p>
                            <div class="arcula"></div>
                        </div>
                    </a>
                </div>
            </li>
					
					<?php
				}else{
					?>
				<li>
                <div class="<?php if($thisB['type_id'] =="1"){
                						echo "m1";
                					}else{
                						echo "m2";
                					}
				 ?>">
                    <div class="img"><img src="<?php echo $file_dir."/enticement/".$thisB['photo']; ?>" alt="" ></div>
                    <a href="details2.php?id=<?php echo $thisB['enticement_id']; ?>" rel="<?php echo $thisB['enticement_id']; ?>" class="moredetails">
                        <div class="ptxt">
                            <h3><?php echo $_enticement_type[$thisB['type_id']]; ?></h3>
                            <p class="h2"><?php echo $thisB['name']; ?></p>
                            <p><?php echo cut_str(dhtmlspecialchars($thisB['description']),250);?></p>
                            <div class="arcula"></div>
                        </div>
                    </a>
                </div>
            </li>		
			<?php
				}
				$num++;
			}
				$mon--;
			}
				$year--;	  
			}
        	?>

        </ul>
    </div>
</div>

<?php 
if($id != ""){
?>
<input type="hidden" id="eid" value="<?php echo $id;?>" />
<script type="text/javascript" charset="utf-8">
	seajs.use('jquery',function(){
		setTimeout(function() {
			$(".moredetails").each(function() {
				if ($(this).attr("rel") == $("#eid").val()) {
					$(this).click();
				}
			});
		}, 1200);
	});
</script>
<?php
}
?>


<?php
include "footer.php";
?>
</body>
</html>

