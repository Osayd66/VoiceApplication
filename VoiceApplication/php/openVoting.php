<?php
$Date = date("d/m/Y"); 
$status = $_POST['status'];
$servername = "localhost";
$username = "ict4dgroup2_VoiceApp";
$password = "?=*@RasHn~[{";
$database = "ict4dgroup2_Voice_app";
// Create connection using mysqli_connect function
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
    
} else {
  echo "Error: " . $sql1 . "<br>" . $conn->error;
}

$sql2 = "INSERT INTO VotingQ (Voting_Status,Yes_Votes,No_Votes,Start_Date) VALUES ('$status','0','0','$Date')";
  


if ($conn->query($sql2) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql2 . "<br>" . $conn->error;
}


$sql3 = "TRUNCATE Table Numbers";


if ($conn->query($sql3) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql3 . "<br>" . $conn->error;
}

?>

