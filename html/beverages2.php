<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../img/stm-icon.ico">

    <title>Breuvages 2 | Amicale Stinson</title>

    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/jquery-ui.structure.min.css">
    <link rel="stylesheet" type="text/css" href="../css/jquery-ui.theme.min.css">
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
      </div> <!--End .sidebar-->

      <div class="container content"> 
        <div class="page-header">
          <h1>Accueil / Machines Distributrices / Breuvages 2</h1>
        </div>

        <div class="action-menu">
          <span class="glyphicon glyphicon-plus-sign"> Ajouter</span>
          <span class="glyphicon glyphicon-pencil"> Modifier</span>
          <span class="glyphicon glyphicon-trash"> Supprimer</span>
          <span class="glyphicon glyphicon-pushpin"> Note</span>
          <span class="glyphicon glyphicon-floppy-disk"> Sauvegarder</span>
          <span class="glyphicon glyphicon-print"> Imprimer</span>   
        </div>

         <!-- THIS FORM HAS TO BE HIDDEN AT FIRST -->
        <div class="form-container" style="display:none;">
          <div class="form-inline" role="form"  id="formid">
            <input type="hidden" name="addToDB" value="login" />
            <div class="form-group col-md-3">
              <label for="pname">Product Name:</label>
              <input type="text" class="form-control" id="pname" name="pname" placeholder="Enter product">
            </div>
            <div class="form-group col-md-3">
              <label for="category">Product Category:</label>
              <input type="text" class="form-control" id="category" name="category" placeholder="Enter category">
            </div>
            <div class="form-group col-md-3">
              <label for="quantity">Product Quantity:</label>
              <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Enter quantity">
            </div>
            <div class="form-group col-md-3">
              <label for="exp">Expiry Date:</label>
              <input type="text" class="form-control" id="exp" name="exp" placeholder="Enter date">
            </div>
            <div class="form-group col-md-3">
              <label for="rname">Retailer Name:</label>
              <input type="text" class="form-control" id="rname" name="rname" placeholder="Enter retailer">
            </div>
            <div class="form-group col-md-3">
              <label for="raddress">Retailer Address:</label>
              <input type="text" class="form-control" id="raddress" name="raddress" placeholder="Enter address">
            </div>
            <div class="form-group col-md-3">
              <label for="bprice">Buying Price:</label>
              <input type="text" class="form-control" id="bprice" name="bprice" placeholder="Enter buy price">
            </div>
            <div class="form-group col-md-3">
              <label for="sprice">Selling Price:</label>
              <input type="text" class="form-control" id="sprice" name="sprice" placeholder="Enter sell price">
            </div>
            <div class="form-group">
              <label for="comment">Comment:</label>
              <textarea class="form-control" rows="1" id="comment" name="comment" placeholder="Enter comments or notes"></textarea>
            </div>
            <br/>
            <input type="submit" id="submit" class="btn btn-default" name="submit" text="submit"/>
          </div>
          <div id="response"></div>
        </div> 
        <!-- END OF THE FORM -->

        <div class="table-div">
          <table class="table table-responsive table-bordered table-hover">
            <thead>
             <tr>
               <th>Produit</th>
               <th>Catégorie</th>
               <th>Quantité</th>
               <th>Date d'Expiration</th>
               <th>Prix</th>
             </tr>
            </thead>

           <tbody class="tableBody">
            <?php

              $db = new PDO("sqlite:C:/xampp/htdocs/db/amicale.sqlite");
              
              $sql = "select th.PRL_ID,sec.P_Name, sec.P_Category,th.PRL_Quantity,th.PRL_ExpiryDate,fo.PR_BuyPrice 
                from Locations , Products sec, ProductRetailerLocations th, ProductRetailers fo
                where Locations.L_ID = th.L_ID and sec.P_ID = th.P_ID and fo.P_ID = th.P_ID and Locations.L_Name like 
                '%beverages2%'";
                  $result = $db->query($sql);
          
              if(is_array($result) || is_object($result))
              {
                  foreach($result as $row)
                      {
                        echo "<tr id='".$row[PRL_ID]."'>";
                        echo "<td>".$row[L_Name]."</td>";
                        echo "<td>".$row[P_Name]."</td>";
                        echo "<td>".$row[P_Category]."</td>";
                        echo "<td>".$row[PRL_Quantity]."</td>";
                        echo "<td>".$row[PRL_ExpiryDate]."</td>";
                        echo "<td>".number_format($row[PR_BuyPrice],2)."</td>";
                        echo "</tr>";
                      }
              }

            ?>
           </tbody>
          </table>

        </div> <!--End .table-div -->

      </div>

    </div> <!--End of .container-fluid-->     

    <script src="../js/jquery-1.12.3.min.js"></script>
    <script type="text/javascript" src="../js/jquery-ui.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/base.js"></script>
    <script src="../js/table.js"></script>
  </body>
</html>