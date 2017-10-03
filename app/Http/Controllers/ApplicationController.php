<?php

namespace App\Http\Controllers;

use App\Application;
use App\Job;
use App\JobSeeker;
use App\User;

use Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ApplicationController extends Controller{

    /* Create a new controller instance. */
    public function __construct(){
        $this->middleware('auth');
    }

    /* Display applicants view. */
    public function index($id){
        $employer = Auth::user();
        $job = Job::findOrFail($id);

        if(User::findOrFail($job->employerid) == $employer){
            return view('applicants', ["id"=>$job->id, "title"=>$job->title]);
        }
        else{
            return Redirect::route('jobs');
        }
    }
    
    /* Display application view. */
    public function displayApplication($id){
        $employer = Auth::user();
        $application = Application::findOrFail($id);
        $job = Job::findOrFail($application->jobid);
        $user = JobSeeker::findOrFail($application->userid);

        $name = $user->name;
        $email = $user->email;
        $title = $user->title;
        $sector = $user->sector;
        $experience = $user->experience;
        $state = $user->state;
        $city = $user->city;
        $java = $user->java;
        $python = $user->python;
        $c = $user->c;
        $csharp = $user->csharp;
        $cplus = $user->cplus;
        $php = $user->php;
        $html = $user->html;
        $css = $user->css;
        $javascript = $user->javascript;
        $sql = $user->sql;
        $unix = $user->unix;
        $winserver = $user->winserver;
        $windesktop = $user->windesktop;
        $linuxdesktop = $user->linuxdesktop;
        $macosdesktop = $user->macosdesktop;
        $perl = $user->perl;
        $bash = $user->bash;
        $batch = $user->batch;
        $cisco = $user->cisco;
        $office = $user->office;
        $r = $user->r;
        $go = $user->go;
        $ruby = $user->ruby;
        $asp = $user->asp;
        $scala = $user->scala;
        $cow = $user->cow;
        $actionscript = $user->actionscript;
        $assembly = $user->assembly;
        $autohotkey = $user->autohotkey;
        $coffeescript = $user->coffeescript;
        $d = $user->d;
        $fsharp = $user->fsharp;
        $haskell = $user->haskell;
        $matlab = $user->matlab;
        $objectivec = $user->objectivec;
        $objectivecplus = $user->objectivecplus;
        $pascal = $user->pascal;
        $powershell = $user->powershell;
        $rust = $user->rust;
        $swift = $user->swift;
        $typescript = $user->typescript;
        $vue = $user->vue;
        $webassembly = $user->webassembly;
        $apache = $user->apache;
        $aws = $user->aws;
        $docker = $user->docker;
        $nginx = $user->nginx;
        $saas = $user->saas;
        $ipv4 = $user->ipv4;
        $ipv6 = $user->ipv6;
        $dns = $user->dns;
        $message = $application->message;
        $jobid = $job->id;
        $userid = $user->id;
        $github = $user->github;

        return view('application', ["name"=>$name, "email"=>$email, "title"=>$title, "sector"=>$sector, "experience"=>$experience, "state"=>$state, "city"=>$city, "java"=>$java, "python"=>$python, "c"=>$c, "csharp"=>$csharp, "cplus"=>$cplus, "php"=>$php, "html"=>$html, "css"=>$css, "javascript"=>$javascript, "sql"=>$sql, "unix"=>$unix, "winserver"=>$winserver, "windesktop"=>$windesktop, "linuxdesktop"=>$linuxdesktop, "macosdesktop"=>$macosdesktop, "perl"=>$perl, "bash"=>$bash, "batch"=>$batch, "cisco"=>$cisco, "office"=>$office, "r"=>$r, "go"=>$go, "ruby"=>$ruby, "asp"=>$asp, "scala"=>$scala, "cow"=>$cow, "message"=>$message, "jobid"=>$jobid, "github"=>$github, "userid"=>$userid, "actionscript"=>$actionscript, "assembly"=>$assembly, "autohotkey"=>$autohotkey, "coffeescript"=>$coffeescript, "d"=>$d, "fsharp"=>$fsharp, "haskell"=>$haskell, "matlab"=>$matlab, "objectivec"=>$objectivec, "objectivecplus"=>$objectivecplus, "pascal"=>$pascal, "powershell"=>$powershell, "rust"=>$rust, "swift"=>$swift, "typescript"=>$typescript, "vue"=>$vue, "webassembly"=>$webassembly, "apache"=>$apache, "aws"=>$aws, "docker"=>$docker, "nginx"=>$nginx, "saas"=>$saas, "ipv4"=>$ipv4, "ipv6"=>$ipv6, "dns"=>$dns]);
    }
	
	/* Reject an application. */
	public function rejectApplication($id){
		$employer = Auth::user();
        $application = Application::findOrFail($id);
		
		if(User::findOrFail($application->employerid) == $employer){
            $application->rejected->1;
        }
	}
}
