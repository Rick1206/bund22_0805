<?php
//$wTitle = "Bund 22-history";

define('IN_SK',true);
require ('../includes/init.php');
require ('../control/seo.php');
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
            <div class="t">新瑞和央行設計本建築東部大樓，並由英國太古洋行投資興建，為一座四層擇衷主義建築。</div>
            <div class="t">扩建了西部南北两侧建筑，作为仓库。</div>
            <div class="t">新中国成立以后，建筑被收归国有，成为圆珠笔厂。</div>
            <div class="t">三座建筑改建后合为一栋建筑。建筑外立面改为白色的石灰涂料。</div>
            <div class="t">丰华圆珠笔厂，大楼改为“丰华大楼”</div>
            <div class="t">重建工程开始.</div>
            <div class="t">被评为区级优秀历史建筑，次年被授予上海市优秀历史建筑。</div>
            <div class="t" style="text-align:center"><img src="http://bund22.com/images/logo.jpg"/></div>
        </div>     
    </div>
</div>
<?php
include "footer.php";
?>

</body>
</html>