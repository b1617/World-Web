<?php
      require_once 'inc/manager-db.php';        
    // on teste si nos variables sont définies et remplies
   if (isset($_POST['login']) && isset($_POST['pwd']) 
    && !empty($_POST['login'])&& !empty($_POST['login']))  {
  
 
      // on appele la fonction getAuthentification en lui passant en paramètre le login et password
      //la fonction retourne les caractéristiques du salaries si il est connu sinon elle retourne false
      $result = getAuthentification($_POST['login'],$_POST['pwd']);
      // si le résulat est vrai
      if($result){
// on la démarre la session
session_start (); 
// on enregistre les paramètres de notre visiteur comme variables de session
$_SESSION['login'] = $result['login']; 
$_SESSION['id'] = $result['id'];

// on redirige notre visiteur vers une page de notre section membre
header ('location: index.php'); 
      }
      //si le résultat est false on redirige vers la page d'authentification
      else{
  header ('location: sign.php?erreur=ereur');
      }
    }
    

  



 ?> 