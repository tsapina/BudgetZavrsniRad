<?php include 'php/includes/overall/header.php'; 
protect_page();
?>
<?php
if(isset($_POST['submit']))
{
	$id = $_GET['id'];
	$racun = mysql_prep($_POST['racun']);
	$racun_id = racun_id($racun);
	$vrsta_prihoda = mysql_prep($_POST['vrsta_prihoda']);
	$komentar= mysql_prep($_POST['komentar']);
	$iznos = mysql_prep($_POST['iznos']);
	$etiketa = mysql_prep($_POST['etiketa']);
	$new_date = date('Y-m-d',strtotime($_POST['datepicker']));
	$datum = mysql_real_escape_string($new_date);
	
	echo 
	$query = mysql_query("UPDATE prihod SET ime_racuna='$racun', vrsta_prihoda='$vrsta_prihoda', komentar='$komentar', iznos=$iznos, etiketa='$etiketa', datum='{$datum}', racun_ID_FK = {$racun_id} WHERE prihod_ID='$id'") or die(mysql_error());
	if($query)
	{
		header("Location: prihodi.php");
		exit();
	}
	else 
	{
			mysql_error();
	}
}

?>
<?php include 'php/includes/overall/footer.php'; ?>