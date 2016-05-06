<?php
include "../php/reportFunction.php";
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="./img/stm-icon.ico">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/base.css">
 </head>

<?php

	$backValues = stockTables();
	echo"
			<table width='30%' >
				<tr>
					<td>Endroit</td>
					<td>Produit</td>
					<td>Categorie</td>
					<td>Quantite</td>
					<td>Date d'expiration</td>
					<td>Prix</td>
		";

		while($content = sqlite_fetch_array($backValues)){
			echo "
				<tr> 
					<td>".$content['L_Name']."</td>
					<td>".$content['P_Name']."</td>
					<td>".$content['P_Category']."</td>
					<td>".$content['PRL_Quantity']."</td>
					<td>".$content['PRL_ExpiryDate']."</td>
					<td>".$content['PR_BuyPrice']."</td>

			";
		}

		echo "</table>";



?>

 <div class="table-div">
          <table class="table table-responsive table-bordered table-hover">
            <thead>
             <tr>
              <th>Endroit</th>
               <th>Produit</th>
               <th>Catégorie</th>
               <th>Quantité</th>
               <th>Date d'Expiration</th>
               <th>Prix</th>
             </tr>
            </thead>

           <tbody>
            <tr>
            <td>Collations</td>
              <td>Oreo Cookies</td>
              <td>Cookies/Pastry</td>
              <td>15</td>
              <td>15.09.17</td>
              <td>$4.99</td>
            </tr>

            <tr>
            <td>Collations</td>
              <td>Smarties</td>
              <td>Sweets</td>
              <td>10</td>
              <td>15.09.17</td>
              <td>$3.99</td>
            </tr>

            <tr>
            <td>Collations</td>
              <td>Milk</td>
              <td>Diary products</td>
              <td>5</td>
              <td>15.09.17</td>
              <td>$2.99</td>
            </tr>

            <tr>
            <td>Collations</td>
              <td>Milk</td>
              <td>Diary products</td>
              <td>5</td>
              <td>15.09.17</td>
              <td>$2.99</td>
            </tr>

            <tr>
            <td>Collations</td>
              <td>Milk</td>
              <td>Diary products</td>
              <td>5</td>
              <td>15.09.17</td>
              <td>$2.99</td>
            </tr>

            <tr>
            <td>Collations</td>
              <td>Milk</td>
              <td>Diary products</td>
              <td>5</td>
              <td>15.09.17</td>
              <td>$2.99</td>
            </tr>
           </tbody>
          </table>

        </div> <!--End .table-div -->

 <body>
 </body>
</html>