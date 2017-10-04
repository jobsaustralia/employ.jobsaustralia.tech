@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div id="application" class="col-md-8 col-md-offset-2">

            <!-- GitHub username for use by custom.js -->
            <input id="github" type="hidden" value="{{ $github }}" />

            <!-- Job ID for use by custom.js -->
            <input id="jobID" type="hidden" value="{{ $jobid }}" />

            <div class="panel panel-default">
                <div class="panel-heading"><strong>Application</strong></div>

                <div class="panel-body">
                    <p><strong>Name:</strong> {{ $name }}</p>
                    <p><strong>Job Title:</strong> {{ $title }}</p>
                    <p><strong>Sector:</strong> {{ $sector }}</p>
                    <p><strong>Experience:</strong> {{ $experience }} @if ($experience == 1) year @else years @endif</p>
                    <p><strong>Location:</strong> {{ $city }}, @if ($state == "vic") Victoria @elseif ($state == "nsw") New South Wales @elseif ($state == "qld") Queensland @elseif ($state == "wa") Western Australia @elseif ($state == "sa") South Australia @elseif ($state == "tas") Tasmania @elseif ($state == "act") Australian Capital Territory @elseif ($state == "nt") Northern Territory @elseif ($state == "oth") Other Australian Region @endif</p>
                    <p><strong>Skills:</strong> @if ($java) Java @endif @if ($python) &bull; Python @endif @if ($c) &bull; C @endif @if ($csharp) &bull; C Sharp @endif @if ($cplus) &bull; C++ @endif @if ($php) &bull; PHP @endif @if ($html) &bull; HTML @endif @if ($css) &bull; CSS @endif @if ($javascript) &bull; JavaScript @endif @if ($sql) &bull; SQL @endif @if ($unix) &bull; Unix @endif @if ($winserver) &bull; Windows Server @endif @if ($windesktop) &bull; Windows Server @endif @if ($linuxdesktop) &bull; Linux Desktop @endif @if ($macosdesktop) &bull; MacOS Desktop @endif @if ($perl) &bull; Perl @endif @if ($bash) &bull; Bash @endif @if ($batch) &bull; Batch @endif @if ($cisco) &bull; Cisco @endif @if ($office) &bull; Office @endif @if ($r) &bull; R @endif @if ($go) &bull; Go @endif @if ($ruby) &bull; Ruby @endif @if ($asp) &bull; ASP @endif @if ($scala) &bull; Scala @endif @if ($cow) &bull; COW @endif @if ($actionscript) &bull; ActionScript @endif @if ($assembly) &bull; Assembly @endif @if ($autohotkey) &bull; AutoHotKey @endif @if ($coffeescript) &bull; CoffeeScript @endif @if ($d) &bull; D @endif @if ($fsharp) &bull; F# @endif @if ($haskell) &bull; Haskell @endif @if ($matlab) &bull; Matlab @endif @if ($objectivec) &bull; Objective-C @endif @if ($objectivecplus) &bull; Objective-C++ @endif @if ($pascal) &bull; Pascal @endif @if ($powershell) &bull; PowerShell @endif @if ($rust) &bull; Rust @endif @if ($swift) &bull; Swift @endif @if ($typescript) &bull; TypeScript @endif @if ($vue) &bull; Vue @endif @if ($webassembly) &bull; WebAssembly @endif @if ($apache) &bull; Apache @endif @if ($aws) &bull; AWS @endif @if ($docker) &bull; Docket @endif @if ($nginx) &bull; Nginx @endif @if ($saas) &bull; SaaS @endif @if ($ipv4) &bull; Networking (IPv4) @endif @if ($ipv6) &bull; Networking (IPv6) @endif @if ($dns) &bull; DNS @endif</p>
                    <p><strong>Resume: </strong> @if (File::exists(storage_path('app/public/resumes/' . 'resume-' . $userid . '.pdf'))) <a href="{{ route('resume', $userid) }}">View</a> @else Not provided @endif</p>

                    @if ($github !== null)
                        <p><strong><i class="fa fa-github" aria-hidden="true"></i> GitHub: <a href="https://github.com/{{ $github }}/?tab=repositories&type=source">{{ $github }}</a></strong></p> 

                        <p id="github-report"><strong><i class="fa fa-github" aria-hidden="true"></i> Report: </strong></p>
                    @endif

                    <hr>

                    <p>{{ $message }}</p>

                    <hr>

                    <p>
                        <button type="submit" id="engage" class="btn btn-primary" @if($engaged || $rejected) disabled @endif >
                            Discuss
                        </button>

                        <button type="submit" id="reject" class="btn btn-danger" @if($rejected || $engaged) disabled @endif >
                            Reject
                        </button>

                        <form id="reject-form" class="default-hide" action="{{ route('reject') }}" method="POST">
                            {{ csrf_field() }}

                            <input id="id" name="id" type="hidden" value="{{ $id }}" />
                        </form>

                        <form id="engage-form" class="default-hide" action="{{ route('engage') }}" method="POST">
                            {{ csrf_field() }}

                            <input id="id" name="id" type="hidden" value="{{ $id }}" />
                        </form>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
