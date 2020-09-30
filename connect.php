<?php
	

  
   $connbd = array( "Database"=>$db);
   $connbd2 = array( "Database"=>$db2);

   $connectshard = sqlsrv_connect( $host, $connbd);
   $connectacc = sqlsrv_connect( $host, $connbd2);
/*
   if( $conn ) {
     echo "Connection established.<br />";
   }else{
     echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
   }
   
 */
?>


