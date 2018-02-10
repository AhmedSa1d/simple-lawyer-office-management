 <?php include("includes/header.php") ;
     require_once("includes/functions.php");
  ?>
 <div class="container">
 	<div class="row text-center">
 		<div class="col-md-2"></div>
 		<div class="col-md-8 headCon">
           <a href="comRetraction.php"><p> النقض الكلي </p> </a>
 		</div>
 		<div class="col-md-2"></div>
 	</div>
 	<div class="row text-center">
 		<div class="col-md-2"></div>
 		<div class="col-md-8 text-center  contnt" id="tabs">
 			
 			<ul class="text-center" dir="rtl">
				<li><a href="#tabs-1">بحث عن نقض كلي</a></li>
				<li><a href="#tabs-2"> اضافة نقض كلي </a></li>

				

			</ul>
            <div  class="contnt" id="tabs-1">
            	<form action="serComretr.php" method="post" id="search" >
	            	<input type="text" name="search" id="ComRetrSearch" placeholder="ابحث عن نقض كلي " class="form-control formstyle " required="" />
	            	<button type="submit" class="btn  btn-success">
			          <span class="glyphicon glyphicon-search" aria-hidden="true"></span> بحث  
			        </button>
		       </form>
		       	<div class="contnt" id="searchResult">
		       		</p></p>
		       		<?php comretraction(); ?>
				</div> 				
            </div>
            <div class="contnt" id="tabs-2">
            	<form action="addComretr.php" method="post" id="addagen" >
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