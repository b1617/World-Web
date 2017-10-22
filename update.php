<?php
session_start();
if ($_SESSION['login']){
  
  require_once 'header.php';
  require_once 'inc/manager-db.php';

  if (isset($_GET['name']) && !empty($_GET['name'])) {
    $name = $_GET['name'];
    $pays = getPays($name);
  }
}
else{

  header("location:index.php");
}
?>
<html>
<head></head>
<body>
  <div class="container">
    <div class="row">
      <div class="col">
       <div class="well">Update → <?php echo $pays->Name?></div>
       <hr>
       <form method="GET" action="index.php">
        <fieldset>
          
          <input type="hidden" value="<?php echo $pays->id?>" name="id">  <br>
          <input type="hidden" value="<?php echo $pays->Name?>" name="namex"> 


          Population :  <input type="type" value="<?php echo $pays->Population?>" name="pop" required>  <br>
          Life Exepectancy <input type="type" value="<?php echo $pays->LifeExpectancy?>" name="life" required>  <br>
          GNP : <input type="type" value="<?php echo $pays->GNP?>" name="gnp"  required>  <br>
          GNP-OLD :<input type="type" value="<?php echo $pays->GNPOld?>" name="gnpold" required>  <br>
          Local Name :   <input type="type" value="<?php echo $pays->LocalName?>" name="localname" required>  <br>
          Government :   <input type="type" value="<?php echo $pays->GovernmentForm?>" name="govern" required>  <br>
          Head of state :  <input type="type" value="<?php echo $pays->HeadOfState?>" name="head" required>  <br>
          <input type="submit" name="update" value="Update">
        </div>
      </div>
    </div>
  </fieldset>
</form>
</body>

</html>
<?php require_once 'footer.php'; ?>

<!--
<input type="hidden" value="<?php /* echo $pays->Name?>" name="">  <br>
             <input type="type" value="<?php echo $pays->Continent?>" name="">  <br>
             <input type="type" value="<?php echo $pays->Region?>" name="">  <br>
             <input type="type" value="<?php echo $pays->SurfaceArea?>" name="">  <br>
             <input type="type" value="<?php echo $pays->IndepYear?>" name="">  <br>

             -->*/