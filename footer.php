
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js"></script>
    <script src="bootstrap335/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
   <script src="js/jquery-ui.min.js"></script>


    <script> 
    $(document).ready(function(){

            $(".land").click(function(){
            var title = $(this).attr('title');
          //  alert(title);
            var lien =  "pays.php?name="+title;
          $('.map').attr('xlink:href',lien);   

            
            });  

            $(".land").hover(function(){
            var title = $(this).attr('title');
            $('.map').attr('xlink:title',title);   

            
            });  
});

   var tags =[
               <?php
                    $allPays = getAllPays();
                    foreach ($allPays as $key ) {
                      echo '"';
                      echo $key->Name;
                      echo '"';
                      echo ",";
                       }
                ?>
              ];

   $( "#tags" ).autocomplete({
  source: function( request, response ) {
          var matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( request.term ), "i" );
          response( $.grep( tags, function( item ){
              return matcher.test( item );
          }) );
      }
});

    </script>


    <hr />
    <footer class="navbar navbar-default navbar-static-bottom" style="padding-bottom: 2em; ">
      <div style="text-align: center; color:black";>MyWebApp &copy; 2017</div>
     </footer>

  </body>
</html>
