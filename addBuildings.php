 <?php include ("includes/connection.php"); ?>
 <?php  require_once("includes/functions.php")?>
 	<?php	
        $errors =array();
			   
			   if(!isset($_POST['name']) || empty($_POST['name']))
				{
					$errors[]='اسم العميل';
				}
				       
       // $name=  trim(mysql_prep($_POST['name']));
        //$number=  trim(mysql_prep($_POST['number']));
        if(strpos($_SERVER['HTTP_USER_AGENT'],'Mediapartners-Google') !== false) {
            exit();
        }
       
        if(empty($errors)){
            global $connection;
            $query2="ALTER TABLE buliding DROP Client_id";
            $query3="ALTER TABLE buliding ADD Client_id int not null auto_increment primary key first";
            $result2=  mysql_query($query2,$connection);
            $result3=  mysql_query($query3,$connection);
            $query="INSERT  INTO buliding(FullName) VALUES('".$_POST['name']."') ";
                  
            $result=  mysql_query($query,$connection);
            
            confirm_query($result);
            
            if($result=== true){
                echo "<div class=\"alert alert-success\" role=\"alert\">".
                        "<p>"."تم اضافة عميل بأسم ".$_POST['name']
                        ."<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">"
                        ."<span aria-hidden=\"true\">"."X"."</span>"
                        ."</button>"."</p>"
                       ."</div>";  
                       //redirect_to("newAgencies.php");             
            }
            else{
                echo "لم يتم اضافى العميل";
                echo "<br/>".mysql_error();
            }
        }
        
                
    
   

mysql_close($connection);
?>
<?php 
function errors(){ 
  if (!empty($errors)) {
         echo "<p class=\"message\">" .implode(" و ", $errors). "</p>";

        } 
}
?>

