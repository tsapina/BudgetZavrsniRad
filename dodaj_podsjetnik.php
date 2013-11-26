<?php 
include 'php/includes/overall/header.php'; 
protect_page();
?>

<?php
if(isset($_POST['submit']))
{
	/*Varijable iz array-a $_POST */	
	$komentar= mysql_prep($_POST['komentar']);
	$new_date = date('Y-m-d',strtotime($_POST['datepicker'])); /*funkcija koja stavlja vrijednosti iz Datepickera u ispravan format za phpmyadmin*/
	$datum = mysql_real_escape_string($new_date);
	
	/*Spremanje u bazu*/	
	$query = mysql_query("INSERT INTO podsjetnik (komentar, datum, korisnik_ID_FK) 
	VALUES ('{$komentar}', '{$datum}', $session_korisnik_id)")or die(mysql_error());	 
	 //*Ako je spremanje ispravno proslijedit ce na prihodi.php ako nije izbacit ce error poruku*/
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
else 
{
?>

<div id="content-top">
	<form id="form" class="blocks" action="dodaj_podsjetnik.php" method="post">
			<p class="area">
				<label for="komentar">Komentar:*</label><br>
				<textarea name="komentar" id ="komentar" rows="4" cols="50" class="textarea"></textarea>
			</p>
			<p>
				<label for="datepicker">Datum:*</label><br>
				<input type="text" id="datepicker" name="datepicker" class="text"/>
			</p>
			<p>
				<label> </label>
				<input type="submit" class="btn" value="Spremi" name="submit" />
			</p>
	</form>
</div>
<?php }
include 'php/includes/overall/footer.php'; ?>