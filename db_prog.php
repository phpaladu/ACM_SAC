 <?php
$servername = "Localhost";
$username = "b140622cs";
$password = "b140622cs";
$dbname="db_b140622cs";
// Create connection


$conn = mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "connection established<br>";



$name=$_POST['mem_name'];
$country=$_POST['country'];
$year=2018;
$sql="INSERT into Program_committee (pname, country) 
VALUES ('$name', '$country')";

$result=mysqli_query($conn, $sql);

$sql="INSERT into Program_committee_Year (pid, year)
SELECT pid, "."'".$year."'"." FROM Program_committee WHERE pname='$name' and country='$country'";
$result=mysqli_query($conn, $sql);
mysqli_close($conn);

 header("Location:track_topics.php");
     

?>
