@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h3><i class="fa fa-briefcase" aria-hidden="true"></i> Your Jobs</h3><br>
            @if ($jobs)
                @foreach($jobs as $job)
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $job->title }}</div>

                    <div class="panel-body">
                        {{ $job->description }}

                        <hr>

                        <p><strong>Hours:</strong> {{ $job->hours }}</p>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
@endsection
