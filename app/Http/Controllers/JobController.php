<?php

namespace App\Http\Controllers;

use App\Job;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class JobController extends Controller
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

    /**
     * Create a new job.
     *
     * @param  Illuminate\Http\Request  $request
     * @return Illuminate\Support\Facades\Redirect
     */
    protected function create(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'salary' => 'required|string|regex:/^[0-9]*$/|max:255',
            'hours' => 'required|string|in:fulltime,parttime,casual',
            'availablefrom' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'startdate' => 'required|string|max:255'
            'java' => 'boolean',
            'python' => 'boolean',
            'c' => 'boolean',
            'csharp' => 'boolean',
            'cplus' => 'boolean',
            'php' => 'boolean',
            'html' => 'boolean',
            'css' => 'boolean',
            'javascript' => 'boolean',
            'sql' => 'boolean',
            'unix' => 'boolean',
            'winserver' => 'boolean',
            'windesktop' => 'boolean',
            'linuxdesktop' => 'boolean',
            'macosdesktop' => 'boolean',
            'pearl' => 'boolean',
            'bash' => 'boolean',
            'batch' => 'boolean',
            'cisco' => 'boolean',
            'office' => 'boolean',
            'r' => 'boolean',
            'go' =>'boolean',
            'ruby' => 'boolean',
            'asp' => 'boolean',
            'scala' => 'boolean',
        ]);

        Job::create([
            'title' => $request['title'],
            'description' => $request['description'],
            'hours' => $hours,
            'salary' => $request['salary'],
            'availablefrom' => $request['availablefrom'],
            'location' => $request['location'],
            'startdate' => $request['startdate'],
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
            'scala' => $request['scala']
            'employerid' => Auth::user()->id
        ]);

        return Redirect::route('/jobs');
    }
    /**
     * Show post page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('post');
    }
}
