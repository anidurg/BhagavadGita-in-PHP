<?php
$myfile = fopen("bgchapterslist.txt", "r") or die("Unable to open file!");

/*echo "--------BEFORE LOOP ----<br>";
 $str_txtfromfile = "     1    Chapter_1    47   ";
 $str_explodetest = explode(" ",trim($str_txtfromfile));
 echo " before loop Explode variables are : " . $str_explodetest[0] . " / "  . $str_explodetest[1] . " / " . $str_explodetest[2] . " / junk <br>"  ; 
 */

# print_r (explode(" ",$str_txtfromfile));

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
while(!feof($myfile)) {
$str_txtfromfile = fgets($myfile);
$str_txtfromfile = trim($str_txtfromfile);

	if ( !empty($str_txtfromfile) )
	{
		echo "what is the string: " . $str_txtfromfile . "\t";
		#echo "<br>------------<br>";
		$str_explodetest = explode("\t", $str_txtfromfile);
		#echo "first value is: ", $str_explodetest[0];
		#echo "second value is: ", $str_explodetest[1];
		#echo "third value is: ", $str_explodetest[2];
		echo "Explode variables are : " . $str_explodetest[0] . " / "  . $str_explodetest[1] . " / " . $str_explodetest[2] . " / <br> "  ;

		$sql = "INSERT INTO gitamainlist (myid, chapter_num, verses_num)
VALUES ('$str_explodetest[0]','$str_explodetest[1]','$str_explodetest[2]')";

		echo "Sql command:" . $sql . "<br>" ;
		if ($conn->query($sql) === TRUE) {
		  echo "New record created successfully <br>";
		} else {
		  echo "Error: " . $sql . "<br>" . $conn->error;
		}
		
	} # end - if empty

} # end while

fclose($myfile);

$conn->close();

?>





