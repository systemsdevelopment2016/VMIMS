<?php



if (isset($_POST['addData'])) {
    //create_tables(); // creates tables in DB
    addToDB(); // inserts content to DB
}
elseif (isset($_POST['deleteRow'])) {
	# code...
	deleteFromDB();
}
else{

	UpdateDB();
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

		// Insert the Product in the Database and retrieve 
		$insertProduct = "INSERT INTO Products (P_Name,P_Category) VALUES ('".$pname."','".$category."')";
		$db->exec($insertProduct);
		$getProductID = "SELECT P_ID FROM Products WHERE P_Name = '".$pname."' and P_Category='".$category."'";
		$request = $db->query($getProductID);
		$productID = '';
		foreach ($request as $row) {
			
			$productID = $row[P_ID];
		}


		//GET THE RETAILER ID IF ALREADY EXISTS ELSE INSERT INTO DB AND RETRIEVE ID
		$getRetailerID = "SELECT R_ID FROM Retailers WHERE R_Name ='".$rname."' and R_Address = '".$raddress."'";
		$request = $db->query($getRetailerID);
		$retailerID = '';

		if( $request->fetchColumn() !== false ){

			foreach ($request as $row_sec) {
				# code...
				$retailerID = $row_sec[0];
			}
		}
		else{

			$insertRetailer = "INSERT INTO Retailers (R_Name, R_Address) VALUES ('".$rname."', '".$raddress."')";
			$db->exec($insertRetailer);
			$request = $db->query($getRetailerID);
			foreach ($request as $row_sec) {
				# code...
				$retailerID = $row_sec[R_ID];
			}
		}


		//INSERT INTO ProductRetailers table
		$insertInfoPR = "INSERT INTO ProductRetailers VALUES ('$productID','$retailerID','$bprice')";
		$db->exec($insertInfoPR);

		//RETRIEVE LOCATION ID
		$getLocationID = "SELECT L_ID FROM Locations WHERE L_Name = '$l_name'";
		$request = $db->query($getLocationID);
		$locationID = '';

		foreach ($request as $row_th) {
			# code...
			$locationID = $row_th[L_ID];

		}


		//INSERT DATA INTO ProductRetailerLocations table
		$insertInfoPRL = "INSERT INTO ProductRetailerLocations (P_ID,R_ID,L_ID,PRL_Quantity,PRL_SellPrice,PRL_ExpiryDate,PRL_Comment) VALUES ('$productID',
		'$retailerID','$locationID','$quantity','$sprice','$exp',
		'".$comment."')";
		$db->exec($insertInfoPRL);

	    // close DB connection
		$db = NULL;

	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}
}

function deleteFromDB(){

	try{

		$db = new PDO("sqlite:C:/xampp/htdocs/db/amicale.sqlite");

		$rowID = $_POST['rowDBID'];

		$command = "DELETE FROM ProductRetailerLocations WHERE PRL_ID = '$rowID'";

		$db->exec($command);

		$db = null;

	}
	catch(PDOException $e){
		echo $e->getMessage();
	}
}

function UpdateDB(){

	try{

		$db = new PDO("sqlite:C:/xampp/htdocs/db/amicale.sqlite");

		$var_rowID = $_POST['UrowID'];
		$columnNmb = $_POST['columnNmb'];
		$newValue = $_POST['newValue'];

		switch ($columnNmb) {
			case '0':
				$command = "UPDATE Products SET P_Name = '".$newValue."' WHERE P_ID = (select P_ID from ProductRetailerLocations where PRL_ID = '$var_rowID')";
				$db->exec($command);
				break;
			case '1':
				$command = "UPDATE Products SET P_Category = '".$newValue."' where P_ID = (select P_ID from ProductRetailerLocations where PRL_ID = '$var_rowID')";
				$db->exec($command);
				break;
			case '2':
				$command = "UPDATE ProductRetailerLocations SET PRL_Quantity = '$newValue' where PRL_ID = '$var_rowID'";
				$db->exec($command);
				break;
			case '3':
				$command = "UPDATE ProductRetailerLocations SET PRL_ExpiryDate = '$newValue' where PRL_ID = '$var_rowID'";
				$db->exec($command);
				break;
			case '4':
				$command = "UPDATE ProductRetailerLocations SET PRL_SellPrice = '$newValue' where PRL_ID = '$var_rowID'";
				$db->exec($command);
				break;		
			default:
				echo "Not a valid number";
				break;
		}

		$db = null;
	}
	catch(PDOException $e){

		echo $e->getMessage();
	}


}

?>