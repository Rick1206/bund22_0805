<script type="text/javascript" src="js/sea.js"></script>
<script type="text/javascript">seajs.use("page-home");</script>
</head>
<body>
<div class="wrap" id="jsOne">
    <div class="head">
        <div class="logo fn-left"><a href="./"><img src="images/logo.jpg" alt="My Bund 22"></a></div>
        <div class="topnav fn-right">
            <ul class="fn-right">
                <?php
                session_start();
                if(isset($_SESSION["userId"])){
                    ?>
                    <li id="login_username" <?php echo 'style="visibility:visible"' ?> ><span class="adm"><?php echo $_SESSION["userName"] ?></span><span class="ic"></span>&nbsp;<a id="logout_d" href="javascript:;">Logout</a></li>
                    <li class="lr" style="display: none"><a href="loginfo.php?order=login" class="moredetails" id="J_login">Login</a>|<a href="loginfo.php?order=register" class="moredetails" id="J_Register">Register</a></li>
                    <?php
                }else{
                    ?>
                    <li id="login_username" ><span class="adm"></span><span class="ic"></span>&nbsp;<a id="logout_d" href="javascript:;">Logout</a></li>
                    <li class="lr"><a href="loginfo.php?order=login" class="moredetails" id="J_login">Login</a>|<a href="loginfo.php?order=register" class="moredetails" id="J_Register">Register</a></li>
                    <?php
                }
                ?>
                <li><div class="fn-left"><a href="javascript:;">English</a></div><span class="ic ic01"></span></li>
                <li><div class="sch">
                	<form action="search_result.php"  method="get">
                	<input type="text" name="swords" placeholder="Search..." class="i"><input type="submit" value="" class="s">
                	</form>
                	</div></li>
            </ul>
        </div>
    </div>
    <div class="menu_a">
        <div class="wrap">
            <ul>
                <li><a href="./">Home</a></li>
                <li>
                    <a href="about.php" class="tar">About</a>
                    <div class="sub">
                        <a href="history2.php">Bund 22 History</a>
                        <a href="directions.php">Directions</a>
                        <a href="photo_gallery.php?page=about">Photo Gallery</a>
                    </div>
                </li>
                <li>
                    <a href="dinning.php" class="tar">Discover</a>
                    <div class="sub">
                        <a href="dinning.php">Dinning</a>
                        <a href="store_locator.php">Shopping</b></a>
                        <a href="entertainment.php">Entertainment </a>
                        <a href="photo_gallery.php?page=dinning">Photo Gallery</a>
                    </div>
                </li>
                <li>
                    <a href="enticements.php" class="tar">Enticements</a>
                    <div class="sub">
                        <a href="enticements.php?page=Events">Events Calendar</a>
                        <a href="enticements.php?page=Promotion">Promotion Calendar</a>
                        <a href="photo_gallery.php?page=enticements">Photo Gallery</a>
                    </div>
                </li>
                <li>
                    <a href="venue.php" class="tar">Venue</a>
                    <div class="sub">
                        <a href="venue.php">Make a Reservation</a>
                        <a href="photo_gallery.php?page=venue">Photo Gallery</a>
                    </div>
                </li>
                <li><a href="wedding.php" class="tar">Wedding</a></li>
                <li>
                    <a href="photo_gallery.php" class="tar">Gallery</a>
                    <div class="sub">
                        <a href="video_gallery.php">Video Gallery</a>
                        <a href="photo_gallery.php">Photo Gallery</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>