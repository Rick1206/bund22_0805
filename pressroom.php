<?php
define('IN_SK',true);
$wTitle = "Bund 22-Press Room ";
include "header.php";

require ('includes/init.php');
require ('control/press.php');
$lang = "en";

?>
<link rel="stylesheet" href="css/discover.css">
<?php
include "topnav_page.php";
?>
<div class="discover wrap mdcont">
    <h1 class="pressroom">Press</h1>
    <div class="mdbox fn-clear">
        <ul>
        	
        	<?php
			$tmp_date= trim((string)date("m"));
			$mon = (int)$tmp_date;
			while($mon>0){
			$num= 0;
			$monInfo = get_Month($mon,"en",$type);
			while ($thisB = $db->fetch_array($monInfo)) {
				if($num ==0){
				?>
				<li class="co1">
	                <div class="ptn">
	                    <div class="ti">
	                        <img src="images/transparent.gif" alt="" width="180" height="100" class="mon<?php echo $mon;?>" style="background:url(images/fs.jpg) no-repeat -413px 11px;">
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
                    <div class="img"><img src="<?php echo $file_dir."/press/".$thisB['photo']; ?>" alt="" ></div>
                    <a href="details3.php?id=<?php echo $thisB['press_id']; ?>" class="moredetails">
                        <div class="ptxt">
                            <h3><?php echo $_enticement_type[$thisB['type_id']]; ?></h3>
                            <p class="h2"><?php echo $thisB['name']; ?></p>
                             <p class="time"><?php echo $thisB['dateline']; ?></p>
                            <p><?php echo cut_str(dhtmlspecialchars($thisB['description']),300);?>
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
                    <div class="img"><img src="<?php echo $file_dir."/press/".$thisB['photo']; ?>" alt="" ></div>
                    <a href="details3.php?id=<?php echo $thisB['press_id']; ?>" class="moredetails">
                        <div class="ptxt">
                            <h3><?php echo $_enticement_type[$thisB['type_id']]; ?></h3>
                            <p class="h2"><?php echo $thisB['name']; ?></p>
                            <p class="time"><?php echo $thisB['dateline']; ?></p>
                            <p><?php echo cut_str(dhtmlspecialchars($thisB['description']),300);?></p>
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
        	?>
        </ul>
    </div>
</div>
<?php

include "footer.php";
?>
</body>
</html>