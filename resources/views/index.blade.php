@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Welcome</strong></div>

                <div class="panel-body" align="center">
                    <p><span class="icon-jobsaustralia-logo" style="font-size: 100px"></span></p>
                    <p>JobsAustralia.tech is a job matchmaking website based in Melbourne, Australia focusing in the fields of <strong>Information Technology</strong>, <strong>Computer Science</strong>, and <strong>Software Engineering</strong>.</p><br>
                    <p><a class="btn btn-primary" @if (Auth::guest()) href="{{ route('register') }}">Register now @else href="{{ route('jobs') }}">View matches @endif</a></p>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading"><strong>Algorithmic matchmaking</strong></div>

                <div class="panel-body" align="center">
                    <p><i class="fa fa-calculator" aria-hidden="true" style="font-size: 100px"></i></p>
                    <p>We use an advanced matchmaking algorithm to match job seekers to your job advertisements.</p>
                    <p>After you register, and job seekers apply to your posted job advertisements, matching applicants are listed in order by a <strong>0% to 100%</strong> match depending on the requirements of your job and their self-reported skillset.</p>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading"><strong>GitHub integration</strong></div>

                <div class="panel-body" align="center">
                    <p><i class="fa fa-github" aria-hidden="true" style="font-size: 100px"></i></p>
                    <p>JobsAustralia.tech optionally integrates with GitHub to detect the programming skillset of job seekers.</p>
                    <p>We then report any relevant repositories when job seekers apply to your jobs.</p>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading"><strong>We're here for you</strong></div>

                <div class="panel-body" align="center">
                    <p><i class="fa fa-users" aria-hidden="true" style="font-size: 100px"></i></p>
                    <p>&bull; Help you to get access to a niche audience, meaning less irrelevant resumes clogging up your inbox.</p>
                    <p>&bull; Match your current job vacancies to the potential employees.</p>
                    <p>&bull; Connect you with the job seekers that are the most suitable for your company culture.</p>
                    <p>&bull; Market you to employees and the society.</p>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading"><strong>The guideline</strong></div>
                <div class="panel-body" align="center">
                    <p><i class="fa fa-compass" aria-hidden="true" style="font-size: 100px"></i></p>
                    <p><strong>Step 1:</strong> Register yourself with JobsAustralia.tech</p>
                    <p><strong>Step 2:</strong> Creat your own profile.</p>
                    <p><strong>Step 3:</strong> List your job vancies. It is recommended that you pay high attention to listing your required skills - we use this to perform matchmaking.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
