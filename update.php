<?php
require('db_connect.inc.php');

if (isset($_POST["opt"])) {
	$val = $_POST["opt"];

    echo $val ; 
    $query = "SELECT `$val` FROM `poll`" ;
        
    if(@$query_run = mysql_query($query)){
            
        $current = mysql_result($query_run,0,`$val`);
        $inc = $current + 1;
        $query_update = "UPDATE `poll` SET `$val` = '$inc'";
            
            if(@$query_update_run = mysql_query($query_update)){
 
            echo "value updated";
        }

}
    
    
?>