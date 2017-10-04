@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div id="profile" class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ Auth::user()->name }}'s Profile</div>

                <div class="panel-body">
                    <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
                    <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                    <p><strong>Location:</strong> {{ Auth::user()->city }}, @if (Auth::user()->state == "vic") Victoria @elseif (Auth::user()->state == "nsw") New South Wales @elseif (Auth::user()->state == "qld") Queensland @elseif (Auth::user()->state == "wa") Western Australia @elseif (Auth::user()->state == "sa") South Australia @elseif (Auth::user()->state == "tas") Tasmania @elseif (Auth::user()->state == "act") Australian Capital Territory @elseif (Auth::user()->state == "nt") Northern Territory @elseif (Auth::user()->state == "oth") Other Australian Region @endif</p>
                    <hr>

                    <p>
                        <a href="{{ route('editProfile') }}" class="btn btn-primary">
                            Edit profile
                        </a>
                    </p>

                    <p>
                        <button id="change-password" class="btn btn-primary">
                            Change password
                        </button>
                    </p>

                    <p id="change-password-content" class="default-hide">
                        To change your password, Logout and select "Forgot Your Password".
                    </p>

                    <p>
                        <button id="confirm-delete" class="btn btn-danger">
                            Delete account
                        </button>
                    </p>

                    <div id="confirm-delete-content" class="default-hide">
                        <p>
                            Confirm deletion: <a id="really-confirm-delete" class="text-danger" href="#">I really want to delete my account.</a>
                        </p>

                        <div id="really-confirm-delete-content" class="default-hide">
                            <p>
                                <strong>Deleting your account will delete your current active jobs, and any active job applications.</strong>
                            </p>
                            <p>
                                <strong>It is impossible to recover an account, or its data, after deletion!</strong>
                            </p>
                            <p>
                                <a id="delete" class="text-danger" title="Clicking this will delete your account without further prompt." href="{{ route('delete') }}">I am <strong>positively certain</strong> I want to delete my account.</a>
                            </p>
                        </div>
                    </div>

                    <form id="delete-form" class="default-hide" action="{{ route('delete') }}" method="POST">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Notifications</div>

                <div class="panel-body">
                    <p>Please select the email notifications you would like to receive.</p>

                    <hr>

                    <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ route('updateNotificationSettings') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('applied') ? ' has-error' : '' }}">
                            <label for="applied" class="col-md-4 control-label">Notify me when a job seeker applies to my job</label>

                            <div class="col-md-1">
                                <input id="applied-hidden" type="hidden" class="form-control" name="applied" value="0">
                                <input id="applied" type="checkbox" class="form-control" name="applied" value="1" @if(Auth::user()->notifyapply) checked @endif >

                                @if ($errors->has('applied'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('applied') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('marketing') ? ' has-error' : '' }}">
                            <label for="marketing" class="col-md-4 control-label">Send me occasional marketing emails</label>

                            <div class="col-md-1">
                                <input id="marketing-hidden" type="hidden" class="form-control" name="marketing" value="0">
                                <input id="marketing" type="checkbox" class="form-control" name="marketing" value="1" @if(Auth::user()->notifymarketing) checked @endif >

                                @if ($errors->has('marketing'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('marketing') }}</strong>
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
