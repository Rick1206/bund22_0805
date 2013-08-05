<?php
define('IN_SK',true);
require ('../includes/init.php');
require ('../control/home.php');
require ('../control/seo.php');
$pageName = "Home";
include "header.php";
session_start();
if(isset($_SESSION["fir"])){
	$_SESSION["fir"] = "1";
}else{
	$_SESSION["fir"] ="0";
}

?>
<link rel="stylesheet" href="css/index.css">
<?php
   include "topnav_page.php";
?>
<div class="wrap100">
    <div class="banner">
    	<ul id="JSimg">   	
		<?php
		$bannerInfo = get_Banner_Info("cn");
		$num=0;
			while ($thisB = $db->fetch_array($bannerInfo)) {
		?>
        <li><img src="images/transparent.gif" alt="<?php echo $thisB['intro'] ?>" data-original="<?php echo $file_dir."/banner/".$thisB['photo']; ?>">  </li>      
		<?php
		$num++;
			}
		?>
		</ul>
		<div id="page"></div>
    </div>
    <div class="lastest fn-clear">
        <h1><i></i></h1>
        <ul>
        	<?php
        	$EnticementInfo = get_Enticement_Info("cn","1");
			while ($subB = $db->fetch_array($EnticementInfo)) {
			?>
            <li>
                <a class="moredetails" href="details2.php?id=<?php echo $subB['enticement_id']; ?>"><img width="212" src="<?php echo $file_dir."/enticement/".$subB['photo']; ?>" alt=""/></a>
                <p><?php echo $subB['name']; ?></p>
                <a class="m moredetails" href="details2.php?id=<?php echo $subB['enticement_id']; ?>">更多</a>
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
<?php
if($_SESSION["fir"] == "0"){
?>
<div id="mask" style="width:100%;height:100%;position: absolute;background-color: #000;z-index: 100;top:0;left: 0;"></div>
<script type="text/javascript">
    seajs.use('jquery',function(){
        var mask = $('#mask');
        mask.css({height:$(document).height()});
        if(detect('ipad') || detect('iphone')){
            mask.append('<img src="images/logo_ipad.png" style="position: absolute;left: 50%;top:50%;margin-left:-91px;margin-top: -90px;"/>');
            mask.delay(2000).fadeOut();
        }else{
            seajs.use('flash',function(){
                var f = swf('../flash/loading.swf','100%','100%','f123');
                mask.append(f);
            });
        }
    });
    function removeflash(){
        $('#mask').fadeOut(function(){
            $(this).remove();
        });
    }
    function detect(c) {
        if (navigator.userAgent.toLowerCase().indexOf(c) != -1) {
            return true
        }
        return false
    };
</script>
<?php
}
?>

</body>
</html>
