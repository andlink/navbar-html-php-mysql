<?php
/*********************************************************************************
Script Name: NAVBAR Functions 
Author: Andrea Gallotta
Website: http://andlink.net/
Version: 1.0.0
Date: 2018-09-01

This program is free software; you can redistribute it and/or modify it under
the terms of the GNU General Public License as published by the Free Software
Foundation; either version 3 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT
ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

Get the full text of the GPL here: http://www.gnu.org/licenses/gpl.txt
*********************************************************************************/

/** *********************************************************** 
	GET navbar level
		X00 : first level;
		XY0 : second level;
		XYZ : third level;
	
	$navpos (Integer) - navbar position	

	return (Integer) - Level 
**/
function navbar_get_level($nav_pos) {
	if ($nav_pos % 100 == 0) {
		return 1;
	} else if ($nav_pos % 10 == 0) {
		return 2;
	} else {
		return 3;
	}
}

/** *********************************************************** 
	GET navbar list
	
	$language (String 2 letter) - The language of the navbar

	return (String) - The list
**/
function navbar_list($language) {
	global $_CONFIG;
	$sep = "\n";
	$navbar = '<ul>'.$sep;
	
	$query = "SELECT * FROM ".$_CONFIG['navbar_table']." WHERE nav_language='".$language."' ORDER BY nav_pos";
	$result = mysql_query($query) or die ("Error in query: $query. ".mysql_error());		
	
	$navbar .= "<li>";		
	$cur_level = 1;
	$pre_level = 1;
	while ($row = mysql_fetch_array($result)) {		
		$cur_level = navbar_get_level($row['nav_pos']);
		if ($cur_level == $pre_level) {
			$navbar .= '</li>'.$sep.'<li>';
		} else if ($cur_level < $pre_level) {
			$navbar .= '</li>'.$sep.'</ul>'.$sep.'</li>'.$sep.'<li>';			
		} else {
			$navbar .= $sep.'<ul>'.$sep.'<li>';			
		}
		$pre_level = $cur_level;		
		if (empty($row['nav_link'])) {
			$navbar .= $row['nav_name'];
		} else {
			$navbar .= '<a href="'.$row['nav_link'].'">'.$row['nav_name'].'</a>';
		}
		
		
	}
	for ($i = 0; $i < $cur_level; $i++) {	
		$navbar .= '</li>'.$sep.'</ul>'.$sep;
	}
	
	$navbar = str_replace('<li></li>'.$sep,'',$navbar);	
	return $navbar;
}	

/** *********************************************************** 
	GET matatag from navbar
	
	$language (String 2 letter) - The language of the navbar
	$metatag (Integer) - 	0: title;
							1: description
							2: robots
							3: googlebot
							4: google

	return (String) - The metatag
**/
function navbar_metatag($language,$metatag) {
	global $_CONFIG;
	$metastr = '';
	
	$query = "SELECT * FROM ".$_CONFIG['navbar_table']." 
			   WHERE nav_language='".$language."' AND nav_link='".$_SERVER['REQUEST_URI']."'";
	$result = mysql_query($query) or die ("Error in query: $query. ".mysql_error());	
		
	$row = mysql_fetch_array($result);
	
	switch ($metatag) {
		case 0: $metastr = $row['meta_title']; break;
		case 1: $metastr = $row['meta_description']; break;
		case 2: $metastr = $row['meta_robots']; break;
		case 3: $metastr = $row['meta_googlebot']; break;
		case 4: $metastr = $row['meta_google']; break;
	}
	
	return $metastr;	
}

/** *********************************************************** 
	GET sitemap.xml - this function create the sitemap based on mysql navbar
	
	$default_language (String 2 letter) - The default language of the website

	return (String) - sitemap.xml
**/
function navbar_sitemap_xml($default_language) {
	global $_CONFIG;
	$sep = "\n";
	
	$sitestr =  '<?xml version="1.0" encoding="UTF-8"?>'.$sep;
	$sitestr .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml">'.$sep;
	
		
	$servername = 'http';
	echo $_SERVER['HTTPS'];	
	if (!empty($_SERVER['HTTPS'])) {
		if ($_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) { $servername .= 's'; };
	} 
	$servername .= '://'.$_SERVER['SERVER_NAME'];		
	
	$query = "SELECT nav_language FROM ".$_CONFIG['navbar_table']." GROUP BY nav_language";
	$resultL = mysql_query($query) or die ("Error in query: $query. ".mysql_error());
	while ($rowL = mysql_fetch_array($resultL)) {		
		$query =  "SELECT * FROM ".$_CONFIG['navbar_table']." WHERE nav_language='".$rowL['nav_language']."' ORDER BY nav_pos";		
		$resultP = mysql_query($query) or die ("Error in query: $query. ".mysql_error());
		while ($rowP = mysql_fetch_array($resultP)) {		
			if (!empty($rowP['nav_link'])) {
				$sitestr .= '   <url>'.$sep;
				$sitestr .= '      <loc>'.$servername.$rowP['nav_link'].'</loc>'.$sep;			
				
				$query =  "SELECT * FROM ".$_CONFIG['navbar_table']." WHERE nav_pos=".$rowP['nav_pos'];		
				$resultA = mysql_query($query) or die ("Error in query: $query. ".mysql_error());
				while ($rowA = mysql_fetch_array($resultA)) {		
					$sitestr .= '      <xhtml:link rel="alternate" hreflang="'.$rowA['nav_language'].'" href="'.$servername.$rowA['nav_link'].'" />'.$sep;					
					if (strcmp($default_language,$rowA['nav_language']) == 0) {
						$sitestr .= '      <xhtml:link rel="alternate" hreflang="x-default" href="'.$servername.$rowA['nav_link'].'" />'.$sep;				
					} 
				}
			
				$sitestr .= '  </url>'.$sep;
			}
		}
	}
	
	$sitestr .= '</urlset>'.$sep;
		
	return $sitestr;			
}


?>
