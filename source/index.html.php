<!-- ---------------------------------------------------------------------------------
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
--------------------------------------------------------------------------------- -->
<?php
include_once('./db_conf.php'); 	
include_once('./navbar_functions.php'); 
?>

<!doctype html>
<html>
<body>

<h1>NAVBAR LIST from MySQL database</h1>

<h2>navbar</h2>
<?php echo navbar_list('en'); ?>

<h2>sitemap.xml</h2>
<textarea readonly="readonly" style="width:100%; height:300px; border:none; ">
<?php echo navbar_sitemap_xml('en'); ?>
</textarea>

</body>
</html>
