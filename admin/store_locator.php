<?php

define('IN_SK',true);
require ('includes/init.php');

$wTitle = "Bund 22-dinning";
include "header.php";
$lang = "en";

?>
<link rel="stylesheet" href="css/discover.css">
<?php
include "topnav_page.php";
?>
<div class="discover wrap mdcont">
    <h1 class="shopping">shopping</h1>
    <div class="mdbox fn-clear">
        <ul>
            <li class="co1">
                <div class="ptn">
                    <div class="hx1"></div>
			</br>
                    <p>Bund 22 includes a variety of high-end custom brands, ranging from wedding dress to daily outfit. You will find the most suitable ones for yourself. Every single piece is endowed with artistic spirit and declines uniformity.</p>
                </div>
            </li>
            
            <?php 
         	   	$where = " WHERE type_id = '2'";
				$param = "discover_id, title_".$lang." as name, hours, contact, telephone, website, photo";
				$myquery = $db->query("SELECT ".$param." FROM ".$ros->table('discover').$where);
				while($thisB = $db->fetch_array($myquery)) {
            ?>
            <li class="co1">
                <div class="m1">
                    <div class="img"><img src="<?php echo $file_dir."/discover/".$thisB['photo']; ?>" alt="" width="332" height="166"></div>
                    <div class="ptxt">
                        <h3><?php echo $thisB['name']; ?></h3>
                        <p><span class="h" style="display:inline;vertical-align:top;">Business Hours:</span><span class="r" style="display:inline-block"><?php echo nl2br($thisB['hours']);?></span></p>
                        <p><span class="h">Contact: </span><span class="r"><?php echo $thisB['contact']; ?></span></p>
                        <p><span class="h">Telephone: </span><span class="r"><?php echo $thisB['telephone']; ?></span></p>
                        <p><span class="h">Website: </span><span class="r"><?php echo $thisB['website']; ?></span></p>
                        <p class="more">
                            <a href="details.php?id=<?php echo $thisB['discover_id']; ?>" class="moredetails">More Details</a>
                            <a href="loginfo.php?order=reservation" class="moredetails">Reservation</a>
                        </p>
                        <div class="arcula"></div>
                    </div>
                </div>
            </li>
            <?php
            }
			?>
            <!-- <li class="co1">
                <div class="m1">
                    <div class="img"><img src="images/update/dr_02.jpg" alt="" width="333" height="166"></div>
                    <div class="ptxt">
                        <h3> Aolisha Imperial - Customized Design Wedding Dress</h3>
                        <p><span class="h">Business Hours:</span><span class="r">Daily, 11:00am-10:00pm</span></p>
                        <p><span class="h">Contact: </span><span class="r"> </span></p>
                        <p><span class="h">Telephone: </span><span class="r"> </span></p>
                        <p><span class="h">Website: </span><span class="r"> </span></p>
                        <p class="more">
                            <a href="details.php" class="moredetails">More Details</a>
                            <a href="loginfo.php?order=reservation" class="moredetails">Reservation</a>
                        </p>
                        <div class="arcula"></div>
                    </div>
                </div>
            </li>
            <li class="co1">
                <div class="m1">
                    <div class="img"><img src="images/update/dr_02.jpg" alt="" width="333" height="166"></div>
                    <div class="ptxt">
                        <h3>Tina Fu - Haute Couture Fashion</h3>
                        <p><span class="h">Business Hours:</span><span class="r">Daily, 11:00am-10:00pm</span></p>
                        <p><span class="h">Contact: </span><span class="r"> </span></p>
                        <p><span class="h">Telephone: </span><span class="r"> </span></p>
                        <p><span class="h">Website: </span><span class="r"> </span></p>
                        <p class="more">
                            <a href="details.php" class="moredetails">More Details</a>
                            <a href="loginfo.php?order=reservation" class="moredetails">Reservation</a>
                        </p>
                        <div class="arcula"></div>
                    </div>
                </div>
            </li>
            <li>
                <div class="m1">
                    <div class="img"><img src="images/update/dr_02.jpg" alt="" width="333" height="166"></div>
                    <div class="ptxt">
                        <h3>Eleganza Uomo - Bespoke Tailor</h3>
                        <p><span class="h">Business Hours:</span><span class="r">Daily, 11:00am-10:00pm</span></p>
                        <p><span class="h">Contact: </span><span class="r"> </span></p>
                        <p><span class="h">Telephone: </span><span class="r"> </span></p>
                        <p><span class="h">Website: </span><span class="r"> </span></p>
                        <p class="more">
                            <a href="details.php" class="moredetails">More Details</a>
                            <a href="loginfo.php?order=reservation" class="moredetails">Reservation</a>
                        </p>
                        <div class="arcula"></div>
                    </div>
                </div>
            </li>
            <li class="co1">
                <div class="m1">
                    <div class="img"><img src="images/update/dr_02.jpg" alt="" width="333" height="166"></div>
                    <div class="ptxt">
                        <h3>Black Magic - Handcraft Chocolate Shop</h3>
                        <p><span class="h">Business Hours:</span><span class="r">Daily, 11:00am-10:00pm</span></p>
                        <p><span class="h">Contact: </span><span class="r"> </span></p>
                        <p><span class="h">Telephone: </span><span class="r"> </span></p>
                        <p><span class="h">Website: </span><span class="r"> </span></p>
                        <p class="more">
                            <a href="details.php" class="moredetails">More Details</a>
                            <a href="loginfo.php?order=reservation" class="moredetails">Reservation</a>
                        </p>
                        <div class="arcula"></div>
                    </div>
                </div>
            </li>
            <li class="co1">
                <div class="m1">
                    <div class="img"><img src="images/update/dr_02.jpg" alt="" width="333" height="166"></div>
                    <div class="ptxt">
                        <h3>Sheme - Customade Women Shoe</h3>
                        <p><span class="h">Business Hours:</span><span class="r">Daily, 11:00am-10:00pm</span></p>
                        <p><span class="h">Contact: </span><span class="r"> </span></p>
                        <p><span class="h">Telephone: </span><span class="r"> </span></p>
                        <p><span class="h">Website: </span><span class="r"> </span></p>
                        <p class="more">
                            <a href="details.php" class="moredetails">More Details</a>
                            <a href="loginfo.php?order=reservation" class="moredetails">Reservation</a>
                        </p>
                        <div class="arcula"></div>
                    </div>
                </div>
            </li>
            <li class="co1">
                <div class="m1">
                    <div class="img"><img src="images/update/dr_02.jpg" alt="" width="333" height="166"></div>
                    <div class="ptxt">
                        <h3>Henkell & Co - Champaigne Concept Shop</h3>
                        <p><span class="h">Business Hours:</span><span class="r">Daily, 11:00am-10:00pm</span></p>
                        <p><span class="h">Contact: </span><span class="r"> </span></p>
                        <p><span class="h">Telephone: </span><span class="r"> </span></p>
                        <p><span class="h">Website: </span><span class="r"> </span></p>
                        <p class="more">
                            <a href="details.php" class="moredetails">More Details</a>
                            <a href="loginfo.php?order=reservation" class="moredetails">Reservation</a>
                        </p>
                        <div class="arcula"></div>
                    </div>
                </div>
            </li> -->
        </ul>
    </div>
</div>
<?php
include "footer.php";
?>
<script type="text/javascript">
    seajs.use("lightup");
</script>
</body>
</html>