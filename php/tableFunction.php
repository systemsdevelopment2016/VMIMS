<?php

/**STILL MISSING PROCEDURES FOR THE TABLE THIS IS JUST A SIMPLE DEMO**/
$database = new SQLiteDatabase('amicaleStinson.db');

function addRow($rowArrayData,$tableName){

$sql = '';

	switch ($tableName) { 

		case "sales":
			$sql = 'INSERT INTO $tableName (rowID,product,category,quantity,retailer,boughtPrice,pricePlusTax,profit,suggestedPrice,tax,finalPrice) 
					VALUES ($rowArrayData[0],$rowArrayData[1],$rowArrayData[2],$rowArrayData[3],$rowArrayData[4],$rowArrayData[5],
					$rowArrayData[6],$rowArrayData[7],$rowArrayData[8],$rowArrayData[9],$rowArrayData[10]);';
			break;
		case "wastage":
			$sql = 'INSERT INTO $tableName (rowID,product,wastageDate,category,quantity,reason,lost,registeredBy) 
					VALUES ($rowArrayData[0],$rowArrayData[1],$rowArrayData[2],$rowArrayData[3],$rowArrayData[4],
					$rowArrayData[5],$rowArrayData[6],$rowArrayData[7]);';
			break;
		case "shopping":
			$sql = 'INSERT INTO $tableName (rowID,product,quantity,retailer,price,urgent) 
					VALUES ($rowArrayData[0],$rowArrayData[1],$rowArrayData[2],$rowArrayData[3],$rowArrayData[4],$rowArrayData[5]);';
			break;		
		default:
			echo "";
			break;
	}

	$database->queryExec($sql);
}

function deleteRow($rowID,$tableName){

	$sql = 'DELETE FROM $tableName WHERE rowID = $rowID;';
	$database->queryExec($sql);
}

function editRow($rowArrayData,$tableName){

$sql = '';

	switch ($tableName) { 

		case "sales":
			$sql = 'UPDATE $tableName SET product = $rowArrayData[1],
									  SET category = $rowArrayData[2],
									  SET quantity = $rowArrayData[3],
									  SET retailer = $rowArrayData[4],
									  SET boughtPrice = $rowArrayData[5],
									  SET pricePlusTax = $rowArrayData[6],
									  SET profit = $rowArrayData[7],
									  SET suggestedPrice = $rowArrayData[8],
									  SET tax = $rowArrayData[9],
									  SET finalPrice = $rowArrayData[10]
					WHERE rowID = $rowArrayData[0];';
			break;

		case "wastage":
			$sql = 'UPDATE $tableName SET product = $rowArrayData[1],
									  SET wastageDate = $rowArrayData[2],
									  SET category = $rowArrayData[3],
									  SET quantity = $rowArrayData[4],
									  SET reason = $rowArrayData[5],
									  SET lost = $rowArrayData[6],
									  SET registeredBy = $rowArrayData[7]
					WHERE rowID = $rowArrayData[0];';
			break;

		case "shopping":
			$sql = 'UPDATE tableName SET product = $rowArrayData[1],
								     SET quantity = $rowArrayData[2],
								     SET retailer = $rowArrayData[3],
								     SET price = $rowArrayData[4],
								     SET urgent = $rowArrayData[5]
					WHERE rowID = $rowArrayData[0];';
			break;	

		default:
			echo "";
			break;
	}

	$database->queryExec($sql);

}

?>