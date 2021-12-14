<?php

	include("connect.php"); 	
	
	$link=Connection();

	$result=mysql_query("SELECT * FROM `id_Log` ORDER BY `timeStamp` DESC",$link);
?>

<html>
   <head>
      <title>Data</title>
   </head>
<body>
   <h1>User IDs and Passwords</h1>

   <table border="1" cellspacing="1" cellpadding="1">
		<tr>
			
			<td>&nbsp&nbsp;LoginID&nbsp;</td>
			<td>&nbsp;Password&nbsp;</td>
		</tr>

      <?php 
		  if($result!==FALSE){
		     while($row = mysql_fetch_array($result)) {
		        printf("<tr><td> &nbsp;%s </td><td> &nbsp;%s&nbsp; </td><td> &nbsp;%s&nbsp; </td></tr>", 
		           $row["LoginID"], $row["Password"]);
		     }
		     mysql_free_result($result);
		     mysql_close();
		  }
      ?>

   </table>
</body>
</html>
