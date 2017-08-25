<?php

namespace App\Http\Controllers;

use App\Job;
use Auth;
use App\Http\Controllers\Controller;
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
     * Create a new user instance after a valid registration.
     *
     * @param  array  $request
     * @return \App\Job
     */
    protected function create(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'salary' => 'required|string|regex:/^[0-9]*$/|max:255',
            'availablefrom' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'startdate' => 'required|string|max:255'
        ]);

        /* Skill Conditions */
        if(isset($request['java'])){
            $hasJava = "1";
        }
        else{
            $hasJava = "0";
        }
        if(isset($request['python'])){
            $hasPython = "1";
        }
        else{
            $hasPython = "0";
        }
        if(isset($request['c'])){
            $hasC = "1";
        }
        else{
            $hasC = "0";
        }
        if(isset($request['csharp'])){
            $hasCSharp = "1";
        }
        else{
            $hasCSharp = "0";
        }
        if(isset($request['cplus'])){
            $hasCPlus = "1";
        }
        else{
            $hasCPlus = "0";
        }
        if(isset($request['php'])){
            $hasPHP = "1";
        }
        else{
            $hasPHP = "0";
        }
        if(isset($request['html'])){
            $hasHTML = "1";
        }
        else{
            $hasHTML = "0";
        }
        if(isset($request['css'])){
            $hasCSS = "1";
        }
        else{
            $hasCSS = "0";
        }
        if(isset($request['javascript'])){
            $hasJavaScript = "1";
        }
        else{
            $hasJavaScript = "0";
        }
        if(isset($request['sql'])){
            $hasSQL = "1";
        }
        else{
            $hasSQL = "0";
        }
        if(isset($request['unix'])){
            $hasUNIX = "1";
        }
        else{
            $hasUNIX = "0";
        }
        if(isset($request['winserver'])){
            $hasWinServer = "1";
        }
        else{
            $hasWinServer = "0";
        }
        if(isset($request['windesktop'])){
            $hasWinDesktop= "1";
        }
        else{
            $hasWinDesktop = "0";
        }
        if(isset($request['linuxdesktop'])){
            $hasLinuxDesktop = "1";
        }
        else{
            $hasLinuxDesktop = "0";
        }
        if(isset($request['macosdesktop'])){
            $hasMacOsDesktop = "1";
        }
        else{
            $hasMacOsDesktop = "0";
        }
        if(isset($request['pearl'])){
            $hasPearl = "1";
        }
        else{
            $hasPearl = "0";
        }
        if(isset($request['bash'])){
            $hasBash = "1";
        }
        else{
            $hasBash = "0";
        }
        if(isset($request['batch'])){
            $hasBatch = "1";
        }
        else{
            $hasBatch = "0";
        }
        if(isset($request['cisco'])){
            $hasCisco = "1";
        }
        else{
            $hasCisco = "0";
        }
        if(isset($request['office'])){
            $hasOffice = "1";
        }
        else{
            $hasOffice= "0";
        }
        if(isset($request['r'])){
            $hasR = "1";
        }
        else{
            $hasR = "0";
        }
        if(isset($request['go'])){
            $hasGo = "1";
        }
        else{
            $hasGo = "0";
        }
        if(isset($request['ruby'])){
            $hasRuby = "1";
        }
        else{
            $hasRuby = "0";
        }
        if(isset($request['asp'])){
            $hasASP = "1";
        }
        else{
            $hasASP = "0";
        }
        if(isset($request['scala'])){
            $hasScala = "1";
        }
        else{
            $hasScala = "0";
        }

        /* Hours Condition */
        if($request['hours'] == "casual" || $request['hours'] == "fulltime" || $request['hours'] == "parttime"){
            $hours = $request['hours'];
        }

        Job::create([
            'title' => $request['title'],
            'description' => $request['description'],
            'hours' => $hours,
            'salary' => $request['salary'],
            'availablefrom' => $request['availablefrom'],
            'location' => $request['location'],
            'startdate' => $request['startdate'],
            'java' => $hasJava,
            'python' => $hasPython,
            'c' => $hasC,
            'csharp' => $hasCSharp,
            'cplus' => $hasCPlus,
            'php' => $hasPHP,
            'html' => $hasHTML,
            'css' => $hasCSS,
            'javascript' => $hasJavaScript,
            'sql' => $hasSQL,
            'unix' => $hasUNIX,
            'winserver' => $hasWinServer,
            'windesktop' => $hasWinDesktop,
            'linuxdesktop' => $hasLinuxDesktop,
            'macosdesktop' => $hasMacOsDesktop,
            'pearl' => $hasPearl,
            'bash' => $hasBash,
            'batch' => $hasBatch,
            'cisco' => $hasCisco,
            'office' => $hasCisco,
            'r' => $hasR,
            'go' => $hasGo,
            'ruby' => $hasRuby,
            'asp' => $hasASP,
            'scala' => $hasScala,
            'employerid' => Auth::user()->id
        ]);

        return redirect('/home');
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
