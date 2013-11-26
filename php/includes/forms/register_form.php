<?php
if(empty($_POST) === FALSE)
{
	if(korisnik_postoji($_POST['email']) === TRUE)
	{
		$errors[] = 'Uneseni email postoji!'; 
	}
	if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === FALSE)
	{
		$errors[] = 'Unesena email adresa je neispravna!';
	}
	if(strlen($_POST['zaporka']) < 6)
	{
		$errors[] = 'Zaporka mora sadržavati najmanje 6 znakova!'; 
	}
	if(($_POST['zaporka']) !== $_POST['zaporka_ponovo'])
	{
		$errors[] = 'Zaporka se ne poklapaju!'; 
	}
}

if(isset($_GET['success']) && empty($_GET['success']))
{
	echo "Uspješno ste registrirani! Možete se logirati!";	
}
else
{
	if(empty($_POST) === FALSE && empty($errors) == TRUE)
	{
		$register_data = array (
			'email' => $_POST['email'],
			'ime' => $_POST['ime'],
			'prezime' => $_POST['prezime'],
			'zaporka' => $_POST['zaporka'],
		);
		registracija_korisnika($register_data);
		header('Location: index.php?success');
		exit();
	}
	else if(empty($errors) === FALSE)
	{
		output_errors($errors);
	}
?>
	<form id="form" action="" method="post">
		<p>
			<label for="email_reg"><span>Email:*</span></label><br>
			<input type="text" id="email_reg" name="email" />	
		</p>
		<p>
			<label for="ime"><span>Ime:*</span></label><br>
			<input type="text" id="ime" name="ime" />	
		</p>
		<p>
			<label for="prezime">Prezime:*</label><br>
			<input type="text" id="prezime" name="prezime" />	
		</p>
		<p>
			<label for="zaporka_reg">Zaporka:*</label><br>
			<input type="password" id="zaporka_reg" name="zaporka" />	
		</p>
		<p>
			<label for="zaporka_ponovo">Potvrda zaporke:*</label><br>
			<input type="password" id="zaporka_ponovo" name="zaporka_ponovo" />	
		</p>
		<p>
			<input type="submit" value="Registriraj me"/>
		</p>
	</form>
<?php } ?>