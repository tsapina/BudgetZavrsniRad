<?php
function logged_in_redirect()
{
	if(logged_in() === true)
	{
		header('Location: stanje.php');
	}	
}

function protect_page()
{
	if(logged_in() === false)
	{
		header('Location: protected.php');
		exit();
	}	
}

function admin_protect()
{
	global $korisnik_podaci;
	if($korisnik_podaci['tip'] == 0)
	{
		header('Location: stanje.php');
		exit();
	}
}

function array_sanitize(&$item)
{
	$item = mysql_real_escape_string($item);
}

function sanitize($data)
{
	return mysql_real_escape_string($data);
}

function output_errors($errors)
{
	
	foreach ($errors as $error)
	{
		echo $error. '<br>';
	}
}

function mysql_prep($value){
		$magic_quotes_active = get_magic_quotes_gpc();
		$new_enough_php = function_exists( "mysql_real_escape_string" ); // i.e. PHP >= v4.3.0
		if( $new_enough_php ) { // PHP v4.3.0 or higher
			// undo any magic quote effects so mysql_real_escape_string can do the work
			if( $magic_quotes_active ) { $value = stripslashes( $value ); }
			$value = mysql_real_escape_string( $value );
		} else { // before PHP v4.3.0
			// if magic quotes aren't already on then add slashes manually
			if( !$magic_quotes_active ) { $value = addslashes( $value ); }
			// if magic quotes are active, then the slashes already exist
		}
		return $value;
	}






?>