<?php

if (!defined('IN_SK')){
    die('Hacking attempt');
}

function get_Month($mon,$lang,$type){
	global $db,$ros;
	if($type ==""){
		$strType = "";
	}else{
		$strType = " and type_id = '".$type."'";
	}
			
	$where = " WHERE MONTH(dateline) = '".$mon."' ".$strType." AND YEAR(dateline) = '".trim(date("Y"))."'";
	$param = "press_id, title_".$lang." as name, description_".$lang." as description, photo, type_id, dateline";
	$order = " order by dateline desc";
	$info = $db->query("SELECT ".$param." FROM ".$ros->table('press').$where.$order);
	
	return $info;
}

?>