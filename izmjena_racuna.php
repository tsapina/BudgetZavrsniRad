<?php include 'php/includes/overall/header.php';
protect_page();
 ?>

<!--  ====================================================================-->
<!--  ============================Container===============================-->
<!--  ====================================================================-->

<?php
$valuta = naziv_valute($session_korisnik_id);
$id = $_GET['id'];
$query = mysql_query("SELECT * FROM racun WHERE racun_ID = '$id'") or die(mysql_error());
$row = mysql_fetch_array($query);
?>
	<div id="content-top">
			<form id="form" class="blocks" action="update_racuna.php?id=<?php echo $row['racun_ID']; ?>" method="post">
					
				<p>
					<label for="valuta">Valuta:*</label><br>
					<select name="valuta">
						<?php foreach($valuta as $option): ?>
						  <option value="<?php echo $option; ?>" <?php if($option == $row['valuta']) { ?> selected="selected" <?php } ?>><?php echo $option; ?></option>
						 <?php endforeach; ?>
					</select>
				</p>
				<p>
					<label for="naziv">Naziv:*</label><br>
					<input type="text" class="text" name="naziv" id="naziv" value="<?php echo $row['naziv'] ?>"/>
				</p>
				<p>
					<input type="submit" value="Izmjeni" name="submit" class="btn"/>
				</p>
			</form>
				
			
	
	</div><!-- End of #content -->
<?php include 'php/includes/overall/footer.php'; ?>