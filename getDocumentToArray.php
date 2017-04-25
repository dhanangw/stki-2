<?php
	//create connection to database stki_db
	$servername = "localhost";
	$username = "root";
	$password = "";
	 
	 //check connection
	try {
	    $conn = new PDO("mysql:host=$servername;dbname=stki_db", $username, $password);
	    // set the PDO error mode to exception
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    echo "Connected successfully <br><br><br>"; 
      }
	catch(PDOException $e) {
	    echo "Connection failed: " . $e->getMessage()
      }

	//get all documents from db
	$query = "SELECT isi_dokumen FROM dokumen";
	$sth = $conn->query($query);
	
  //insert document to array
	$data = array();
	while($row = $sth->fetch(PDO::FETCH_ASSOC)) {
	    $data[] = $row; //appends each row to array
	}

	//show array content
	$arrlength = count($data);
    print_r ($data[1]);

    //close connection
	$conn = null;
?>
