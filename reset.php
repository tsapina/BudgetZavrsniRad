<?php include 'php/includes/overall/header.php'; 
protect_page();
?>
<?php
if(intval($_GET['id']) == 0)
{
	header("Location: postavke_racuna.php");
	exit();
}

$id = mysql_prep($_GET['id']);
$query = mysql_query("DELETE FROM racun WHERE korisnik_ID_FK = '$id'")or die(mysql_error());
if($query)
{
	$prihod_query = mysql_query("DELETE FROM prihod WHERE korisnik_ID_FK = '$id'")or die(mysql_error());
	$rashod_query = mysql_query("DELETE FROM rashod WHERE korisnik_ID_FK = '$id'")or die(mysql_error());
	$podsjetnik_query = mysql_query("DELETE FROM podsjetnik WHERE korisnik_ID_FK = '$id'")or die(mysql_error());
	
	if($prihod_query && $rashod_query && $podsjetnik_query)
	{
		header("Location: postavke_racuna.php");
		exit();
	}
	else
	{
		echo "Delete failed!";
	}
}
else 
{
	echo "Delete failed!";
}
?>
<?php include 'php/includes/overall/footer.php'; ?>