<!DOCTYPE HTML>
<HTML>
<HEAD>
	<title>Result Page</title>
	<link rel="stylesheet" href="miniProject.css">
    
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- documentation at http://getbootstrap.com/docs/4.1/, alternative themes at https://bootswatch.com/ -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</HEAD>
<BODY>
	<nav class="navbar navbar-expand-md navbar-light bg-light border">
		<a class="navbar-brand" href="/MiniProject/"><span class="red">Applied Data-Base Practicum</span></a>
    </nav>
    <div id="NewData">
    <div class="container m-5">
        <div class="row">
            <div class="col-sm-4" style="margin-top: auto; margin-bottom: auto;">
            <blockquote class="blockquote text-center">
                <p>
                    <?php

                        $datefrom = $_GET["datefrom"];
                        $dateto = $_GET["dateto"];
                        $attribute = $_GET["attribute"];

                        // Print Error IF Dateto < DateFrom
                        if ($datefrom > $dateto) {
                            die ("Please Enter Valid Dates");
                        }

                        // Specifying Mysql Connection Variables
                        $dbhost = 'localhost';
                        $dbuser = 'ashwin';
                        $dbpass = '1999';
                        $dbname = 'miniProject';
                        $tablename = 'Pollution';

                        // Establishing Connection to Mysql server
                        $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

                        // Error Check
                        if (!$conn) {
                            die("Could not connect: ". mysqli_connect_error($conn));
                        }
                        
                        // Getting Data from Table
                        $query = "SELECT time,{$attribute} FROM {$tablename} ORDER BY time";
                        $retval = mysqli_query($conn, $query);
                        
                        // Adding datapoints to array
                        $dataPoints = array();
                        $i = 0;
                        while ($row = mysqli_fetch_row($retval)) {
                            $i++;
                            $new_date = strtotime(date($row[0]));
                            array_push($dataPoints, array("x" => $new_date*1000, "y" => (float)$row[1]));
                        }

                        $new_arr = array();

                        // If Min Checked
                        if (!$_GET["minimum"]) {
                            echo "Min is Not Checked <br>";
                        }
                        else {
                            // Defining SQL Query
                            $query = "SELECT time, {$attribute} FROM {$tablename}
                                        WHERE time BETWEEN '{$datefrom}' AND '{$dateto}'
                                        AND {$attribute} = (SELECT MIN($attribute) FROM {$tablename}
                                        WHERE time BETWEEN '{$datefrom}' AND '{$dateto}') LIMIT 1" ;
                            
                            // Getting Query Output
                            $retval = mysqli_query($conn, $query);
                            
                            // Error Check
                            if (!$retval) {
                                echo 'Could not get Min data: ' . mysqli_error($conn) . "<br>";
                            }
                            
                            // Printing Minimum Value obtained
                            else {
                                $row = mysqli_fetch_row($retval);
                                echo "Min {$attribute} : " . $row[1] . "<br>";
                                array_push($new_arr, array("x" => strtotime(date($row[0]))*1000, "y" => (float)$row[1]));
                            }
                        }

                        // If Max Checked
                        if (!$_GET["maximum"]) {
                            echo "Max is Not Checked <br>";
                        }
                        else {
                            // Defining SQL Query
                            $query = "SELECT time, {$attribute} FROM {$tablename}
                                        WHERE time BETWEEN '{$datefrom}' AND '{$dateto}'
                                        AND {$attribute} = (SELECT MAX($attribute) FROM {$tablename}
                                        WHERE time BETWEEN '{$datefrom}' AND '{$dateto}') LIMIT 1" ;
                            
                            // Getting Query Output
                            $retval = mysqli_query($conn, $query);
                            
                            // Error Check
                            if (!$retval) {
                                echo 'Could not get Max data: ' . mysqli_error($conn) . "<br>";
                            }
                            
                            // Printing Maximum Value obtained
                            else {
                                $row = mysqli_fetch_row($retval);
                                echo "Max {$attribute} : " . $row[1] . "<br>";
                                array_push($new_arr, array("x" => strtotime(date($row[0]))*1000, "y" => (float)$row[1]));
                            }
                        }

                        // If AVG Checked
                        if (!$_GET["average"]) {
                            echo "Avg is Not Checked <br>";
                        }
                        else {
                            // Defining SQL Query
                            $query = "SELECT AVG({$attribute}) FROM {$tablename}
                                        WHERE time BETWEEN '{$datefrom}' AND '{$dateto}'" ;
                            
                            // Getting Query Output
                            $retval = mysqli_query($conn, $query);
                            
                            // Error Check
                            if (!$retval) {
                                echo 'Could not get Avg data: ' . mysqli_error($conn) . "<br>";
                            }
                            
                            // Printing Average Value obtained
                            else {
                                $row = mysqli_fetch_row($retval);
                                $selectedavg = (float)$row[0];
                                echo "Avg {$attribute} : " . $selectedavg . "<br>";
                            }
                        }

                        // Calculating Net data Average
                        
                        // Closing Mysql
                        mysqli_close($conn);
                    ?>
                </p>
            </blockquote>
            </div>
            <div class="col">
                <div id="chartContainer" style="height: 400px;">
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script id="myscript">
        function loadChart() {
        
        var chart = new CanvasJS.Chart("chartContainer", {
            theme: "light2", // "light1", "light2", "dark1", "dark2"
            animationEnabled: true,
            zoomEnabled: true,
            title: {
                text: "Select to zoom"
            },
            axisX: {
                title: "Date Time",
                valueFormatString: "YY-MM-DD",
                stripLines:[{
                    startValue:<?php echo strtotime(date($datefrom))*1000; ?>,
                    endValue:<?php echo strtotime(date($dateto))*1000; ?>,
                    color:"#d8d8d8",
                    label : "Selected Time Range",
                    labelFontColor: "#a8a8a8"
                }]
            },
            axisY: {
                title: <?php echo "\"$attribute\""; ?>
            },
            data: [{
                type: "line",
                xValueType: "dateTime",
                dataPoints: <?php echo json_encode($dataPoints); ?>
            },
            {
                type: "scatter",
                markerColor: "red",
                xValueType: "dateTime",
                dataPoints: <?php echo json_encode($new_arr); ?>
            }]
        });
        chart.render();
    };
    loadChart();
    window.onload = loadChart();
    </script>
</BODY>
</HTML>