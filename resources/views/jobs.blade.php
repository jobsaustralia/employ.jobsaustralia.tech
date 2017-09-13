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

                        <p>{{ $job->description }}</p>

                        <hr>
						<p><strong>Term:</strong> @if ($job->term == "fixed") Fixed @elseif ($job->term == "permanent") Permanent @endif </p>
                        <p><strong>Hours:</strong> @if ($job->hours == "fulltime") Full time @elseif ($job->hours == "parttime") Part time @elseif ($job->hours == "casual") Casual @endif </p>
                        <p><strong>Salary:</strong> &#36;{{ number_format($job->salary) }} @if ($job->rate == "hourly") per hour @elseif ($job->rate == "weekly") per week @elseif ($job->rate == "monthly") per month @else per annum @endif </p>
                        <p><strong>Start Date:</strong> {{ $job->startdate }}</p>
                        <p><strong>Location:</strong> {{ $job->city }}, @if ($job->state == "vic") Victoria @elseif ($job->state == "nsw") New South Wales @elseif ($job->state == "qld") Queensland @elseif ($job->state == "wa") Western Australia @elseif ($job->state == "sa") South Australia @elseif ($job->state == "tas") Tasmania @elseif ($job->state == "act") Australian Capital Territory @elseif ($job->state == "nt") Northern Territory @elseif ($job->state == "oth") Other Australian Region @endif </p>

                        <hr>

                        <p>
                            <a href="{{route('applicants', $job->id)}}" class="btn btn-primary">
                                View applicants
                            </a>
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
