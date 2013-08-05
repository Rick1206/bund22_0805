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
                        <p>外滩22号为您准备了丰盛的各国美食，异国饕餮不仅是味觉上的享受，更是一场心灵的旅行。</p>
                        <p>您可在三楼的YAWARGI和TENYAN享受纯正的日本料理，而丰富的欧洲美食也在五楼恭候您的光临，西班牙餐厅EL WILLY，意大利餐厅BOCCA和西式创意料理Red Door都是品味生活的绝佳之处。华灯初上时，不妨来四楼迪拜的Cirque Le Soir夜店或顶楼的ZEAL坐坐，当久负盛名的异域风情、露天酒吧与外滩瑰丽的夜景融为一体时，所带来的视觉、味觉与听觉的冲击定会让您流连忘返。</p>
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
                        <p><?php echo  cut_str($thisB['description'],200); ?></p>
                       
                        <p class="more">
                            <a href="details.php?id=<?php echo $thisB['discover_id']; ?>" class="moredetails">详细资料</a>
                            <a href="loginfo.php?order=reservation" class="moredetails">预定</a>
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