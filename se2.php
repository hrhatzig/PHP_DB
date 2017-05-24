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
	echo "Chrysostomos, you have connected successfully to ". $servername ;
	echo ".<br/><br/><br/>";
}

$sql = "SELECT FDOC, LMAST FROM FDOC WHERE FSERIES='7090'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
       	echo "<br/><br/><br/><br/>";
    	echo "FDOC: " . $row["FDOC"]. "<br>";
        echo "LMAST: " . $row["LMAST"]. "<br>";
		$sql2 = "SELECT FLINES, QTY1, COMMENTS, SMAST FROM FLINES WHERE FDOC='".$row["FDOC"]."'";
		$result2 = mysqli_query($conn, $sql2);
	    while($row2 = mysqli_fetch_assoc($result2)) {
	    	echo "FLINES: " . $row2["FLINES"]. "<br>";
	    	echo "COMMENTS: " . $row2["COMMENTS"]. "<br>";
	    	echo "QTY1: " . $row2["QTY1"]. "<br>";
	    	echo "SMAST: " . $row2["SMAST"]. "<br>";
	    	// echo "<br/><br/>";
        }
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>