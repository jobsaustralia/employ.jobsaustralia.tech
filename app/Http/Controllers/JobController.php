<?php

namespace App\Http\Controllers;

use App\Job;
use App\User;

use Auth;
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
        $this->validate($request, [
            'title' => 'required|string|regex:/^[a-zA-Z ]+$/|max:255',
            'description' => 'required|string|max:1000',
            'term' => 'required|string|in:fixed,permanent', 
            'hours' => 'required|string|in:fulltime,parttime',
            'rate' => 'required|string|in:hourly,weekly,fortnightly,monthly,annually',
            'salary' => 'required|integer|min:0|max:20000000',
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
            'pearl' => 'required|boolean',
            'bash' => 'required|boolean',
            'batch' => 'required|boolean',
            'cisco' => 'required|boolean',
            'office' => 'required|boolean',
            'r' => 'required|boolean',
            'go' =>'required|boolean',
            'ruby' => 'required|boolean',
            'asp' => 'required|boolean',
            'scala' => 'required|boolean'
        ]);

        Job::create([
            'id' => Uuid::generate(),
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
            'pearl' => $request['pearl'],
            'bash' => $request['bash'],
            'batch' => $request['batch'],
            'cisco' => $request['cisco'],
            'office' => $request['office'],
            'r' => $request['r'],
            'go' => $request['go'],
            'ruby' => $request['ruby'],
            'asp' => $request['asp'],
            'scala' => $request['scala'],
            'employerid' => Auth::user()->id
        ]);

        return Redirect::route('jobs');
    }

    /* Display post job page, if authorised. */
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
            $this->validate($request, [
                'title' => 'required|string|regex:/^[a-zA-Z ]+$/|max:255',
                'description' => 'required|string|max:1000',
                'term' => 'required|string|in:fixed,permanent', 
                'hours' => 'required|string|in:fulltime,parttime',
                'rate' => 'required|string|in:hourly,weekly,fortnightly,monthly,annually',
                'salary' => 'required|integer|min:0|max:20000000',
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
                'pearl' => 'required|boolean',
                'bash' => 'required|boolean',
                'batch' => 'required|boolean',
                'cisco' => 'required|boolean',
                'office' => 'required|boolean',
                'r' => 'required|boolean',
                'go' =>'required|boolean',
                'ruby' => 'required|boolean',
                'asp' => 'required|boolean',
                'scala' => 'required|boolean'
            ]);

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
                'pearl' =>$request->pearl,
                'bash' =>$request->bash,
                'batch' =>$request->batch,
                'cisco' =>$request->cisco,
                'office' =>$request->office,
                'r' =>$request->r,
                'go' =>$request->go,
                'ruby' =>$request->ruby,
                'asp' =>$request->asp,
                'scala' =>$request->scala
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

        return  Redirect::route('jobs');
    }
}
