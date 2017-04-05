<?php

/*
created by kritoka
*/

include 'index.php';
include 'connection.php';

if(isset($_POST['document']))
{
    $document=$_POST['document'];

    //change to lowercase
    $strDoc = strtolower($document);

    //preg replace 	(remove punctutaion)
	$strDoc = preg_replace("/[^A-Za-z[:space:]]/",'',$strDoc);
	//preg replace many space to one space
	$strDoc = preg_replace('!\s+!', ' ', $strDoc);

	//explode 
	$strDoc = explode(" ", $strDoc);
	$count = 0;
	$isSuccess = false ;	

	foreach ($strDoc as $word) {		
		$sql = "INSERT INTO term (term)
		VALUES ('$word')";
		if ($conn->query($sql) === TRUE) 
		{
			$isSuccess = true ;
		} 
		else 
		{
			$isSuccess = false ;
			break;
		}	
	}
	echo $isSuccess;

}

