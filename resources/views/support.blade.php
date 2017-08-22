@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    You're using JobsAustralia.tech as an <em>Employer</em>. <a href="https://jobsaustralia.tech/register">Change to Job Seeker</a>.
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">	FQAs</div>
                <div class="panel-body">
                    <h3> Setting An Account </h3>
                    <p><b>I forgot my password. What could I do ?</b></p>
                    <p> Don't worry, it happens to everyone. Click the ‘Forgot Your Password ?’ link at the sign in section to enter your email and we'll send you a link to reset your password.</p>
                    <p><b>How do I update my information ?</b></p>
                    <p> Once you have logged in to your account, click on the drop down arrow next to your name in the top right of the page, and select Settings.</p>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-body">
                    <h3> Job Posting </h3>
                    <p><b>I forgot my password. What could I do ?</b></p>
                    <p> Don't worry, it happens to everyone. Click the ‘Forgot Your Password ?’ link at the sign in section to enter your email and we'll send you a link to reset your password.</p>
                    <p><b>How do I update my information ?</b></p>
                    <p> Once you have logged in to your account, click on the drop down arrow next to your name in the top right of the page, and select Settings.</p>
                </div>
            </div>







                  <!--  <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Title</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required autofocus>

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
									<textarea id="description" name="description" rows="5" cols="30" class="form-control" value="{{ old('description') }}" required autofocus>
									</textarea>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('hours') ? ' has-error' : '' }}">
                            <label for="hours" class="col-md-4 control-label">Hours</label>

                            <div class="col-md-6">
							<select class="form-control" value="{{ old('description') }}">
							<option disabled selected value>Please select an option</option>
							<option value="fulltime">Full-Time</option>
							<option value="parttime">Part-Time</option>
							<option value="casual">Casual</option>
							</select>

                                @if ($errors->has('hours'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('hours') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
						<div class="form-group{{ $errors->has('salary') ? ' has-error' : '' }}">
                            <label for="salary" class="col-md-4 control-label">Salary</label>

                            <div class="col-md-6">
                                <input id="salary" type="text" class="form-control" name="salary" value="{{ old('salary') }}" required autofocus>

                                @if ($errors->has('salary'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('salary') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
						<div class="form-group{{ $errors->has('availablefrom') ? ' has-error' : '' }}">
                            <label for="availablefrom" class="col-md-4 control-label">Available From</label>

                            <div class="col-md-6">
								<input id="availablefrom" type="date" name="availablefrom" min="2017-08-01" max="2018-12-31" class="form-control" value="{{ old('description') }}" required autofocus>
                             
                                @if ($errors->has('availablefrom'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('availablefrom') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
						<div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                            <label for="location" class="col-md-4 control-label">Location</label>

                            <div class="col-md-6">
                                <input id="location" type="text" class="form-control" name="location" value="{{ old('location') }}" required autofocus>

                                @if ($errors->has('location'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('location') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
						<div class="form-group{{ $errors->has('startdate') ? ' has-error' : '' }}">
                            <label for="startdate" class="col-md-4 control-label">Start Date</label>

                            <div class="col-md-6">
								<input id="startdate" type="date" name="startdate" min="2017-08-01" max="2018-12-31" class="form-control" value="{{ old('description') }}" required autofocus>
                             
                                @if ($errors->has('startdate'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('startdate') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Post
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
