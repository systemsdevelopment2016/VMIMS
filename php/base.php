<?php



if (isset($_POST['addData'])) {
    //create_tables(); // creates tables in DB
    addToDB(); // inserts content to DB
}


function addToDB() {
	try {

		$db = new PDO("sqlite:C:/xampp/htdocs/db/amicale.sqlite");
		// open DB connection
		
		$pname = $_POST['pname'];
		$category = $_POST['category'];
		$rname = $_POST['rname'];
		$raddress = $_POST['raddress'];
		$bprice = $_POST['bprice'];

		$quantity = $_POST['quantity'];
		$exp = $_POST['exp'];
		$sprice = $_POST['sprice'];
		$comment = $_POST['comment'];
		$l_name = $_POST['l_name']; // LocationName

		// (1) INSERT data into the DB
		$db->exec("INSERT INTO Products (P_Name, P_Category) VALUES ( '$pname' , '$category' )");
		$db->exec("INSERT INTO Retailers (R_Name, R_Address) VALUES ('$rname', '$raddress')");

		//product ID
		$p_id = $db->exec("SELECT P_ID FROM Products WHERE P_Name = '" . $pname . "';");

		//retailer ID
		$r_id = $db->exec("SELECT R_ID FROM Retailers WHERE R_Name = '" . $rname . "';");

		$db->exec("INSERT INTO ProductRetailers VALUES ('$p_id', '$r_id', '$bprice');");
		
		//location ID
		$l_id = $db->exec("SELECT L_ID FROM Locations WHERE L_Name = '" . $l_name . "';");
		
		$db->exec("INSERT INTO ProductRetailerLocations (P_ID, R_ID, L_ID, PRL_Quantity, PRL_SellPrice, PRL_ExpiryDate, PRL_Comment) VALUES ('$p_id', '$r_id', '$l_id', '$quantity', '$sprice', '$exp', '$comment');");

	    // close DB connection
		$db = NULL;

	}catch(PDOException $e)
	{
		echo $e->getMessage();
	}
}


?>