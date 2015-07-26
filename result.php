<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Results</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script scr="/Chart.js-master/Chart.js"></script>
</head>
<body>
        
    <h1> Results</h1>
    <canvas id="tourist" width="300" height="400"> Chart </canvas>

    
    <?php 
        require 'db_connect.inc.php';
        $place = array("agra","varanasi","lek","hampi","darjeeling","goa");
        $count = array();
        for($i=0;$i<6;$i++){
            $temp = $place[$i];
            $query_val = "SELECT $temp FROM poll";
            if($query_val_run = mysql_query($query_val)){
                $y = mysql_result($query_val_run,0,$place[$i]);
                array_push($count,$y);
            }
        }   
       // print_r($count);
    ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>
    <script type="text/javascript" >
                
        var context = document.getElementById('tourist').getContext('2d');
        
        var val = <?php echo json_encode($count) ?>;
            for( i=0;i<6;i++ )
                document.write(val[i]);
        var chart_data =    [
                                
                                {
                                    lable:'Agra',
                                    value:val[0],
                                    color:'#FF0000'
                                },
                                {
                                    lable:'Varanasi',
                                    value:val[1],
                                    color:'#003399'
                                },
                                {
                                    lable:'Ledak',
                                    value:val[2],
                                    color:'#006600'
                                },
                                {
                                    lable:'Hampi',
                                    value:val[3],
                                    color:'#996633'
                                },
                                {
                                    lable:'Darjeeling',
                                    value:val[4],
                                    color:'#FFCC00'
                                },
                                {
                                    lable:'Goa',
                                    value:val[5],
                                    color:'#660066'
                                }
        
                            ];
        
        var my_chart = new Chart(context).Pie(chart_data);
        document.write("heree");
    </script>

</body>
</html>
