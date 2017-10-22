<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
   

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon"   href="../image/fav.ico">

    <title>World</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap335/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/custom.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="js/jquery-ui.min.css">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
<?php 
require_once 'inc/manager-db.php';

if (isset($_GET['submit'])) {
  $country = $_GET['country'];
  // var_dump($country);
checkCountry($country);
}
?>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluide">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Home</a></li>
            <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> 
             Country <span class="caret"></span></a>  
              <ul class="dropdown-menu" style="padding: 10px; height:auto;">
                <?php
              $continent = getContinent();
               foreach ($continent as $nomContinent ) : ?>
               <li><a href="continent.php?Continent=<?php echo $nomContinent->Continent; ?>"><?php echo $nomContinent->Continent; ?> </a></li>
                <?php endforeach; ?>
              </ul>
          </li>

<?php
       
      foreach ($continent as $nomContinent ) : ?>

          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> 
           <?php echo $nomContinent->Continent; ?> <span class="caret"></span></a>  
              <ul class="dropdown-menu" style="padding: 10px;">
                <?php
                  $countryName = $nomContinent->Continent;
                 //  var_dump(getCountries($countryName))
                   $tabpays = getCountries($countryName);
                    foreach ($tabpays as $pays ): 
                    ?>
                <li><a href="pays.php?name=<?php echo $pays->Name; ?>">  <?php echo $pays->Name; ?> </a></li>
                
              <?php endforeach; ?>
              </ul>
          </li>
<?php endforeach; ?>

          <li><a href="sql.php">Sql Request </a></li>
         
          <form class="navbar-form navbar-left" role="search" action="" method="GET" >
            <div class="form-group" >
              <input type="text" class="form-control" id="tags" placeholder="ex: France" name="country" style="height:100%;" required>
            </div>
              <button type="submit" class="btn btn-default" name="submit" value="search">GO</button>
          </form>
          <p class="navbar-text" style="color:white;"><?php echo $_SESSION['login']; ?></p>

         <a href="signout.php">
         <?php if ($_SESSION['login']):?>  
          <button class="btn btn-danger navbar-btn"> sign out</button> </a> 
            <?php else:?>
                      <button class="btn btn-danger navbar-btn"> sign in</button> </a> 
          <?php endif;?>
          
             
        
         <a href="../index.php"> <button class="btn btn-danger navbar-btn"> Back</button> </a> 
           </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

<br><br><br>