<?php 
require_once 'inc/manager-db.php'; 

  session_start ();

  
  if (isset($_GET['Add']) && is_numeric($_GET['population'])) {
      if ($_SESSION['login']) {
      // var_dump($_GET);
      add($_GET);
      }
       else{
     header ('location:signout.php');
  }
  }
     

    if(isset($_GET['update'])  && is_numeric($_GET['pop'])){
        if ($_SESSION['login']) {
        update($_GET);
        //var_dump($_GET);
      }
       else{
     header ('location:signout.php');
    }
    } 

  
  
  ?>

<?php require_once 'header.php'; ?>
<div class="container-fluide" >
  <div class="starter-template">
 <h1 style="padding-top:0";>Hello World   </h1>
  </div>
<?php  require_once 'worldHigh.svg'; ?>




<?php require_once 'footer.php'; ?>
