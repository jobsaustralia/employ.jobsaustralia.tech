<?php

namespace App\Http\Controllers;

use App\Application;
use App\JobSeeker;

use Auth;
use File;
use Response;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;


class ResumeController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }

    /* View job seeker's resume by user ID. */
    function view($id){
        $jobseeker = JobSeeker::findOrFail($id);
        $employer = Auth::user();

        /* Count the number of times the job seeker as applied to a job owned by the employer. */
        $count = Application::where('userid', $id)->where('employerid', $employer->id)->get()->count();

        /* Only display resume if count exceeds zero. */
        if($count > 0){
            $filename = "resume-" . $jobseeker->id . ".pdf";
            $path = storage_path('app/public/resumes/' . $filename);

            if(File::exists($path)){
                return Response::make(file_get_contents($path), 200, [
                    'Content-Type' => 'application/pdf',
                    'Content-Disposition' => 'inline; filename="'.$filename.'"'
                ]);
            }
            else{
                return Redirect::route('jobs');
            }
        }
    }
}
