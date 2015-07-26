<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Results</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <h1> Results</h1>
    <?php 
        require 'db_connect.inc.php';
        $place = array("agra","varanasi","lek","hampi","darjeeling","goa");
        $count = array();
        for($i=0;$i<6;$i++){
            $temp = $place[$i];
            $query_val = "SELECT $temp FROM poll";
            if($query_val_run = mysql_query($query_val)){
                $count[$i] = mysql_result($query_val_run,0,$place[$i]);
                echo $count[$i];
            }
        }
            
    ?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
</body>
</html>
