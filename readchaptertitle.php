	<?php
$myfile = fopen("bgchaptertitles.txt", "r") or die("Unable to open file!");

$servername = "localhost";
$username = "root";
$password = "anitamysql";
$dbname = "mydatabase";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Output one line until end-of-file
$i = 1;
while(!feof($myfile)) {
$str_txtfromfile = fgets($myfile);
$str_txtfromfile = trim($str_txtfromfile);

	if ( !empty($str_txtfromfile) )
	{
		echo "what is the string: " . $str_txtfromfile . "\t";
		echo "<br>------------<br>";
		echo "iterator value is :" . $i . "br>";

		
$sql = "UPDATE gitamainlist SET chapter_name = '$str_txtfromfile' where myid = '$i'";


		echo "Sql command:" . $sql . "<br>" ;
		if ($conn->query($sql) === TRUE) {
		  echo "New record created successfully <br>";
		} else {
		  echo "Error: " . $sql . "<br>" . $conn->error;
		}		

	
		
	} # end - if empty
 $i++;
} # end while

fclose($myfile);

$conn->close();

?>	
		
