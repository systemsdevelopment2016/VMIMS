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
                $database = sqlite_open('/db/amicale.sqlite') or die('Connection problem');
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
            <tr>
            <td>Fridge 1</td>
              <td>Oreo Cookies</td>
              <td>Cookies/Pastry</td>
              <td>15</td>
              <td>15.09.17</td>
              <td>$4.99</td>
            </tr>

            <tr>
            <td>Fridge 2</td>
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
            <td>Breuvages 1</td>
              <td>Milk</td>
              <td>Diary products</td>
              <td>5</td>
              <td>15.09.17</td>
              <td>$2.99</td>
            </tr>

            <tr>
            <td>Breuvages 2</td>
              <td>Milk</td>
              <td>Diary products</td>
              <td>5</td>
              <td>15.09.17</td>
              <td>$2.99</td>
            </tr>

            <tr>
            <td>Réserve</td>
              <td>Milk</td>
              <td>Diary products</td>
              <td>5</td>
              <td>15.09.17</td>
              <td>$2.99</td>
            </tr>
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
              <tr>
                <td>Lays Chips</td>
                <td>14/04</td>
                <td>Snacks</td>
                <td>13</td>
                <td>Passé date</td>
                <td>$13</td>
                <td>Georgia</td>
              </tr>

              <tr>
                <td>Nutella</td>
                <td>14/04</td>
                <td>Snacks</td>
                <td>13</td>
                <td>Passé date</td>
                <td>$13</td>
                <td>Georgia</td>
              </tr>


              <tr>
                <td>Crème glacée</td>
                <td>14/04</td>
                <td>Snacks</td>
                <td>13</td>
                <td>Tout est fondu</td>
                <td>$13</td>
                <td>Georgia</td>
              </tr>

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