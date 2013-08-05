<?php

define('IN_SK',true);
require ('../includes/init.php');
require ('../control/seo.php');
$pageName = "Discover";
include "header.php";
$lang = "cn";

?>
<link rel="stylesheet" href="css/discover.css">
<link rel="stylesheet" href="css/jquery.jscrollpane.css">
<?php
$pnum = "3";
$psnum = "5";
include "topnav_page.php";
?>
<div class="discover wrap mdcont">
    <h1 class="shopping">shopping</h1>
    <div class="mdbox fn-clear">
        <ul>
            <li class="co1">
                <div class="ptn">
                    <div class="hx1"></div></br>
                    <div class="ptnovf">
                        <p>莅临外滩22号，您将发现各大高级定制品牌陈列其中，无论是准备婚礼或日常行头都可在这里量身定制最适合自己的。在这里绝无千篇一律，每件成品都被赋予了艺术的灵魂。郭培中国新娘（GUO PEI China Couture Wedding Grown）, AOLISHA IMPERIAL高级定制婚纱礼服（AOLISHA IMPERIAL Customized Design Wedding Dress）为准新娘们提供华贵且高品质的礼服，TINA. COUTURE高级定制（ TINA. COUTURE ）、ELEGANZA UOMO定制男鞋(ELEGANZA UOMO Bespoke Tailor)及SHEME手工定制女鞋(SHEME Customade Women Shoe)都将成为追求品质生活的你的最佳选择。</p>
                        <p>定制的概念在外滩22号也绝非仅限于服饰而已，BLACK MAGIC手工巧克力和上海首家以香槟、气泡酒为主题的专业香槟体验店“馪”也都将按照您的喜好，提供非比寻常的味觉体验。</p>
                    </div>
                    <a class="next" href="javascript:;"></a>
                </div>
            </li>
            
            <?php 
         	   	$where = " WHERE type_id = '2'";
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
<script type="text/javascript">
    seajs.use(["plugin/jquery.jscrollpane","plugin/jquery.mousewheel"],function(){
        var a = $(".ptnovf");
        a.jScrollPane({showArrows: true,animateScroll: true});
//        $(".jspVerticalBar").hide();
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