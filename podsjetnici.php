<?php include 'php/includes/overall/header.php';
protect_page();
?>
<div id="content-top">
	<p class="action">
		<a href="dodaj_podsjetnik.php">Dodaj podsjetnik</a>
	</p>	
</div>
<div id="content-bottom">
	<table id="datatables" class="display">
		<thead>
			<tr>
				<th scope="col">Komentar</th>
				<th scope="col">Datum</th>
				<th scope="col">Akcije</th>
			</tr>
		</thead>
		<tbody>
		<?php
		/*Upit iz baze i ispis u obliku tablice*/
		$query= mysql_query("SELECT * FROM podsjetnik WHERE korisnik_ID_FK = $session_korisnik_id") or die(mysql_error());
		while($row = mysql_fetch_array($query))
		{
			echo "<tr>";
			echo "<td>".$row['komentar']."</td>"."<td>".$row['datum']."</td>"."<td><a href='izmjena_podsjetnika.php?id=$row[podsjetnik_ID]'><img width='24' height='24'alt='Izmjeni'src='images/edit.png'></a>   <a href='obrisi_podsjetnik.php?id=$row[podsjetnik_ID]' onclick='return confirm(\"Dali ste sigurni da želite obrisati ovaj red?\")'><img width='24' height='24'alt='Obriši'src='images/remove.png'></a></td>";
			echo "</tr>";
		}
		?>
		</tbody>
	</table>
</div>


<?php include 'php/includes/overall/footer.php'; ?>