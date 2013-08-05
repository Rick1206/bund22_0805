<?php
//$wTitle = "Bund 22-history";

define('IN_SK',true);
require ('includes/init.php');
require ('control/seo.php');
$pageName = "About";

include "header.php";
?>
<link rel="stylesheet" href="css/about.css">
<?php
$pnum = "2";
$psnum = "2";
include "topnav_page.php";
?>
<style type="text/css">
    .history2{

    }
    .history2 .t{
        font-size: 11px;
        line-height: 1.5;
        width: 115px;
        float: left;
        _display:inline;
        margin-right: 10px;
    }
</style>

<div class="about wrap mdcont">
    <h1 class="history_tit">Bund 22 History</h1>
    <div class="fn-clear">
        <div><img src="images/history2img.jpg"></div>
        <div class="history2">
            <div class="t">The Swire Pacific Limited of England constructed and completed the east wing of the building, with an electric architecture style.</div>
            <div class="t">In addition to the West wing, South and North Wing was built funtioning as a storage facility.</div>
            <div class="t">As a result of the founding of the PRC, the building was nationalized and utilized as a pen factory.</div>
            <div class="t">Three separate buildings were renovated and consolidated into one.</div>
            <div class="t">Fenghua ball-point pen factory, building to " Fenghua building "</div>
            <div class="t">Reconstruction began</div>
            <div class="t">The building was first conferred district level heritage status, followed by city level status the following year.</div>
            <div class="t" style="text-align:center"><img src="http://bund22.com/images/logo.jpg"/></div>
        </div>     
    </div>
</div>
<?php
include "footer.php";
?>

</body>
</html>