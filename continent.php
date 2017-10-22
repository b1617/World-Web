 <?php
  session_start ();
    require_once 'header.php';
?>
<div  class="container">
<center><h1 style="font:35px;"> <?php echo strtoupper($_GET['Continent']); ?></h1></center>
  <div class="row">

<div class="col" style='text-align:center; padding-top:30px; '>
    <table class="table">
  
  <th style='text-align:center; '>COUNTRY</th>
  <th style='text-align:center; '> POPULATION</th>
  <th style='text-align:center;  '>CAPITAL</th>
  
  

  
   <?php
    
     require_once 'inc/manager-db.php';
   
    
    if (isset($_GET['Continent']) && !empty($_GET['Continent'])){
      
      $countryName =  $_GET['Continent'];
      //  var_dump(getCountries($countryName))
     $tabpays = getCountries($countryName);
      

     foreach ($tabpays as $pays ) :
       $id = $pays->Capital;
       $capital = getCityName($id);
       $idpays = $pays->id;
       $nbVille = getNbVille($idpays);
        $paysPays = getPays($pays->Name);

      // var_dump($nbVille);

       ?>

  <tr >

       <td >  <img src="drapeau/<?php echo strtolower($paysPays->Code2)?>.png" style="width:20px;"> 
         <a href="pays.php?name=<?php echo $pays->Name; ?>"> <?php echo $pays->Name; ?></a>  </td>
      
       <td > <?php echo $pays->Population; ?> </td>
      
       <td > <?php echo  $capital; ?> </td>
       
  </tr>
      
      <?php endforeach;
    }
       ?>
   
      
    
  </table> 

  </div>
</div>
</div>
</div>
 <?php require_once 'footer.php'; ?>