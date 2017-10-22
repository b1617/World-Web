
<?php
session_start ();
require_once 'header.php';
require_once 'inc/manager-db.php';
require_once 'inc/connexion.php';

if (isset($_GET['submitSql'])) {
  if( preg_match('/^SELECT/i' , $_GET['requete']) && preg_match('/FROM/i' , $_GET['requete'])){

    $sql = $_GET['requete'];
    /*req($sql,$conn);
    reqs($sql,$conn);
    countCol($sql);
    countRow($sql);
    */
  } else {
     echo "<script> alert('Veuillez ecrire une requete sql de type SELECT');
            window.location.href='sql.php';
           </script>";
  }
 

}



?>



<html>
<head></head>
<body>
 
    <div class="container">
           <div class="well">Requete SQL</div>
        <div class="row"> 
            <div class="col"> 
                <form method="GET" action="" style="margin-bottom:250px;">
                  <h4 style="text-align:center"> </h4>
<textarea style="margin-left:28%; height:100px; width:500px; resize:none;"  id="textarea" placeholder="ECRIVEZ VOTRE REQUETE SQL DE TYPE SELECT" name="requete" required>
</textarea> <br>
                    <input type="submit" id="submit" value="submit" name="submitSql"  style="margin-left:42%;">
                </form>
             <?php 
             if (isset($_GET['requete'])) 
              {

                 // if( preg_match('/^SELECT/i' , $_GET['requete']) && preg_match('/FROM/i' , $_GET['requete'])){
                      echo($_GET['requete']);

                      $countCol = countCol($sql);
                      echo "<br><br><br><br>";
                      echo " Il y a  " . $countCol ." elements ";
        
                      $countRow = countRow($sql);
                      echo " et " . $countRow ." objets.";
                      echo "<br><br>";

                    }
                    ?>
 
<table border='2'>
<tr>
<?php 

if (isset($_GET['requete'])) {

  $tab = reqs($sql,$conn); // recup cle
  /*                                              // affichage cle                   
  for ($i=0; $i < $countCol ; $i++){
    foreach ($tab as $array => $value):?> 
      <?php $a = array_keys($value); ?>
      <th>  <?php echo $a[$i]; ?> </th>
      <?php break; ?>
    <?php endforeach;
  }
*/
  if (count($tab)>0) :
    foreach ($tab[0] as $key => $value):?> 
       <th>  <?php echo $key; ?> </th>
  <?php 
    endforeach;
  endif; 
  echo "</tr>"; 
  foreach ($tab as $row) {
    echo "<tr>";
    foreach ($row as $value) {
      echo "<td>" . $value . "</td>";
    }
    echo "</tr>";
  }
}

                                                        // affichage element
     /*     
  $req = req($sql,$conn); var_dump($req);?>  <!-- recup element -->

<?php  for ($o=0; $o < $countRow ; $o++){        // on entre dans la boucle tant que il y a des elements     
  echo "<tr>";                                  // on ouvre  une ligne
             
  for ($i=0; $i < $countCol ; $i++) {             // pour le nombre de cle -> on tourne   // Cle = CountCol
      foreach ($req as $array => $valeur ):?>            
        <td>  <?php echo $valeur[$i]; ?> </td>       <!-- on affiche le premier element [$i] dans le premier colonne de la ligne et on l'increment pour chaque tour . --> 
        <?php break; ?>                            <!-- on sort de la boucle --> 
      <?php endforeach;              // fin de la boucle 
    }  
      // $req[$o];
  }
}
*/
?>                
    </tr>      
</table>                             
            </div>
        </div>
    </div>
</body>
</html>
<?php require_once 'footer.php'; ?>