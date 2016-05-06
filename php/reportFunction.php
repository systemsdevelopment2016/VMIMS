<?php

$database = sqlite_open('/db/amicale.sqlite') or die('Connection problem');

function stockTables(){

	$sql = 'select one.L_Name, sec.P_Name, sec.P_Category,th.PRL_Quantity,th.PRL_ExpiryDate,fo.PR_BuyPrice 
		    from Locations one, Products sec, ProductRetailerLocations th, ProductRetailers fo
		    where one.L_ID = th.L_ID and sec.P_ID = th.P_ID and fo.P_ID = th.P_ID;'

   $result = sqlite_exec($database,$sql);

   return $result;
}

function wastageReport(){

	$sql = 'select one.P_Name, sec.W_Date, one.P_Category, sec.W_Quantity, sec.W_Reason, th.PR_BuyPrice * sec.W_Quantity, sec.W_Supervisor
			from Products one, Wastes sec, ProductRetailers th
			where th.P_ID = one.P_ID and sec.PRL_ID = (select PRL_ID from ProductRetailerLocations where P_ID = one.P_ID);'

	$result = sqlite_exec($database,$sql);

	return $result;
}

function salesReport(){


}


?>