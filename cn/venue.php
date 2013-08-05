<?php
define('IN_SK',true);
require ('../includes/init.php');
require ('../control/seo.php');
$pageName = "Venue";
include "header.php";
?>
<link rel="stylesheet" href="css/venue.css">
<?php
$pnum = "5";
include "topnav_page.php";
?>
<div class="venue wrap mdcont">
    <h1 class="Make-a-Reservation">Make-a-Reservation</h1>
    <ul class="fn-clear s3">
        <li>
            <div class="st1">
                <img src="images/update/v_01.jpg" alt="">
            </div>
        </li>
        <li>
            <div class="st2">
                <h2>外滩22号也是各类时尚型秀、高端品牌发布会及聚会的绝佳选择。</h2>
                <p>由三幢楼合并而形成的底楼中庭狭长且极富异国特色，白天阳光从顶楼的透明天窗射进来，形成自然采光，而其内阳台结构在万国建筑群中独一无二，半弧形的廊窗将视觉中的每个角度都定格为独特的画面，因而此处也成为各高端、时尚及设计品牌竞相开设布会的不二选择。</p>
                <p>此外，外滩22号的二楼及四楼可供进行发布会、展览及聚会，面积充裕，窗外浦江美景尽收眼底，不失为激发生活灵感及新体验的理想处所。</p>

            </div>
        </li>
        <li>
            <div class="st3">
                <div class="m1">
                    <div class="tit-ee"><span class="n"></span></div>
                    <p class="h13">我们将为您定制最适合的活动场地，点击此处了解更多。</p>
                </div>
                <div class="m2">
                    <div class="ci"></div>
                </div>
                <p class="pd10">
                    黄浦区中山东二路 22号 <br>
					+86 (21) 6320 1361<br>
                    +86 (21) 6320 1366          <br>
                    contact@bund22.com
                </p>
                <div class="m2">
                    <div class="d"></div>
                </div>
                <ul class="dwlist">
                    <li><a href="#">Factsheet</a></li>
                    <li><a href="#">Floorplans</a></li>
                </ul>
            </div>
        </li>
    </ul>
</div>
<?php
include "footer.php";
?>
</body>
</html>