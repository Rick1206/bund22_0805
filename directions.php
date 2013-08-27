<?php
define('IN_SK',true);
require ('includes/init.php');
require ('control/seo.php');
$pageName = "About";
include "header.php";
?>
<link rel="stylesheet" href="css/about.css">
<?php
$pnum = "2";
$psnum = "3";
include "topnav_page.php";
?>
<div class="about wrap mdcont">
    <h1 class="directions">Directions</h1>
    <div class="map">
        <div class="lse">
            <div class="line1"></div>
            <h2>Map & Directions</h2>
            <p class="c0">Location:</p>
            <p class="c0">22 Zhongshan Dong Er Road, Shanghai, China  <br>
				<!-- +86 (21) 6320 1361<br> -->
                +86 (21) 6320 1366          <br>
                contact@bund22.com</p>
            <div class="route">
                <div class="pattern" id="jsPattern">
                    <a href="javascript:;" id="p1" class="on"><img src="images/transparent.gif" alt=""></a>
                    <a href="javascript:;" id="p2"><img src="images/transparent.gif" alt=""></a>
                    <a href="javascript:;" id ="p3"class="nobdr"><img src="images/transparent.gif" alt=""></a>
                </div>
                <div class="fm">
                    <p>Directions From:</p>
                    <input type="text" value="" id="start" placeholder="Start" class="intext">
                    <p>Directions To:</p>
                    <input type="text" value="" id="end" placeholder="End" class="intext">
                    <input type="hidden" id="travelMode">
                    <a href="javascript:;" class="sbm" id="startTo">DIRECTIONS</a>
                    <a href="javascript:;" id="excg"><img src="images/transparent.gif" alt=""></a>
                </div>
            </div>
        </div>
        <div class="rse" id="map_canvas"></div>
        <div id="z-map" style="position:absolute;z-index:5;top:0;left:333px;"><img src="images/map_en.jpg"></div>
    </div>
</div>
<?php
include "footer.php";
?>
<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false&language=en"></script>
<script type="text/javascript">
    seajs.use('maps');
    seajs.use('jquery',function(){
        $('#start,#end').focus(function(){
            $('#z-map').fadeOut();
        });
    });
</script>
</body>
</html>