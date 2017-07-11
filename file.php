<?php
//$servername = "172.30.251.114";
//$username = "ose";
//$password = "openshift";
//$dbname = "quotes";


// Create connection
//$conn = new mysqli($servername, $username, $password, $dbname);

$conn = mysqli_connect($_ENV["MYSQLDB_SERVICE_HOST"],"instructor","openshift","instructor",
 $_ENV["MYSQLDB_SERVICE_PORT"])
     or die("Error " . mysqli_error($conn));

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

// *********** Temporarily commenting out this portion of code *********

//echo " \n";

//$sql = "SELECT instructorNumber, instructorName, email, city, state, postalCode, country
//    from instructors";

//$result = $conn->query($sql);

//if ($result->num_rows > 0) {
//   echo"<table border='1'>";
//   echo"<tr><td>Name</td><td>Category</td><td>Calories</td><tr>";
   // output data of each row
//   while($row = $result->fetch_assoc()) {
//          echo "InNum:- " . $row["instructorNumber"]. " " ;
//          echo "InName:- " . $row["instructorName"]. " " ;
//          echo "Email:- " . $row["email"]. " " ;
//          echo "City:- " . $row["city"]. " " ;
//          echo "State:- " .  $row["state"]. " " ;
//          echo "PostalCode:- " . $row["postalCode"]. " " ;
//          echo "Country:- " . $row["country"]. " " ;
//        echo " \n";
//   echo"</table>";
//   }
// } else {
//   echo "0 results";
// }

// *********** Temporarily commenting out this portion of code *********

// create a variable
$instructorNumber=$_POST['instructorNumber'];
$instructorName=$_POST['instructorName'];
$email=$_POST['email'];
$city=$_POST['city'];
$state=$_POST['state'];
$postalCode=$_POST['postalCode'];
$country=$_POST['country'];

// ***********  Example of mysql insert conn ********* //
// mysqli_query($conn"INSERT INTO instructors(first_name,last_name,department,email)
// 				VALUES('$first_name','$last_name','$department','$email')");
// ***********  Example of mysql insert conn ********* //

echo $instructorNumber; 

$sql = "INSERT INTO instructors (instructorNumber, instructorName, email, city, state, postalCode, country) VALUES ('$instructorNumber', '$instructorName', '$email', '$city', '$state', '$postalCode', '$country')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}



// mysqli_query($conn"INSERT INTO instructors (instructorNumber, instructorName, email, city, state, postalCode, country) VALUES ('$instructorNumber', '$instructorName', '$email', '$city', '$state', '$postalCode', '$country')");

$conn->close();
?>
