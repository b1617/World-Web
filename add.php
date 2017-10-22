<?php

 session_start();
 if ($_SESSION['login']){
       require_once 'header.php';
     require_once 'inc/manager-db.php';
     if (isset($_GET['id']) && isset($_GET['code']) && isset($_GET['name']) && !empty($_GET['id']) && !empty($_GET['code']) && !empty($_GET['name'])){
       
   $idcountry = $_GET['id'];
   $code = $_GET['code'];
   $name = $_GET['name'];
   }
 }
else{
   header("location:index.php");
   }
?>
<html>
<head>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col">
            <hr>
            <div class="well">Add a new city</div>
            <form action="index.php" method="GET">
                <fieldset>
                <input type="hidden" value="<?php echo $idcountry ?>" name="idcountry"> <br>
                 <input type="hidden" value="<?php echo $code ?>" name="code"><br>
                  Name : <input type="text"  name="name" required><br>
                 District :  <!-- <input type="text"  name="district"><br>-->
                            <select name="district">
                               <?php 
                                    $dist = getDistrict($idcountry);
                                    foreach ($dist as $district) : ?>
                                    <?php echo "<option> $district->District </option>" ?> 
                                    <?php endforeach; ?>

                            </select> 


                  Population :  <input type="number"  name="population" required><br>
                  <input type="hidden" value="<?php echo $name ?> " name="namex">
                  <input type="submit" value="Add" name="Add">


                  </fieldset>
            </form>
        </div>
    </div>
</div>
</body>
</html>
<?php require_once 'footer.php'; ?>