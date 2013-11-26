<?php include 'php/includes/overall/header.php'; 
protect_page();
?>
<?php
if(isset($_POST['submit']))
{
	$id = $_GET['id'];
	$vrsta_rashoda_id = $_POST['vrsta'];
	$vrsta_rashoda = naziv_vrste_rashoda($vrsta_rashoda_id);
	$racun = mysql_prep($_POST['racun']);
	$komentar= mysql_prep($_POST['komentar']);
	$iznos = mysql_prep($_POST['iznos']);
	$etiketa = mysql_prep($_POST['etiketa']);
	$new_date = date('Y-m-d',strtotime($_POST['datepicker']));
	$datum = mysql_real_escape_string($new_date);
	
	$query = mysql_query("UPDATE rashod SET ime_racuna='$racun', vrsta_rashoda='$vrsta_rashoda', komentar='$komentar', iznos=$iznos, etiketa='$etiketa', datum='{$datum}' WHERE rashod_ID='$id'") or die(mysql_error());
	if($query)
	{
		header("Location: rashodi.php");
		exit();
	}
	else 
	{
			mysql_error();
	}
}

?>
<?php include 'php/includes/overall/footer.php'; ?>