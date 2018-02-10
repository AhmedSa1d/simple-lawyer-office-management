 <?php  require_once("includes/functions.php")?>
 <?php include ("includes/connection.php"); ?>
 	<?php				   					
				        
        $search=  trim(mysql_prep($_POST['search']));
            
            
                function searchResult($search)
                {
                    global $connection;

                     $query="SELECT * FROM oldAgencies WHERE FullName LIKE '%$search%' OR OldAgenciesNumber LIKE '%$search%' ";
                  
                     $result=  mysql_query($query,$connection);
            
                     confirm_query($result);
                     if(isset($result)&&!empty($result)&&!$result==0){
                        echo "<table text-align=\" center\" class=\"table tablehead table-striped table-bordered text-center table-hover\" dir=\"rtl\">";
                        echo "<tr class=\"text-center\">"."<th>"."م"."</th>"."<th>"."الترتيب"."</th>"."<th>"."الاسم"."</th>"."<th>"."رقم التوكيل"."</th>"."<th>"."حذف"."</th>"."<th>"."تعديل"."</th>"."</tr>";
                        $m=1; 
                       
                        while ($oldagencies = mysql_fetch_array($result)) {
                            echo "<tr>";
                            echo "<td>".$m++."</td>";
                            echo "<td>".$oldagencies['Agencies_Id']."</td>";
                            echo "<td>".$oldagencies['FullName']."</td>";
                            echo "<td>".$oldagencies['OldAgenciesNumber']."</td>";
                            echo "<td>"."<a href=\"deleteOldagen.php?id=". $oldagencies['Agencies_Id']."\" onclick=\"return confirm('are you sure ?');\">"."حـــــذف"."</a>"."</td>";
                            echo "<td class=\"update\">"."<a href=\"updateOldagen.php?id=". $oldagencies['Agencies_Id']."\">"."تعديل"."</a>"."</td>";

                            echo "</tr>";

                           
                        }
                        echo "</table>";
                }
                else{
                    echo "<p>"."لايوجد نتيجة حاول مرة اخرى"."</p>";
                }
            }

                
 
                
 searchResult($search);                  
       
                
    
   


?>


