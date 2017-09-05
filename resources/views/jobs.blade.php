@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h3><i class="fa fa-briefcase" aria-hidden="true"></i> Your Jobs</h3><br>
            @if (count($jobs) > 0)
                @foreach($jobs as $job)
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $job->title }}</div>

                    <div class="panel-body">
                        
                        <p><strong>Description:</strong> {{ $job->description }}</p>

                        <hr>

                        <p><strong>Hours:</strong> {{ $job->hours }}</p>
                        <p><strong>Salary:</strong> {{ $job->salary }}</p>
                        <p><strong>Start Date:</strong> {{ $job->startdate }}</p>
                        <p><strong>State:</strong> {{ $job->state }}</p>
                        <p><strong>City:</strong> {{ $job->city }}</p>
                        
                        <hr>
                        
                        <p>
                            <button class="btn btn-primary">
                                Edit job
                            </button>
                        </p>
                        
                        <p>
                            <button class="btn btn-primary">
                                Delete job
                            </button>
                        </p>
                    </div>
                </div>
                @endforeach
            @else
                <!-- No jobs div. Used to display message when employer has no active jobs. -->
                <div align="center">
                    <br><br>
                    <p><i style="font-size: 200px" class="fa fa-ship " aria-hidden="true"></i></p>
                    <br>
                    <h2>No Jobs Found.</h2>
                    <p>This page will display your active jobs.</p>
                    <br>
                    <p>
                        <a href="{{ route('post') }}" class="btn btn-primary">Post a job</a>
                    </p>
                    <br><br>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
