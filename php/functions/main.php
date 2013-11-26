<?php
function naziv_racuna($session_korisnik_id)
{
	$korisnik_id = $session_korisnik_id;
	if($query = mysql_query("SELECT * FROM `racun` WHERE `korisnik_ID_FK` = '$korisnik_id'")or die(mysql_error()));
		while($row = mysql_fetch_array($query))
		{
			$naziv[] = $row['naziv'];
		}
	return $naziv;
}

function default_vrste_prihoda($session_korisnik_id)
{
	$korisnik_id = $session_korisnik_id;
	if($query = mysql_query("SELECT * FROM `vrsta_prihoda_default`"));
		while($row = mysql_fetch_array($query))
		{
			$naziv[]= $row['naziv'];
		}
	return $naziv;
}

function racun_id($racun)
{
	$racun = $racun;
	if($query = mysql_query("SELECT * FROM `racun` WHERE `naziv` = '$racun'"));
		while($row = mysql_fetch_array($query))
		{
			$racun_id = $row['racun_ID'];
		}
	return $racun_id;
}

function naziv_valute()
{
	if($query = mysql_query("SELECT * FROM `valuta`"));
		while($row = mysql_fetch_array($query))
		{
			$valuta[]= $row['naziv'];
		}
	return $valuta;
}

function racun_postoji($korisnik_id)
{
	$korisnik_id = sanitize($korisnik_id);
	$query = mysql_query("SELECT COUNT(`racun_id`) FROM `racun` WHERE `korisnik_ID_FK` = '$korisnik_id'");
	return (mysql_result($query, 0) >=1) ? true : false;
}

function racun_ne_postoji($session_korisnik_id)
{
	$racuni = 'racuni';
	$dodaj_racun = 'dodaj_racun';
	$file_name = basename($_SERVER["SCRIPT_FILENAME"], '.php');
	if($file_name !== $racuni && $file_name !== $dodaj_racun)
	{
		$session_korisnik_id = $session_korisnik_id;
		if(logged_in() === TRUE)
		{
			if(racun_postoji($session_korisnik_id) === FALSE)
			{
				header("Location: racuni.php");
				exit();
			}
		
		}
	}
}

function ShowCategory()
{
	$sql = "SELECT * FROM kategorija_rashoda";
    $res = mysql_query($sql)or die(mysql_error());
    $category = '<option value="0">Izaberite</option>';
    while($row = mysql_fetch_array($res))
    {
        $category .= '<option value="' . $row['kategorija_rashoda_ID'] . '">' . $row['naziv'] . '</option>';
    }
    return $category;
}

function ShowType()
{
	$sql = "SELECT * FROM vrsta_rashoda_default WHERE kategorija_rashoda_ID_FK=$_POST[id]";
    $res = mysql_query($sql) or die(mysql_error());
    $type = '<option value="0" name="vrsta">Izaberite</option>';
    while($row = mysql_fetch_array($res))
    {
        $type .= '<option  name="vrsta" value="' . $row['vrsta_rashoda_ID'] . '">' . $row['naziv'] . '</option>';
    }
    return $type;
}

function naziv_vrste_rashoda($vrsta_rashoda_id)
{
	$id = $vrsta_rashoda_id;
	if($query = mysql_query("SELECT * FROM `vrsta_rashoda_default` WHERE `vrsta_rashoda_ID` = $id") or die(mysql_error()));
		while($row = mysql_fetch_array($query))
		{
			$naziv = $row['naziv'];
		}
	return $naziv;
}

function naziv_vrste_prihoda()
{
	if($query = mysql_query("SELECT * FROM `vrsta_prihoda_default`"));
		while($row = mysql_fetch_array($query))
		{
			$naziv[] = $row['naziv'];
		}
	return $naziv;
}

function podsjetnik_postoji()
{
	$danas = date("Y-m-d");
	$sedam = date("Y-m-d", strtotime("+7 day"));
	$query = mysql_query("SELECT COUNT(`podsjetnik_ID`) FROM `podsjetnik` WHERE datum BETWEEN '$danas' AND '$sedam'");
	return (mysql_result($query, 0) >= 1) ? true : false;
}

function rashodi_7_dana()
{
	global $session_korisnik_id;
	$danas = date("Y-m-d");
	$sedam = date("Y-m-d", strtotime("-7 day"));
	$query = mysql_query("SELECT COUNT(`iznos`) FROM rashod WHERE korisnik_ID_FK = $session_korisnik_id AND datum BETWEEN '$sedam' AND '$danas'");
	return (mysql_result($query, 0) >=1) ? true : false;
}

function etiketa_postoji_prihod()
{
	global $session_korisnik_id;
	$query = mysql_query("SELECT COUNT(`etiketa`) FROM prihod WHERE korisnik_ID_FK = $session_korisnik_id");
	return (mysql_result($query, 0) >=1) ? true : false;
}

function etiketa_postoji_rashod()
{
	global $session_korisnik_id;
	$query = mysql_query("SELECT COUNT(`etiketa`) FROM rashod WHERE korisnik_ID_FK = $session_korisnik_id");
	return (mysql_result($query, 0) >=1) ? true : false;
}
?>
