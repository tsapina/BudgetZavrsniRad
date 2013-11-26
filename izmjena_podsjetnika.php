<?php include 'php/includes/overall/header.php'; 
protect_page();
?>

<!--  ====================================================================-->
<!--  ============================Container===============================-->
<!--  ====================================================================-->

<?php
$id = $_GET['id'];
$query = mysql_query("SELECT * FROM podsjetnik WHERE podsjetnik_ID = '$id'") or die(mysql_error());
$row = mysql_fetch_array($query);
?>
	<div id="content-top">
			<form id="form" class="blocks" action="update_podsjetnika.php?id=<?php echo $row['podsjetnik_ID']; ?>" method="post">
					<p class="area">
						<label for="komentar">Komentar*:</label><br>
						<textarea name="komentar" id ="komentar" rows="4" cols="50" class="textarea"><?php echo "$row[komentar]"?></textarea>
					</p>
					<p>
						<label for="datepicker">Datum:*</label><input type="text" id="datepicker" name="datepicker" class="text" value="<?php echo "$row[datum]"?>"/></p>
					<p>
					<label> </label>
					<input type="submit" class="btn" value="Izmjeni" name="submit" />
					</p>
				</form>
				
			
	
	</div><!-- End of #content -->
<?php include 'php/includes/overall/footer.php'; ?>