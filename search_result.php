<?php
define('IN_SK',true);
require ('includes/init.php');
include "header.php";
$lang = "en";
$_enticement_type  = array('1' => "Events","2"=>"Promotion");
$search_words = isset($_GET['swords']) ? $_GET['swords'] : "";
$where = " where title_".$lang." like '%".$search_words."%'";
?>
<link rel="stylesheet" href="css/discover.css">
<link rel="stylesheet" href="css/jquery.jscrollpane.css">
<?php
include "topnav_page.php";
?>
<div class="discover wrap mdcont">
    <div class="mdbox fn-clear">
        <ul>
            <?php 
				$param = "discover_id, title_".$lang." as name".", description_".$lang." as description ".", photo";
				$myquery = $db->query("SELECT ".$param." FROM ".$ros->table('discover').$where);
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
		
			<?php
			$num= 0;
			$param = "enticement_id, type_id, title_".$lang." as name".", description_".$lang." as description ".", photo";
			$myquery = $db->query("SELECT ".$param." FROM ".$ros->table('enticement').$where);
			while ($thisB = $db->fetch_array($myquery)) {
				if($num ==0){
				?>
				<li>
                <div class="<?php if($thisB['type_id'] =="1"){
                						echo "m1";
                					}else{
                						echo "m2";
                					}
				 ?>">
                    <div class="img"><img src="<?php echo $file_dir."/enticement/".$thisB['photo']; ?>" alt="" ></div>
                    <a href="details2.php?id=<?php echo $thisB['enticement_id']; ?>" class="moredetails">
                        <div class="ptxt">
                            <h3><?php echo $_enticement_type[$thisB['type_id']]; ?></h3>
                            <p class="h2"><?php echo $thisB['name']; ?></p>
                            <p>
                            	
                            	<?php echo cut_str(dhtmlspecialchars($thisB['description']),300);?>
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
                    <div class="img"><img src="<?php echo $file_dir."/enticement/".$thisB['photo']; ?>" alt="" ></div>
                    <a href="details2.php?id=<?php echo $thisB['enticement_id']; ?>" class="moredetails">
                        <div class="ptxt">
                            <h3><?php echo $_enticement_type[$thisB['type_id']]; ?></h3>
                            <p class="h2"><?php echo $thisB['name']; ?></p>
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