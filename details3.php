<?php
$wTitle = "Bund 22";
include "header.php";
define('IN_SK',true);

require ('includes/init.php');

$curlang = "en";

if(isset($_GET['id'])){
	$id = $_GET['id'];
}else{
	$id = "";
}

$where = " WHERE press_id = '".$id."'";

$param = "title_".$curlang." as name,description_".$curlang." as description , press_id";


$infoquery = $db->query("SELECT ".$param." FROM ".$ros->table('press').$where);

$infoB = $db->fetch_array($infoquery);

$eid = $infoB['press_id'];

?>
<script type="text/javascript" src="js/sea.js"></script>
<style type="text/css">
    body{
        background-color: #fafafa;}
</style>
</head>
<body>
    <div id="lightdetail" class="pop-detail">
        <div class="popClose"></div>
        <h1 class="style2_h1">
        	<?php echo $infoB['name']; ?></h1>
        <p>
        	<?php echo dhtmlspecialchars($infoB['description']);?>
        </p>
    </div>
</body>

</html>
