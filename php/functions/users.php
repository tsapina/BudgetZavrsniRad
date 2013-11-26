<?php
function promjena_lozinke($korisnik_id, $zaporka)
{
	$korisnik_id = (int)$korisnik_id;
	$zaporka = md5($zaporka);
	mysql_query("UPDATE korisnik SET zaporka = '$zaporka' WHERE korisnik_ID = $korisnik_id") or die(mysql_error());
}

function registracija_korisnika($register_data)
{
	array_walk($register_data, 'array_sanitize');
	$register_data['zaporka'] = md5($register_data['zaporka']);
	$fields = '`' . implode('`, `', array_keys($register_data)) . '`';
	$data = '\'' . implode('\', \'', $register_data) . '\'';
	mysql_query("INSERT INTO `korisnik` ($fields) VALUES ($data)") or die(mysql_error());
}

function korisnik_podaci($korisnik_ID)
{
	$podaci = array();
	$korisnik_ID = (int)$korisnik_ID; // sanitaze id
	$func_num_args = func_num_args(); // vraća broj argumenata zadanih u funkciji
	$func_get_args = func_get_args();//vraća polje sa argumentima zadanima u funkciji , provjeriri sa print_r($func_get_args );
	
	if($func_num_args > 1)
	{
		unset($func_get_args[0]);// unset poništava, u ovom slučaju poništava id
		$polja = '`'.implode('`, `', $func_get_args).'`';//implode funkcija ugrađuje , pogledat još implode funkciju!!!
		$podaci = mysql_query("SELECT $polja FROM `korisnik` WHERE `korisnik_ID` = '$korisnik_ID'");
		$podaci = mysql_fetch_assoc($podaci);
		return $podaci; //podaci su sada polje, provjeriti sa print_r
	}
}

function logged_in()
{
	if(isset($_SESSION['korisnik_ID']))
	{
		return true;
	}
	else 
	{
		return false;	
	}
}

function korisnik_postoji($email)
{
	$email = sanitize($email);
	$query = mysql_query("SELECT COUNT(`korisnik_ID`) FROM `korisnik` WHERE `email` = '$email'");
	return (mysql_result($query, 0) == 1) ? true : false;
}

function korisnik_ID_od_emaila($email)
{
	$email = sanitize($email);
	$query = mysql_query("SELECT `korisnik_ID` FROM `korisnik` WHERE `email` = '$email'");
	return mysql_result($query, 0, 'korisnik_ID');
}

function login($email, $zaporka)
{
	$korisnik_ID = korisnik_ID_od_emaila($email);
	$email = sanitize($email);
	$zaporka = md5($zaporka);
	$query = mysql_query("SELECT COUNT(`korisnik_ID`) FROM `korisnik` WHERE `email` = '$email' AND `zaporka` = '$zaporka'");
	return (mysql_result($query, 0) == 1) ? $korisnik_ID : false;
}
?>
