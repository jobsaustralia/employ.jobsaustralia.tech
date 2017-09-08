<?php

namespace App\Http\Controllers;

use App\User;

use Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class APIController extends Controller{

    /* Create a new controller instance. */
    public function __construct(){
        $this->middleware('auth');
    }

    /* Get applicants for a Job by Job ID, if authorised. */
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

    /* Get all Jobs by state. */
    public function getJobs($state){
        $jobs = Job::where('state', $state)->get();

        return $jobs;
    }

    /* Get a specific Job by ID, if authorised. */
    public function getJob($id){
        $employer = Auth::user();
        $job = Job::findOrFail($id);

        if(User::findOrFail($job->employerid) == $employer){
            return $job;
        }
        else{
            return null;
        }
    }

    /* Get currently authenticated user. */
    public function getUser(){
        return Auth::user();
    }

    /* Get Job Seeker by ID, if authorised. */
    public function getJobSeeker($id){
        $user = JobSeeker::findOrFail($id);
        $employer = Auth::user();

        $applications = Application::where('userid', $user->id)->get();

        $flag = true;
        foreach($applications as $application){
            if(User::findOrFail($application->employerid) != $employer){
                $flag = false;
                break;
            }
        }

        if($flag == true){
            return $user;
        }
        else{
            return null;
        }
    }

    /* Get the experience of a Job Seeker by ID, if authorised. */
    public function getExperience($id){
        $user = JobSeeker::findOrFail($id);
        $employer = Auth::user();
        $applications = Application::where('userid', $user->id)->get();

        $flag = true;
        foreach($applications as $application){
            if(User::findOrFail($application->employerid) != $employer){
                $flag = false;
                break;
            }
        }

        if($flag == true){
            return $user->experience;
        }
        else{
            return null;
        }
    }
}
