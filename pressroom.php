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
        	
        	
           <!--  <li class="co1">
                <div class="ptn">
                    <div class="ti">
                        <img src="images/transparent.gif" alt="" width="180" height="100" style="background:url(images/fs.jpg) no-repeat -413px 11px;">
                    </div>
                </div>
            </li>
            <li>
                <div class="m1">
                    <div class="img"><img src="images/update/dr_01.jpg" alt="" width="333" height="166"></div>
                    <a href="details2.php" class="moredetails">
                        <div class="ptxt">
                            <p class="h2">THE BUND 22 Introduction</p>
                            <p class="time">2012-12-05</p>
                            <p>A Vitruvian woman comes to life in Benjamin Seroussi’s new fashion short, Divine Proportions, inspired by the disparate environments of a doctor’s office and a model casting session. <br>“I wanted to have a scientific approach to the character,” says the director. “When you have ...</p>
                            <div class="arcula"></div>
                        </div>
                    </a>
                </div>
            </li>
            <li class="co1">
                <div class="m2">
                    <div class="img"><img src="images/update/dt_02.jpg" alt="" width="166" height="333"></div>
                    <a href="details2.php" class="moredetails">
                        <div class="ptxt">
                            <p class="h2">Adidas 2012 Launch Party</p>
                            <p class="time">2012-12-05</p>
                            <p>Saudi Arabian basketball players and Qatari swimmers feature in Brigitte Lacombe’s striking portraits of Arab women in sport. Commissioned by the Qatar Museums Authority, Brigitte and her sister, the documentary filmmaker Marian Lacombe, stayed at the pre-</p>
                            <div class="arcula"></div>
                        </div>
                    </a>
                </div>
            </li>
            
            <li class="co1">
                <div class="m2">
                    <div class="img"><img src="images/update/dt_02.jpg" alt="" width="166" height="333"></div>
                    <a href="details2.php" class="moredetails">
                        <div class="ptxt">
                            <p class="h2">Adidas 2012 Launch Party</p>
                            <p class="time">2012-12-05</p>
                            <p>Saudi Arabian basketball players and Qatari swimmers feature in Brigitte Lacombe’s striking portraits of Arab women in sport. Commissioned by the Qatar Museums Authority, Brigitte and her sister, the documentary filmmaker Marian Lacombe, stayed at the pre-</p>
                            <div class="arcula"></div>
                        </div>
                    </a>
                </div>
            </li>
            <li>
                <div class="ptn">
                    <div class="ti">
                        <img src="images/transparent.gif" alt="" width="180" height="100" style="background:url(images/fs.jpg) no-repeat -410px -124px;">
                    </div>
                </div>
            </li>
            <li class="co1">
                <div class="m1">
                    <div class="img"><img src="images/update/dr_01.jpg" alt="" width="333" height="166"></div>
                    <a href="details2.php" class="moredetails">
                        <div class="ptxt">
                            <p class="h2">THE BUND 22 Introduction</p>
                            <p class="time">2012-12-05</p>
                            <p>A Vitruvian woman comes to life in Benjamin Seroussi’s new fashion short, Divine Proportions, inspired by the disparate environments of a doctor’s office and a model casting session. <br>“I wanted to have a scientific approach to the character,” says the director. “When you have ...</p>
                            <div class="arcula"></div>
                        </div>
                    </a>
                </div>
            </li> -->
            <!--            ////-->
        </ul>
    </div>
</div>
<?php

include "footer.php";
?>
</body>
</html>