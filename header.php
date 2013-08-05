<!DOCTYPE html>
<html>
<head>
    <?php
    if($pageName !=""){
    	$seoInfo = get_Seo_Info($pageName,"en");
		$thisB = $db->fetch_array($seoInfo);
	}
    ?>	
	<title><?php echo isset($thisB['title']) ? $thisB['title'] :"Bund22" ?></title>
	<meta name='keywords' content='<?php echo isset($thisB['keywords']) ? $thisB['keywords']:""?>' />
	<meta name='description' content='<?php echo isset($thisB['description']) ? $thisB['description']:""?>' />
    <meta charset="utf-8">
    <!-- <meta name="viewport" content="initial-scale=1.0, user-scalable=no" /> -->
    <meta name="viewport" content="target-densitydpi=device-dpi,width=device-width" >
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="shortcut icon" href="favicon.ico">
