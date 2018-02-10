 <?php include("includes/header.php") ;
     require_once("includes/functions.php");
  ?>
 <div class="container">
 	<div class="row text-center">
 		<div class="col-md-2"></div>
 		<div class="col-md-8 headCon">
           <a href="Buildings.php"><p> المباني </p> </a>
 		</div>
 		<div class="col-md-2"></div>
 	</div>
 	<div class="row text-center">
 		<div class="col-md-2"></div>
 		<div class="col-md-8 text-center  contnt" id="tabs">
 			
 			<ul class="text-center" dir="rtl">
				<li><a href="#tabs-1">بحث عن مباني</a></li>
				<li><a href="#tabs-2"> اضافة مباني </a></li>

			</ul>
            <div  class="contnt" id="tabs-1">
            	<form action="serBuildings.php" method="post" id="search" >
	            	<input type="text" name="search" id="BuildingsSearch" pattern="^[a-zA-Z1-9].*"
 placeholder="ابحث عن نقض جزئي " class="form-control formstyle " required="" />
	            	<button type="submit" class="btn  btn-success">
			          <span class="glyphicon glyphicon-search" aria-hidden="true"></span> بحث  
			        </button>
		       </form>
		       	<div class="contnt" id="searchResult">
		       		</p></p>
		       		<?php buildings(); ?>
				</div> 				
            </div>
            <div class="contnt" id="tabs-2">
            	<form action="addBuildings.php" method="post" id="addagen" >
	            	<input type="text"  name="name" placeholder="اسم العميل" id="name" class="form-control formstyle " required="" />
	            	<button type="submit"  class="btn  btn-success">
			          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> اضافة  
			        </button>
		    </form>
		    <div class="contnt" id="addResult">
		    	</p></p>
		    	
		    </div>
            
            	
            </div>

 		</div>
 		<div class="col-md-2"></div>
 		
 	</div>
 	
 </div>


 <?php include("includes/footer.php")?>