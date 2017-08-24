@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">	Post a job ad</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('post-submit') }}">
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
    							<select id="hours" name="hours" class="form-control" value="{{ old('hours') }}">
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
						
						<hr>

						<h4 align="center">Skills</h4>

                        <p align="center">Please select the skills an employee must possess.</p>

                        <!-- Skill: Java -->
						<div class="form-group{{ $errors->has('java') ? ' has-error' : '' }}">
                            <label for="java" class="col-md-4 control-label">Java</label>

                            <div class="col-md-1">
                                <input id="java" type="checkbox" class="form-control" name="java" value="1" autofocus>
							
                                @if ($errors->has('java'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('java') }}</strong>
                                    </span>
                                @endif
                            </div>
						</div>

                        <!-- Skill: Python -->
						<div class="form-group{{ $errors->has('python') ? ' has-error' : '' }}">
                            <label for="python" class="col-md-4 control-label">Python</label>

                            <div class="col-md-1">
                                <input id="python" type="checkbox" class="form-control" name="python" value="{{ old('python') }}" autofocus>
							
                                @if ($errors->has('python'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('python') }}</strong>
                                    </span>
                                @endif
                            </div>
						</div>

                        <!-- Skill: C -->
						<div class="form-group{{ $errors->has('c') ? ' has-error' : '' }}">
                            <label for="c" class="col-md-4 control-label">C</label>

                            <div class="col-md-1">
                                <input id="c" type="checkbox" class="form-control" name="c" value="{{ old('c') }}" autofocus>
							
                                @if ($errors->has('c'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('c') }}</strong>
                                    </span>
                                @endif
                            </div>
						</div>

                        <!-- Skill: C# -->
						<div class="form-group{{ $errors->has('c-sharp') ? ' has-error' : '' }}">
                            <label for="c-sharp" class="col-md-4 control-label">C#</label>

                            <div class="col-md-1">
                                <input id="c-sharp" type="checkbox" class="form-control" name="c-sharp" value="{{ old('c-sharp') }}" autofocus>
							
                                @if ($errors->has('c-sharp'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('c-sharp') }}</strong>
                                    </span>
                                @endif
                            </div>
						</div>
							
                        <!-- Skill: C++ -->
						<div class="form-group{{ $errors->has('c-plus') ? ' has-error' : '' }}">
                            <label for="c-plus" class="col-md-4 control-label">C++</label>

                            <div class="col-md-1">
                                <input id="c-plus" type="checkbox" class="form-control" name="c-plus" value="{{ old('c-plus') }}" autofocus>
							
                                @if ($errors->has('c-plus'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('c-plus') }}</strong>
                                    </span>
                                @endif
                            </div>
						</div>
						
                        <!-- Skill: PHP -->
						<div class="form-group{{ $errors->has('php') ? ' has-error' : '' }}">
                            <label for="php" class="col-md-4 control-label">PHP</label>

                            <div class="col-md-1">
                                <input id="php" type="checkbox" class="form-control" name="php" value="{{ old('php') }}" autofocus>
							
                                @if ($errors->has('php'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('php') }}</strong>
                                    </span>
                                @endif
                            </div>
						</div>
						
                        <!-- Skill: HTML -->
						<div class="form-group{{ $errors->has('html') ? ' has-error' : '' }}">
                            <label for="html" class="col-md-4 control-label">HTML</label>

                            <div class="col-md-1">
                                <input id="html" type="checkbox" class="form-control" name="html" value="{{ old('html') }}" autofocus>
							
                                @if ($errors->has('html'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('html') }}</strong>
                                    </span>
                                @endif
                            </div>
						</div>
						
                        <!-- Skill: CSS -->
						<div class="form-group{{ $errors->has('css') ? ' has-error' : '' }}">
                            <label for="css" class="col-md-4 control-label">CSS</label>

                            <div class="col-md-1">
                                <input id="css" type="checkbox" class="form-control" name="css" value="{{ old('css') }}" autofocus>
							
                                @if ($errors->has('css'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('css') }}</strong>
                                    </span>
                                @endif
                            </div>
						</div>
						
                        <!-- Skill: JavaScript -->
						<div class="form-group{{ $errors->has('javascript') ? ' has-error' : '' }}">
                            <label for="javascript" class="col-md-4 control-label">JavaScript</label>

                            <div class="col-md-1">
                                <input id="javascript" type="checkbox" class="form-control" name="javascript" value="{{ old('javascript') }}" autofocus>
							
                                @if ($errors->has('javascript'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('javascript') }}</strong>
                                    </span>
                                @endif
                            </div>
						</div>

                        <!-- Skill: SQL -->							
						<div class="form-group{{ $errors->has('sql') ? ' has-error' : '' }}">
                            <label for="sql" class="col-md-4 control-label">SQL</label>

                            <div class="col-md-1">
                                <input id="sql" type="checkbox" class="form-control" name="sql" value="{{ old('sql') }}" autofocus>
							
                                @if ($errors->has('sql'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sql') }}</strong>
                                    </span>
                                @endif
                            </div>
						</div>
						
                        <!-- Skill: Unix -->
						<div class="form-group{{ $errors->has('unix') ? ' has-error' : '' }}">
                            <label for="unix" class="col-md-4 control-label">Unix</label>

                            <div class="col-md-1">
                                <input id="unix" type="checkbox" class="form-control" name="unix" value="{{ old('unix') }}" autofocus>
							
                                @if ($errors->has('unix'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('unix') }}</strong>
                                    </span>
                                @endif
                            </div>
						</div>
					   
                        <!-- Skill: Windows Server -->
						<div class="form-group{{ $errors->has('winserver') ? ' has-error' : '' }}">
                            <label for="winserver" class="col-md-4 control-label">Windows Server</label>

                            <div class="col-md-1">
                                <input id="winserver" type="checkbox" class="form-control" name="winserver" value="{{ old('winserver') }}" autofocus>
							
                                @if ($errors->has('winserver'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('winserver') }}</strong>
                                    </span>
                                @endif
                            </div>
						</div>
						
                        <!-- Skill: Windows Desktop -->
						<div class="form-group{{ $errors->has('windesktop') ? ' has-error' : '' }}">
                            <label for="windesktop" class="col-md-4 control-label">Windows Desktop</label>

                            <div class="col-md-1">
                                <input id="windesktop" type="checkbox" class="form-control" name="windesktop" value="{{ old('win-desktop') }}" autofocus>
							
                                @if ($errors->has('windesktop'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('windesktop') }}</strong>
                                    </span>
                                @endif
                            </div>
						</div>
						
                        <!-- Skill: Linux Desktop -->
						<div class="form-group{{ $errors->has('linuxdesktop') ? ' has-error' : '' }}">
                            <label for="linuxdesktop" class="col-md-4 control-label">Linux Desktop</label>

                            <div class="col-md-1">
                                <input id="linuxdesktop" type="checkbox" class="form-control" name="linuxdesktop" value="{{ old('linuxdesktop') }}" autofocus>
							
                                @if ($errors->has('linuxdesktop'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('linuxdesktop') }}</strong>
                                    </span>
                                @endif
                            </div>
						</div>
						
                        <!-- Skill: MacOS Desktop -->
						<div class="form-group{{ $errors->has('macosdesktop') ? ' has-error' : '' }}">
                            <label for="macosdesktop" class="col-md-4 control-label">MacOS Desktop</label>

                            <div class="col-md-1">
                                <input id="macosdesktop" type="checkbox" class="form-control" name="macosdesktop" value="{{ old('macosdesktop') }}" autofocus>
							
                                @if ($errors->has('macosdesktop'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('macosdesktop') }}</strong>
                                    </span>
                                @endif
                            </div>
						</div>
						
                        <!-- Skill: Pearl -->
						<div class="form-group{{ $errors->has('pearl') ? ' has-error' : '' }}">
                            <label for="pearl" class="col-md-4 control-label">Pearl</label>

                            <div class="col-md-1">
                                <input id="pearl" type="checkbox" class="form-control" name="pearl" value="{{ old('pearl') }}" autofocus>
							
                                @if ($errors->has('pearl'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pearl') }}</strong>
                                    </span>
                                @endif
                            </div>
						</div>
						
                        <!-- Skill: Bash -->
						<div class="form-group{{ $errors->has('bash') ? ' has-error' : '' }}">
                            <label for="bash" class="col-md-4 control-label">Bash</label>

                            <div class="col-md-1">
                                <input id="bash" type="checkbox" class="form-control" name="bash" value="{{ old('bash') }}" autofocus>
							
                                @if ($errors->has('bash'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bash') }}</strong>
                                    </span>
                                @endif
                            </div>
						</div>

                        <!-- Skill: Batch -->
						<div class="form-group{{ $errors->has('batch') ? ' has-error' : '' }}">
                            <label for="batch" class="col-md-4 control-label">Batch</label>

                            <div class="col-md-1">
                                <input id="batch" type="checkbox" class="form-control" name="batch" value="{{ old('batch') }}" autofocus>
							
                                @if ($errors->has('batch'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('batch') }}</strong>
                                    </span>
                                @endif
                            </div>
						</div>
						
                        <!-- Skill: Cisco Networking -->
						<div class="form-group{{ $errors->has('cisco') ? ' has-error' : '' }}">
                            <label for="cisco" class="col-md-4 control-label">Cisco Networking</label>

                            <div class="col-md-1">
                                <input id="cisco" type="checkbox" class="form-control" name="cisco" value="{{ old('cisco') }}" autofocus>
							
                                @if ($errors->has('cisco'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cisco') }}</strong>
                                    </span>
                                @endif
                            </div>
						</div>
						
                        <!-- Skill: Microsoft Office -->
						<div class="form-group{{ $errors->has('office') ? ' has-error' : '' }}">
                            <label for="office" class="col-md-4 control-label">Microsoft Office</label>

                            <div class="col-md-1">
                                <input id="office" type="checkbox" class="form-control" name="office" value="{{ old('office') }}" autofocus>
							
                                @if ($errors->has('office'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('office') }}</strong>
                                    </span>
                                @endif
                            </div>
						</div>
						
                        <!-- Skill: R -->
						<div class="form-group{{ $errors->has('r') ? ' has-error' : '' }}">
                            <label for="r" class="col-md-4 control-label">R</label>

                            <div class="col-md-1">
                                <input id="r" type="checkbox" class="form-control" name="r" value="{{ old('r') }}" autofocus>
							
                                @if ($errors->has('r'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('r') }}</strong>
                                    </span>
                                @endif
                            </div>
						</div>
						
                        <!-- Skill: Go -->
						<div class="form-group{{ $errors->has('go') ? ' has-error' : '' }}">
                            <label for="go" class="col-md-4 control-label">Go</label>

                            <div class="col-md-1">
                                <input id="go" type="checkbox" class="form-control" name="go" value="{{ old('go') }}" autofocus>
							
                                @if ($errors->has('go'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('go') }}</strong>
                                    </span>
                                @endif
                            </div>
						</div>
						
                        <!-- Skill: Ruby -->
						<div class="form-group{{ $errors->has('ruby') ? ' has-error' : '' }}">
                            <label for="ruby" class="col-md-4 control-label">Ruby</label>

                            <div class="col-md-1">
                                <input id="ruby" type="checkbox" class="form-control" name="ruby" value="{{ old('ruby') }}" autofocus>
							
                                @if ($errors->has('ruby'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ruby') }}</strong>
                                    </span>
                                @endif
                            </div>
						</div>
						
                        <!-- Skill: ASP.NET -->
						<div class="form-group{{ $errors->has('asp') ? ' has-error' : '' }}">
                            <label for="asp" class="col-md-4 control-label">ASP.NET</label>

                            <div class="col-md-1">
                                <input id="asp" type="checkbox" class="form-control" name="asp" value="{{ old('asp') }}" autofocus>
							
                                @if ($errors->has('asp'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('asp') }}</strong>
                                    </span>
                                @endif
                            </div>
						</div>
						
                        <!-- Skill: Scala -->
						<div class="form-group{{ $errors->has('scala') ? ' has-error' : '' }}">
                            <label for="scala" class="col-md-4 control-label">Scala</label>

                            <div class="col-md-1">
                                <input id="scala" type="checkbox" class="form-control" name="scala" value="{{ old('scala') }}" autofocus>
							
                                @if ($errors->has('scala'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('scala') }}</strong>
                                    </span>
                                @endif
                            </div>
						</div>
						
						<hr>

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
