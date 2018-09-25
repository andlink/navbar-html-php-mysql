<?php
/*********************************************************************************
Script Name: MySQL navbar configuration
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

/** DB hostname **/
$_CONFIG['host'] = "hostname";
/** DB name **/
$_CONFIG['dbname'] = "andlink_db"; 
/** DB username **/
$_CONFIG['user'] = "username";
/** DB password **/
$_CONFIG['pass'] = "password";

/** DB tables **/
$_CONFIG['navbar_table'] = "navbar";

/** START CONNECTION TO DATABASE **/
$conn = mysql_connect($_CONFIG['host'], $_CONFIG['user'], $_CONFIG['pass']) or die('Unable to make a connection');
mysql_select_db($_CONFIG['dbname']);


?>
