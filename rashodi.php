<?php include 'php/includes/overall/header.php';
protect_page();
?>
<div id="content-top">
	<p class="action">
		<a href="dodaj_rashod.php">Dodaj rashod</a>
	</p>
</div>
<div id="content-bottom">
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
		$query= mysql_query("SELECT * FROM rashod WHERE korisnik_ID_FK = $session_korisnik_id") or die(mysql_error());
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

<?php include 'php/includes/overall/footer.php'; ?>