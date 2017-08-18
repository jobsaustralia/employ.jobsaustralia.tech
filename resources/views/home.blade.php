@extends('layouts.app')

@section('content')
+<div id="header">
 +        <div id="topBar"> 
 +            <ul class="toptitle">
 +                <li><h1>jobsaustralia.tech</h1></li>
 +            </ul>
 +            </div>
 +         </div>
 +          <!--//header--> 
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
                <h4><a>Post A Job</a></h4>
                <h4><a>View applicants</a></h4>
                <h4><a>Edit your profile</a></h4>
            </div>
        </div>
    </div>
    +   <!--footer-->
 +            <div id="footer">
 +                <ul class="footernav">
 +		<li><a href="{{ url('/gettingStarted') }}">Getting Started</a></li>
 +                 <li><a href="{{ url('/aboutus') }}">About Us</a></li>
 +                </ul>
 +                <h5 class="footer">© 2017 </h5>
 +                <h5 class="footer">This Site has been made for educational purposes by students of RMIT University for the Capstone Programing Project</h5>
 +                </div>
 +                <!--//footer--> 
 +    </div>  
</div>
@endsection
