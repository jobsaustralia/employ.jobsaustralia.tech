<?php

namespace App\Http\Controllers;

use Auth;
use App\Job;
use App\Application;
use App\JobSeeker;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

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

    /**
     * Apply for job.
     *
     * @param  Illuminate\Http\Request  $request
     * @return Illuminate\Support\Facades\Redirect
     */
    public function apply(Request $request)
    {
        $this->validate($request, [
            'jobid' => 'required|integer|exists:jobs,id',
            'message' => 'required|string'
        ]);

        $id = $request['jobid'];
        $job = Job::findOrFail($id);

        Application::create([
            'userid' => Auth::user()->id,
            'employerid' => $job->employerid,
            'jobid' => $id,
            'message' => $request['message'],
        ]);

        return Redirect::route('matches');
    }

    public function getApplicants($id){
        $employer = Auth::user();
        $applications = Application::where('jobid', $id)->get();
        $applicants = array();

        foreach($applications as $application){
            if(User::findOrFail($application->employerid) == $employer){
                array_push($applicants, JobSeeker::findOrFail($application->userid));
            }
        }

        return $applicants;
    }
}
