<?php include 'php/includes/overall/header.php'; 
protect_page();
?>
<?php
if(isset($_POST['submit']))
{
	$id = $_GET['id'];
	$racun = mysql_prep($_POST['naziv']);
	$valuta = mysql_prep($_POST['valuta']);
	
	$query = mysql_query("UPDATE racun SET naziv='$racun', valuta = '$valuta' WHERE racun_ID='$id'") or die(mysql_error());
	if($query)
	{
		$prihod_query = mysql_query("UPDATE prihod SET ime_racuna = '$racun' WHERE racun_ID_FK = '$id'")or die(mysql_error());
		$rashod_query = mysql_query("UPDATE rashod SET ime_racuna = '$racun' WHERE racun_ID_FK = '$id'")or die(mysql_error());
		
		if($prihod_query && $rashod_query)
		{
			header("Location: racuni.php");
			exit();
		}
		else
		{
			echo "Delete failed!";
		}
	}
	else 
	{
			mysql_error();
	}
}

?>
<?php include 'php/includes/overall/footer.php'; ?>