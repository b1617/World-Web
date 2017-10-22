<?php require_once 'header.php';?>
<html>
<head> <title>Sign</title> </head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-md-offset-4">
                <h1 class="text-center login-title">Sign in </h1>
                <div class="account-wall">
                    <form class="form-signin" action="login.php" method="post">
                        <input type="text" class="form-control" placeholder="Name" name="login" required autofocus     >
                        <input type="password" class="form-control" placeholder="Password" name="pwd" required>
                         <button class="btn btn-lg btn-primary btn-block" type="submit" value="Connexion" name="connexion">Sign in</button>
                        <?php
                        if (isset($_GET['erreur'])) {
                         echo "<p style='color:red; font-size:18px;'> Erreur Login or Password  </p> ";
                     }
                     ?>
                 </form>
             </div>
         </div>
     </div>
 </div>
</body>
</html>



<?php require_once 'footer.php'; ?>











<!--


<div align="center" style="margin:15% 15% 15% 15%;">
<form action="login.php" method="post">
    <style>
     form{
        color:black;
     }
    </style>
    <fieldset style="width:150px;">
        
Login : <input type="text" name="login"><br />
Password : <input type="password" name="pwd"><br /><br>
<input type="submit" value="Connexion" name="connexion"> <br />
<?php/*
        if (isset($_GET['erreur'])) {
           echo "<p style='color:red; font-size:18px;'> Erreur Login or Password  </p> ";
        }*/
    ?>
    </fieldset>
</form>
</div>

-->