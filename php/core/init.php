<?php
session_start();
require 'php/database/connect.php';
require 'php/functions/general.php';
require 'php/functions/users.php';
require 'php/functions/main.php';

if(logged_in() === TRUE)
{
	$session_korisnik_id = $_SESSION['korisnik_ID'];
	$korisnik_podaci = korisnik_podaci($session_korisnik_id , 'email', 'zaporka', 'ime', 'prezime','tip');

}

$errors = array();

?>