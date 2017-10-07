<?php

namespace App\Http\Controllers;

use App\Application;
use App\Job;
use App\JobSeeker;
use App\Mail\NewJob;
use App\User;

use Auth;
use Mail;
use Uuid;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class JobController extends Controller{

    /* Create a new controller instance. */
    public function __construct(){
        $this->middleware('auth');
    }

    /* Create job. */
    protected function create(Request $request){

        /* Validate job. */
        $this->validate($request, [
            'title' => 'required|string|regex:/^[a-zA-Z ]+$/|max:255',
            'description' => 'required|string|max:1000',
            'term' => 'required|string|in:fixed,permanent', 
            'hours' => 'required|string|in:fulltime,parttime',
            'rate' => 'required|string|in:hourly,weekly,fortnightly,monthly,annually',
            'salary' => 'required|integer|min:18|max:200000',
            'startdate' => 'required|string|min:10|max:10',
            'state' => 'required|string|in:vic,nsw,qld,wa,sa,tas,act,nt,oth',
            'city' => 'required|string|regex:/^[a-zA-Z ]+$/|max:255',
            'java' => 'required|boolean',
            'python' => 'required|boolean',
            'c' => 'required|boolean',
            'csharp' => 'required|boolean',
            'cplus' => 'required|boolean',
            'php' => 'required|boolean',
            'html' => 'required|boolean',
            'css' => 'required|boolean',
            'javascript' => 'required|boolean',
            'sql' => 'required|boolean',
            'unix' => 'required|boolean',
            'winserver' => 'required|boolean',
            'windesktop' => 'required|boolean',
            'linuxdesktop' => 'required|boolean',
            'macosdesktop' => 'required|boolean',
            'perl' => 'required|boolean',
            'bash' => 'required|boolean',
            'batch' => 'required|boolean',
            'cisco' => 'required|boolean',
            'office' => 'required|boolean',
            'r' => 'required|boolean',
            'go' =>'required|boolean',
            'ruby' => 'required|boolean',
            'asp' => 'required|boolean',
            'scala' => 'required|boolean',
            'cow' => 'required|boolean',
            'actionscript' => 'required|boolean',
            'assembly' => 'required|boolean',
            'autohotkey' => 'required|boolean',
            'coffeescript' => 'required|boolean',
            'd' => 'required|boolean',
            'fsharp' => 'required|boolean',
            'haskell' => 'required|boolean',
            'matlab' => 'required|boolean',
            'objectivec' => 'required|boolean',
            'objectivecplus' => 'required|boolean',
            'pascal' => 'required|boolean',
            'powershell' => 'required|boolean',
            'rust' => 'required|boolean',
            'swift' => 'required|boolean',
            'typescript' => 'required|boolean',
            'vue' => 'required|boolean',
            'webassembly' => 'required|boolean',
            'apache' => 'required|boolean',
            'aws' => 'required|boolean',
            'docker' => 'required|boolean',
            'nginx' => 'required|boolean',
            'saas' => 'required|boolean',
            'ipv4' => 'required|boolean',
            'ipv6' => 'required|boolean',
            'dns' => 'required|boolean',
            'mineducation' => 'required|integer|min:0|max:5',
            'minexperience' => 'required|integer|min:0|max:100',
            'mostimportant' => 'required|string|in:skills,education,experience',
            'leastimportant' => 'required|string|in:skills,education,experience'
        ]);

        /* Manually apply validation logic to most and least important fields. */
        if($request['mostimportant'] == "skills"){
            if($request['leastimportant'] == "education"){
                $rankTwo = "experience";
            }
            else if($request['leastimportant'] == "experience"){
                $rankTwo = "education";
            }
            else{
                return Redirect::route('jobs');
                exit();
            }
        }
        else if($request['mostimportant'] == "education"){
            if($request['leastimportant'] == "skills"){
                $rankTwo = "experience";
            }
            else if($request['leastimportant'] == "experience"){
                $rankTwo = "skills";
            }
            else{
                return Redirect::route('jobs');
                exit();
            }
        }
        else if($request['mostimportant'] == "experience"){
            if($request['leastimportant'] == "skills"){
                $rankTwo = "education";
            }
            else if($request['leastimportant'] == "experience"){
                $rankTwo = "skills";
            }
            else{
                return Redirect::route('jobs');
                exit();
            }
        }

        /* Manually apply validation logic to salary field. */
        if($request['hours'] == "parttime" && $request['rate'] == "hourly"){
            if($request['salary'] < 18 || $request['salary'] > 1000){
                return Redirect::route('jobs');
                exit();
            }
        }
        else if($request['hours'] == "parttime" && $request['rate'] == "weekly"){
            if($request['salary'] < 200 || $request['salary'] > 2000){
                return Redirect::route('jobs');
                exit();
            }
        }
        else if($request['hours'] == "parttime" && $request['rate'] == "fortnightly"){
            if($request['salary'] < 500 || $request['salary'] > 3000){
                return Redirect::route('jobs');
                exit();
            }
        }
        else if($request['hours'] == "parttime" && $request['rate'] == "monthly"){
            if($request['salary'] < 1000 || $request['salary'] > 4000){
                return Redirect::route('jobs');
                exit();
            }
        }
        else if($request['hours'] == "parttime" && $request['rate'] == "annually"){
            if($request['salary'] < 10000 || $request['salary'] > 40000){
                return Redirect::route('jobs');
                exit();
            }
        }
        else if($request['hours'] == "fulltime" && $request['rate'] == "hourly"){
            if($request['salary'] < 24 || $request['salary'] > 1000){
                return Redirect::route('jobs');
                exit();
            }
        }
        else if($request['hours'] == "fulltime" && $request['rate'] == "weekly"){
            if($request['salary'] < 1000 || $request['salary'] > 2000){
                return Redirect::route('jobs');
                exit();
            }
        }
        else if($request['hours'] == "fulltime" && $request['rate'] == "fortnightly"){
            if($request['salary'] < 2000 || $request['salary'] > 4000){
                return Redirect::route('jobs');
                exit();
            }
        }
        else if($request['hours'] == "fulltime" && $request['rate'] == "monthly"){
            if($request['salary'] < 3000 || $request['salary'] > 5000){
                return Redirect::route('jobs');
                exit();
            }
        }
        else if($request['hours'] == "fulltime" && $request['rate'] == "annually"){
            if($request['salary'] < 40000 || $request['salary'] > 200000){
                return Redirect::route('jobs');
                exit();
            }
        }

        /* Finally, create job. */
        $id = Uuid::generate();

        Job::create([
            'id' => $id,
            'title' => $request['title'],
            'description' => $request['description'],
            'term' => $request['term'],
            'hours' => $request['hours'],
            'rate' => $request['rate'],
            'salary' => $request['salary'],
            'startdate' => $request['startdate'],
            'state' => $request['state'],
            'city' => $request['city'],
            'java' => $request['java'],
            'python' => $request['python'],
            'c' => $request['c'],
            'csharp' => $request['csharp'],
            'cplus' => $request['cplus'],
            'php' => $request['php'],
            'html' => $request['html'],
            'css' => $request['css'],
            'javascript' => $request['javascript'],
            'sql' => $request['sql'],
            'unix' => $request['unix'],
            'winserver' => $request['winserver'],
            'windesktop' => $request['windesktop'],
            'linuxdesktop' => $request['linuxdesktop'],
            'macosdesktop' => $request['macosdesktop'],
            'perl' => $request['perl'],
            'bash' => $request['bash'],
            'batch' => $request['batch'],
            'cisco' => $request['cisco'],
            'office' => $request['office'],
            'r' => $request['r'],
            'go' => $request['go'],
            'ruby' => $request['ruby'],
            'asp' => $request['asp'],
            'scala' => $request['scala'],
            'cow' => $request['cow'],
            'actionscript' => $request['actionscript'],
            'assembly' => $request['assembly'],
            'autohotkey' => $request['autohotkey'],
            'coffeescript' => $request['coffeescript'],
            'd' => $request['d'],
            'fsharp' => $request['fsharp'],
            'haskell' => $request['haskell'],
            'matlab' => $request['matlab'],
            'objectivec' => $request['objectivec'],
            'objectivecplus' => $request['objectivecplus'],
            'pascal' => $request['pascal'],
            'powershell' => $request['powershell'],
            'rust' => $request['rust'],
            'swift' => $request['swift'],
            'typescript' => $request['typescript'],
            'vue' => $request['vue'],
            'webassembly' => $request['webassembly'],
            'apache' => $request['apache'],
            'aws' => $request['aws'],
            'docker' => $request['docker'],
            'nginx' => $request['nginx'],
            'saas' => $request['saas'],
            'ipv4' => $request['ipv4'],
            'ipv6' => $request['ipv6'],
            'dns' => $request['dns'],
            'rankone' => $request['mostimportant'],
            'ranktwo' => $rankTwo,
            'rankthree' => $request['leastimportant'],
            'mineducation' => $request['mineducation'],
            'minexperience' => $request['minexperience'],
            'employerid' => Auth::user()->id
        ]);

        /* Get all job seekers for email notification. */
        $jobseekers = JobSeeker::all();

        /* Perform basic and provisional percentageMatch calculation for email notifications only. */
        $skillCount = 0;
        $matchCount = 0;
        foreach($jobseekers as $jobseeker){
            $email = $jobseeker->email;

            if($jobseeker->notifynewjob && substr($email, -4) !== ".dev"){
                if($request['java']){
                    $skillCount++;
                    if($jobseeker->java){
                        $matchCount++;
                    }
                }
                if($request['python']){
                    $skillCount++;
                    if($jobseeker->python){
                        $matchCount++;
                    }
                }
                if($request['csharp']){
                    $skillCount++;
                    if($jobseeker->csharp){
                        $matchCount++;
                    }
                }
                if($request['cplus']){
                    $skillCount++;
                    if($jobseeker->cplus){
                        $matchCount++;
                    }
                }
                if($request['php']){
                    $skillCount++;
                    if($jobseeker->php){
                        $matchCount++;
                    }
                }
                if($request['html']){
                    $skillCount++;
                    if($jobseeker->html){
                        $matchCount++;
                    }
                }
                if($request['css']){
                    $skillCount++;
                    if($jobseeker->css){
                        $matchCount++;
                    }
                }
                if($request['javascript']){
                    $skillCount++;
                    if($jobseeker->javascript){
                        $matchCount++;
                    }
                }
                if($request['sql']){
                    $skillCount++;
                    if($jobseeker->sql){
                        $matchCount++;
                    }
                }
                if($request['unix']){
                    $skillCount++;
                    if($jobseeker->unix){
                        $matchCount++;
                    }
                }
                if($request['winserver']){
                    $skillCount++;
                    if($jobseeker->winserver){
                        $matchCount++;
                    }
                }
                if($request['windesktop']){
                    $skillCount++;
                    if($jobseeker->windesktop){
                        $matchCount++;
                    }
                }
                if($request['linuxdesktop']){
                    $skillCount++;
                    if($jobseeker->linuxdesktop){
                        $matchCount++;
                    }
                }
                if($request['macosdesktop']){
                    $skillCount++;
                    if($jobseeker->macosdesktop){
                        $matchCount++;
                    }
                }
                if($request['perl']){
                    $skillCount++;
                    if($jobseeker->perl){
                        $matchCount++;
                    }
                }
                if($request['bash']){
                    $skillCount++;
                    if($jobseeker->bash){
                        $matchCount++;
                    }
                }
                if($request['batch']){
                    $skillCount++;
                    if($jobseeker->batch){
                        $matchCount++;
                    }
                }
                if($request['cisco']){
                    $skillCount++;
                    if($jobseeker->cisco){
                        $matchCount++;
                    }
                }
                if($request['office']){
                    $skillCount++;
                    if($jobseeker->office){
                        $matchCount++;
                    }
                }
                if($request['r']){
                    $skillCount++;
                    if($jobseeker->r){
                        $matchCount++;
                    }
                }
                if($request['go']){
                    $skillCount++;
                    if($jobseeker->go){
                        $matchCount++;
                    }
                }
                if($request['ruby']){
                    $skillCount++;
                    if($jobseeker->ruby){
                        $matchCount++;
                    }
                }
                if($request['asp']){
                    $skillCount++;
                    if($jobseeker->asp){
                        $matchCount++;
                    }
                }
                if($request['scala']){
                    $skillCount++;
                    if($jobseeker->scala){
                        $matchCount++;
                    }
                }
                if($request['cow']){
                    $skillCount++;
                    if($jobseeker->cow){
                        $matchCount++;
                    }
                }
                if($request['actionscript']){
                    $skillCount++;
                    if($jobseeker->actionscript){
                        $matchCount++;
                    }
                }
                if($request['assembly']){
                    $skillCount++;
                    if($jobseeker->assembly){
                        $matchCount++;
                    }
                }
                if($request['autohotkey']){
                    $skillCount++;
                    if($jobseeker->autohotkey){
                        $matchCount++;
                    }
                }
                if($request['coffeescript']){
                    $skillCount++;
                    if($jobseeker->coffeescript){
                        $matchCount++;
                    }
                }
                if($request['d']){
                    $skillCount++;
                    if($jobseeker->d){
                        $matchCount++;
                    }
                }
                if($request['fsharp']){
                    $skillCount++;
                    if($jobseeker->fsharp){
                        $matchCount++;
                    }
                }
                if($request['haskell']){
                    $skillCount++;
                    if($jobseeker->haskell){
                        $matchCount++;
                    }
                }
                if($request['matlab']){
                    $skillCount++;
                    if($jobseeker->matlab){
                        $matchCount++;
                    }
                }
                if($request['objectivec']){
                    $skillCount++;
                    if($jobseeker->objectivec){
                        $matchCount++;
                    }
                }
                if($request['objectivecplus']){
                    $skillCount++;
                    if($jobseeker->objectivecplus){
                        $matchCount++;
                    }
                }
                if($request['pascal']){
                    $skillCount++;
                    if($jobseeker->pascal){
                        $matchCount++;
                    }
                }
                if($request['powershell']){
                    $skillCount++;
                    if($jobseeker->powershell){
                        $matchCount++;
                    }
                }
                if($request['rust']){
                    $skillCount++;
                    if($jobseeker->rust){
                        $matchCount++;
                    }
                }
                if($request['swift']){
                    $skillCount++;
                    if($jobseeker->swift){
                        $matchCount++;
                    }
                }
                if($request['typescript']){
                    $skillCount++;
                    if($jobseeker->typescript){
                        $matchCount++;
                    }
                }
                if($request['vue']){
                    $skillCount++;
                    if($jobseeker->vue){
                        $matchCount++;
                    }
                }
                if($request['webassembly']){
                    $skillCount++;
                    if($jobseeker->webassembly){
                        $matchCount++;
                    }
                }
                if($request['apache']){
                    $skillCount++;
                    if($jobseeker->apache){
                        $matchCount++;
                    }
                }
                if($request['aws']){
                    $skillCount++;
                    if($jobseeker->aws){
                        $matchCount++;
                    }
                }
                if($request['docker']){
                    $skillCount++;
                    if($jobseeker->docker){
                        $matchCount++;
                    }
                }
                if($request['nginx']){
                    $skillCount++;
                    if($jobseeker->nginx){
                        $matchCount++;
                    }
                }
                if($request['saas']){
                    $skillCount++;
                    if($jobseeker->saas){
                        $matchCount++;
                    }
                }
                if($request['ipv4']){
                    $skillCount++;
                    if($jobseeker->ipv4){
                        $matchCount++;
                    }
                }
                if($request['ipv6']){
                    $skillCount++;
                    if($jobseeker->ipv6){
                        $matchCount++;
                    }
                }
                if($request['dns']){
                    $skillCount++;
                    if($jobseeker->dns){
                        $matchCount++;
                    }
                }

                if($skillCount > 0){
                    $provisionalPercentageMatch = ($matchCount/$skillCount)*100;

                    /* Send an email to the job seeker if their provisional percentageMatch exceeds the arbitrary number of 50. */
                    if($provisionalPercentageMatch > 50){
                        $link = "https://jobsaustralia.tech/job/" . $id;
                        $title = $request['title'];
                        $description = $request['description'];

                        Mail::to($email)->queue(new NewJob($link, $title, $description));
                    }
                }
            }
        }

        return Redirect::route('jobs');
    }

    /* Display post job page. */
    public function indexPost(){
        return view('post');
    }

    /* Display edit job page. */
    public function indexEdit($id){
        $job = Job::findOrFail($id);
        $user = Auth::user();

        if($job->employerid == $user->id){
            return view('edit-job', compact('job'));
        }
        else{
            return Redirect::route('jobs');
        }
    }

    /* Display delete job page. */
    public function indexDelete($id){
        $job = Job::findOrFail($id);
        $user = Auth::user();

        if($job->employerid == $user->id){
            return view('delete-job', compact('job'));
        }
        else{
            return Redirect::route('jobs');
        }
    }

    /* Update job, if authorised. */
    public function updateJob(Request $request){
        $id = $request['jobid'];
        $job = Job::findOrFail($id);
        $user = Auth::user();

        if($job->employerid == $user->id){
            /* Validate job. */
            $this->validate($request, [
                'title' => 'required|string|regex:/^[a-zA-Z ]+$/|max:255',
                'description' => 'required|string|max:1000',
                'term' => 'required|string|in:fixed,permanent', 
                'hours' => 'required|string|in:fulltime,parttime',
                'rate' => 'required|string|in:hourly,weekly,fortnightly,monthly,annually',
                'salary' => 'required|integer|min:18|max:200000',
                'startdate' => 'required|string|min:10|max:10',
                'state' => 'required|string|in:vic,nsw,qld,wa,sa,tas,act,nt,oth',
                'city' => 'required|string|regex:/^[a-zA-Z ]+$/|max:255',
                'java' => 'required|boolean',
                'python' => 'required|boolean',
                'c' => 'required|boolean',
                'csharp' => 'required|boolean',
                'cplus' => 'required|boolean',
                'php' => 'required|boolean',
                'html' => 'required|boolean',
                'css' => 'required|boolean',
                'javascript' => 'required|boolean',
                'sql' => 'required|boolean',
                'unix' => 'required|boolean',
                'winserver' => 'required|boolean',
                'windesktop' => 'required|boolean',
                'linuxdesktop' => 'required|boolean',
                'macosdesktop' => 'required|boolean',
                'perl' => 'required|boolean',
                'bash' => 'required|boolean',
                'batch' => 'required|boolean',
                'cisco' => 'required|boolean',
                'office' => 'required|boolean',
                'r' => 'required|boolean',
                'go' =>'required|boolean',
                'ruby' => 'required|boolean',
                'asp' => 'required|boolean',
                'scala' => 'required|boolean',
                'cow' => 'required|boolean',
                'actionscript' => 'required|boolean',
                'assembly' => 'required|boolean',
                'autohotkey' => 'required|boolean',
                'coffeescript' => 'required|boolean',
                'd' => 'required|boolean',
                'fsharp' => 'required|boolean',
                'haskell' => 'required|boolean',
                'matlab' => 'required|boolean',
                'objectivec' => 'required|boolean',
                'objectivecplus' => 'required|boolean',
                'pascal' => 'required|boolean',
                'powershell' => 'required|boolean',
                'rust' => 'required|boolean',
                'swift' => 'required|boolean',
                'typescript' => 'required|boolean',
                'vue' => 'required|boolean',
                'webassembly' => 'required|boolean',
                'apache' => 'required|boolean',
                'aws' => 'required|boolean',
                'docker' => 'required|boolean',
                'nginx' => 'required|boolean',
                'saas' => 'required|boolean',
                'ipv4' => 'required|boolean',
                'ipv6' => 'required|boolean',
                'dns' => 'required|boolean',
                'mineducation' => 'required|integer|min:0|max:5',
                'minexperience' => 'required|integer|min:0|max:100',
                'mostimportant' => 'required|string|in:skills,education,experience',
                'leastimportant' => 'required|string|in:skills,education,experience'
            ]);
            
            /* Manually apply validation logic to most and least important fields. */
            if($request['mostimportant'] == "skills"){
                if($request['leastimportant'] == "education"){
                    $rankTwo = "experience";
                }
                else if($request['leastimportant'] == "experience"){
                    $rankTwo = "education";
                }
                else{
                    return Redirect::route('jobs');
                    exit();
                }
            }
            else if($request['mostimportant'] == "education"){
                if($request['leastimportant'] == "skills"){
                    $rankTwo = "experience";
                }
                else if($request['leastimportant'] == "experience"){
                    $rankTwo = "skills";
                }
                else{
                    return Redirect::route('jobs');
                    exit();
                }
            }
            else if($request['mostimportant'] == "experience"){
                if($request['leastimportant'] == "skills"){
                    $rankTwo = "education";
                }
                else if($request['leastimportant'] == "experience"){
                    $rankTwo = "skills";
                }
                else{
                    return Redirect::route('jobs');
                    exit();
                }
            }

            /* Manually apply validation logic to salary field. */
            if($request['hours'] == "parttime" && $request['rate'] == "hourly"){
                if($request['salary'] < 18 || $request['salary'] > 1000){
                    return Redirect::route('jobs');
                    exit();
                }
            }
            else if($request['hours'] == "parttime" && $request['rate'] == "weekly"){
                if($request['salary'] < 200 || $request['salary'] > 2000){
                    return Redirect::route('jobs');
                    exit();
                }
            }
            else if($request['hours'] == "parttime" && $request['rate'] == "fortnightly"){
                if($request['salary'] < 500 || $request['salary'] > 3000){
                    return Redirect::route('jobs');
                    exit();
                }
            }
            else if($request['hours'] == "parttime" && $request['rate'] == "monthly"){
                if($request['salary'] < 1000 || $request['salary'] > 4000){
                    return Redirect::route('jobs');
                    exit();
                }
            }
            else if($request['hours'] == "parttime" && $request['rate'] == "annually"){
                if($request['salary'] < 10000 || $request['salary'] > 40000){
                    return Redirect::route('jobs');
                    exit();
                }
            }
            else if($request['hours'] == "fulltime" && $request['rate'] == "hourly"){
                if($request['salary'] < 24 || $request['salary'] > 1000){
                    return Redirect::route('jobs');
                    exit();
                }
            }
            else if($request['hours'] == "fulltime" && $request['rate'] == "weekly"){
                if($request['salary'] < 1000 || $request['salary'] > 2000){
                    return Redirect::route('jobs');
                    exit();
                }
            }
            else if($request['hours'] == "fulltime" && $request['rate'] == "fortnightly"){
                if($request['salary'] < 2000 || $request['salary'] > 4000){
                    return Redirect::route('jobs');
                    exit();
                }
            }
            else if($request['hours'] == "fulltime" && $request['rate'] == "monthly"){
                if($request['salary'] < 3000 || $request['salary'] > 5000){
                    return Redirect::route('jobs');
                    exit();
                }
            }
            else if($request['hours'] == "fulltime" && $request['rate'] == "annually"){
                if($request['salary'] < 40000 || $request['salary'] > 200000){
                    return Redirect::route('jobs');
                    exit();
                }
            }

            /* Finally, update job. */
            $job->update([
                'title'=>$request->title,
                'description'=>$request->description,
                'term' =>$request->term,
                'hours' =>$request->hours,
                'rate' => $request->rate,
                'salary' => $request->salary,
                'startdate' =>$request->startdate,
                'state' =>$request->state,
                'city' =>$request->city,
                'java' =>$request->java,
                'python' =>$request->python,
                'c' =>$request->c,
                'csharp' =>$request->csharp,
                'cplus' =>$request->cplus,
                'php' =>$request->php,
                'html' =>$request->html,
                'css' =>$request->css,
                'javascript' =>$request->javascript,
                'sql' =>$request->sql,
                'unix' =>$request->unix,
                'winserver' =>$request->winserver,
                'windesktop' =>$request->windesktop,
                'linuxdesktop' =>$request->linuxdesktop,
                'macosdesktop' =>$request->macosdesktop,
                'perl' =>$request->perl,
                'bash' =>$request->bash,
                'batch' =>$request->batch,
                'cisco' =>$request->cisco,
                'office' =>$request->office,
                'r' =>$request->r,
                'go' =>$request->go,
                'ruby' =>$request->ruby,
                'asp' =>$request->asp,
                'scala' =>$request->scala,
                'cow' =>$request->cow,
                'actionscript' => $request->actionscript,
                'assembly' => $request->assembly,
                'autohotkey' => $request->autohotkey,
                'coffeescript' => $request->coffeescript,
                'd' => $request->d,
                'fsharp' => $request->fsharp,
                'haskell' => $request->haskell,
                'matlab' => $request->matlab,
                'objectivec' => $request->objectivec,
                'objectivecplus' => $request->objectivecplus,
                'pascal' => $request->pascal,
                'powershell' => $request->powershell,
                'rust' => $request->rust,
                'swift' => $request->swift,
                'typescript' => $request->typescript,
                'vue' => $request->vue,
                'webassembly' => $request->webassembly,
                'apache' => $request->apache,
                'aws' => $request->aws,
                'docker' => $request->docker,
                'nginx' => $request->nginx,
                'saas' => $request->saas,
                'ipv4' => $request->ipv4,
                'ipv6' => $request->ipv6,
                'dns' => $request->dns,
                'rankone' => $request->mostimportant,
                'ranktwo' => $rankTwo,
                'rankthree' => $request->leastimportant,
                'mineducation' => $request->mineducation,
                'minexperience' => $request->minexperience
            ]);
        }

        return Redirect::route('jobs');
    }

    /* Display posted jobs page. */
    public function indexJobs(){
        $employer = Auth::user();

        $jobs = Job::where('employerid', $employer->id)->get();

        return view('jobs')->with(compact('jobs'));
    }

    /* Delete job. */
    public function delete(Request $request){
        $id = $request['id'];
        $job = Job::findOrFail($id);
        $employer = Auth::user();

        if(User::findOrFail($job->employerid) == $employer){
            Job::destroy($id);
        }

        return Redirect::route('jobs');
    }
}
