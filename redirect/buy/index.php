<?php

//Redirect system (for muiple user or main user)


require '../../assets/php/database.php';

$main= array();
$main['2500sq'] = "https://portal.veinternational.org/buybuttons/us061586/btn/office-2500-sq-ft-5/";
$main['3000sq'] = "https://portal.veinternational.org/buybuttons/us061586/btn/office-3000-sq-ft-6/";
$main['4500sq'] = "https://portal.veinternational.org/buybuttons/us061586/btn/office-4500-sq-ft-7/";


   

$main['2b1b-p'] = "https://portal.veinternational.org/buybuttons/us061586/btn/2-bedroom-1-bathroom-shared-8/";
$main['2b2b-p'] = "https://portal.veinternational.org/buybuttons/us061586/btn/2-bedroom-2-bathroom-shared-9/";
$main['3b2b-p'] = "https://portal.veinternational.org/buybuttons/us061586/btn/3-bedroom-2-bathroom-shared-10/";


           
$main['1b1b'] = "https://portal.veinternational.org/buybuttons/us061586/btn/1-bedroom-1-bathroom-1/";
$main['2b1b'] = "https://portal.veinternational.org/buybuttons/us061586/btn/2-bathroom-1-bathroom-2/";
$main['2b2b'] = "https://portal.veinternational.org/buybuttons/us061586/btn/2-bedroom-2-bathroom-3/";
$main['3b2b'] = "https://portal.veinternational.org/buybuttons/us061586/btn/3-bedroom-2-bathroom-4/";






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
			print 'Invaild USER UUID! This is an error please contact admin@1nfinityinc.ml for further infomation. Thank you.';
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

function checkPur($uuid) {
	$query = 'SELECT * FROM purchases WHERE (uuid="' . $uuid . '")';
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



if (isset($_GET['pur'])) {
	if (isset($_GET['uuid'])) {
		if (checkUser($_GET['uuid']) == true) {
			$user_uuid = $_GET['uuid']; 	
			if (checkPur($_GET['pur']) == true) {
                $query = 'SELECT * FROM purchases WHERE (uuid="' . $_GET['pur'] . '")';
				$loop = 0;
				if (@mysql_query ($query)) {
					$results=mysql_query ($query);
					WHILE($row = mysql_fetch_array ($results)) { // this loops through all the rows that were pulled from the DB
						$item = $row['item'];	
                    				$nextdate = $row['nextp'];
						$count = $row['count'];
						$reminder = $row['reminder'];
					}
				}
				$nextpayment = date('Y-m-d H:i:s',strtotime(date("Y-m-d H:i:s",strtotime($nextdate)) . " + 30 days"));
				$query = 'UPDATE purchases SET pending="0" WHERE uuid="' . $_GET['pur'] . '"';
				$retval = mysql_query($query);
				if(! $retval )
				{
					die('Error?' . mysql_error());
				}
				$query = 'UPDATE purchases SET nextp="' . $nextpayment . '" WHERE uuid="' . $_GET['pur'] . '"';
				$retval = mysql_query($query);
				if(! $retval )
				{
					die('Error?' . mysql_error());
				}
				$query = 'UPDATE purchases SET reminder="0" WHERE uuid="' . $_GET['pur'] . '"';
				$retval = mysql_query($query);
				if(! $retval )
				{
					die('Error?' . mysql_error());
				}
				$count = $count + 1;
				$query = 'UPDATE purchases SET count="' . $count  .'" WHERE uuid="' . $_GET['pur'] . '"';
				$retval = mysql_query($query);
				if(! $retval )
				{
					die('Error?' . mysql_error());
				}
				$link = $main[$item];
				header('Location: ' . $link);
				
			}
			else
			{
					
					print 'Invaild USER UUID! Did you mess with the URL? Please Go <- Back a page and try again.';
					
			}
		}	
		else 
		{
			print 'Invaild USER UUID! This is an error please contact help@1nfinityinc.ml for further infomation. Thank you.';
		}
	}
}

?>