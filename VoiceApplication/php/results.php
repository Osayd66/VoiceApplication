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
<block> Welcome </block>
<break time="10ms"/>
<field name="pin" type="digits">
<prompt> Please key in your four digit PIN code </prompt>
</field>
<block>
<if cond="pin== '8542'">
<prompt> Okay thanks. </prompt>
<goto next="#form1"/>
<else/>
<prompt> Wrong pin </prompt>
<goto next="#login"/>
</if>
</block>
</form>
<form id="form1">
    <var name="yesVotes" expr=" '<? echo $yesVotes ?>' " />
    <var name="noVotes" expr=" '<? echo $noVotes ?>' " />
<block>
<prompt> Results are:  <value expr="yesVotes"/> yes!, <value expr="noVotes"/> no!</prompt>
<goto next="#menu1"/>
</block>
</form>
<menu id="menu1" dtmf="true">
<prompt> Would you like to hear the results again? Select 1 to repeat results, Select 2 if not</prompt>
<choice next="#form1"/>
<choice next="#form2"/>
</menu>
<form id="form2">
<block>
<prompt> This program will now end. </prompt>
</block>
</form>
</vxml>

