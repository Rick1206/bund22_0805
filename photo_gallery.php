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
$psnum = "9";
include "topnav_page.php";
?>
<div class="about wrap mdcont fn-clear">
    <div class="fn-clear">
        <h1 class="gallery fn-left">Photo Gallery</h1>
        <div class="fn-left arcula2"></div>
    </div>
    <div class="fn-left">
        <div class="sublist">
            <a href="photo_gallery.php" <?php echo ($type_id==0) ? "class='on'" :""; ?>>All</a>
            <a href="photo_gallery.php?type_id=1" <?php echo ($type_id==1) ? "class='on'" :""; ?>>About</a>
            <a href="photo_gallery.php?type_id=2" <?php echo ($type_id==2) ? "class='on'" :""; ?>>Discover</a>
            <a href="photo_gallery.php?type_id=3" <?php echo ($type_id==3) ? "class='on'" :""; ?>>Enticements</a>
            <a href="photo_gallery.php?type_id=4" <?php echo ($type_id==4) ? "class='on'" :""; ?>>Venue</a>
            <a href="photo_gallery.php?type_id=5" <?php echo ($type_id==5) ? "class='on'" :""; ?>>Wedding</a>
        </div>
    </div>
    <div class="new-gallery">
        <div class="popmaximg">
            <img src="" alt="" style="display:none">
            <div class="loadz"></div>
        </div>
        <a href="javascript:;" class="gprev"></a>
        <a href="javascript:;" class="gnext"></a>
        <div class="photo_gallery" id="PG">
            <?php
            $where = ($type_id!="") ? "WHERE type_id=".$type_id : "";
            $myquery = $db->query("SELECT * FROM ".$ros->table('gallery').$where." ORDER BY orderby");
            $num = 0;
            while($thisB = $db->fetch_array($myquery)) {
                ?>
                <a href="<?php echo $file_dir."/gallery/".$thisB['photo_url']; ?>" index="<?php echo $num; ?>"><img src="<?php echo $file_dir."/gallery/s_".$thisB['photo_url']; ?>" alt="<?php echo $thisB['name_cn']; ?>" width="166" height="120"></a>
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
<script type="text/javascript">
    seajs.use("gallery");
</script>
</body>
</html>