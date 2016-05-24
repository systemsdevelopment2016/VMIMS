<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">
    
    <link rel="icon" href="../img/stm-icon.ico">

    <title>Search</title>
    
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
            <form class="col-xs-10" action="search.php" method="post">
                <input class="form-control" id="search" type="text" name="item" placeholder="Rechercher...">
            </form>
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
              <li><a href="fridge1.php">Réfrigérateur 1<a></li>
              <li><a href="fridge2.php">Réfrigérateur 2<a></li>
              <li><a href="backstock.php">Réserve<a><a></li>
            </ul>
          </li>
          <li><a href="#"><span class="glyphicon glyphicon-menu-down"></span>Machines Distributrices</a>
            <ul>
              <li><a href="beverages1.php">Breuvages 1<a></li>
              <li><a href="beverages2.php">Breuvages 2<a></li>
              <li><a href="snacks.php">Collations<a></li>
              <li><a href="meals.php">Repas<a></li>
            </ul>
          </li>
          <li><a href="#"><span class="glyphicon glyphicon-menu-down"></span>Listes</a>
            <ul>
              <li><a href="shopping.php">Liste d'Achats<a></li>
              <li><a href="wastage.php">Liste de Pertes<a></li>
              <li><a href="sales.php">Liste de Ventes<a></li>
            </ul>
          </li>
          <li><a href="report.php"><span class="glyphicon"></span>Rapport</a>
        </ul>
        
        <div class="sidebar-img"><a href="../index.php"><img src="../img/amicale-stinson-logo.png" height="100"></a></div>
      </div>

      <div class="container content">
        <div class="page-header">
          <h1>Recherche</h1>
        </div>

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
            <?php
              $dsn = 'sqlite:/xampp/htdocs/db/amicale.sqlite';
              $db = new PDO($dsn);

                    $retrieveValue = $_POST['item'];

                    $sql = "select one.L_Name, sec.P_Name, sec.P_Category,th.PRL_Quantity,th.PRL_ExpiryDate,
                    fo.PR_BuyPrice from Locations one, Products sec, ProductRetailerLocations th, ProductRetailers fo
                      where sec.P_Name LIKE '%{$retrieveValue}%' and one.L_ID = th.L_ID and sec.P_ID = th.P_ID and 
                      fo.P_ID = th.P_ID";
                    $queryResult = $db->query($sql);

                    if(is_array($queryResult) || is_object($queryResult))
                    {
                      
                        foreach($queryResult as $row)
                        {
                          echo "<tr class = 'toDelete'>";
                          echo "<td>".$row[L_Name]."</td>";
                          echo "<td>".$row[P_Name]."</td>";
                          echo "<td>".$row[P_Category]."</td>";
                          echo "<td>".$row[PRL_Quantity]."</td>";
                          echo "<td>".$row[PRL_ExpiryDate]."</td>";
                          echo "<td>".$row[PR_BuyPrice]."</td>";
                          echo "</tr>";
                      }

                      //$_POST = array();
                   }
                   else{
                    echo "Aucun résultat pour cette recherche";
                   }
               
            ?>
           </tbody>
          </table>

        </div> <!--End .table-div -->

      </div>

    </div> <!--End of .container-fluid-->     

    <script src="../js/jquery-1.12.3.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/base.js"></script>
  </body>
</html>