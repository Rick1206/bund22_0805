<?php
define('IN_SK',true);
require ('includes/init.php');
require ('control/seo.php');
$pageName = "Discover";
include "header.php";
$lang = "en";
?>
<link rel="stylesheet" href="css/discover.css">
<link rel="stylesheet" href="css/jquery.jscrollpane.css">
<?php
$pnum = "3";
$psnum = "4";
include "topnav_page.php";
?>
<div class="discover wrap mdcont">
    <h1 class="dinning">Dinning</h1>
    <div class="mdbox fn-clear">
        <ul>
            <li class="co1">
                <div class="ptn">
                    <div class="hx"></div><br/>
                    <div class="ptnovf">
                        <p>International cuisines are lovingly prepared at the Bund 22. These fine dishes offer not only exquisite taste experience, but also take you to experience the cultures behind the food and thus brings you a pleasant journey of the mind.</p>
                        <p>Visiting the third floor, you can enjoy authentic Japanese cuisine at YAWARGI and TENYAN. To savor the other sophisticated dishes, you are strongly suggested to taste Spanish EL WILLY Italian BOCCA and the creative cuisine Red Door,. When the evening approaches, Dubai’s Cirque Le Soir and ZEAL’S open-air bar merges perfectly into the fantastic night view of the Bund. To delight the senses, take a seat at ZEAL on the top floor and you will definitely linger here, immersing in this amazing blend of stunning scenery, finest food and beautiful melodies.</p>
                    </div>
                    <a class="next" href="javascript:;"></a>
                 </div>
            </li>
            
            <?php 
         	   	$where = " WHERE type_id = '1'";
				$param = "discover_id, title_".$lang." as name".", description_".$lang." as description ".", hours, contact, telephone, website, photo";
				$order = " order by orderby";
				$myquery = $db->query("SELECT ".$param." FROM ".$ros->table('discover').$where.$order);
				while($thisB = $db->fetch_array($myquery)) {
            ?>
            <li class="co1">
                <div class="m1">
                    <div class="img"><img src="<?php echo $file_dir."/discover/".$thisB['photo']; ?>" alt="" width="332" height="166"></div>
                    <div class="ptxt">
                        <h3><?php echo $thisB['name']; ?></h3>
                        <p><?php echo  cut_str($thisB['description'],220); ?></p>
                       
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
            
        </ul>
    </div>
</div>
<?php
include "footer.php";
?>
<script type="text/javascript">
    seajs.use(["plugin/jquery.jscrollpane","plugin/jquery.mousewheel"],function(){
        var a = $(".ptnovf");
        a.jScrollPane({showArrows: true,animateScroll: true});
        var api = a.data('jsp');
        a.siblings(".next").bind("click",function(){
            api.scrollBy(0,83);
        })
        a.siblings(".prev").bind("click",function(){
            api.scrollBy(0,-83);
        });
    })
</script>
</body>
</html>