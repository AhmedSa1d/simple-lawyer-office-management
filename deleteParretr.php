<?php
include("includes/connection.php");
include("includes/functions.php");
$id=mysql_prep($_GET['id']);
if (intval($id)==0) {
	 redirect_to("parRetraction.php");

}


if(isset($_GET['id'])) {
	$query="DELETE FROM partial_retraction WHERE Client_id = '".$id."' LIMIT 1";
	$result = mysql_query($query, $connection);
	if (mysql_affected_rows()==1) {
		redirect_to("parRetraction.php");
	}else{
		echo "<p> فشل في حذف هذا العنصر </p>";
		echo "<p>".mysql_error()."</p>";
		echo "<a href=\"index.php\">"." العودة للصفحة الرئيسية"."</a>";

	}

}
mysql_close($connection);