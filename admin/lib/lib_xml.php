<?php
/**
 * admin xml function 
 * ============================================================================
 * powered by EmporioAsia
 * http://www.emporioasia.com
 * ----------------------------------------------------------------------------
 * $Author: John Wu  
 * $email:john@emporioasia.com
*/
if (!defined('IN_SK'))
{
    die('Hacking attempt');
}

function milestone_xml()
{
	global $ros,$db,$pic_doc;
	
	$pic_dir = "../uploadfiles/".$pic_doc."/";
	$pic_dir_cn = "uploadfiles/".$pic_doc."/";
		
		$maindata = "";
		$maindata_cn = "";
		
		/*导出XML文件开始*/
		/*获取数据开始*/
		$query_year = $db->query("SELECT LEFT(year, 4) AS year1 FROM ".$ros->table('milestone')." GROUP BY LEFT(year, 4) ORDER BY LEFT(year, 4) DESC");
		while ($this_year = $db->fetch_array($query_year)) {
			$query_xml = $db->query("SELECT title_en, title_cn, photo FROM ".$ros->table('milestone')." WHERE LEFT(year, 4)='".$this_year['year1']."' ORDER BY year DESC, milestone_id DESC LIMIT 0, 1");
			if ($this_xml = $db->fetch_array($query_xml)) {
				$maindata .= "\t\t<item>\r\n".
							 "\t\t\t<img>".$pic_dir.$this_xml['photo']."</img>\r\n".
							 "\t\t\t<link>about_2_list.php?year=".$this_year['year1']."</link>\r\n".
							 "\t\t\t<year>".$this_year['year1']."</year>\r\n".
							 "\t\t\t<cont>".$this_xml['title_en']."</cont>\r\n".
							 "\t\t</item>\r\n";
				$maindata_cn .= "\t\t<item>\r\n".
								"\t\t\t<img>".$pic_dir_cn.$this_xml['photo']."</img>\r\n".
								"\t\t\t<link>about_2_list.php?year=".$this_year['year1']."</link>\r\n".
								"\t\t\t<year>".$this_year['year1']."</year>\r\n".
								"\t\t\t<cont>".$this_xml['title_cn']."</cont>\r\n".
								"\t\t</item>\r\n";
			}
		}

		/*正式导出XML开始*/
		$XMLdir = "../../../en/";
		$XMLdir_cn = "../../../";
		$cachedata = chr('239').chr('187').chr('191').'<'.'?'.'xml version="1.0" encoding="utf-8"'.'?'.'>'."\r\n".'<wall3d>'."\r\n\t".'<'.'items delayTime = "3000" icon_distance = "30" easeingTime = "0.8"'.'>'."\r\n";
		$cachedata_cn = chr('239').chr('187').chr('191').'<'.'?'.'xml version="1.0" encoding="utf-8"'.'?'.'>'."\r\n".'<wall3d>'."\r\n\t".'<'.'items delayTime = "3000" icon_distance = "30" easeingTime = "0.8"'.'>'."\r\n";
		$cachedata .= $maindata;
		$cachedata_cn .= $maindata_cn;
		$cachedata .= "\t".'</items>'."\r\n".'</wall3d>'."\r\n";
		$cachedata_cn .= "\t".'</items>'."\r\n".'</wall3d>'."\r\n";
		@$fp = fopen($XMLdir.'data.xml', 'w');
		fwrite($fp, $cachedata);
		fclose($fp);
		@$fp = fopen($XMLdir_cn.'data.xml', 'w');
		fwrite($fp, $cachedata_cn);
		fclose($fp);
		/*正式导出XML开始*/
		/*导出XML文件结束*/
}

function honor_xml()
{
	global $ros,$db,$pic_doc;
	
	$pic_dir = "../uploadfiles/".$pic_doc."/";
	$pic_dir_cn = "uploadfiles/".$pic_doc."/";
		
		$maindata = "";
		$maindata_cn = "";
		
		/*导出XML文件开始*/
		/*获取数据开始*/
		$query_xml = $db->query("SELECT * FROM ".$ros->table('honor')." ORDER BY orderby, honor_id");
		while ($this_xml = $db->fetch_array($query_xml)) {
			$maindata .= "\t<Image_Information>\r\n".
						 "\t\t<img_name>".$this_xml['title_en']."</img_name>\r\n".
						 "\t\t<img_link>".$pic_dir.$this_xml['photo']."</img_link>\r\n".
						 "\t\t<thumb_image>".$pic_dir.$this_xml['photo']."</thumb_image>\r\n".
						 "\t</Image_Information>\r\n";
			$maindata_cn .= "\t<Image_Information>\r\n".
						 	"\t\t<img_name>".$this_xml['title_cn']."</img_name>\r\n".
							"\t\t<img_link>".$pic_dir_cn.$this_xml['photo']."</img_link>\r\n".
							"\t\t<thumb_image>".$pic_dir_cn.$this_xml['photo']."</thumb_image>\r\n".
						 	"\t</Image_Information>\r\n";
		}

		/*正式导出XML开始*/
		$XMLdir = "../../../en/";
		$XMLdir_cn = "../../../";
		$cachedata = chr('239').chr('187').chr('191').'<'.'?'.'xml version="1.0" encoding="utf-8"'.'?'.'>'."\r\n".'<URL>'."\r\n";
		$cachedata_cn = chr('239').chr('187').chr('191').'<'.'?'.'xml version="1.0" encoding="utf-8"'.'?'.'>'."\r\n".'<URL>'."\r\n";
		$cachedata .= $maindata;
		$cachedata_cn .= $maindata_cn;
		$cachedata .= '</URL>'."\r\n";
		$cachedata_cn .= '</URL>'."\r\n";
		@$fp = fopen($XMLdir.'imglink.xml', 'w');
		fwrite($fp, $cachedata);
		fclose($fp);
		@$fp = fopen($XMLdir_cn.'imglink.xml', 'w');
		fwrite($fp, $cachedata_cn);
		fclose($fp);
		/*正式导出XML开始*/
		/*导出XML文件结束*/
}

function detail_xml()
{
	global $ros,$db,$pic_doc;
	
	$pic_dir = "../uploadfiles/".$pic_doc."/";
	$pic_dir_cn = "uploadfiles/".$pic_doc."/";
		
		$maindata = "";
		$maindata_cn = "";
		
		/*导出XML文件开始*/
		/*获取数据开始*/
		$query_xml = $db->query("SELECT * FROM ".$ros->table('detail')." ORDER BY orderby, detail_id");
		while ($this_xml = $db->fetch_array($query_xml)) {
			$maindata .= "\t<item>\r\n".
						 "\t\t<pic>".$pic_dir.$this_xml['photo']."</pic>\r\n".
						 "\t\t<title><![CDATA[".$this_xml['title_en']."]]></title>\r\n".
						 "\t</item>\r\n";
			$maindata_cn .= "\t<item>\r\n".
							"\t\t<pic>".$pic_dir_cn.$this_xml['photo']."</pic>\r\n".
						 	"\t\t<title><![CDATA[".$this_xml['title_cn']."]]></title>\r\n".
						 	"\t</item>\r\n";
		}

		/*正式导出XML开始*/
		$XMLdir = "../../../en/";
		$XMLdir_cn = "../../../";
		$cachedata = '<'.'?'.'xml version="1.0" encoding="utf-8"'.'?'.'>'."\r\n".'<data>'."\r\n";
		$cachedata_cn = '<'.'?'.'xml version="1.0" encoding="utf-8"'.'?'.'>'."\r\n".'<data>'."\r\n";
		$cachedata .= $maindata;
		$cachedata_cn .= $maindata_cn;
		$cachedata .= '</data>'."\r\n";
		$cachedata_cn .= '</data>'."\r\n";
		@$fp = fopen($XMLdir.'detail.xml', 'w');
		fwrite($fp, $cachedata);
		fclose($fp);
		@$fp = fopen($XMLdir_cn.'detail.xml', 'w');
		fwrite($fp, $cachedata_cn);
		fclose($fp);
		/*正式导出XML开始*/
		/*导出XML文件结束*/
}
?>