<?php include 'php/includes/overall/header.php'; 
protect_page();
?>
<?php 
if (isset($_GET['etiketa_prihod']))
{
?>
<div id="content-bottom">
	<table id="datatables" class="display">
			<thead>
				<tr>
					<th scope="col">Račun</th>
					<th scope="col">Vrsta prihoda</th>
					<th scope="col">Iznos</th>
					<th scope="col">Komentar</th>
					<th scope="col">Etiketa</th>
					<th scope="col">Datum</th>
					<th scope="col">Akcije</th>
				</tr>
			</thead>
			<tbody>
			<?php
			/*Upit iz baze i ispis u obliku tablice*/
			$etiketa_prihod= mysql_prep($_GET['etiketa_prihod']);
			$query = mysql_query("SELECT * FROM prihod WHERE korisnik_ID_FK = $session_korisnik_id AND etiketa = '$etiketa_prihod'")or die(mysql_error());
			while($row = mysql_fetch_array($query))
			{
				$iznos = number_format($row['iznos'], 2, ',', ' ');
				echo "<tr>";
				echo "<td>".$row['ime_racuna']."</td>"."<td>".$row['vrsta_prihoda']."</td>"."<td>".$iznos."</td>"."<td>".$row['komentar']."</td>"."<td>".$row['etiketa']."</td>"."<td>".$row['datum']."</td>"."<td><a href='izmjena_prihoda.php?id=$row[prihod_ID]'><img width='24' height='24'alt='Izmjeni'src='images/edit.png'></a>   <a href='obrisi_prihod.php?id=$row[prihod_ID]' onclick='return confirm(\"Dali ste sigurni da želite obrisati ovaj red?\")'><img width='24' height='24'alt='Obriši'src='images/remove.png'></a></td>";
				echo "</tr>";
			}
			?>
			</tbody>
	</table>
<?php } 
else 
{
?>
	<table id="datatables" class="display">
			<thead>
				<tr>
					<th scope="col">Račun</th>
					<th scope="col">Vrsta rashoda</th>
					<th scope="col">Iznos</th>
					<th scope="col">Komentar</th>
					<th scope="col">Etiketa</th>
					<th scope="col">Datum</th>
					<th scope="col">Akcije</th>
				</tr>
			</thead>
			<tbody>
			<?php
			/*Upit iz baze i ispis u obliku tablice*/
			$etiketa_rashod= mysql_prep($_GET['etiketa_rashod']);
			$query = mysql_query("SELECT * FROM rashod WHERE korisnik_ID_FK = $session_korisnik_id AND etiketa = '$etiketa_rashod'")or die(mysql_error());
			while($row = mysql_fetch_array($query))
			{
				$iznos = number_format($row['iznos'], 2, ',', ' ');
				echo "<tr>";
				echo "<td>".$row['ime_racuna']."</td>"."<td>".$row['vrsta_rashoda']."</td>"."<td>".$iznos."</td>"."<td>".$row['komentar']."</td>"."<td>".$row['etiketa']."</td>"."<td>".$row['datum']."</td>"."<td><a href='izmjena_rashoda.php?id=$row[rashod_ID]'><img width='24' height='24'alt='Izmjeni'src='images/edit.png'></a>   <a href='obrisi_rashod.php?id=$row[rashod_ID]' onclick='return confirm(\"Dali ste sigurni da želite obrisati ovaj red?\")'><img width='24' height='24'alt='Obriši'src='images/remove.png'></a></td>";
				echo "</tr>";
			}
			?>
			</tbody>
	</table>
</div>
<?php 
}
include 'php/includes/overall/footer.php'; 
?>