<?php



function create_tables() {
	try
	{
		// open DB connection
		$db = new PDO("sqlite:db/amicale.sqlite");

		// create Products table
		$db->exec("CREATE TABLE IF NOT EXISTS Products (P_ID INT(5) PRIMARY KEY, P_Name VARCHAR(20), P_Category VARCHAR(20));");

		// create Retailers table
		$db->exec("CREATE TABLE IF NOT EXISTS Retailers (R_ID INT(5) PRIMARY KEY, R_Name VARCHAR(20), R_Address VARCHAR(20));");

		// create ProductRetailers table
		$db->exec("CREATE TABLE IF NOT EXISTS ProductRetailers (P_ID INT(5), R_ID INT(5), PR_BuyPrice DOUBLE(7,2), PRIMARY KEY (P_ID, R_ID), FOREIGN KEY(P_ID) REFERENCES Products(P_ID), FOREIGN KEY(R_ID) REFERENCES Retailers(R_ID));");

		// create Locations table
		$db->exec("CREATE TABLE IF NOT EXISTS Locations (L_ID INT(3) PRIMARY KEY, L_Name VARCHAR(20));");

		// create ProductRetailerLocations table
		$db->exec("CREATE TABLE IF NOT EXISTS ProductRetailerLocations (PRL_ID INT(7) PRIMARY KEY, P_ID INT(5), R_ID INT(5), L_ID INT(3), PRL_Quantity INT(5), PRL_ExpiryDate DATE, PRL_Comment VARCHAR(50), FOREIGN KEY(P_ID) REFERENCES Products(P_ID), FOREIGN KEY(R_ID) REFERENCES Retailers(R_ID), FOREIGN KEY(L_ID) REFERENCES Locations(L_ID));");

		// create Wastes table
		$db->exec("CREATE TABLE IF NOT EXISTS Wastes (W_ID INT(5) PRIMARY KEY, PRL_ID INT(7), W_Quantity INT(5), W_Date DATE, W_Reason VARCHAR(50), W_Supervisor VARCHAR(10), FOREIGN KEY(PRL_ID) REFERENCES ProductRetailerLocations(PRL_ID));");
		
		// create Sales table
		$db->exec("CREATE TABLE IF NOT EXISTS Sales (S_ID INT(5) PRIMARY KEY, PRL_ID INT(7), S_Quantity INT(5), S_ProfitMargin DOUBLE(5,2), FOREIGN KEY(PRL_ID) REFERENCES ProductRetailerLocations(PRL_ID));");

		// close DB connection
		$db = NULL;
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}
}


function connect()
{
	try
	{
		$db = new PDO("sqlite:/db/amicale.sqlite");
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}
}

?>