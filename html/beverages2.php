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
    <link rel="stylesheet" type="text/css" href="../css/base.css">
    
  </head>
  <body>
    <div class="">

      <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
          <div class="col-xs-2"><a href="../index.html"><img src="../img/stm-logo.png"></a></div>

          <div class="col-xs-7 search-bar">
            <label class="col-xs-2 control-label" for="search"><span class="glyphicon glyphicon-search"></span></label>
            <form class="col-xs-10" action="searchResult.php" method="post">
              <input class="form-control" id="search" type="text" name="itemphp" placeholder="Rechercher...">
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
        
        <div class="sidebar-img"><a href="../index.html"><img src="../img/amicale-stinson-logo.png" height="100"></a></div>
      </div>

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

           <tbody>
            <tr>
              <td>Oreo Cookies</td>
              <td>Cookies/Pastry</td>
              <td>15</td>
              <td>15.09.17</td>
              <td>$4.99</td>
            </tr>

            <tr>
              <td>Smarties</td>
              <td>Sweets</td>
              <td>10</td>
              <td>15.09.17</td>
              <td>$3.99</td>
            </tr>

            <tr>
              <td>Milk</td>
              <td>Diary products</td>
              <td>5</td>
              <td>15.09.17</td>
              <td>$2.99</td>
            </tr>

            <tr>
              <td>Milk</td>
              <td>Diary products</td>
              <td>5</td>
              <td>15.09.17</td>
              <td>$2.99</td>
            </tr>

            <tr>
              <td>Milk</td>
              <td>Diary products</td>
              <td>5</td>
              <td>15.09.17</td>
              <td>$2.99</td>
            </tr>

            <tr>
              <td>Milk</td>
              <td>Diary products</td>
              <td>5</td>
              <td>15.09.17</td>
              <td>$2.99</td>
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