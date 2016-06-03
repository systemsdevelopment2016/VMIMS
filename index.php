<?php
  try
  {

    // open DB connection
    $db = new PDO("sqlite:C:/xampp/htdocs/db/amicale.sqlite");

      // create Products table
        $db->exec("CREATE TABLE IF NOT EXISTS Products (P_ID INTEGER PRIMARY KEY, P_Name TEXT, P_Category TEXT);");

        // create Retailers table
        $db->exec("CREATE TABLE IF NOT EXISTS Retailers (R_ID INTEGER PRIMARY KEY, R_Name TEXT, R_Address TEXT);");

        // create ProductRetailers table
        $db->exec("CREATE TABLE IF NOT EXISTS ProductRetailers (P_ID INTEGER, R_ID INTEGER, PR_BuyPrice REAL, PRIMARY KEY (P_ID, R_ID), FOREIGN KEY(P_ID) REFERENCES Products(P_ID), FOREIGN KEY(R_ID) REFERENCES Retailers(R_ID));");

        // create Locations table
        $db->exec("CREATE TABLE IF NOT EXISTS Locations (L_ID INTEGER PRIMARY KEY, L_Name TEXT);");

        // create ProductRetailerLocations table
        $db->exec("CREATE TABLE IF NOT EXISTS ProductRetailerLocations (PRL_ID INTEGER PRIMARY KEY, P_ID INTEGER, R_ID INTEGER, L_ID INTEGER, PRL_Quantity INTEGER, PRL_SellPrice REAL, PRL_ExpiryDate TEXT, PRL_Comment TEXT, FOREIGN KEY(P_ID) REFERENCES Products(P_ID), FOREIGN KEY(R_ID) REFERENCES Retailers(R_ID), FOREIGN KEY(L_ID) REFERENCES Locations(L_ID));");

        // create Wastes table
        $db->exec("CREATE TABLE IF NOT EXISTS Wastes (W_ID INTEGER PRIMARY KEY, PRL_ID INTEGER, W_Quantity INTEGER, W_Date TEXT, W_Reason TEXT, W_Supervisor TEXT, FOREIGN KEY(PRL_ID) REFERENCES ProductRetailerLocations(PRL_ID));");
        
        // create Sales table
        $db->exec("CREATE TABLE IF NOT EXISTS Sales (S_ID INTEGER PRIMARY KEY, PRL_ID INTEGER, S_Quantity INTEGER, S_ProfitMargin REAL, FOREIGN KEY(PRL_ID) REFERENCES ProductRetailerLocations(PRL_ID));");


        /*THIS CODE CAN BE MODIFIED*/
        $result = $db->query("SELECT L_ID FROM Locations"); 

        if($result->fetchColumn() == false){
            $db->exec("INSERT INTO Locations (L_Name) VALUES ('fridge1');");
            $db->exec("INSERT INTO Locations (L_Name) VALUES ('fridge2');");
            $db->exec("INSERT INTO Locations (L_Name) VALUES ('backstock');");
            $db->exec("INSERT INTO Locations (L_Name) VALUES ('beverages1');");
            $db->exec("INSERT INTO Locations (L_Name) VALUES ('beverages2');");
            $db->exec("INSERT INTO Locations (L_Name) VALUES ('snacks');");
            $db->exec("INSERT INTO Locations (L_Name) VALUES ('meals');");
      }
      

    // close DB connection
    $db = NULL;
  }
  catch(PDOException $e)
  {
    echo $e->getMessage();
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="./img/stm-icon.ico">

    <title>Accueil | Amicale Stinson</title>
    
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/base.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">

  </head>
  <body>
    <div class="">

      <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
          <div class="col-xs-2"><a href="index.html"><img src="img/stm-logo.png"></a></div>

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
          <li><a href="index.php"><span class="glyphicon glyphicon-home"></span>Accueil</a></li>
          <li><a href="#"><span class="glyphicon glyphicon-menu-down"></span>Inventaire</a>
            <ul>
              <li><a href="html/fridge1.php">Réfrigérateur 1</a></li>
              <li><a href="html/fridge2.php">Réfrigérateur 2</a></li>
              <li><a href="html/backstock.php">Réserve<a></li>
            </ul>
          </li>
          <li><a href="#"><span class="glyphicon glyphicon-menu-down"></span>Machines Distributrices</a>
            <ul>
              <li><a href="html/beverages1.php">Breuvages 1</a></li>
              <li><a href="html/beverages2.php">Breuvages 2</a></li>
              <li><a href="html/snacks.php">Collations</a></li>
              <li><a href="html/meals.php">Repas</a></li>
            </ul>
          </li>
          <li><a href="#"><span class="glyphicon glyphicon-menu-down"></span>Listes</a>
            <ul>
              <li><a href="html/shopping.php">Liste d'Achats</a></li>
              <li><a href="html/wastage.php">Liste de Pertes</a></li>
              <li><a href="html/sales.php">Liste de Ventes</a></li>
            </ul>
          </li>
          <li><a href="html/report.php"><span class="glyphicon"></span>Rapport</a>
        </ul>
        
        <div class="sidebar-img"><img src="img/amicale-stinson-logo.png" height="100"></div>
      </div>

      <div class="container content"> 
        <div class="page-header">
          <h1>Bienvenue, Administrateur</h1>
        </div>

        <div class="page-menu">

          <div class="col-sm-4 page-menu-section">
            <div class="panel panel-default">
              <div class="panel-heading">
                <img src="img/inventory.png">
              </div>
              <div class="panel-body">
                <ul class="list-group">
                  <a href="html/fridge1.php"><li class="list-group-item">Réfrigérateur 1</li></a>
                  <a href="html/fridge2.php"><li class="list-group-item">Réfrigérateur 2</li></a>
                  <a href="html/backstock.php"><li class="list-group-item">Réserve</li></a>
                </ul>
              </div>
              <div class="panel-footer"><p>Inventaire</p></div>
            </div>
          </div>

          <div class="col-sm-4 page-menu-section">
            <div class="panel panel-default">
              <div class="panel-heading">
                <img src="img/vending-machines.png">
              </div>
              <div class="panel-body four-list-group-items">
                <ul class="list-group">
                  <a href="html/beverages1.php"><li class="list-group-item">Breuvages 1</li></a>
                  <a href="html/beverages2.php"><li class="list-group-item">Breuvages 2</li></a>
                  <a href="html/snacks.php"><li class="list-group-item">Collations</li></a>
                  <a href="html/meals.php"><li class="list-group-item">Repas</li></a>
                </ul>
              </div>
              <div class="panel-footer"><p>Machines Distributrices</p></div>
            </div>
          </div>

          <div class="col-sm-4 page-menu-section">
            <div class="panel panel-default">
              <div class="panel-heading">
                <img id="list-img" src="img/lists.png">
              </div>
              <div class="panel-body">
                <ul class="list-group">
                  <a href="html/shopping.php"><li class="list-group-item">Liste d'Achats</li></a>
                  <a href="html/wastage.php"><li class="list-group-item">Liste de Pertes</li></a>
                  <a href="html/sales.php"><li class="list-group-item">Liste de Ventes</li></a>
                </ul>
              </div>
              <div class="panel-footer"><p>Listes</p></div>
            </div>
          </div>

            

        </div> <!--End of .page-menu-->
      </div> <!--End of .container .content-->

    </div> <!--End of .container-fluid-->     

    <script src="./js/jquery-1.12.3.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/base.js"></script>
  </body>
</html>