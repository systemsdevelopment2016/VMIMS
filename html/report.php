<?php
      $dsn = 'sqlite:/xampp/htdocs/db/amicale.sqlite';
      $db = new PDO($dsn);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../img/stm-icon.ico">

    <title>Réserve | Amicale Stinson</title>
    
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/base.css">

  </head>
  <body>
    <div class="">
    
      <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
          <div class="col-xs-2"><a href="../index.html"><img src="../img/stm-logo.png"></a></div>

          <div class="col-xs-7 search-bar">
            <label class="col-xs-2 control-label" for="search"><span class="glyphicon glyphicon-search"></span></label>
            <div class="col-xs-10">
              <input class="form-control" id="search" type="text" placeholder="Rechercher...">
            </div>
          </div>
          
          <div class="cols-xs-3 settings">
            <a href="#" data-toggle="popover" data-trigger="focus" data-placement="bottom" title="Options" data-content="<a href=''>Mon Compte</a><br/><a href=''>Gérer les Comptes</a><br/><a href=''>Gérer les Machines</a><br/><a href=''>Déconnexion</a><br/>" data-html="true"><p>Administrateur <span class="glyphicon glyphicon-cog"></span></p></a>
          </div>

        </div>
      </nav>   
      
      <div class="sidebar">
        <ul class="sidebar-ul">
          <li><a href="../index.php"><span class="glyphicon glyphicon-home"></span>Accueil</a></li>
          <li><a href="#"><span class="glyphicon glyphicon-menu-down"></span>Inventaire</a>
            <ul>
              <li><a href="fridge1.html">Réfrigérateur 1<a></li>
              <li><a href="fridge2.html">Réfrigérateur 2<a></li>
              <li><a href="backstock.html">Réserve<a><a></li>
            </ul>
          </li>
          <li><a href="#"><span class="glyphicon glyphicon-menu-down"></span>Machines Distributrices</a>
            <ul>
              <li><a href="beverages1.html">Breuvages 1<a></li>
              <li><a href="beverages2.html">Breuvages 2<a></li>
              <li><a href="snacks.html">Collations<a></li>
              <li><a href="meals.html">Repas<a></li>
            </ul>
          </li>
          <li><a href="#"><span class="glyphicon glyphicon-menu-down"></span>Listes</a>
            <ul>
              <li><a href="shopping.html">Liste d'Achats<a></li>
              <li><a href="wastage.html">Liste de Pertes<a></li>
              <li><a href="sales.html">Liste de Ventes<a></li>
            </ul>
          </li>
          <li><a href="report.php"><span class="glyphicon"></span>Rapport</a>
        </ul>
        
        <div class="sidebar-img"><a href="../index.html"><img src="../img/amicale-stinson-logo.png" height="100"></a></div>
      </div>

      <div class="container content"> 
        <div class="page-header">
          <h1>Rapport</h1>
        </div>

        <div class="action-menu">
          <span class="glyphicon glyphicon-print"> Imprimer</span>
        </div>

        <div class="table-div">

            <?php
                  $sql = "select one.L_Name, sec.P_Name, sec.P_Category,th.PRL_Quantity,th.PRL_ExpiryDate,fo.PR_BuyPrice 
                          from Locations one, Products sec, ProductRetailerLocations th, ProductRetailers fo
                          where one.L_ID = th.L_ID and sec.P_ID = th.P_ID and fo.P_ID = th.P_ID";
                  $result = $db->query($sql);
            ?>

          <table class="table table-responsive table-bordered table-hover" id="ReportProducts">
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
           <?php

           if(is_array($result) || is_object($result))
           {
                  foreach($result as $row)
                  {
                    echo "<tr>";
                    echo "<td>".$row[L_Name]."</td>";
                    echo "<td>".$row[P_Name]."</td>";
                    echo "<td>".$row[P_Category]."</td>";
                    echo "<td>".$row[PRL_Quantity]."</td>";
                    echo "<td>".$row[PRL_ExpiryDate]."</td>";
                    echo "<td>".$row[PR_BuyPrice]."</td>";
                    echo "</tr>";
                  }
           }

           ?>
           </tbody>
          </table>

          <table class="table table-responsive table-bordered table-hover" id="ReportWastage">
              <thead>
               <tr>
                 <th>Produit</th>
                 <th>Date</th>
                 <th>Catégorie</th>
                 <th>Quantité</th>
                 <th>Raison</th>
                 <th>Perte $</th>
                 <th>Enregistré par</th>               
               </tr>
              </thead>

             <tbody>

             <?php

             $sql = 'select one.P_Name, sec.W_Date, one.P_Category, sec.W_Quantity, sec.W_Reason, th.PR_BuyPrice * sec.W_Quantity, sec.W_Supervisor
                    from Products one, Wastes sec, ProductRetailers th
                    where th.P_ID = one.P_ID and sec.PRL_ID = (select PRL_ID from ProductRetailerLocations where P_ID = one.P_ID)';
             $result = $db->query($sql);

             if(is_array($result) || is_object($result))
             {
               foreach ($result as $newRow)
               {
                  echo "<tr>";
                  echo "<td>".$newRow[P_Name]."</td>";
                  echo "<td>".$newRow[W_Date]."</td>";
                  echo "<td>".$newRow[P_Category]."</td>";
                  echo "<td>".$newRow[W_Quantity]."</td>";
                  echo "<td>".$newRow[W_Reason]."</td>";
                  echo "<td>".$newRow[PR_BuyPrice* W_Quantity]."</td>";
                  echo "<td>".$newRow[W_Supervisor]."</td>";
                  echo "</tr>";
                }
              }
              
             ?>
             </tbody>
            </table>

            <table class="table table-responsive table-bordered table-hover" id="ReportSales">
              <thead>
               <tr>
                 <th>Produit</th>
                 <th>Catégorie</th>
                 <th>Quantité</th>
                 <th>Détaillant</th>
                 <th>Prix d'achat</th>
                 <th>Prix d'achat + tx</th>
                 <th>Profit</th>
                 <th>Prix Suggeré</th>
                 <th>Tax</th>
                 <th>Prix Final</th>
               </tr>
              </thead>

             <tbody>
              <tr>
                <td>Lays Chips</td>
                <td>Snack</td>
                <td>15</td>
                <td>Dollarama</td>
                <td>$0.5</td>
                <td>$0.57</td>
                <td>35%</td>
                <td>$0.92</td>
                <td>Oui</td>
                <td>$0.95</td>
              </tr>

              <tr>
                <td>Nutella</td>
                <td>Snack</td>
                <td>3</td>
                <td>Tigre Géant</td>
                <td>$0.5</td>
                <td>$0.57</td>
                <td>35%</td>
                <td>$0.92</td>
                <td>Oui</td>
                <td>$0.95</td>
              </tr>

              <tr>
                <td>Crème glacée</td>
                <td>Snack</td>
                <td>10</td>
                <td>Costco</td>
                <td>$0.5</td>
                <td>$0.57</td>
                <td>35%</td>
                <td>$0.92</td>
                <td>Oui</td>
                <td>$0.95</td>
              </tr>

              <tr>
                <td>Snickers</td>
                <td>Snack</td>
                <td>10</td>
                <td>Costco</td>
                <td>$0.5</td>
                <td>$0.57</td>
                <td>35%</td>
                <td>$0.92</td>
                <td>Oui</td>
                <td>$0.95</td>
              </tr>

             </tbody>
            </table>

        </div> <!--End .table-div -->

      </div>

    </div> <!--End of .container-fluid-->     

    <script src="../js/jquery-1.12.3.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/base.js"></script>
    <script src="../js/table.js"></script>
  </body>
</html>