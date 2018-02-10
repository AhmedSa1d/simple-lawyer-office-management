    <footer class="text-center">
      <div class="container text-center">
        <div class="row" class="foter text-center">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-1"></div>
              <div class="col-md-2 foter text-center" >
            <a href="index.php"> <img src="images/logo_03.png" id="logobot" width="160px" height="160px;" /></a>
              </div>
              <div class="col-md-2">
              </div>
              <div class="col-md-2 foter text-center">
                 <ul class=" " >
                    <li><a href="index.php" >الرئيسية</a></li>
                    <li  ><a href="oldAgencies.php" >التوكيلات القديمة</a></li>
                    <li><a href="newAgencies.php">التوكيلات الجديدة</a></li>
                    <li><a href="comRetraction.php">النقض الكلي</a></li>
                    <li><a href="parRetraction.php">النقض الجزئي</a></li>
                    <li><a href="Buildings.php">المبــــــــاني</a></li>
                    <li><a href="Cases.php">القضايا المنتهية</a></li>
                 </ul>
              </div>
              <div class="col-md-2"></div>
              <div class="col-md-2 foter text-center">
                   <img src="images/fc.png" >
                   <img src="images/tw.png" >
                   <img src="images/yt.png" >

              </div>
              <div class="col-md-1"></div>
            </div>

          </div>
        </div>
        <div class="row" >
          <div class="col-md-12 text-center" id="copyright">
            <p>Copy Right Team © <a href="https://www.facebook.com/ahmed.abdalmotleb.5">Ahmed Said </a>&<a href="https://www.facebook.com/nagah.shinawy"> Nagah Shinawy</a> 2018 </p>
          </div>
          
        </div>
      </div>
    </footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script type="text/javascript" src="JQUERY/jquery-3.0.0.min.js"></script>
    <script type="text/javascript" src="JQUERY/jquery-ui.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/javascript.js" type="text/javascript"></script>
  </body>
</html>
<?php
//5. close database
  if(isset($connection))
  {
    mysql_close($connection);
  }
?>