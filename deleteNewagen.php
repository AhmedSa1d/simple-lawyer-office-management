
<?php
include("includes/connection.php");
include("includes/functions.php");
$id=mysql_prep($_GET['id']);
if (intval($id)==0) {
	 redirect_to("newAgencies.php");


}


if(isset($_GET['id'])) {
	$query="DELETE FROM newagencies WHERE Agencies_Id = '".$id."' LIMIT 1";
	$result = mysql_query($query, $connection);
	if (mysql_affected_rows()==1) {
		redirect_to("newAgencies.php");
		
	}else{
		echo "<p> فشل في حذف هذا العنصر </p>";
		echo "<p>".mysql_error()."</p>";
		echo "<a href=\"index.php\">"." العودة للصفحة الرئيسية"."</a>";

	}
  // @mysql_query("DELETE FROM oldagencies WHERE Agencies_Id = '".$id."'");
	// redirect_to("newAgencies.php");
   //exit();
}
mysql_close($connection);
?>