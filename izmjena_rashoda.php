<?php include 'php/includes/overall/header.php'; 
protect_page();
?>

<!--  ====================================================================-->
<!--  ============================Container===============================-->
<!--  ====================================================================-->

<?php
$naziv_racuna = naziv_racuna($session_korisnik_id);
$id = $_GET['id'];
$query = mysql_query("SELECT * FROM rashod WHERE rashod_ID = '$id'") or die(mysql_error());
$row = mysql_fetch_array($query);
?>
	<div id="content-top">
			<form id="form" class="blocks" action="update_rashoda.php?id=<?php echo $row['rashod_ID']; ?>" method="post">
				<p>
					<label >Kategorija:*</label><br>
			        <select id="category" name="kategorija">
			            <?php echo ShowCategory(); ?>
			        </select>
				</p>
		        <p>
		        	<label >Vrsta:* </label><br>
			        <select id="type" name="vrsta">
			             <option value="0">Izaberite</option>
			        </select>
		        </p>
		        <p>
					<label >Račun:* </label><br>
					<select name="racun">
						<?php foreach($naziv_racuna as $option): ?>
						  <option value="<?php echo $option; ?>" <?php if($option == $row['ime_racuna']) { ?> selected="selected" <?php } ?>><?php echo $option; ?></option>
						 <?php endforeach; ?>
					</select>
				</p>
				<p class="area">
				<label for="komentar">Komentar:*</label><br>
				<textarea name="komentar" id ="komentar" rows="4" cols="50" class="textarea"><?php echo "$row[komentar]"?></textarea>
				</p>
				<p>
				<label for="iznos">Iznos:*</label><br>
				<input type="text" class="text" name="iznos" id="iznos" value="<?php echo "$row[iznos]"?>"/>
				</p>
				<p><label for="etiketa">Etiketa:*</label><br><input type="text" name="etiketa" id="etiketa" class="text" value="<?php echo "$row[etiketa]"?>"></p>
				<p><label for="datepicker">Datum:*</label><br><input type="text" id="datepicker" name="datepicker" class="text" value="<?php echo "$row[datum]"?>"/></p>
				<p>
				<label> </label>
				<input type="submit" class="btn" value="Spremi" name="submit" />
				</p>
	        </form>
				
			
	
	</div><!-- End of #content -->
<?php include 'php/includes/overall/footer.php'; ?>