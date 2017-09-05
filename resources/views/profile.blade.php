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
                        <button id="confirm-delete" class="btn btn-primary">
                            Delete account
                        </button>
                    </p>

                    <p id="confirm-delete-content" style="display: none;">
                        Confirm deletion: <a class="text-warning" href="{{ route('delete') }}" onclick="event.preventDefault(); document.getElementById('delete-form').submit();">I really want to delete my account.</a>
                    </p>

                    <form id="delete-form" action="{{ route('delete') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
