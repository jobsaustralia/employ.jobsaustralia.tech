@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h3><i class="fa fa-briefcase" aria-hidden="true"></i> Applicants for <strong> {{ $title }} </strong></h3><br>

            <!-- Job ID for use by match.js -->
            <input id="jobID" type="hidden" value="{{ $id }}" />

            <!-- NoScript div. Used to display message about JavaScript being disabled, or not working. -->
            <div id="noscript" class="panel panel-default">
                <div class="panel-heading"><strong>Notice</strong></div>
                <div class="panel-body" align="center">
                    <br><br>
                    <p><i style="font-size: 200px" class="fa fa-exclamation-triangle" aria-hidden="true"></i></p>
                    <br>
                    <h2>Please enable JavaScript.</h2>
                    <p>JobsAustralia.tech requires JavaScirpt to perform matchmaking.</p>
                    <br><br>
                </div>
            </div>
            <!-- Loading div. Used to display loading animation until first match is loaded to page. -->
            <div id="loading" class="panel panel-default" style="display: none">
                <div class="panel-heading"><strong>Notice</strong></div>
                <div class="panel-body" align="center">
                    <br><br>
                    <p><i style="font-size: 200px" class="fa fa-cog fa-spin fa-3x fa-fw"></i></p>
                    <br>
                    <h2>Loading Applicants.</h2>
                    <br><br>
                </div>
            </div>
            <!-- No matches div. Used to display message when no matches are found. -->
            <div id="noapplicants" class="panel panel-default" style="display: none">
                <div class="panel-heading"><strong>Notice</strong></div>
                <div class="panel-body" align="center">
                    <br><br>
                    <p><i style="font-size: 200px" class="fa fa-exclamation-triangle" aria-hidden="true"></i></p>
                    <br>
                    <h2>No Applications Found.</h2>
                    <p>Try again later.</p>
                    <br><br>
                </div>
            </div>
            <!-- Error div. Used to display message when no matches are found. -->
            <div id="error" class="panel panel-default" style="display: none">
                <div class="panel-heading"><strong>Notice</strong></div>
                <div class="panel-body" align="center">
                    <br><br>
                    <p><i style="font-size: 200px" class="fa fa-exclamation-triangle" aria-hidden="true"></i></p>
                    <br>
                    <h2>Error.</h2>
                    <p>An error occurred. Please try again later, and <a href="{{ route('contact') }}">report it to us</a> if this error reoccurs</p>
                    <br><br>
                </div>
            </div>
            <!-- Applicants are printed to this div via match.js -->
            <div id="applicants"></div>
        </div>
    </div>
</div>
@endsection
