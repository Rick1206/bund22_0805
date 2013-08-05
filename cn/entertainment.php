<?php
define('IN_SK',true);
require ('../includes/init.php');
require ('../control/seo.php');
$pageName = "Discover";
include "header.php";
$lang = "cn";

?>
<link rel="stylesheet" href="css/discover.css">
<?php
$pnum = "3";
$psnum = "6";
include "topnav_page.php";
?>
<div class="discover wrap mdcont">
    <h1 class="entertainment_tit">Entertainment</h1>
    <div class="mdbox fn-clear">
        <ul>
            <li class="co1">
                <div class="ptn">
                    <div class="hx2"></div>
                    </br>
                    <p>作为外滩新地标，外滩22号凝聚各类精致、华贵、精彩绝伦的时尚及艺术盛宴，在这里不仅将发现美的真谛，激发活力的生活体验，更唤醒对美、对生活的追求，萃取本真的自我。</p>
                </div>
            </li>
           <?php 
         	   	$where = " WHERE type_id = '3'";
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
                        <p><?php echo  cut_str($thisB['description'],250); ?></p>
                        <p class="more">
                            <a href="details.php?id=<?php echo $thisB['discover_id']; ?>" class="moredetails">详细资料</a>
                            <a href="loginfo.php?order=reservation" class="moredetails">预 约</a>
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
</body>
</html>