 <?php  require_once("includes/functions.php")?>
 <?php include ("includes/connection.php"); ?>
 	<?php				   					
				        
        $search=  trim(mysql_prep($_POST['search']));
            
            
                function searchResult($search)
                {
                    global $connection;

                     $query="SELECT * FROM partial_retraction WHERE FullName LIKE '%$search%' ";
                  
                     $result=  mysql_query($query,$connection);
            
                     confirm_query($result);
                     if(isset($result)&&!empty($result)){
                        echo "<table text-align=\" center\" class=\"table tablehead table-striped table-bordered text-center table-hover\" dir=\"rtl\">";
                        echo "<tr class=\"text-center\">"."<th>"."م"."</th>"."<th>"."الترتيب"."</th>"."<th>"."الاسم"."</th>"."<th>"."حذف"."</th>"."<th>"."تعديل"."</th>"."</tr>";
                        $m=1; 
                       
                        while ($parretraction = mysql_fetch_array($result)) {
                            echo "<tr>";
                            echo "<td>".$m++."</td>";
                            echo "<td>".$parretraction['Client_id']."</td>";
                            echo "<td>".$parretraction['FullName']."</td>";
                            echo "<td>"."<a href=\"deleteParretr.php?id=". $parretraction['Client_id']."\" onclick=\"return confirm('are you sure ?');\">"."حـــــذف"."</a>"."</td>";
                            echo "<td class=\"update\">"."<a href=\"updateParretr.php?id=". $parretraction['Client_id']."\">"."تعديل"."</a>"."</td>";

                            echo "</tr>";

                           
                        }
                        echo "</table>";
                }
                else{
                    echo "<p>"."لايوجد نتيجة حاول مرة اخرى"."</p>".mysql_error();
                }
            }

                
 
                
 searchResult($search);                  
       
                
    
   


?>


