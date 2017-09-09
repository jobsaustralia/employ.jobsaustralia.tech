/* Function to print applicant to panel in view. */
function printApplicant(name, message, percentageMatch){
    var display = document.getElementById("applicants");

    var panel = document.createElement("div");
    panel.className = "panel panel-default";

    var heading = document.createElement("div");
    heading.className = "panel-heading";
    heading.innerHTML += name + " &bull; ";

    var match = document.createElement("strong");
    match.innerHTML = percentageMatch + "&#37;";

    var body = document.createElement("div");
    body.className = "panel-body";

    var p1 = document.createElement("p");
    p1.innerHTML = message;

    var hr1 = document.createElement("hr");

    // Additional attributes go here.

    var hr2 = document.createElement("hr");

    var p6 = document.createElement("p");

    var apply = document.createElement("a");
    apply.className = "btn btn-primary";
    //apply.href = "/job/" + id;
    apply.innerHTML = "View";

    panel.appendChild(heading);
    panel.appendChild(body);
    heading.append(match);
    body.append(p1);
    body.append(hr1);
    body.append(hr2);
    body.append(p6);
    p6.append(apply);
    display.appendChild(panel);

    document.getElementById("loading").style.display = "none";
}

/* Function to perform matchmaking. */
function match(){
    /* Get ID of job from document. */
    var jobID = document.getElementById("jobID").value;

    /* Get job. */
    $.getJSON("/api/job/" + jobID, function(job){
        // Handle job.
    })
    .then(function(){

        /* Get applicants to job. */
        $.getJSON("/api/applicants/job/" + jobID, function(applicants){
            var i;
            for(i = 0; i < applicants.length; i++){
                // Handle applicants.
            }
        })
        .then(function(){
            // The API URL to get a job seeker by ID is /api/jobseeker/{id}. I made an API for experience, but I'm not sure if it's needed considering experience will be returned using this API.
            // Good luck.
        });
    });

    /* Dummy call to function to print dummy applicant. */
    printApplicant("Bob", "Hey, I'm Bob. You should hire me.", 98);
}

/* Initialisation function to test for JavaScript, display loading animation, and call match function. */
function init(){
    document.getElementById("applicants").innerHTML = "";

    document.getElementById("noscript").style.display = "none";
    document.getElementById("noapplicants").style.display = "none";
    document.getElementById("error").style.display = "none";
    document.getElementById("loading").style.display = "block";

    match();
}

document.addEventListener('DOMContentLoaded', init);