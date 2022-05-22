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


$sql = "Select Yes_Votes FROM VotingQ ORDER BY Voting_Q_ID DESC LIMIT 1";

$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) <=0)
			{
				die("<script>alert('NO data in the database!');</script>");
			}
			
			while($row = mysqli_fetch_array($result))
			{

				$yesVotes = $row["Yes_Votes"];
				
			}
			
		
			
$sql2 = "Select No_Votes FROM VotingQ ORDER BY Voting_Q_ID DESC LIMIT 1";
$result2 = mysqli_query($conn, $sql2);
if(mysqli_num_rows($result2) <=0)
			{
				die("<script>alert('NO data in the database!');</script>");
			}
			
			while($row = mysqli_fetch_array($result2))
			{

				$noVotes = $row["No_Votes"];
				
			}
		
?>


 <vxml version="2.1">
    
 <form id="login">
<block>
<prompt>
<audio src="https://group2.saadittoh.com/VoiceApp_Voice%20samples%20french_WAV_1_Welcome.wav"/>
</prompt>
</block>
<field name="pin" type="digits">
<prompt>
<audio src="https://group2.saadittoh.com/VoiceApp_Voice%20samples%20french_WAV_2_Please enter your 4 digit pin.wav"/>
</prompt>
</field>
<block>
<if cond="pin== '8542'">
<prompt> <audio src="https://group2.saadittoh.com/VoiceApp_Voice%20samples%20french_WAV_3_Okey thanks.wav"/> </prompt>
<goto next="#form1"/>
<else/>
<prompt> <audio src="https://group2.saadittoh.com/VoiceApp_Voice%20samples%20french_WAV_4_Wrong pin.wav"/> </prompt>
<goto next="#login"/>
</if>
</block>
</form>
<form id="form1">
    <var name="yesVotes" expr=" '<? echo $yesVotes ?>' " />
    <var name="noVotes" expr=" '<? echo $noVotes ?>' " />
<block>
<prompt> <audio src="https://group2.saadittoh.com/VoiceApp_Voice%20samples%20french_WAV_9_The results are.wav"/></prompt> 
<prompt xml:lang="fr-fr"><value expr="yesVotes"/></prompt> 
<prompt><audio src="https://group2.saadittoh.com/VoiceApp_Voice%20samples%20french_WAV_10_Yes!.wav"/></prompt>
  <prompt xml:lang="fr-fr"><value expr="noVotes"/></prompt>
  
  <prompt> <audio src="https://group2.saadittoh.com/VoiceApp_Voice%20samples%20french_WAV_11_No!.wav"/></prompt>
<goto next="#menu1"/>
</block>
</form>
<menu id="menu1" dtmf="true">
<prompt> <audio src="https://group2.saadittoh.com/VoiceApp_Voice%20samples%20french_WAV_12_Would you like to hear the results again.wav"/></prompt>
<choice next="#form1"/>
<choice next="#form2"/>
</menu>
<form id="form2">
<block>
<prompt> <audio src="https://group2.saadittoh.com/VoiceApp_Voice%20samples%20french_WAV_13_This program will end now.wav"/></prompt>
</block>
</form>
</vxml>