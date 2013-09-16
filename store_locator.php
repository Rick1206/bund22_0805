<?php

define('IN_SK',true);
require ('includes/init.php');
require ('control/seo.php');
$pageName = "Shopping";
include "header.php";
$lang = "en";

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
                        <p>To get a perfect shopping experience, the Bund 22 is the best choice for the variety of high-end custom brands, ranging from wedding dress to daily outfit. You will definitely find the most suitable for yourself. Every single garment is created with artistic ideas and clients’ needs in mind. Brides-to-be will find the dresses exclusively made for them at GUO PEI China Couture Wedding Grown and Customized Design Wedding Dresses. To get the most stylish and delicate daily garments, you can explore the TIAN FU Haute Couture Fashion, ELEGANZA UOMO Bespoke Tailor and SHEME Custom-made Women Shoe, which dedicate themselves to creating the very best of design.</p>
                        <p>With clothes or shoes, you can also try tailor-made services of a different kind. BLACK MAGIC Handmade Chocolate and HENKELL&CO Champagne will delight your senses.</p>
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