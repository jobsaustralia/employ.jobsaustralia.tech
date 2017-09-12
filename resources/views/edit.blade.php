@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Your Profile</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('update') }}">
                        {{ csrf_field() }}

                        <!-- Name -->
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" pattern="[a-zA-Z ]+" value="{{ Auth::user()->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Location: State -->
                        <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                            <label for="state" class="col-md-4 control-label">State/Territory</label>

                            <div class="col-md-6">
                                <select id="state" name="state" class="form-control" value="{{ old('state') }}" required>
                                    <option disabled value>Please select an option</option>
                                    <option value="vic" @if (Auth::user()->state == "vic") selected @endif >Victoria</option>
                                    <option value="nsw" @if (Auth::user()->state == "nsw") selected @endif >New South Wales</option>
                                    <option value="qld" @if (Auth::user()->state == "qld") selected @endif >Queensland</option>
                                    <option value="wa" @if (Auth::user()->state == "wa") selected @endif >Western Australia</option>
                                    <option value="sa" @if (Auth::user()->state == "sa") selected @endif >South Australia</option>
                                    <option value="tas" @if (Auth::user()->state == "tas") selected @endif >Tasmania</option>
                                    <option value="act" @if (Auth::user()->state == "act") selected @endif >Australian Capital Territory</option>
                                    <option value="nt" @if (Auth::user()->state == "nt") selected @endif >Northern Teritory</option>
                                    <option value="oth" @if (Auth::user()->state == "oth") selected @endif >Other Australian Region</option>
                                </select>

                                @if ($errors->has('state'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Location: City -->
                        <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                            <label for="city" class="col-md-4 control-label">Location</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control" name="city" pattern="[a-zA-Z ]+" value="{{ Auth::user()->city }}" required autofocus>

                                @if ($errors->has('city'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Save Changes
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
