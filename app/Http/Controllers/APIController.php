<?php

namespace App\Http\Controllers;

use App\Application;
use App\Job;
use App\JobSeeker;
use App\User;

use Auth;

use App\Http\Controllers\Controller;

class APIController extends Controller{

    /* Create a new controller instance. */
    public function __construct(){
        $this->middleware('auth');
    }

    /* Get applicants for a Job by Job ID, if authorised. */
    public function getApplicants($id){

        /* Get employer from currently authenticated user. */
        $employer = Auth::user();

        /* Get applications where jobid matches $id and employerid matches the employer. */
        $applications = Application::where('jobid', $id)->where('employerid', $employer->id)->get();

        /* Populate array of job seekers by ID from $applications. */
        $applicants = array();
        foreach($applications as $application){
            $jobseeker = JobSeeker::findOrFail($application->userid);
            $jobseeker->applicationid = $application->id;
            $jobseeker->message = $application->message;

            array_push($applicants, $jobseeker);
        }

        return $applicants;
    }

    /* Get a specific Job by ID, if authorised. */
    public function getJob($id){

        /* Get employer from currently authenticated user. */
        $employer = Auth::user();

        /* Get job by ID. */
        $job = Job::findOrFail($id);

        /* Only return job if owned by employer. */
        if(User::findOrFail($job->employerid) == $employer){
            return $job;
        }
    }

    /* Get Job Seeker by ID, if authorised. */
    public function getJobSeeker($id){

        /* Get employer from currently authenticated user. */
        $employer = Auth::user();

        /* Get job seeker by ID. */
        $jobseeker = JobSeeker::findOrFail($id);

        /* Count applications where userid matches the job seeker and employerid matches the employer. */
        $applications = Application::where('userid', $jobseeker->id)->where('employerid', $employer->id)->get()->count();

        /* Return job seeker if applications count exceed zero (eg. job seeker has applied to job owned by employer). */
        if($applications > 0){
            return $jobseeker;
        }  
    }
}
