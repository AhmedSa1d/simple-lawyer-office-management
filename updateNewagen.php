 <?php include("includes/header.php") ?>
 <?php  include("includes/functions.php")?>
 <div class="container">
 	<div class="row text-center">
 		<div class="col-md-2"></div>
 		<div class="col-md-8 text-center  contnt" id="tabs">
 		<h1> تعديل توكيل جديد </h1>
 		<?php
                session_start();
        
 	   if (isset($_GET['id'])) {
 		   $_SESSION['id']=$_GET['id'];
 	    }

    ?>
 	<?php	
 			 if(isset($_POST['submit'])){//form submitted
        $errors =array();
			   
			   if(!isset($_POST['name']) || empty($_POST['name']))
				{
					$errors[]='اسم العميل';
				}
				if(!isset($_POST['number']) || empty($_POST['number']))
				{
					$errors[]='رقم التوكيل';
				}        
        $name=  trim(mysql_prep($_POST['name']));
        $number=  trim(mysql_prep($_POST['number']));
       
        if(empty($errors)){
            $query="UPDATE newagencies SET  FullName='".$name."', NewAgenciesNumber='".$number."' WHERE Agencies_Id='".$_SESSION['id']."'";
                  
            $result=  mysql_query($query,$connection);
            
            confirm_query($result);
            
            if($result){
                $message="تم تعديل التوكيل"; 
                
            }
            else{
                $message="لم يتم تعديل التوكيل";
                $message="<br/>".mysql_error();
            }
        }
        elseif (count($errors)==1) {
            $message="هناك حقل فارغ هو  ";
        }
        else{
            $message="هناك حقلين فارغين هما";
        }
        
                
    }
   


?>
 
<?php
       newagenciesById($_SESSION['id']);
 
  ?>
<?php if (!empty($message)) {
            echo "<p class=\"message\">" . $message . "</p>";
        } ?>
        <?php if (!empty($errors)) {
        	            echo "<p class=\"message\">" .implode(" و ", $errors). "</p>";


        } ?>
 			<form action="updateNewagen.php" method="post" id="update" >
	            	<input type="text"  name="name" placeholder="اسم العميل" class="form-control formstyle " required="" />
	            	<input type="number"  name="number" placeholder="رقم التوكيل" class="form-control formstyle " required="" />
	            	<button type="submit" name="submit" class="btn  btn-success">
			          <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> تعديل  
			        </button>
		    </form>
            <div id="addResult">
                </p></p>
                
            </div>
		    

	
            

 		</div>
 		<div class="col-md-2"></div>
 		
 	</div>
 	
 </div>


 <?php include("includes/footer.php")?>