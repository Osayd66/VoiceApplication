<?php
$Date = date("d/m/Y"); 

$servername = "localhost";
$username = "ict4dgroup2_VoiceApp";
$password = "?=*@RasHn~[{";
$database = "ict4dgroup2_Voice_app";
// Create connection using musqli_connect function
$conn = mysqli_connect($servername, $username, $password, $database);
// Connection Check
if (!$conn) {
    die("Connection refused: " . $conn->connect_error);
}

  $sql = "UPDATE VotingQ SET End_Date='$Date' WHERE Voting_Status = 'O'";

 if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


  $sql1 = "UPDATE VotingQ SET Voting_Status='C'";

if ($conn->query($sql1) === TRUE) {
  $sql2 = "TRUNCATE TABLE Numbers";
} else {
  echo "Error: " . $sql1 . "<br>" . $conn->error;
}




?>