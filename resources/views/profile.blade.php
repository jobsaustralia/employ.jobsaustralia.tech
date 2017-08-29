@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div id="profile" class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ Auth::user()->name }}'s Employer Profile</div>

                <div class="panel-body">
                    <p>Name: {{ Auth::user()->name }}</p>
                    <p>Email: {{ Auth::user()->email }}</p>
                    <p>
                        <button id="change-password">
                            Change password
                        </button>

                        <p id="change-password-message" style="display: none;">To change your password, Logout and select "Forgot Your Password".</p>
                    </p>
                    <p>
                     <button type="button" onclick="window.location='{{ url('edit') }}'">Edit your profile</button>
                  </p>
                    <p>
                        <button id="confirm-delete">
                            Delete account.
                        </button>

                        <p id="confirm-delete-prompt" style="display: none;">Confirm deletion: <a href="{{ route('delete') }}" onclick="event.preventDefault(); document.getElementById('delete-form').submit();">I really want to delete my account.</a></p>

                        <form id="delete-form" action="{{ route('delete') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
