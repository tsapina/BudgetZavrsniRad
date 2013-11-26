<?php include 'php/includes/overall/header.php'; 
protect_page();
?>

<?php
if(isset($_POST['submit']))
{
	$vrsta_rashoda_id = $_POST['vrsta'];
	$vrsta_rashoda = naziv_vrste_rashoda($vrsta_rashoda_id);
	/*Varijable iz array-a $_POST */	
	$racun = mysql_prep($_POST['racun']);
	$racun_id = racun_id($racun); /*funkcija koja ima za return racun_ID */
	$komentar= mysql_prep($_POST['komentar']);
	$iznos = mysql_prep($_POST['iznos']);
	$etiketa = mysql_prep($_POST['etiketa']);
	$new_date = date('Y-m-d',strtotime($_POST['datepicker'])); /*funkcija koja stavlja vrijednosti iz Datepickera u ispravan format za phpmyadmin*/
	$datum = mysql_real_escape_string($new_date);
	
	
	/*Spremanje u bazu*/	
	$query = mysql_query("INSERT INTO rashod (ime_racuna, vrsta_rashoda, komentar, iznos, etiketa, korisnik_ID_FK, datum, racun_ID_FK)
VALUES ('{$racun}', '{$vrsta_rashoda}', '{$komentar}', {$iznos}, '{$etiketa}', $session_korisnik_id, '{$datum}', $racun_id)")or die(mysql_error());
	
	 
	 //*Ako je spremanje ispravno proslijedit ce na prihodi.php ako nije izbacit ce error poruku*/
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
else 
{
?>
<?php
//*Funkcije koje imaju za return polja sa nazivima koje cemo vrtit pomocu foreach petlje*/
$naziv_racuna = naziv_racuna($session_korisnik_id);
?>
<div id="content-top">
	<form id="form" class="blocks" action="dodaj_rashod.php" method="post">
			<p>
				<label >Kategorija:*</label><br>
		        <select id="category" name="kategorija">
		            <?php echo ShowCategory(); ?>
		        </select>
			</p>
			<p>
			     <label >Vrsta:* </label><br>
			     <select id="type" name="vrsta">
		              <option value="0" name="vrsta">choose...</option>
		         </select>
			</p>
			<p>
				<label >Račun:* </label><br>
				<select name="racun">
					<?php foreach($naziv_racuna as $option): ?>
					  <option value="<?php echo $option; ?>"><?php echo $option; ?></option>
					 <?php endforeach; ?>
				</select>
			</p>
			<p class="area">
				<label for="komentar">Komentar:*</label><br>
				<textarea name="komentar" id ="komentar" rows="4" cols="50" class="textarea"></textarea>
			</p>
			<p>
				<label for="iznos">Iznos:*</label><br>
				<input type="text" class="text" name="iznos" id="iznos" data-required/>
			</p>
			<p>
				<label for="etiketa">Etiketa:*</label><br>
				<input type="text" name="etiketa" id="etiketa" class="text">
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