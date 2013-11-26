<?php include 'php/includes/overall/header.php'; 
protect_page();
?>
<div id="content-top">
	<h1><img width="24" height="24"src="images/podsjetnik.png">Podsjetnik za sljedećih 7 dana</h1>
	<br>
	<?php
		if(podsjetnik_postoji()== TRUE)
		{
			$danas = date("Y-m-d");
			$sedam = date("Y-m-d", strtotime("+7 day"));
			$query = mysql_query("SELECT * FROM podsjetnik WHERE korisnik_ID_FK = $session_korisnik_id AND datum BETWEEN '$danas' AND '$sedam' ORDER BY datum ASC");
			$date_f = date('Y-m-d');
			echo "<b>Postavili ste podsjetnik!</b><br><br>";
			while($row = mysql_fetch_array($query))
			{
				echo "<p style='margin: 10px 0;'>";
				echo "Komentar: ". $row['komentar']."<br>";
				echo "Datum: ". $row['datum']."<br>";
				echo "</p>";
			}
		}
		else 
		{
			echo "<b>Niste postavili podsjetnik!</b>";
		}
	?>
</div>

<div id="content-left">
<h1 style="margin-left: 10px"><img width="25" height="25"src="images/outcome.png">Rashodi posljednjih 7 dana</h1><br>
<?php 
if(rashodi_7_dana()=== TRUE)
{
	include 'php/includes/graf.php'; 
}
else 
{
	echo "<p style='margin-left: 10px;'>Nema podataka za prikaz!</p>";
}
?>
</div>
<div id="content-right" style="margin-bottom: 30px;">
<?php
	$query = mysql_query("SELECT * FROM racun WHERE korisnik_ID_FK = $session_korisnik_id") or die(mysql_error);
	while($row = mysql_fetch_array($query))
	{
		$sum_prihod = mysql_query("SELECT SUM(iznos) FROM prihod WHERE racun_ID_FK = $row[racun_ID];");
		$sum_rashod = mysql_query("SELECT SUM(iznos) FROM rashod WHERE racun_ID_FK = $row[racun_ID];");
		$prihod= mysql_fetch_row($sum_prihod);
		$rashod= mysql_fetch_row($sum_rashod);
		$racun = $prihod[0]-$rashod[0];
		$racun = number_format($racun, 2, ',', ' ');
		
		$valute = array(
			"kuna" => "Kuna",
			"euro" => "Euro",
			"dolar" => "Dolar",
			"franak" => "Franak",
		);
		if($row['valuta'] == $valute['kuna'])
		{
			$valuta = 'HRK';
		}
		else if ($row['valuta'] == $valute['euro'])
		{
			$valuta = 'EUR';
		}
		else if ($row['valuta'] == $valute['dolar'])
		{
			$valuta = 'USD';
		}
		else if ($row['valuta'] == $valute['franak'])
		{
			$valuta = 'CHF';
		}
		
		$racun1 = $racun . "  $valuta";
		echo "<p class='stanje'>";
		echo "<span class='stanje_info'>".$row['naziv']."</span><br>";
		if($racun < 0)
		{
			echo "<span class='stanje_negativno'>".$racun1."</span>";
		}
		else 
		{
			echo "<span class='stanje_pozitivno'>".$racun1."</span>";
		}
		
		echo "</p>";
	}
?>
</div>
<div style="clear: both"></div>
<div id="content-bottom">
<h2><img width="24" height="24"src="images/label.png"> Prihodi etikete</h2><br><br>
<?php 
if(etiketa_postoji_prihod() === true)
{
	echo "<div class='etiketa'>";
	$query = mysql_query("SELECT * FROM prihod WHERE korisnik_ID_FK = $session_korisnik_id");
	while($row = mysql_fetch_array($query))
	{
		echo "<a href='etikete.php?etiketa_prihod=$row[etiketa]'>".$row['etiketa']."</a>&nbsp;&nbsp;&nbsp;";
	}
}
else 
{
	echo "Nema podataka za prikaz!";
}
?>
<br><br>
<hr>
<br>
<h2><img width="24" height="24"src="images/label.png"> Rashodi etikete</h2><br><br>
<?php 
if(etiketa_postoji_rashod() === true)
{
	$query = mysql_query("SELECT * FROM rashod WHERE korisnik_ID_FK = $session_korisnik_id");
	while($row = mysql_fetch_array($query))
	{
		echo "<a href='etikete.php?etiketa_rashod=$row[etiketa]'>".$row['etiketa']."</a>&nbsp;&nbsp;&nbsp;";
	}
}
else 
{
	echo "Nema podataka za prikaz!";
}
?>
<br><br>
<hr>
</div>





























</div>
<?php include 'php/includes/overall/footer.php'; ?>