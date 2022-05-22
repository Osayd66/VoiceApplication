<?php
$addvaule = 1;
$callerID = $_POST['callerID'];
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

$sql1 = "INSERT INTO Numbers (Phone_Number) VALUES ('".md5($callerID)."')";
if ($conn->query($sql1) === TRUE) {
    $sql2 = "UPDATE VotingQ SET No_Votes = (No_Votes + $addvaule) WHERE Voting_Status = 'O'";
} else {
  echo "Error: " . $sql1 . "<br>" . $conn->error;
}

 if ($conn->query($sql2) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql2 . "<br>" . $conn->error;
}


?>

