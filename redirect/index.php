<?php

//Redirect system (for muiple user or main user)


require '../assets/php/database.php';

$main= array();
$main['2500sq'] = "https://portal.veinternational.org/buybuttons/us061586/btn/office-2500-sq-ft-5/";
$main['3000sq'] = "https://portal.veinternational.org/buybuttons/us061586/btn/office-3000-sq-ft-6/";
$main['4500sq'] = "https://portal.veinternational.org/buybuttons/us061586/btn/office-4500-sq-ft-7/";


   
if (isset($_GET['partner'])) {

    $main['2b1b'] = "https://portal.veinternational.org/buybuttons/us061586/btn/2-bedroom-1-bathroom-shared-8/";
    $main['2b2b'] = "https://portal.veinternational.org/buybuttons/us061586/btn/2-bedroom-2-bathroom-shared-9/";
    $main['3b2b'] = "https://portal.veinternational.org/buybuttons/us061586/btn/3-bedroom-2-bathroom-shared-10/";
    $p = "-p";

}

 else{            
    $main['1b1b'] = "https://portal.veinternational.org/buybuttons/us061586/btn/1-bedroom-1-bathroom-1/";
    $main['2b1b'] = "https://portal.veinternational.org/buybuttons/us061586/btn/2-bathroom-1-bathroom-2/";
    $main['2b2b'] = "https://portal.veinternational.org/buybuttons/us061586/btn/2-bedroom-2-bathroom-3/";
    $main['3b2b'] = "https://portal.veinternational.org/buybuttons/us061586/btn/3-bedroom-2-bathroom-4/";
    $p = "";
}



$list_items = array();
$list_items['1b1b'] = "s";
$list_items['2b1b'] = "s";
$list_items['2b2b'] = "s";
$list_items['3b2b'] = "s";
$list_items['2500sq'] = "s";
$list_items['3000sq'] = "s";
$list_items['4500sq'] = "s";



function UUIDGet() {

     return sprintf( 'pur-%04x%04x-%04x-%04x-%04x-%04x%04x%04x',

    // 32 bits for "time_low"

    mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),



    // 16 bits for "time_mid"

    mt_rand( 0, 0xffff ),



     // 16 bits for "time_hi_and_version",

    // four most significant bits holds version number 4

    mt_rand( 0, 0x0fff ) | 0x4000,



    // 16 bits, 8 bits for "clk_seq_hi_res",

    // 8 bits for "clk_seq_low",

    // two most significant bits holds zero and one for variant DCE1.1

    mt_rand( 0, 0x3fff ) | 0x8000,



    // 48 bits for "node"

    mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )

    );

}



function uuid2username($uuid) {
	$query = 'SELECT * FROM users WHERE (uuid="' . $uuid . '")';
	$loop = 0;
    if (@mysql_query ($query)) {
		$results=mysql_query ($query);
		WHILE($row = mysql_fetch_array ($results)) { // this loops through all the rows that were pulled from the DB
			$loop++;
			$name = $row['username'];
		}
		if ($loop == 0)
		{
			print 'Invaild USER UUID! This is an error please xontact help@1nfinityinc.ml for further infomation. Thank you.';
		}
	}
	return $name;
}

function checkUser($uuid) {
	$query = 'SELECT * FROM users WHERE (uuid="' . $uuid . '")';
	$loop = 0;
    if (@mysql_query ($query)) {
		$results=mysql_query ($query);
		WHILE($row = mysql_fetch_array ($results)) { // this loops through all the rows that were pulled from the DB
			$loop++;			
		}
		if ($loop == 0)
		{
			return false;
		}
		else 
		{
			return true;
		}
	}
}




if (isset($_GET['uuid'])) {
	if (checkUser($_GET['uuid']) == true) {
		$uuid = UUIDGet();
		$item = $_GET['type'];
		$user_uuid = 	$_GET['uuid']; 	
		$loop = 0;
		$roommate = "";
		foreach($list_items as $key => $value)
		{
			if ($key == $item) {
				$link = $main[$key];
				$loop++;
				if (isset($_POST['email'])) {
					if ($value == "m")
					{
						$roommate = $_POST['email'];
					}
				}
			}
				
		}
		if ($loop == 0) {
			print 'Invaild type GET.';
			die;
			
		}
			
		$item = $item . $p;
		$today = date("Y-m-d H:i:s");       
		$enddate = date('Y-m-d H:i:s',strtotime(date("Y-m-d H:i:s", time()) . " + 365 day"));
		$nextpayment = date('Y-m-d H:i:s',strtotime(date("Y-m-d H:i:s", time()) . " + 30 day"));
		
		$query = "INSERT INTO purchases (uuid, item, user_uuid, pending, cstartdate, cenddate, nextp) VALUES ( '{$uuid}' , '{$item}', '{$user_uuid}', '0', '{$today}', '{$enddate}', '{$nextpayment}')";
		if (@mysql_query ($query)) {
			header('Location: '.$link);
		} else {
			print 'Could not insert data into database! Error...';
			die;
		}
	}	
	else 
	{
		print 'Invaild USER UUID! This is an error please contact help@1nfinityinc.ml for further infomation. Thank you.';
	}
}

?>