<?php
@mysql_connect('mysql3.000webhost.com', '', '') or die('Spajanje na host nije uspjelo');
@mysql_select_db('a4900576_home')or die('Spajanje na bazu nije uspjelo');
mysql_query("SET NAMES 'utf8'");
?>
