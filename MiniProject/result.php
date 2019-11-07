<HTML>
    <BODY>
    <?php

        $datefrom = $_POST["datefrom"];
        $dateto = $_POST["dateto"];
        $attribute = $_POST["attribute"];

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

        // If Min Checked
        if (!$_POST["minimum"]) {
            echo "Min is Not Checked <br>";
        }
        else {
            // Defining SQL Query
            $query = "SELECT MIN({$attribute}) FROM {$tablename}
                        WHERE time BETWEEN '{$datefrom}' AND '{$dateto}'" ;
            
            // Getting Query Output
            $retval = mysqli_query($conn, $query);
            
            // Error Check
            if (!$retval) {
                echo 'Could not get Min data: ' . mysqli_error($conn) . "<br>";
            }
            
            // Printing Minimum Value obtained
            else {
                $row = mysqli_fetch_row($retval);
                echo "Min {$attribute} : " . $row[0] . "<br>";
            }
        }

        // If Max Checked
        if (!$_POST["maximum"]) {
            echo "Max is Not Checked <br>";
        }
        else {
            // Defining SQL Query
            $query = "SELECT MAX({$attribute}) FROM {$tablename}
                        WHERE time BETWEEN '{$datefrom}' AND '{$dateto}'" ;
            
            // Getting Query Output
            $retval = mysqli_query($conn, $query);
            
            // Error Check
            if (!$retval) {
                echo 'Could not get Max data: ' . mysqli_error($conn) . "<br>";
            }
            
            // Printing Maximum Value obtained
            else {
                $row = mysqli_fetch_row($retval);
                echo "Max {$attribute} : " . $row[0] . "<br>";
            }
        }

        // If AVG Checked
        if (!$_POST["average"]) {
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
                echo "Avg {$attribute} : " . $row[0] . "<br>";
            }
        }

        // Closing Mysql
        mysqli_close($conn);
    ?>
    </BODY>
</HTML>