/* Function to print applicant to panel in view. */
function printApplicant(id, name, message, engaged, percentageMatch){
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

    if(engaged){
        var p0 = document.createElement("p");
        p0.className = "skill-match";
        p0.innerHTML = "You have entered discussion with this job seeker."
    }

    var p1 = document.createElement("p");
    p1.innerHTML = message;

    var hr1 = document.createElement("hr");

    var p6 = document.createElement("p");

    var apply = document.createElement("a");
    apply.className = "btn btn-primary";
    apply.href = "/application/" + id;
    apply.innerHTML = "View";

    panel.appendChild(heading);
    panel.appendChild(body);
    $(heading).append(match);
    
    if(engaged){
        $(body).append(p0);
    }

    $(body).append(p1);
    $(body).append(hr1);
    $(body).append(p6);
    $(p6).append(apply);
    display.appendChild(panel);

    document.getElementById("loading").style.display = "none";
}

/* Function to perform matchmaking. */
function match(){
    /* Get ID of job from document. */
    var jobID = document.getElementById("jobID").value;

    /* Get CSRF token from document. */
    var token = document.getElementsByName("csrf-token")[0].content;

    /* Input array (needs to be grabbed from job). */
    var input;

    /* Array of positions of interest. */
    var bitCheck = [];

    /* Array of applicant indexes. */
    var appIndex = [];

    /* Array of arrays to compare. */
    var appMatch = [];

    /* Array of percentage matches. */
    var percentageMatch = [];

    /* Array to store applicant for later use. */
    var app = [];
    
    /* Array of ranking in order of importance. */
    var ranking = [];
    
    /* Rank weightings. */
    var weightOne = 0.4;
    var weightTwo = 0.35;
    var weightThree = 0.25;
    
    /* Min. number of years experience for job. */
    var expJob;
    
    /* Min. education level for job. */
    var eduJob;

    /* Get job. */
    $.getJSON("/api/job/" + jobID + "/token/" + token, function(job){
        input = [job.java, job.python, job.c, job.csharp, job.cplus, job.php, job.html, job.css, job.javascript, job.sql, job.unix, job.winserver, job.windesktop, job.linuxdesktop, job.macosdesktop, job.perl, job.bash, job.batch, job.cisco, job.office, job.r, job.go, job.ruby, job.asp, job.scala, job.cow, job.actionscript, job.assembly, job.autohotkey, job.coffeescript, job.d, job.fsharp, job.haskell, job.matlab, job.objectivec, job.objectivecplus, job.pascal, job.powershell, job.rust, job.swift, job.typescript, job.vue, job.webassembly, job.apache, job.aws, job.docker, job.nginx, job.saas, job.ipv4, job.ipv6, job.dns];

        /* Determine which bits are non-zero and stores into bitcheck array. */
        var i;
        for(var i = 0; i < input.length; i++){
            if(input[i] == 1){
                bitCheck.push(i);
            }
        }

        /* Get min. number of years experience for job. */
        expJob = job.minexperience;

        /* Get min. education level for job. */
        eduJob = job.mineducation;

        /* Populate ranking array. */
        ranking[0] = job.rankone;
        ranking[1] = job.ranktwo;
        ranking[2] = job.rankthree;
    })
    .then(function(){

        /* Get applicants to job. */
        $.getJSON("/api/applicants/job/" + jobID + "/token/" + token, function(applicants){

            if(applicants.length > 0){
                /* Populate values into appIndex, appMatch and percentageMatch arrays. */
                var i;
                for(i = 0; i < applicants.length; i++){

                    /* Store applicant to storage array. */
                    app[i] = applicants[i];

                    appIndex[i] = i;
                    appMatch[i] = [applicants[i].java, applicants[i].python, applicants[i].c, applicants[i].csharp, applicants[i].cplus, applicants[i].php, applicants[i].html, applicants[i].css, applicants[i].javascript, applicants[i].sql, applicants[i].unix, applicants[i].winserver, applicants[i].windesktop, applicants[i].linuxdesktop, applicants[i].macosdesktop, applicants[i].perl, applicants[i].bash, applicants[i].batch, applicants[i].cisco, applicants[i].office, applicants[i].r, applicants[i].go, applicants[i].ruby, applicants[i].asp, applicants[i].scala, applicants[i].cow, applicants[i].actionscript, applicants[i].assembly, applicants[i].autohotkey, applicants[i].coffeescript, applicants[i].d, applicants[i].fsharp, applicants[i].haskell, applicants[i].matlab, applicants[i].objectivec, applicants[i].objectivecplus, applicants[i].pascal, applicants[i].powershell, applicants[i].rust, applicants[i].swift, applicants[i].typescript, applicants[i].vue, applicants[i].webassembly, applicants[i].apache, applicants[i].aws, applicants[i].docker, applicants[i].nginx, applicants[i].saas, applicants[i].ipv4, applicants[i].ipv6, applicants[i].dns];

                    /* Get applicant's number of years experience. */
                    var expApp = applicants[i].experience;

                    /* Get applicant's education level. */
                    var eduApp = applicants[i].education;

                    /* Determine expMatch. */
                    if(expApp >= expJob)
                    {
                        expMatch = 1;
                    }
                    else
                    {
                        expMatch = 0;
                    }

                    /* Determine eduMatch. */
                    if(eduApp >= eduJob)
                    {
                        eduMatch = 1;
                    }
                    else
                    {
                        eduMatch = 0;
                    }

                    /* Skill match counter. */
                    var count = 0;

                    /* Checks only the values in the positions stored in bitCheck.
                    Increases count if non-zero (i.e. there is a match). */
                    var j; 
                    for(j = 0; j < bitCheck.length; j++){
                        var position = bitCheck[j];
                        
                        if(appMatch[i][position] == 1){
                            count++;
                        }
                    }

                    /* Calculate skillMatch. */
                    var skillMatch = (count / bitCheck.length);

                    /* Copy of ranking array. */
                    var rankCopy = [];

                    var k;
                    for(k = 0; k < ranking.length; k++)
                    {
                        rankCopy[k] = ranking[k];
                    }

                    /* Calculate percentage match. */
                    var l;
                    for(l = 0; l < rankCopy.length; l++)
                    {
                        if(rankCopy[l] == 'experience')
                        {
                            rankCopy[l] = expMatch;
                        }
                        else if(rankCopy[l] == 'education')
                        {
                            rankCopy[l] = eduMatch;
                        }
                        else if(rankCopy[l] == 'skills')
                        {
                            rankCopy[l] = skillMatch;
                        }
                    }

                    percentageMatch[i] = ((rankCopy[0] * weightOne) + (rankCopy[1] * weightTwo) + (rankCopy[2] * weightThree)) * 100;
                }

                /* Bubble sort. */
                var swapped;

                do{
                    swapped = false;

                    var i;
                    for(i = 0; i < appIndex.length-1; i++){
                        if(percentageMatch[i] < percentageMatch[i+1]){
                            var tempPer = percentageMatch[i];
                            percentageMatch[i] = percentageMatch[i+1];
                            percentageMatch[i+1] = tempPer;

                            var tempId = appIndex[i];
                            appIndex[i] = appIndex[i+1];
                            appIndex[i+1] = tempId;

                            var tempApp = appMatch[i];
                            appMatch[i] = appMatch[i+1];
                            appMatch[i+1] = tempApp;

                            swapped = true;
                        }
                    }
                }
                while(swapped);
            }
        })
        .then(function(){

            /* Display applicants. */
            if(app.length > 0){
                var i;
                for(i = 0; i < app.length; i++){
                    var order = appIndex[i];
                    printApplicant(app[order].applicationid, app[order].name, app[order].message, app[order].engaged, Math.round(percentageMatch[i]));
                }
            }
            else{
                document.getElementById("loading").style.display = "none";
                document.getElementById("noapplicants").style.display = "block";
            }
        })
        .fail(function(){
            document.getElementById("loading").style.display = "none";
            document.getElementById("error").style.display = "block";
        });
    })
    .fail(function(){
        document.getElementById("loading").style.display = "none";
        document.getElementById("error").style.display = "block";
    });
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
