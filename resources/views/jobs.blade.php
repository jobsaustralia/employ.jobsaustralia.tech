@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <p class="page-heading"><strong><i class="fa fa-briefcase" aria-hidden="true"></i> Your Jobs</strong></p>
                </div>
            </div>
            @if (count($jobs) > 0)
            @foreach($jobs as $job)
            <div class="panel panel-default">
                <div class="panel-heading">{{ $job->title }}</div>

                <div @if(Carbon\Carbon::now()->format('Y-m-d') > $job->startdate) class="panel-body expired" @else class="panel-body" @endif>

                    <p><i class="fa fa-map-marker" aria-hidden="true"></i> <strong>{{ $job->city }}, @if ($job->state == "vic") Victoria @elseif ($job->state == "nsw") New South Wales @elseif ($job->state == "qld") Queensland @elseif ($job->state == "wa") Western Australia @elseif ($job->state == "sa") South Australia @elseif ($job->state == "tas") Tasmania @elseif ($job->state == "act") Australian Capital Territory @elseif ($job->state == "nt") Northern Territory @elseif ($job->state == "oth") Other Australian Region @endif</strong></p>

                    <p>{{ $job->description }}</p>

                    <br>

                    <p><strong>Term:</strong> @if ($job->term == "fixed") Fixed @elseif ($job->term == "permanent") Permanent @else Contract @endif </p>
                    <p><strong>Hours:</strong> @if ($job->hours == "fulltime") Full time @elseif ($job->hours == "parttime") Part time @endif</p>
                    <p><strong>Salary:</strong> &#36;{{ number_format($job->salary) }} @if ($job->rate == "hourly") per hour @elseif ($job->rate == "daily") per day @elseif ($job->rate == "weekly") per week @elseif ($job->rate == "fortnightly") per fortnight @elseif ($job->rate == "monthly") per month @elseif ($job->rate == "annually") per annum @endif </p>
                    <p><strong>Start Date:</strong> {{ $job->startdate }}</p>

                    <br>

                    <p>
                        @if (App\Application::where('jobid', $job->id)->get()->count() == 1)
                            <a href="{{route('applicants', $job->id)}}" class="btn btn-primary">
                                View {{ App\Application::where('jobid', $job->id)->get()->count() }} application
                            </a>
                        @elseif (App\Application::where('jobid', $job->id)->get()->count() > 1)
                            <a href="{{route('applicants', $job->id)}}" class="btn btn-primary">
                                View {{ App\Application::where('jobid', $job->id)->get()->count() }} applications
                            </a>
                        @else
                            No applications received.
                        @endif
                    </p>

                    <hr>

                    <p>
                        <a href="{{route('displayEditJob', $job->id)}}" class="btn btn-primary">
                            Edit job
                        </a>

                        <a href="{{route('displayDeleteJob', $job->id)}}" class="btn btn-danger">
                            Delete job
                        </a>
                    </p>
                </div>
            </div>
            @endforeach
            @else
            <!-- No jobs div. Used to display message when employer has no active jobs. -->
            <div class="panel panel-default">
                <div class="panel-body">
                    <div align="center">
                        <br><br>
                        <p class="panel-notice-icon"><i class="fa fa-ship " aria-hidden="true"></i></p>
                        <br>
                        <h2>You've posted no jobs.</h2>
                        <p>This page will display your active jobs.</p>
                        <br>
                        <p>
                            <a href="{{ route('post') }}" class="btn btn-primary">Post a job</a>
                        </p>
                        <br>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
