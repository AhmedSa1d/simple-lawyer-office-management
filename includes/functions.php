<?php
ob_start();
include("includes/connection.php");
function mysql_prep($value){
        $magic_quotes_active= get_magic_quotes_gpc();
        $new_enough_php = function_exists("mysql_real_escape_string");
        //i.e php >= v4.3.0
        if($new_enough_php){
                //php v4.3.0 or higher undo any magic quote effects 
                //so mysql_real_escape_string can do the work
                if($magic_quotes_active){
                        $value = stripslashes($value);
                }
                $value = mysql_real_escape_string($value);
        }

        else {
                //before php V4.3.0
                //if magic quotes aren't already on add slashes manually
                if(!$magic_quotes_active){$value = addcslashes($value);}
                //if magic quotes are active, then the then the slashes already exist
        }
        return $value;
        }
        function check_required_fields($required_array) {
    $field_errors = array();
    foreach($required_array as $fieldname) {
        if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]) && $_POST[$fieldname] != 0)) { 
            $field_errors[] = $fieldname; 
        }
    }
    return $field_errors;
}
function confirm_query($result_set)
	{
		if (!$result_set) {
				die("Database query failed: " . mysql_error());
			}
	}
		
        function redirect_to($location=NULL)
	{
		if($location !=NULL){
			header("Location: {$location}",true,  301);
			exit;
		}
	}
        
            function get_all_old_agencies()
            {
                    global $connection;
                    $query = "SELECT * 
                    FROM oldagencies
                    ORDER BY  Agencies_Id ASC ";

                    $oldagencies_set= mysql_query($query, $connection);
                    confirm_query($oldagencies_set);
                    return $oldagencies_set;
       
            }
           function get_old_agen_byID($id)
            {
                global $connection;
                    $query = "SELECT * 
                    FROM oldagencies
                    WHERE  Agencies_Id='".$id."'  ";

                    $oldagencies_set= mysql_query($query, $connection);
                    confirm_query($oldagencies_set);
                    return $oldagencies_set;

            }
            function oldagenciesById($id)
            {
                echo "<table text-align=\" center\" class=\"table tablehead table-striped table-bordered text-center table-hover\" dir=\"rtl\">";
                echo "<tr class=\"text-center\">"."<th>"."م"."</th>"."<th>"."الترتيب"."</th>"."<th>"."الاسم"."</th>"."<th>"."رقم التوكيل"."</th>"."</tr>";
                $oldagencies_set= get_old_agen_byID($id);  
                $m=1; 
               
                while ($oldagencies = mysql_fetch_array($oldagencies_set)) {
                    echo "<tr>";
                    echo "<td>".$m++."</td>";
                    echo "<td>".$oldagencies['Agencies_Id']."</td>";
                    echo "<td>".$oldagencies['FullName']."</td>";
                    echo "<td>".$oldagencies['OldAgenciesNumber']."</td>";
                    echo "</tr>";

                   
                }
                echo "</table>";
            }

            function oldagencies()
            {
                echo "<table text-align=\" center\" class=\"table tablehead table-striped table-bordered text-center table-hover\" dir=\"rtl\">";
                echo "<tr class=\"text-center\">"."<th>"."م"."</th>"."<th>"."الترتيب"."</th>"."<th>"."الاسم"."</th>"."<th>"."رقم التوكيل"."</th>"."<th>"."حذف"."</th>"."<th>"."تعديل"."</th>"."</tr>";
                $oldagencies_set= get_all_old_agencies();   
                $m=1; 
               
                while ($oldagencies = mysql_fetch_array($oldagencies_set)) {
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

            function oldagenciesArray()
            {
                $oldagencies_set= get_all_old_agencies();   
                $oldagenarray=array();
                $i=0;
               
                while ($oldagencies = mysql_fetch_array($oldagencies_set)) {
                    
                    $oldagenarray[$i]=$oldagencies['FullName'];

                    $i++;
                   
                }
                return $oldagenarray;
            }



    $oldagenarray=oldagenciesArray();
?>
<script type="text/javascript">var OldAgenArray =<?php echo json_encode($oldagenarray); ?>;</script>                    
                                <!-- here is the end of the Old Agencies Functions -->
                                <!-- here is the end of the Old Agencies Functions --> 
                                <!-- here is the end of the Old Agencies Functions --> 
                                <!-- here is the end of the Old Agencies Functions --> 
                                <!-- here is the end of the Old Agencies Functions --> 
<?php 
ob_start();
  function get_all_new_agencies()
            {
                    global $connection;
                    $query = "SELECT * 
                    FROM newagencies
                    ORDER BY  Agencies_Id ASC ";

                    $newagencies_set= mysql_query($query, $connection);
                    confirm_query($newagencies_set);
                    return $newagencies_set;
       
            }
           function get_new_agen_byID($id)
            {
                global $connection;
                    $query = "SELECT * 
                    FROM newagencies
                    WHERE  Agencies_Id='".$id."'  ";

                    $newagencies_set= mysql_query($query, $connection);
                    confirm_query($newagencies_set);
                    return $newagencies_set;

            }
            function newagenciesById($id)
            {
                echo "<table text-align=\" center\" class=\"table tablehead table-striped table-bordered text-center table-hover\" dir=\"rtl\">";
                echo "<tr class=\"text-center\">"."<th>"."م"."</th>"."<th>"."الترتيب"."</th>"."<th>"."الاسم"."</th>"."<th>"."رقم التوكيل"."</th>"."</tr>";
                $newagencies_set= get_new_agen_byID($id);  
                $m=1; 
               
                while ($newagencies = mysql_fetch_array($newagencies_set)) {
                    echo "<tr>";
                    echo "<td>".$m++."</td>";
                    echo "<td>".$newagencies['Agencies_Id']."</td>";
                    echo "<td>".$newagencies['FullName']."</td>";
                    echo "<td>".$newagencies['NewAgenciesNumber']."</td>";
                    echo "</tr>";

                   
                }
                echo "</table>";
            }

            function newagencies()
            {
                echo "<table text-align=\" center\" class=\"table tablehead table-striped table-bordered text-center table-hover\" dir=\"rtl\">";
                echo "<tr class=\"text-center\">"."<th>"."م"."</th>"."<th>"."الترتيب"."</th>"."<th>"."الاسم"."</th>"."<th>"."رقم التوكيل"."</th>"."<th>"."حذف"."</th>"."<th>"."تعديل"."</th>"."</tr>";
                $newagencies_set= get_all_new_agencies();   
                $m=1; 
               
                while ($newagencies = mysql_fetch_array($newagencies_set)) {
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

            function newagenciesArray()
            {
                $newagencies_set= get_all_new_agencies();   
                $newagenarray=array();
                $i=0;
               
                while ($newagencies = mysql_fetch_array($newagencies_set)) {
                    
                    $newagenarray[$i]=$newagencies['FullName'];

                    $i++;
                   
                }
                return $newagenarray;
            }



    $newagenarray=newagenciesArray();
?>
<script type="text/javascript">var NewAgenArray =<?php echo json_encode($newagenarray);?>;</script>
                                <!-- here is the end of the New Agencies Functions -->
                                <!-- here is the end of the New Agencies Functions -->
                                <!-- here is the end of the New Agencies Functions -->
                                <!-- here is the end of the New Agencies Functions -->
                                <!-- here is the end of the New Agencies Functions -->
                                <!-- here is the end of the New Agencies Functions -->
<?php 
ob_start();
  function get_all_com_retraction()
            {
                    global $connection;
                    $query = "SELECT * 
                    FROM criminal_retraction
                    ORDER BY  Client_id ASC ";

                    $comretraction_set= mysql_query($query, $connection);
                    confirm_query($comretraction_set);
                    return $comretraction_set;
       
            }
           function get_com_retr_byID($id)
            {
                global $connection;
                    $query = "SELECT * 
                    FROM criminal_retraction
                    WHERE  Client_id='".$id."'  ";

                    $comretraction_set= mysql_query($query, $connection);
                    confirm_query($comretraction_set);
                    return $comretraction_set;

            }
            function comretractionById($id)
            {
                echo "<table text-align=\" center\" class=\"table tablehead table-striped table-bordered text-center table-hover\" dir=\"rtl\">";
                echo "<tr class=\"text-center\">"."<th>"."م"."</th>"."<th>"."الترتيب"."</th>"."<th>"."الاسم"."</th>"."</th>"."</tr>";
                $comretraction_set= get_com_retr_byID($id);  
                $m=1; 
               
                while ($comretraction = mysql_fetch_array($comretraction_set)) {
                    echo "<tr>";
                    echo "<td>".$m++."</td>";
                    echo "<td>".$comretraction['Client_id']."</td>";
                    echo "<td>".$comretraction['FullName']."</td>";
                    echo "</tr>";

                   
                }
                echo "</table>";
            }

            function comretraction()
            {
                echo "<table text-align=\" center\" class=\"table tablehead table-striped table-bordered text-center table-hover\" dir=\"rtl\">";
                echo "<tr class=\"text-center\">"."<th>"."م"."</th>"."<th>"."الترتيب"."</th>"."<th>"."الاسم"."</th>"."</th>"."<th>"."حذف"."</th>"."<th>"."تعديل"."</th>"."</tr>";
                $comretraction_set= get_all_com_retraction();   
                $m=1; 
               
                while ($comretraction = mysql_fetch_array($comretraction_set)) {
                    echo "<tr>";
                    echo "<td>".$m++."</td>";
                    echo "<td>".$comretraction['Client_id']."</td>";
                    echo "<td>".$comretraction['FullName']."</td>";
                    echo "<td>"."<a href=\"deleteComretr.php?id=". $comretraction['Client_id']."\" onclick=\"return confirm('are you sure ?');\">"."حـــــذف"."</a>"."</td>";
                    echo "<td class=\"update\">"."<a href=\"updateComretr.php?id=". $comretraction['Client_id']."\">"."تعديل"."</a>"."</td>";

                    echo "</tr>";

                   
                }
                echo "</table>";
            }

            function comretractionArray()
            {
                $comretraction_set= get_all_com_retraction();   
                $comretrarray=array();
                $i=0;
               
                while ($comretraction = mysql_fetch_array($comretraction_set)) {
                    
                    $comretrarray[$i]=$comretraction['FullName'];

                    $i++;
                   
                }
                return $comretrarray;
            }


    $comretrarray=comretractionArray();
?>
<script type="text/javascript">var ComRetrArray =<?php echo json_encode($comretrarray);?>;</script>           
                                <!-- here is the end of the Complete Retraction Functions -->
                                <!-- here is the end of the Complete Retraction Functions -->
                                <!-- here is the end of the Complete Retraction Functions -->
                                <!-- here is the end of the Complete Retraction Functions -->
                                <!-- here is the end of the Complete Retraction Functions -->
                                <!-- here is the end of the Complete Retraction Functions -->
                                <!-- here is the end of the Complete Retraction Functions -->
<?php 
ob_start();
  function get_all_par_retraction()
            {
                    global $connection;
                    $query = "SELECT * 
                    FROM partial_retraction
                    ORDER BY  Client_id ASC ";

                    $parretraction_set= mysql_query($query, $connection);
                    confirm_query($parretraction_set);
                    return $parretraction_set;
       
            }
           function get_par_retr_byID($id)
            {
                global $connection;
                    $query = "SELECT * 
                    FROM partial_retraction
                    WHERE  Client_id='".$id."'  ";

                    $parretraction_set= mysql_query($query, $connection);
                    confirm_query($parretraction_set);
                    return $parretraction_set;

            }
            function parretractionById($id)
            {
                echo "<table text-align=\" center\" class=\"table tablehead table-striped table-bordered text-center table-hover\" dir=\"rtl\">";
                echo "<tr class=\"text-center\">"."<th>"."م"."</th>"."<th>"."الترتيب"."</th>"."<th>"."الاسم"."</th>"."</th>"."</tr>";
                $parretraction_set= get_par_retr_byID($id);  
                $m=1; 
               
                while ($parretraction = mysql_fetch_array($parretraction_set)) {
                    echo "<tr>";
                    echo "<td>".$m++."</td>";
                    echo "<td>".$parretraction['Client_id']."</td>";
                    echo "<td>".$parretraction['FullName']."</td>";
                    echo "</tr>";

                   
                }
                echo "</table>";
            }

            function parretraction()
            {
                echo "<table text-align=\" center\" class=\"table tablehead table-striped table-bordered text-center table-hover\" dir=\"rtl\">";
                echo "<tr class=\"text-center\">"."<th>"."م"."</th>"."<th>"."الترتيب"."</th>"."<th>"."الاسم"."</th>"."</th>"."<th>"."حذف"."</th>"."<th>"."تعديل"."</th>"."</tr>";
                $parretraction_set= get_all_par_retraction();   
                $m=1; 
               
                while ($parretraction = mysql_fetch_array($parretraction_set)) {
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

            function parretractionArray()
            {
                $parretraction_set= get_all_par_retraction();   
                $parretrarray=array();
                $i=0;
               
                while ($parretraction = mysql_fetch_array($parretraction_set)) {
                    
                    $parretrarray[$i]=$parretraction['FullName'];

                    $i++;
                   
                }
                return $parretrarray;
            }


    $parretrarray=parretractionArray();
?>
<script type="text/javascript">var ParRetrArray =<?php echo json_encode($parretrarray);?>;</script>           
                                <!-- here is the end of the Partial Retraction Functions -->
                                <!-- here is the end of the Partial Retraction Functions -->
                                <!-- here is the end of the Partial Retraction Functions -->
                                <!-- here is the end of the Partial Retraction Functions -->
                                <!-- here is the end of the Partial Retraction Functions -->
                                <!-- here is the end of the Partial Retraction Functions -->
                                <!-- here is the end of the Partial Retraction Functions -->
<?php 
ob_start();
  function get_all_buildings()
            {
                    global $connection;
                    $query = "SELECT * 
                    FROM buliding
                    ORDER BY  Client_id ASC ";

                    $buildings_set= mysql_query($query, $connection);
                    confirm_query($buildings_set);
                    return $buildings_set;
       
            }
           function get_buildings_byID($id)
            {
                global $connection;
                    $query = "SELECT * 
                    FROM buliding
                    WHERE  Client_id='".$id."'  ";

                    $buildings_set= mysql_query($query, $connection);
                    confirm_query($buildings_set);
                    return $buildings_set;

            }
            function buildingsById($id)
            {
                echo "<table text-align=\" center\" class=\"table tablehead table-striped table-bordered text-center table-hover\" dir=\"rtl\">";
                echo "<tr class=\"text-center\">"."<th>"."م"."</th>"."<th>"."الترتيب"."</th>"."<th>"."الاسم"."</th>"."</th>"."</tr>";
                $buildings_set= get_buildings_byID($id);  
                $m=1; 
               
                while ($buildings = mysql_fetch_array($buildings_set)) {
                    echo "<tr>";
                    echo "<td>".$m++."</td>";
                    echo "<td>".$buildings['Client_id']."</td>";
                    echo "<td>".$buildings['FullName']."</td>";
                    echo "</tr>";

                   
                }
                echo "</table>";
            }

            function buildings()
            {
                echo "<table text-align=\" center\" class=\"table tablehead table-striped table-bordered text-center table-hover\" dir=\"rtl\">";
                echo "<tr class=\"text-center\">"."<th>"."م"."</th>"."<th>"."الترتيب"."</th>"."<th>"."الاسم"."</th>"."</th>"."<th>"."حذف"."</th>"."<th>"."تعديل"."</th>"."</tr>";
                $buildings_set= get_all_buildings();   
                $m=1; 
               
                while ($buildings = mysql_fetch_array($buildings_set)) {
                    echo "<tr>";
                    echo "<td>".$m++."</td>";
                    echo "<td>".$buildings['Client_id']."</td>";
                    echo "<td>".$buildings['FullName']."</td>";
                    echo "<td>"."<a href=\"deleteBuildings.php?id=". $buildings['Client_id']."\" onclick=\"return confirm('are you sure ?');\">"."حـــــذف"."</a>"."</td>";
                    echo "<td class=\"update\">"."<a href=\"updateBuildings.php?id=". $buildings['Client_id']."\">"."تعديل"."</a>"."</td>";

                    echo "</tr>";

                   
                }
                echo "</table>";
            }

            function buildingsArray()
            {
                $buildings_set= get_all_buildings();   
                $buildingsarray=array();
                $i=0;
               
                while ($buildings = mysql_fetch_array($buildings_set)) {
                    
                    $buildingsarray[$i]=$buildings['FullName'];

                    $i++;
                   
                }
                return $buildingsarray;
            }


    $buildingsarray=buildingsArray();
?>
<script type="text/javascript">var BuildingsArray =<?php echo json_encode($buildingsarray);?>;</script>     
                                <!-- here is the end of the Buildings Functions -->
                                <!-- here is the end of the Buildings Functions -->
                                <!-- here is the end of the Buildings Functions -->
                                <!-- here is the end of the Buildings Functions -->
                                <!-- here is the end of the Buildings Functions -->
                                <!-- here is the end of the Buildings Functions -->
                                <!-- here is the end of the Buildings Functions -->
<?php 
ob_start();
  function get_all_cases()
            {
                    global $connection;
                    $query = "SELECT * 
                    FROM finished_cases
                    ORDER BY  Client_id ASC ";

                    $cases_set= mysql_query($query, $connection);
                    confirm_query($cases_set);
                    return $cases_set;
       
            }
           function get_cases_byID($id)
            {
                global $connection;
                    $query = "SELECT * 
                    FROM finished_cases
                    WHERE  Client_id='".$id."'  ";

                    $cases_set= mysql_query($query, $connection);
                    confirm_query($cases_set);
                    return $cases_set;

            }
            function casesById($id)
            {
                echo "<table text-align=\" center\" class=\"table tablehead table-striped table-bordered text-center table-hover\" dir=\"rtl\">";
                echo "<tr class=\"text-center\">"."<th>"."م"."</th>"."<th>"."الترتيب"."</th>"."<th>"."الاسم"."</th>"."</th>"."</tr>";
                $cases_set= get_cases_byID($id);  
                $m=1; 
               
                while ($cases = mysql_fetch_array($cases_set)) {
                    echo "<tr>";
                    echo "<td>".$m++."</td>";
                    echo "<td>".$cases['Client_id']."</td>";
                    echo "<td>".$cases['FullName']."</td>";
                    echo "</tr>";

                   
                }
                echo "</table>";
            }

            function cases()
            {
                echo "<table text-align=\" center\" class=\"table tablehead table-striped table-bordered text-center table-hover\" dir=\"rtl\">";
                echo "<tr class=\"text-center\">"."<th>"."م"."</th>"."<th>"."الترتيب"."</th>"."<th>"."الاسم"."</th>"."</th>"."<th>"."حذف"."</th>"."<th>"."تعديل"."</th>"."</tr>";
                $cases_set= get_all_cases();   
                $m=1; 
               
                while ($cases = mysql_fetch_array($cases_set)) {
                    echo "<tr>";
                    echo "<td>".$m++."</td>";
                    echo "<td>".$cases['Client_id']."</td>";
                    echo "<td>".$cases['FullName']."</td>";
                    echo "<td>"."<a href=\"deleteCases.php?id=". $cases['Client_id']."\" onclick=\"return confirm('are you sure ?');\">"."حـــــذف"."</a>"."</td>";
                    echo "<td class=\"update\">"."<a href=\"updateCases.php?id=". $cases['Client_id']."\">"."تعديل"."</a>"."</td>";

                    echo "</tr>";

                   
                }
                echo "</table>";
            }

            function casesArray()
            {
                $cases_set= get_all_cases();   
                $casesarray=array();
                $i=0;
               
                while ($cases = mysql_fetch_array($cases_set)) {
                    
                    $casesarray[$i]=$cases['FullName'];

                    $i++;
                   
                }
                return $casesarray;
            }


    $casesarray=casesArray();
?>
<script type="text/javascript">var CasesArray =<?php echo json_encode($casesarray);?>;</script>           