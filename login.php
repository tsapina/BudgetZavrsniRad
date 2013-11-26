<?php
include 'php/includes/overall/header.php';
if(empty($_POST) === FALSE)
{
	$email= $_POST['email'];
	$zaporka = $_POST['zaporka'];
	
	if(empty($email) === TRUE or empty($zaporka) === TRUE )
	{
	 	$errors[] = "Morate upisati email i zaporku!";
	}
	else if (korisnik_postoji($email) === false)
	{
		$errors[] = "Ne možemo naći korisnika u bazi. Dali ste registrirani?";
	}
	else
	{
		$login = login($email, $zaporka);
		if($login === FALSE)
		{
			$errors[] = "Kombinacija emaila i lozinke je netočna!";
		}
		else 
		{
			$_SESSION['korisnik_ID'] = $login;
			header('Location: stanje.php');
			exit();	
		}

	}?>
		<div id='login-error'> <?php output_errors($errors); ?> </div>	
<?php
}
?>
<div id="content-left-index">
<a href = "index.php">Početna</a>
</div>
<div id="content-right-index">
	<h1>Kontrolirajte kućni proračun brzo i efikasno!</h1>
	<ul>
		<li><img width="24" height="24"src="images/income.png"> &nbsp;Pratite prihode</li>
		<p>Svi vaši prihodi na jednom mjestu.Unos, izmjena, pretraga, pregled stanja.</p>
		<li><img width="24" height="24"src="images/outcome.png"> &nbsp;Pratite rashode</li>
		<p>Svi vaši rashodi na jednom mjestu.Unos, izmjena, pretraga, pregled stanja.</p>
		<li><img width="24" height="24"src="images/wallet.png"> &nbsp;Pratite račune</li>
		<p>Svi vaši računi na jednom mjestu.Unos, izmjena, pretraga, pregled stanja.</p>
		<li><img width="24" height="24"src="images/reminders.png"> &nbsp;Podsjetnik</li>
		<p>Podsjetnik za plačanje računa ili drugih obaveza!</p>
		<li><img width="24" height="24"src="images/comments.png"> &nbsp;Komentari</li>
		<p>Za sve unesene prihode i rashode dodajte odgovarajuće komentare</p>
		<li><img width="24" height="24"src="images/search.png"> &nbsp;Filter podataka</li>
		<p>Filtriranje podataka po datumu, vrsti i računu</p>
		<li><img width="24" height="24"src="images/encrypted.png"> &nbsp;Zaštita vaših podataka</li>
		<p>Svi vaši podaci su zaštićeni i sigurni</p>
	</ul>
</div>
<div style="clear: both;"></div>
<?php include 'php/includes/overall/footer.php';
include 'php/includes/overall/footer.php';
?>