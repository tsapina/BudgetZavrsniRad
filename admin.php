<?php include 'php/includes/overall/header.php'; 
protect_page();
admin_protect();
?>
<div id="content-bottom">
	<table id="datatables" class="display">
		<thead>
			<tr>
				<th scope="col">E-mail adresa</th>
				<th scope="col">Ime</th>
				<th scope="col">Prezime</th>
				<th scope="col">Akcije</th>
			</tr>
		</thead>
		<tbody>
		<?php
		/*Upit iz baze i ispis u obliku tablice*/
		$query= mysql_query("SELECT * FROM korisnik WHERE tip = 0") or die(mysql_error());
		while($row = mysql_fetch_array($query))
		{
			echo "<tr>";
			echo "<td>".$row['email']."</td>"."<td>".$row['ime']."</td>"."<td>".$row['prezime']."</td>"."<td><a href='obrisi_korisnika.php?id=$row[korisnik_ID]' onclick='return confirm(\"Dali ste sigurni da želite obrisati ovaj red?\")'><img width='24' height='24'alt='Obriši'src='images/remove.png'></a></td>";
			echo "</tr>";
		}
		?>
		</tbody>
	</table>
</div>

<?php include 'php/includes/overall/footer.php'; ?>