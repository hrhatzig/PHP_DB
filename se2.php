<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8"/>
<title>Σταθμός Εργασίας 1 - Σχεδιασμός</title>
<style>

table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
    text-align: left;    
}
</style>
</head>
<body style="background-color:powderblue;">

<h2>Σταθμός Εργασίας 1 - Σχεδιασμός</h2>

<table style="width:100%">
  <tr>
    <th>Προς Υλοποίηση</th>
    <th colspan="2">Τρέχον Εργασία</th>
  </tr>

  <tr>
    <!-- <td>ΒΙΟΚΑΝ - 0878</td></tr><br/> -->
    
    <tr><td><b>PLIM - 0667</b></td></tr><br/>
    
    <?php
        $servername = "internetofbusiness.gr";
        $username = "plimtest";
        $password = "plimtest!@#";
        $dbname = "plimtest";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        } else {
        	// echo "Chrysostomos, you have connected successfully to ". $servername ;
        	// echo ".<br/><br/><br/>";
        }

        $sql = "SELECT FDOC, LMAST FROM FDOC WHERE FSERIES='7090'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
               	// echo "<br/><br/><br/><br/>";
            	echo "<tr><td>FDOC: " . $row["FDOC"]. "</td></tr><br>";
                echo "<tr><td>LMAST: " . $row["LMAST"]. "</td></tr><br>";
        		$sql2 = "SELECT FLINES, QTY1, COMMENTS, SMAST FROM FLINES WHERE FDOC='".$row["FDOC"]."'";
        		$result2 = mysqli_query($conn, $sql2);
        	    while($row2 = mysqli_fetch_assoc($result2)) {
        	    	echo "<tr><td>FLINES: " . $row2["FLINES"]. "</td></tr><br>";
        	    	echo "<tr><td>COMMENTS: " . $row2["COMMENTS"]. "</td></tr><br>";
        	    	echo "<tr><td>QTY1: " . $row2["QTY1"]. "</td></tr><br>";
        	    	echo "<tr><td>SMAST: " . $row2["SMAST"]. "</td></tr><br>";
        	    	// echo "<br/><br/>";
                    break;
                }
                break;
            }
        } else {
            echo "0 results";
        }

        mysqli_close($conn);
    ?>

    <br/><br/><br/>
    <tr><td><button type="button" onclick="alert('START')">ΕΚΚΙΝΗΣΗ</button></tr></td>
  </tr>
</table>

</body>
</html>
