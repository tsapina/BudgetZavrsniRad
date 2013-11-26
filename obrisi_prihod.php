<?php include 'php/includes/overall/header.php'; 
protect_page();
?>
<?php
if(intval($_GET['id']) == 0)
{
	header("Location: prihodi.php");
	exit();
}

$id = mysql_prep($_GET['id']);
$query = mysql_query("DELETE FROM prihod WHERE prihod_ID = '$id' LIMIT 1")or die(mysql_error());
if(query)
{
	header("Location: prihodi.php");
	exit();
}
else 
{
	echo "Delete failed!";
}
?>
<?php include 'php/includes/overall/footer.php'; ?>