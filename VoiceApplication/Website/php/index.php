<!DOCTYPE html>
<html>
<head>
    <title>Radio Votings</title>

    <!-- Load  CSS file -->
    <link rel="stylesheet" href="voting_style.css">
    
    <!-- Load JQuerry library to make ajax http requests easy-->
    <script
   src="https://code.jquery.com/jquery-3.5.1.js"
   integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
   crossorigin="anonymous"></script>
   
   <script
   src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"
   integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30="
   crossorigin="anonymous"></script>
   
   <!-- Load the javascript -->
    <script src="scripts.js" defer></script>

   <!-- Table to display the total amount of votes -->
    <!-- The javascript replaces the tbody elements with the table elements as defined in the javascript file "scripts.js" 
        that makes the actual ajax http request -->
    <!-- the tables have IDs coresponding to the data that they shoud display -->
    <script>
        function displayTable()
{
    document.getElementById("resultTable").classList.toggle("hidden");
}
    </script>
    
    
</head>
<div class="header">
<body>
    <h1> <font color="red">NOUS</font>
        <font color="green">VOTOS</font>
    <font color="orange">BIP</font>
</h1>
    <hr />

</body>
</div>

<style>
     
    .hidden {
    
      display: none;
    
    }
     </style>
        <!-- Table to display the total amount of votes -->
        <!-- The javascript replaces the tbody elements with the table elements as defined in the javascript file "scripts.js" 
            that makes the actual ajax http request -->
        <!-- the tables have IDs coresponding to the data that they shoud display -->
        
        <script>
            function displayTable()
    {
          document.getElementById("resultTable").classList.toggle("hidden");
    
    
    }
        </script>

<!-- I don't know what the following words mean. -->
<!-- This text will be replaced by the javascript when the vote is open and closed again, but the javascript still needs to be connected to the database status -->
<h1 id="p1"></h1>
<!-- These are buttons that I implemented to test the tha ajax http request to my own local sqlite3 database and should be deleted -->
<!-- To see them just uncomment the whole section belowe (line 75 to 100)-->

<div class="split left">
    <div class="centered">
        <div class="Voting">
            <h2>Would you like to start or stop a voting session?</h2>
        <!-- Start button-->    
            <div> 
                <button type="button" id="startButton" class="startstopButtons" onclick="open_vote()";>
                    Open
                </button>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button type="button" id="stopButton" class="startstopButtons" onclick="close_vote()">
                    Close
                </button>
            </div>
    </div>     
</div> 



</div>

<div class="split right">
    <div class="centered">
<div class="Results">
    <h2>Would you like to see results?</h2>
        <button type="button" id="result" class="startstopButtons" onclick="displayTable()">
            Results
        </button>
     </div>
</div>

<div>
    <div>
        <table id="resultTable" class="hidden" align="center">
              <tr>
               

    <th>Yes</th>

    <th>No</th> 

   <th>Total Votes</th>   

  </tr>


  <tr>
<?php
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

$sql2 = "Select Yes_Votes FROM VotingQ ORDER BY Voting_Q_ID DESC LIMIT 1";

$result2 = mysqli_query($conn, $sql2);
if(mysqli_num_rows($result2) <=0)
			{
			}
			
			while($row = mysqli_fetch_array($result2))
			{
              				$yesVotes = $row["Yes_Votes"];

				echo "<td>".$yesVotes."</td>";
				
			}
			
		
			
$sql3 = "Select No_Votes FROM VotingQ ORDER BY Voting_Q_ID DESC LIMIT 1";
$result3 = mysqli_query($conn, $sql3);
if(mysqli_num_rows($result3) <=0)
			{
			}
			
			while($row = mysqli_fetch_array($result3))
			{
                
                $noVotes = $row["No_Votes"];
				echo "<td>".$noVotes."</td>";
				
			}
			$totalVotes = $noVotes + $yesVotes;
			echo "<td>".$totalVotes."</td>";
			
?>

  </tr>
        </table>
    </div>
</div>
</div> 

</div>

</html>

