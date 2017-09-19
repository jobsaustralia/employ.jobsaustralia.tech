/* Generic function to toggle the display of an element. */
function toggleDisplay(){
    var element = document.getElementById(event.target.id + "-content");
    
    if(element.style.display == "none"){
        element.style.display = "block";
    }
    else{
        element.style.display = "none";
    }
}

/* Function to toggle the display of each team member on the about page. */
function toggleTeamDisplay(){
    document.getElementById("dennis-content").style.display = "none";
    document.getElementById("aaron-content").style.display = "none";
    document.getElementById("ozlem-content").style.display = "none";
    document.getElementById("kim-content").style.display = "none";
    document.getElementById("melissa-content").style.display = "none";
    document.getElementById(event.target.id + "-content").style.display = "block";
}

/* Function to randomise the order of the team on the about page. */
function randomiseTeam(){
    function shuffle(a){
        var j, x, i;
        for (i = a.length; i; i--){
            j = Math.floor(Math.random() * i);
            x = a[i - 1];
            a[i - 1] = a[j];
            a[j] = x;
        }
    }

    var team = ["aaron,Aaron Horler", "ozlem,Ozlem Kirmizi", "kim,Kim Luu", "melissa,Melissa Nguyen", "dennis,Dennis Mihalache"];
    shuffle(team);

    var namesDiv = document.getElementById("names");

    var i;
    for(i = 0; i < team.length; i++){
        var button = document.createElement("button");
        button.id = team[i].split(",")[0];
        button.className = "btn btn-primary";
        button.style.marginTop = "5px";
        button.style.marginBottom = "5px";
        button.innerHTML = team[i].split(",")[1];
        namesDiv.appendChild(button);
        namesDiv.innerHTML += " ";
    }

    document.getElementById(team[0].split(",")[0] + "-content").style.display = "block";

    document.getElementById("ozlem").addEventListener("click", toggleTeamDisplay);
    document.getElementById("dennis").addEventListener("click", toggleTeamDisplay);
    document.getElementById("melissa").addEventListener("click", toggleTeamDisplay);
    document.getElementById("kim").addEventListener("click", toggleTeamDisplay);
    document.getElementById("aaron").addEventListener("click", toggleTeamDisplay);
}

/* Function to submit POST data to server with form in the background. */
function submitForm(){
    event.preventDefault();
    document.getElementById(event.target.id + "-form").submit();
}

/* Function to verify the self-reported skills of a job seeker against their public GitHub repositories. */
function gitHubVerifySkills(){

    /* GitHub username. */
    var username = "aghorler";

    /* Full resource link to GitHub API. */
    var resource = "https://api.github.com/users/" + username + "/repos";

    /* CSRF token. */
    var token = "null";

    /* Job ID. */
    var jobID = "9d2903c0-9cf8-11e7-a176-5d131407477b";

    /* Array to be populated with programming skills. */
    var skills;

    /* Language count. */
    var count = 0;

    /* Function to print the count of matching repositories. */
    function printGitHubVerify(count){
        console.log("We found " + count + " repositories that match your listed skill requirements for this job.");
        console.log("View all: " + "http://github.com/" + username + "?tab=repositories&type=source");
    }

    /* Get programming skills for job. */
    $.getJSON("/api/job/" + jobID + "/token/" + token, function(job){
        skills = [job.java, job.python, job.c, job.csharp, job.cplus, job.php, job.html, job.css, job.javascript, job.sql, job.pearl, job.bash, job.batch, job.r, job.go, job.ruby, job.asp, job.scala];
    })
    .then(function(){

        /* Compare skills to list of repositories owned by the user. */
        $.getJSON(resource, function(data){
            var i;
            for(i = 0; i < data.length; i++){
                // Ignore repositories with no recognised language, and ignore forks.
                if(data[i].language !== null && data[i].fork == false){

                    if(skills[0] && data[i].language == "Java"){
                        count++;
                    }

                    if(skills[1] && data[i].language == "Python"){
                        count++;
                    }

                    if(skills[2] && data[i].language == "C"){
                        count++;
                    }

                    if(skills[3] && data[i].language == "C#"){
                        count++;
                    }

                    if(skills[4] && data[i].language == "C++"){
                        count++;
                    }

                    if(skills[5] && data[i].language == "PHP"){
                        count++;
                    }

                    if(skills[6] && data[i].language == "HTML"){
                        count++;
                    }

                    if(skills[7] && data[i].language == "CSS"){
                        count++;
                    }

                    if(skills[8] && data[i].language == "JavaScript"){
                        count++;
                    }

                    if(skills[9] && data[i].language == "SQL"){
                        count++;
                    }

                    if(skills[10] && data[i].language == "Pearl"){
                        count++;
                    }

                    if(skills[11] && data[i].language == "Bash"){
                        count++;
                    }

                    if(skills[12] && data[i].language == "Batch"){
                        count++;
                    }

                    if(skills[13] && data[i].language == "R"){
                        count++;
                    }

                    if(skills[14] && data[i].language == "Go"){
                        count++;
                    }

                    if(skills[15] && data[i].language == "Ruby"){
                        count++;
                    }

                    if(skills[16] && data[i].language == "ASP"){
                        count++;
                    }

                    if(skills[17] && data[i].language == "Scala"){
                        count++;
                    }
                }
            }

            if(count > 0){
                printGitHubVerify(count);
            }
        });
    });
}

/* Add EventListeners depending on current page loaded. */
if(document.getElementById("profile") !== null){
    document.getElementById("confirm-delete").addEventListener("click", toggleDisplay);
    document.getElementById("really-confirm-delete").addEventListener("click", toggleDisplay);
    document.getElementById("change-password").addEventListener("click", toggleDisplay);
    document.getElementById("delete").addEventListener("click", submitForm);
}
else if(document.getElementById("team") !== null){
    document.addEventListener('DOMContentLoaded', randomiseTeam);
    document.addEventListener('DOMContentLoaded', gitHubVerifySkills);
}
else if(document.getElementById("delete-job") !== null){
    document.getElementById("delete-job-button").addEventListener("click", toggleDisplay);
    document.getElementById("delete-job-confirm").addEventListener("click", submitForm);
}

/* Add EventListener to logout link. */
if(document.getElementById("logout") !== null){
    document.getElementById("logout").addEventListener("click", submitForm);
}
