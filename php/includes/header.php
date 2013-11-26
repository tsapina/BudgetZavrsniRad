<div id="header">
		<div id="header-logo">
			<img src="images/logo.png" alt="Logo" height="75" width="75">
			<p>Upravljanje kućnim proračunom V 1.0</p>
		</div><!-- End of #header-logo-->
		
		<?php 
		if(logged_in() === TRUE)
		{
			$pozdrav = "Dobrodošao ".$korisnik_podaci['ime']." ".$korisnik_podaci['prezime']."!"."<img src='images/hello.png'  height='30' width='30'>";
			echo "<p class='pozdrav'>".$pozdrav."<br><a href='logout.php'>Logout</a>  <a href='postavke_racuna.php'>Postavke</a></p>";
			include 'php/includes/menu/mainmenu.php'; 
		}
		else
		{
			include 'php/includes/forms/header_login.php'; 
			
		}
		?>
		<div style="clear: both;"></div>
		
		
</div><!-- End of #header -->
<div id="content">
<?php logged_in() ? racun_ne_postoji($session_korisnik_id) : 0; ?>
