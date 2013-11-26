<?php include 'php/includes/overall/header.php'; 
protect_page();
?>

<?php
if(isset($_POST['submit']))
{
	$valuta = mysql_prep($_POST['valuta']);
	$naziv = mysql_prep($_POST['naziv']);
	
	$query = mysql_query("INSERT INTO racun (valuta, naziv, korisnik_ID_FK)
VALUES ('{$valuta}', '{$naziv}', $session_korisnik_id)")or die(mysql_error());
	
	if($query)
	{
		header("Location: racuni.php");
		exit();
	}
	else 
	{
			mysql_error();
	}

}
else 
{
?>
<?php
/*Funkcija ima za return naziv valute, */
 $valuta = naziv_valute();
?>
<div id="content-top">
	<form id="form" class="blocks" action="dodaj_racun.php" method="post">
		<p>
			<label for="valuta">Valuta*:</label><br>
			<select name="valuta">
				<?php foreach($valuta as $option): ?>
				  <option value="<?php echo $option; ?>"><?php echo $option; ?></option>
				 <?php endforeach; ?>
			</select>
		</p>
		<p>
			<label for="naziv">Naziv*:</label><br>
			<input type="text" class="text" name="naziv" id="naziv"/>
		</p>
		<p>
			<input type="submit" class="btn" value="Spremi" name="submit" />	
		</p>
	</form>
</div>
<?php }
include 'php/includes/overall/footer.php'; ?>