@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div id="job" class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Delete job - {{ $job->title }}</div>
                <div class="panel-body">
                    <p align="center">
                        <strong>Deleting a job will delete the job listing, and all current applications to the job.</strong>
                    </p>

                    <p align="center">
                        <strong>It is impossible to recover a job, and it's applications, after deletion!</strong>
                    </p>

                    <br>

                    <p align="center">
                        <button id="delete-job" class="btn btn-danger">
                            Delete job
                        </button>
                    </p>

                    <br>

                    <p id="delete-job-content" style="display: none;" align="center">
                        Confirm deletion: <a class="text-danger" href="{{ route('delete') }}" onclick="event.preventDefault(); document.getElementById('delete-form').submit();">I really want to delete this job.</a>
                    </p>

                    <form id="delete-form" action="{{ route('deleteJob') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}

                        <input type="hidden" name="id" value="{{ $job->id }}" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
