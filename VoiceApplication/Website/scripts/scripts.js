// call the functions to populate the html tables
$(results);

//Pass the retrieved data from the ajax calls to the html table IDs and tbodys elements 
let $resultsTable = $("#resultsTable tbody");

//This script changes/replaces  the text in the html page to see if the vote is open or closed

function open_vote(){
   console.log("start vote");
    document.getElementById("p1").innerHTML = "OPEN";
}
function close_vote(){
   console.log("close vote");
   document.getElementById("p1").innerHTML = "CLOSED";
}

//This makes an ajax get request to retriev the whole database and serializes the results, 
function results() {
    $.get("http://localhost:3000/overview", "", function (data) { 
    let htmlStr = "";
       for (let vote of data) {
          console.log(vote);
          htmlStr +=
             "<tr>" +               
                "<td>" + vote.phone_nr + "</td>" +
                "<td>" + vote.vote + "</td>" +
             "</tr>";
       }
       $resultsTable.html(htmlStr);
    }, "json");
     console.log('results loaded');
 }


 $("#startButton").click(function(event){
    event.preventDefault();
    $.ajax({
       url: 'openVotingweb.php', 
       method: 'POST',
    })
    .done((data) => {
       
       console.log('Voting Opened'); 
    });
 });

$("#stopButton").click(function(event){
    event.preventDefault();
    $.ajax({
       url: 'endVotingweb.php', 
       method: 'POST',
    })
    .done((data) => {
       
       console.log('Voting Ended'); 
    });
 });


