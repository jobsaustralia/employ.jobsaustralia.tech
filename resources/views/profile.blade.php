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
                    <p><strong>State:</strong> {{ Auth::user()->state }}</p>
                    <p><strong>City:</strong> {{ Auth::user()->city }}</p>
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

                    <p id="change-password-content" style="display: none;">
                        To change your password, Logout and select "Forgot Your Password".
                    </p>

                    <p>
                        <button id="confirm-delete" class="btn btn-danger">
                            Delete account
                        </button>
                    </p>

                    <div id="confirm-delete-content" style="display: none;">
                        <p>
                            Confirm deletion: <a id="really-confirm-delete" class="text-danger" href="javascript:void(0)">I really want to delete my account.</a>
                        </p>

                        <div id="really-confirm-delete-content" style="display: none;">
                            <p>
                                <strong>Deleting your account will delete your current active jobs, and any active job applications.</strong>
                            </p>
                            <p>
                                <strong>It is impossible to recover an account, or its data, after deletion!</strong>
                            </p>
                            <p>
                                <a class="text-danger" title="Clicking this will delete your account without further prompt." href="{{ route('delete') }}" onclick="event.preventDefault(); document.getElementById('delete-form').submit();">I am <strong>positively certain</strong> I want to delete my account.</a>
                            </p>
                        </div>
                    </div>

                    <form id="delete-form" action="{{ route('delete') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
