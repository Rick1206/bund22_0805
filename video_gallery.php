<?php
define('IN_SK',true);
require_once('./includes/init.php');

if(isset($_GET['type_id'])) {
	$type_id = $_GET['type_id'];
} else {
	$type_id = "";
}

require ('control/seo.php');
$pageName = "Gallery";
include "header.php";
?>
<link rel="stylesheet" href="css/about.css">
<?php
$pnum = "7";
$psnum = "10";
include "topnav_page.php";
?>
<div class="about wrap mdcont fn-clear">
    <div class="fn-clear">
        <h1 class="gallery fn-left" style="background-position:-210px 0px;width: 120px;">Video Gallery</h1>        
    </div>
    <div class="new-gallery">
        <div class="popmaximg" id="videoframe">
            <!--<img src="" alt="">-->
            <div id="videocontent"></div>
        </div>
        <a href="javascript:;" class="gprev"></a>
        <a href="javascript:;" class="gnext"></a>
        <div class="photo_gallery" id="PG">
            <?php
            $where = "";
            $myquery = $db->query("SELECT * FROM ".$ros->table('video').$where." ORDER BY orderby");
            $num = 0;
            while($thisB = $db->fetch_array($myquery)) {
                ?>
                <a href="javascript:;" rel="<?php echo $thisB['video_url']; ?>" index="<?php echo $num; ?>" ><img src="<?php echo $file_dir."/video/".$thisB['thumbnail_url']; ?>" alt="<?php echo $thisB['name_en']; ?>" width="166" height="120"></a>
                <?php
                $num++;
            }
            ?>
        </div>
    </div>
</div>

<?php
include "footer.php";
?>
<script src="js/swfobject_flv.js" type="text/javascript"></script>
<script type="text/javascript">

    seajs.use(["plugin/jquery.lightbox","gallery"],function(){
    	
    	var so = new SWFObject("CuPlayerMiniV20_Gray_S.swf","video_area","760","500","9","#ffffff");
    		so.addParam("allowfullscreen","true");
    		so.addParam("allowscriptaccess","always");
    		so.addParam("wmode","opaque");
    		so.addParam("quality","high");
    		so.addParam("salign","lt");	
    		so.addVariable("CuPlayerImage","");
    		so.addVariable("CuPlayerShowImage","false");
    		so.addVariable("CuPlayerWidth","760");
    		so.addVariable("CuPlayerHeight","500");
    		so.addVariable("CuPlayerAutoPlay","true");
    		so.addVariable("CuPlayerAutoRepeat","true");
    		so.addVariable("CuPlayerShowControl","true");
    		so.addVariable("CuPlayerAutoHideControl","false");
    		so.addVariable("CuPlayerAutoHideTime","6");
    		so.addVariable("CuPlayerVolume","80");
        	so.addVariable("CuPlayerGetNext","true");

    	
    	$("#PG a").each(function(index){
    		
    		$(this).click(function(){
    			so.addVariable("CuPlayerFile",$(this).attr("rel"));
				so.write("videocontent");	
     		
    		});
    	}).eq(0).click();
   
    });

      
</script>
</body>
</html>