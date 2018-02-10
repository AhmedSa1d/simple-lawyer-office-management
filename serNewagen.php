 <?php  require_once("includes/functions.php")?>
 <?php include ("includes/connection.php"); ?>
 	<?php				   					
				        
        $search=  trim(mysql_prep($_POST['search']));
            
            
                function searchResult($search)
                {
                    global $connection;

                     $query="SELECT * FROM newAgencies WHERE FullName LIKE '%$search%' OR NewAgenciesNumber LIKE '%$search%' ";
                  
                     $result=  mysql_query($query,$connection);
            
                     confirm_query($result);
                     if(isset($result)&&!empty($result)){
                        echo "<table text-align=\" center\" class=\"table tablehead table-striped table-bordered text-center table-hover\" dir=\"rtl\">";
                        echo "<tr class=\"text-center\">"."<th>"."م"."</th>"."<th>"."الترتيب"."</th>"."<th>"."الاسم"."</th>"."<th>"."رقم التوكيل"."</th>"."<th>"."حذف"."</th>"."<th>"."تعديل"."</th>"."</tr>";
                        $m=1; 
                       
                        while ($newagencies = mysql_fetch_array($result)) {
                            echo "<tr>";
                            echo "<td>".$m++."</td>";
                            echo "<td>".$newagencies['Agencies_Id']."</td>";
                            echo "<td>".$newagencies['FullName']."</td>";
                            echo "<td>".$newagencies['NewAgenciesNumber']."</td>";
                            echo "<td>"."<a href=\"deleteNewagen.php?id=". $newagencies['Agencies_Id']."\" onclick=\"return confirm('are you sure ?');\">"."حـــــذف"."</a>"."</td>";
                            echo "<td class=\"update\">"."<a href=\"updateNewagen.php?id=". $newagencies['Agencies_Id']."\">"."تعديل"."</a>"."</td>";

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


