<?php include 'php/includes/overall/header.php'; 
protect_page();
?>
<?php
if(intval($_GET['id']) == 0)
{
	header("Location: rashodi.php");
	exit();
}

$id = mysql_prep($_GET['id']);
$query = mysql_query("DELETE FROM rashod WHERE rashod_ID = '$id' LIMIT 1")or die(mysql_error());
if(query)
{
	header("Location: rashodi.php");
	exit();
}
else 
{
	echo "Delete failed!";
}
?>
<?php include 'php/includes/overall/footer.php'; ?>