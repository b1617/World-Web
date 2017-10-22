<?php
require_once 'connect-db.php';
require_once 'connexion.php';

/** Obtenir la liste de tous les pays référencés d'un continent donné
    ou de la planète entière
*/
function getCountries($continent = null) {
   // pour utilisater la variable globale dans la fonction
   global $pdo;
   if (!$continent) :
     $query = 'SELECT * FROM Country;';
     return $pdo->query($query)->fetchAll();
   else :
     $query = 'SELECT * FROM Country WHERE Continent = :continent;';
     $prep = $pdo->prepare($query);
     $prep->bindValue(':continent', $continent, PDO::PARAM_STR);
     $prep->execute();
     // var_dump($prep);
     // var_dump($continent);
     return $prep->fetchAll();
   endif;
}


  function getCityName($id){
    global $pdo;
    $sql = 'SELECT Name FROM City WHERE id =:id ';
    $prep = $pdo->prepare($sql);
    $prep->bindValue(':id',$id);
    $prep->execute();
    if ($prep->rowCount() == 0) {
      return "";
    }
    else
    return $prep->fetch()->Name;
  }


  function getNbVille($id){
    global $pdo;
    $sql = 'SELECT count(*) as nbCountry FROM City WHERE idCountry =:id ';
    $prep = $pdo->prepare($sql);
    $prep->bindValue(':id',$id);
    $prep->execute();
   // var_dump($id);
    return $prep->fetch()->nbCountry;
  }
  function getContinent(){
    global $pdo;
    $req = 'SELECT DISTINCT Continent FROM Country  ORDER BY Continent ASC';
     $prep = $pdo->prepare($req);
    $prep->execute();
    return $prep->fetchAll();
  }



function getPays($name){
  global $pdo;
  $requete = 'SELECT * FROM Country WHERE Name = :name';
  $prep = $pdo->prepare($requete);
  $prep->bindValue(':name' , $name) ;
  $prep->execute();
  return $prep->fetch();
}
function getAllPays(){
  global $pdo;
  $requete = 'SELECT Name FROM Country';
  $prep = $pdo->prepare($requete);
  $prep->execute();
  return $prep->fetchAll();
}


function getAllCity($id){
  global $pdo;
  $req = 'SELECT * FROM City WHERE idCountry = :id';
  $prep = $pdo->prepare($req);
    $prep->bindValue(':id',$id);
    $prep->execute();
   // var_dump($id);
    return $prep->fetchAll();
}
function getDistrict($id){
  global $pdo;
  $req = 'SELECT DISTINCT District FROM City WHERE idCountry = :id';
  $prep = $pdo->prepare($req);
    $prep->bindValue(':id',$id);
    $prep->execute();
   // var_dump($id);
    return $prep->fetchAll();
}

function getLangue($id){
 global $pdo;
 $req = 'SELECT Name, Percentage , idLanguage FROM CountryLanguage  , Language WHERE idCountry = :id and id = idLanguage 
 and CountryLanguage.idLanguage=Language.id ORDER BY Percentage desc'  ;
 $prep= $pdo->prepare($req);
 $prep->bindValue(':id' ,$id);
 
 $prep->execute();
 return $prep->fetchAll();
}

function add($adder){
 // var_dump($adder);
   global $pdo;
  $idCountry = $adder['idcountry'];
   $code =  $adder['code'];
   $name =  $adder['name'];
   $district =  $adder['district'];
   $pop =  $adder['population'];
   $namex = $adder['namex'];
     
 
 $req = ( "INSERT INTO City ( idCountry,Name,CountryCode,District,Population) 
  values(:idCountry,:name,:code,:district,:pop)");

          
  $add=$pdo->prepare($req);
  
  $add->bindValue(':idCountry',$idCountry);
  $add->bindValue(':name',$name);
   $add->bindValue(':code',$code);
   $add->bindValue(':district',$district);
    $add->bindValue(':pop',$pop);

  
  $add->execute();


      echo " <script type='text/javascript'> alert (' Add successfully ');
     window.location.href='pays.php?name=$namex';</script>";
    
}
function update($up){
  global $pdo;
 // var_dump($up);

  $id = $up['id'];
  $namex = $up['namex'];
  $pop = $up['pop'];
  $life = $up['life'];
  $gnp = $up['gnp'];
  $gnpold = $up['gnpold'];
  $localname = $up['localname'];
  $govern = $up['govern'];
  $head = $up['head'];

  $update = 'UPDATE Country SET Population = :pop ,GNP = :gnp , LifeExpectancy = :life ,GNPOld = :gnpold , 
            LocalName = :localname , GovernmentForm = :govern , HeadOfState = :head WHERE id = :id';
  $prepare=$pdo->prepare($update);
  $prepare->bindValue(':id',$id);
  $prepare->bindValue(':pop',$pop);
  $prepare->bindValue(':gnp',$gnp);
  $prepare->bindValue(':life',$life);
  $prepare->bindValue(':gnpold',$gnpold);
  $prepare->bindValue(':localname',$localname);
  $prepare->bindValue(':govern',$govern);
  $prepare->bindValue(':head',$head);

  $prepare->execute();

   echo " <script type='text/javascript'> alert (' Update  successfully ');
     window.location.href='pays.php?name=$namex';</script>";
    


}/*
function requete($sql){
  global $pdo;
  // var_dump($sql);
  $prep= $pdo->prepare($sql);
  $prep->execute();
 return  $prep->fetchAll();  
}
*/



function req($sql, $conn){
  $tab = array();
  $req = $sql;
  $result = mysqli_query($conn,$req) or die (mysqli_error($conn));
while ($ligne=mysqli_fetch_array($result)) {
$tab[] = $ligne;
}
    return $tab; 
}
function reqs($sql, $conn){
  $tab = array();
  $req = $sql;
  $result = mysqli_query($conn,$req) or die (mysqli_error($conn));
while ($ligne=mysqli_fetch_assoc($result)) {
$tab[] = $ligne;
}
    return $tab; 
}




function countCol($sql){
   global $pdo;
  // var_dump($sql);
  $prep= $pdo->prepare($sql);
  $prep->execute();
  $count = $prep->columnCount();
 // var_dump($count);
  return $count;

}
function countRow($sql){
   global $pdo;
  // var_dump($sql);
  $prep= $pdo->prepare($sql);
  $prep->execute();
  $count = $prep->rowCount();
 // var_dump($count);
  return $count;

}
function checkCountry($country){
  global $pdo;
  $sql = "SELECT Name FROM Country WHERE Name = :name";
  $prep = $pdo->prepare($sql);
  $prep->bindValue(':name',$country);
  $prep->execute();
    if ($prep->rowCount() == 0) {
      echo " <script type='text/javascript'> alert (' Please enter a Country  ');
     window.location.href='index.php';</script>";
    
    }
    else 
     echo " <script type='text/javascript'> 
          location.href='pays.php?name=$country';</script>";
  }


function getAuthentification($login,$pass){
  global $pdo;
  $query = "SELECT * FROM user where login=:login and password=:pass";
  $prep = $pdo->prepare($query);
  $prep->bindValue(':login', $login);
  $prep->bindValue(':pass', $pass);
  $prep->execute()
;
  // on vérifie que la requête ne retourne qu'une seule ligne
  if($prep->rowCount() == 1){
    $result = $prep->fetch(PDO::FETCH_ASSOC); 
    
    return $result;

  }
 else
  return false;
}

?>