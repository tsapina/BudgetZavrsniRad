<?php include 'php/includes/overall/header.php'; 
protect_page();
?>
<?php
if(empty($_POST) === false)
{
	if(md5($_POST['trenutna_zaporka']) === $korisnik_podaci['zaporka'])
	{
		if(trim($_POST['zaporka']) !== trim($_POST['zaporka_ponovo']))
		{
			$errors[] = 'Nove zaporke se ne poklapaju!';
		}
		else if(strlen($_POST['zaporka']) < 6)
		{
			$errors[] = 'Zaporka mora sadržavati najmanje 6 znakova!';
		}
	}
	else 
	{
		$errors[] = 'Trenutna zaporka je netocna';
	}
}
if(isset($_GET['success']) && empty($_GET['success']))
{
	echo "Zaporka uspješno promjenjena!";
}
else 
{
	if(empty($_POST) === false && empty($errors) === true)
	{
		promjena_lozinke($session_korisnik_id, $_POST['zaporka']);
		header('Location: postavke_racuna.php?success');
	}
	else if(empty($errors) === false)
	{
		output_errors($errors); 
	}
	?>
	<div id="content-top">
		<p style="text-align: left; margin-bottom: 5px;">Resetiranjem računa gubite sve dosada unešene podatke!</p>
		<p class="action">
			<?php echo "<a href='reset.php?id=$session_korisnik_id' onclick='return confirm(\"Dali ste sigurni da želite resetirati ovaj račun?\")'>Resetiraj racun</a>"; ?>
		</p>
	</div>
	<div id="content-top" style="width: 50%">
			<form action="" method="post" id="form">
				<p>
					<label for="trenutna_zaporka">Trenutna zaporka*:</label><br>
					<input type="password" name="trenutna_zaporka" id="trenutna_zaporka">
				</p>
				<p>
					<label for="zaporka_reg">Nova zaporka*:</label><br>
					<input type="password" name="zaporka" id="zaporka_reg">
				</p>
				<p>
					<label for="zaporka_ponovo">Ponovno nova zaporka*:</label><br>
					<input type="password" name="zaporka_ponovo" id="zaporka_ponovo">
				</p>
				<p>
					<input type="submit" value="Spremi">
				</p>		
			</form>
	</div>

<?php } include 'php/includes/overall/footer.php'; ?>