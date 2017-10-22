<?php
session_start ();
require_once 'header.php';
require_once 'inc/manager-db.php';



// var_dump($cartePays);
if (isset($_GET['name']) && !empty($_GET['name'])) {
  $cartePays = $_GET['name'];
 $paysPays = getPays($cartePays);
 // var_dump($paysPays);
}
?>
<html>
    <body>
        <div class="container"> 
        <div class="page-header">
            <h1 style="text-align:center;"> <?php echo (strtoupper($paysPays->Name)); ?>
            <img src="drapeau/<?php echo strtolower($paysPays->Code2)?>.png" style="width:50px;">  
            </h1>
        </div>
   <div class="row">
<div class="col-md-2" >
    <div class="panel panel-primary" style="width:270px;">
            <div class="panel-heading"><?php  echo $paysPays->Code?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                       <?php if ($_SESSION['login']):?>                             
                                      <a href="update.php?name=<?php echo $paysPays->Name?>">
                                      
                                        <button>Update </button>
                                     
                                      </a> 
                                       <?php endif;?>
            </div> 
            <div class="panel-body">
            <ul class="list-group">
            <li class="list-group-item">N°<?php echo $paysPays->id ?></li>
            <li class="list-group-item">Capital : <?php echo  getCityName($paysPays->Capital); ?></li>
            <li class="list-group-item">Continent : <?php echo $paysPays->Continent ?></li>
             <li class="list-group-item">Population : <?php echo $paysPays->Population ?></li>
            <li class="list-group-item">President : <?php echo $paysPays->HeadOfState?></li>
            <li class="list-group-item">Government : <?php echo $paysPays->GovernmentForm?></li>
            <li class="list-group-item">Surface : <?php echo $paysPays->SurfaceArea?> Km²</li>
            <li class="list-group-item">Independence Year : <?php echo $paysPays->IndepYear?></li>
            <li class="list-group-item">Life : <?php echo $paysPays->LifeExpectancy ?></li>
            <li class="list-group-item">GNP : <?php echo  $paysPays->GNP; ?></li>
            <li class="list-group-item">GNP-OLD : <?php echo  $paysPays->GNPOld; ?></li>
            </ul>
        </div>
    </div>
</div>
    <div class="col-md-6 col-md-push-1"> 
        <div class="panel panel-primary">
          <div class="panel-heading">CITY'S &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 <?php if ($_SESSION['login']):?>                            
            <a href='add.php?id=<?php echo $paysPays->id . "&code=" . $paysPays->Code . "&name=" . $paysPays->Name;?>'> 
             
                <button> ADD CITY</button>
              
             </a>
             <?php endif;?>
          </div>
          <div class="scroll">
          <table class="table ">
            <thead >
            <tr>
                <th> CITY</th>
                <th> DISTRICT</th>
                <th> POPULATION </th>
            </tr>
            </thead>
            <?php 
            $id = $paysPays->id;
            $allCity = getAllCity($id);
            foreach ($allCity as $city) : ?>
             <tbody>
          <tr>
           <td>  <?php echo $city->Name; ?></td>
          <td>  <?php echo $city->District; ?></td>
          <td>  <?php echo $city->Population;?> </td>
        </tr>
        </tbody>
      

   <?php endforeach; ?>
        
          </table>
        </div>
    </div>
    </div>
    <div class="col-md-3 col-md-push-1"> 
        <div class="panel panel-primary">
          <div class="panel-heading">All Language</div>
          <div class="scroll">
          <table class="table ">
            <thead >
            <tr>
                <th> Language</th>
                <th> Percentage</th>
            </tr>
            </thead>
            <?php 
             $id = $paysPays->id;
              $idLangue = getLangue($id);
           //  var_dump($idLangue);
              foreach ($idLangue as $idLang) :?> 
             <tbody>
          <tr>
            <td>  <?php echo $idLang->Name; ?></td>
           <td>  <?php echo $idLang->Percentage; ?></td>
        </tr>
        </tbody>

   <?php endforeach; ?>
        
          </table>
        </div>
    </div>
    </div>
</div>


<div class="row">
    <div class="col-md-8">
      
    </div>
</div>
</div>

    </body>
</html>
<?php require_once 'footer.php'; ?>
