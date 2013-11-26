<?php include 'php/includes/overall/header.php';
protect_page();
 ?>
<?php
if(isset($_POST['submit']))
{
	$id = $_GET['id'];
	$komentar= mysql_prep($_POST['komentar']);
	$new_date = date('Y-m-d',strtotime($_POST['datepicker']));
	$datum = mysql_real_escape_string($new_date);
	
	echo 
	$query = mysql_query("UPDATE podsjetnik SET komentar='$komentar', datum='{$datum}'  WHERE podsjetnik_ID= '$id'") or die(mysql_error());
	if($query)
	{
		header("Location: podsjetnici.php");
		exit();
	}
	else 
	{
			mysql_error();
	}
}

?>
<?php include 'php/includes/overall/footer.php'; ?>