<?php

namespace App\Http\Controllers;

use App\Job;
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
        if(array_key_exists('java', $request)){
            $hasJava = "true";
        }
        else{
            $hasJava = "false";
        }
        if(array_key_exists('python', $request)){
            $hasPython = "true";
        }
        else{
            $hasPython = "false";
        }
        if(array_key_exists('c', $request)){
            $hasC = "true";
        }
        else{
            $hasC = "false";
        }
        if(array_key_exists('csharp', $request)){
            $hasCSharp = "true";
        }
        else{
            $hasCSharp = "false";
        }
        if(array_key_exists('cplus', $request)){
            $hasCPlus = "true";
        }
        else{
            $hasCPlus = "false";
        }
        if(array_key_exists('php', $request)){
            $hasPHP = "true";
        }
        else{
            $hasPHP = "false";
        }
        if(array_key_exists('html', $request)){
            $hasHTML = "true";
        }
        else{
            $hasHTML = "false";
        }
        if(array_key_exists('css', $request)){
            $hasCSS = "true";
        }
        else{
            $hasCSS = "false";
        }
        if(array_key_exists('javascript', $request)){
            $hasJavaScript = "true";
        }
        else{
            $hasJavaScript = "false";
        }
        if(array_key_exists('sql', $request)){
            $hasSQL = "true";
        }
        else{
            $hasSQL = "false";
        }
        if(array_key_exists('unix', $request)){
            $hasUNIX = "true";
        }
        else{
            $hasUNIX = "false";
        }
        if(array_key_exists('winserver', $request)){
            $hasWinServer = "true";
        }
        else{
            $hasWinServer = "false";
        }
        if(array_key_exists('windesktop', $request)){
            $hasWinDesktop= "true";
        }
        else{
            $hasWinDesktop = "false";
        }
        if(array_key_exists('linuxdesktop', $request)){
            $hasLinuxDesktop = "true";
        }
        else{
            $hasLinuxDesktop = "false";
        }
        if(array_key_exists('macosdesktop', $request)){
            $hasMacOsDesktop = "true";
        }
        else{
            $hasMacOsDesktop = "false";
        }
        if(array_key_exists('pearl', $request)){
            $hasPearl = "true";
        }
        else{
            $hasPearl = "false";
        }
        if(array_key_exists('bash', $request)){
            $hasBash = "true";
        }
        else{
            $hasBash = "false";
        }
        if(array_key_exists('batch', $request)){
            $hasBatch = "true";
        }
        else{
            $hasBatch = "false";
        }
        if(array_key_exists('cisco', $request)){
            $hasCisco = "true";
        }
        else{
            $hasCisco = "false";
        }
        if(array_key_exists('office', $request)){
            $hasOffice = "true";
        }
        else{
            $hasOffice= "false";
        }
        if(array_key_exists('r', $request)){
            $hasR = "true";
        }
        else{
            $hasR = "false";
        }
        if(array_key_exists('go', $request)){
            $hasGo = "true";
        }
        else{
            $hasGo = "false";
        }
        if(array_key_exists('ruby', $request)){
            $hasRuby = "true";
        }
        else{
            $hasRuby = "false";
        }
        if(array_key_exists('asp', $request)){
            $hasASP = "true";
        }
        else{
            $hasASP = "false";
        }
        if(array_key_exists('scala', $request)){
            $hasScala = "true";
        }
        else{
            $hasScala = "false";
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
            'scala' => $hasScala
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
