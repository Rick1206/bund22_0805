<script type="text/javascript" src="js/sea.js"></script>
<script type="text/javascript">seajs.use("page-a");</script>
</head>
<body>
<div class="all">
<div class="wrap-header">
    <div class="head fn-clear">
        <div class="fn-left">
            <div class="logo fn-left">
                <a href="./">
                    <!--[if IE 6]>
                    <img src="images/logo.jpg" alt="My Bund 22" style="position: absolute;z-index: 10">
                    <![endif]-->
                    <img src="images/logo.png" alt="My Bund 22">
                </a>
            </div>
            <div class="menu_b fn-clear">
                    <ul>
                        <li><a href="./" class="tar nav1"><i class="home" data-def="首 页"></i></a></li>
                        <li>
                            <a href="about.php" class="tar nav2 <?php echo ($pnum =="2") ? "sel": "" ?>"><i class="about" data-def="简 介"></i></a>
                        </li>
                        <li>
                            <a href="dinning.php" class="tar nav3 <?php echo ($pnum =="3") ? "sel": "" ?>"><i class="discover" data-def="探 索"></i></a>
                        </li>
                        <li>
                            <a href="enticements.php" class="tar nav4 <?php echo ($pnum =="4") ? "sel": "" ?>"><i class="enticements" data-def="活 力"></i></a>
                        </li>
                        <li>
                            <a href="venue.php" class="tar nav5 <?php echo ($pnum =="5") ? "sel": "" ?>"><i class="venue" data-def="场 地"></i></a>
                        </li>
                        <li><a href="wedding.php" class="tar nav6 <?php echo ($pnum =="6") ? "sel": "" ?>"><i class="wedding" data-def="婚 宴"></i></a></li>
                        <li>
                            <a href="photo_gallery.php" class="tar nav7 <?php echo ($pnum =="7") ? "sel": "" ?>"><i class="gallery" data-def="相 册"></i></a>
                        </li>
                    </ul>
            </div>
        </div>
        <div class="fn-right fwm">
                <a href="#" class="c1" onclick="jiathis_sendto('fb');return false;"></a>
                <a href="http://weibo.com/u/3079302271" class="c2" target="_blank"></a>
				<!--<a href="#" class="c3" onclick="jiathis_sendto('tqq');return false;"></a>-->
                <a href="#" class="c4 jiathis jiathis_txt jtico jtico_jiathis" id="moreShare"></a>
        </div>
    </div>
    <div class="sub" data-tg="about" style="display: <?php echo ($pnum =="2") ? "block": "none" ?>">
        <div class="wrap">
            <div style="margin-left: 175px;background-color: #000;padding-bottom: 5px;" class="fn-left">
                <a href="about.php" class="<?php echo ($psnum =="1") ? "sel": "" ?>"><i class="history"></i>关于外滩22号</a>
                <a href="history2.php" class="<?php echo ($psnum =="2") ? "sel": "" ?>"><i class="history"></i>外滩22号历史</a>
                <a href="directions.php" class="<?php echo ($psnum =="3") ? "sel": "" ?>"><i class="directions"></i>方 位</a>
            </div>
        </div>
    </div>
    <div class="sub" data-tg="discover" style="display: <?php echo ($pnum =="3") ? "block": "none" ?>">
        <div class="wrap">
            <div style="margin-left: 253px;background-color: #000;padding-bottom: 5px;" class="fn-left">
                <a href="dinning.php" class="<?php echo ($psnum =="4") ? "sel": "" ?>"><i class="dinning"></i>饕 餮</a>
                <a href="store_locator.php" class="<?php echo ($psnum =="5") ? "sel": "" ?>"><i class="shopping"></i>购 物</a>
                <a href="entertainment.php" class="<?php echo ($psnum =="6") ? "sel": "" ?>"><i class="entertainment"></i>娱 乐</a>
            </div>
        </div>
    </div>
    <div class="sub"  data-tg="enticements" style="display: <?php echo ($pnum =="4") ? "block": "none" ?>">
        <div class="wrap">
            <div style="margin-left: 332px;background-color: #000;padding-bottom: 5px;" class="fn-left">
                <a href="enticements.php" class="<?php echo ($psnum =="11") ? "sel": "" ?>"><i class="events"></i>全 部</a>
                <a href="enticements.php?page=Events" class="<?php echo ($psnum =="7") ? "sel": "" ?>"><i class="events"></i>活动日程</a>
                <a href="enticements.php?page=Promotion" class="<?php echo ($psnum =="8") ? "sel": "" ?>"><i class="promotion"></i>推广日程</a>
            </div>
        </div>
    </div>
    <div class="sub" data-tg="gallery" style="display: <?php echo ($pnum =="7") ? "block": "none" ?>">
        <div class="wrap">
            <div style="margin-left: 567px;background-color: #000;padding-bottom: 5px;" class="fn-left">
                <a href="photo_gallery.php" class="<?php echo ($psnum =="9") ? "sel": "" ?>"><i class="photo"></i>相 册</a>
                <a href="video_gallery.php" class="<?php echo ($psnum =="10") ? "sel": "" ?>"><i class="video"></i>视 频</a>
            </div>
        </div>
    </div>
</div>