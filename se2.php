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

$sql = "SELECT * FROM FLINES";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "FLINES: " . $row["FLINES"]. "<br>";
        echo "FDOC: " . $row["FDOC"]. "<br>";
        echo "SMAST: " . $row["SMAST"]. "<br>";
        echo "QTY1: " . $row["QTY1"]. "<br>";
        echo "COMMENTS: " . $row["COMMENTS"]. "<br>";
        echo "U_STATE: " . $row["U_STATE"]. "<br>";
        echo "<br/><br/>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>