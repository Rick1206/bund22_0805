<?php

/**
 * backend param funcion 
 * ============================================================================
 * powered by EmporioAsia
 * http://www.emporioasia.com
 * ----------------------------------------------------------------------------
 * $Author: Calvin Shen  
 * $email:calvin@emporioasia.com
*/
//system paramtion

$param = $_POST;

function param($str){
	$info = addslashes($_POST[$str]);
	return $info;
}

//web manage
$u_group	= array('1'=>'网站管理员');

//select langauge
$lan = array(
				'1'=>'English',
				'2'=>'Chinese',
			);


//to contorl the information's display
$publish= array(
					'1' =>'是',
					'0' => '否' 
				
				);


//os language
$_L		= array(
					'edit' => '编辑',
					'refu' => '刷新',
					'copy' => '复制',
					'add'  => '添加'
 				);
				
				
//os set 

$_S		= array(
					'publish' =>'1'
				);				
				
$now_date	= date('Y-m-d');

?>