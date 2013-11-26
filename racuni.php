<?php 
include 'php/includes/overall/header.php';
protect_page();
if(!racun_postoji($session_korisnik_id))
{
?>
<p>Da bi koristili aplikaciju morate dodati račun!</p>
<?php } ?>
<div id="content-top">
	<p class="action">
		<a href="dodaj_racun.php">Dodaj racun</a>
	</p>
</div>
<div id="content-bottom">
	<table id="datatables" class="display">
		<thead>
			<tr>
				<th scope="col">Račun</th>
				<th scope="col">Valuta</th>
				<th scope="col">Akcije</th>
			</tr>
		</thead>
		<tbody>
		<?php
		/*Upit iz baze i ispis u obliku tablice*/
		$query= mysql_query("SELECT * FROM racun WHERE korisnik_ID_FK = $session_korisnik_id");
		while($row = mysql_fetch_array($query))
		{
			echo "<tr>";
			echo "<td>".$row['naziv']."</td>"."<td>".$row['valuta']."</td>"."<td><a href='izmjena_racuna.php?id=$row[racun_ID]'><img width='24' height='24'alt='Izmjeni'src='images/edit.png'></a>   <a href='obrisi_racun.php?id=$row[racun_ID]' onclick='return confirm(\"Brisanjem ovog računa brišete sve prihode i rashode koji su povezani sa ovim računom!Želite li nastaviti?\")'><img width='24' height='24'alt='Obriši'src='images/remove.png'></a></td>";
			echo "</tr>";
		}
		?>
		</tbody>
	</table>
</div>
<?php include 'php/includes/overall/footer.php'; ?>