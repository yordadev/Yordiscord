@extends('layouts.app')

@section('content')
@if($errors->any())
<div class="row" style="padding-top:30px">
    <div class="col-12 text-center">
        @foreach($errors->all() as $error)
        <div class="alert alert-arrow-right alert-icon-right alert-light-primary mb-4" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
            <svg> ... </svg>
            <strong>Uhoh!</strong> {{ $error }}.
        </div>
        @endforeach
    </div>
</div>
@endif

@if(Session::has('success'))
<div class="row" style="padding-top:30px">
    <div class="col-12 text-center">

        <div class="alert alert-arrow-right alert-icon-right alert-light-primary mb-4" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
            <svg> ... </svg>
            <strong class="text-black">Great news!</strong> <span
                class="text-black">{{ Session::get('success') }}</span>.
        </div>

    </div>
</div>
@endif



<div class="row" style="padding-top:30px">
    @auth




    @else
    <div class="col-12 text-center" style="padding-bottom:30px">
        <h2>Advertise Your Discord Server && Recommend Others!</h2>
    </div>
    <div id="infobox3" class="col-lg-8 offset-lg-2 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-content widget-content-area">
                <div class="infobox-3">
                    <div class="info-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-box">
                            <path
                                d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z">
                            </path>
                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                        </svg>
                    </div>
                    <h5 class="info-heading">Discord OAuth2</h5>
                    <p class="info-text">For more information on what is happening, see <a
                            href="https://discordapp.com/developers/docs/topics/oauth2">here</a>.</p>

                    @auth
                    <a class="info-link" href="{{ route('home')}} ">List Server <svg xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-arrow-right">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg></a>

                    @else
                    <a class="info-link" href="{{ route('discord.login')}} ">Authenticate With Discord<svg
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-arrow-right">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg></a>
                    @endauth
                </div>

                <div class="code-section-container">

                    <a href="https://github.com/yordadev"><button class="btn toggle-code-snippet"><span>View Source
                                Code</span></button></a>

                </div>

            </div>
        </div>
    </div>

    @endauth
</div>

@include('features.server.featured')

<div class="row">




    <div class="col-12 text-center" style="padding-bottom:30px">
        <h2>Listed Servers</h2>
    </div>
    <div class="col-xl-12 col-lg-12">
        <div class="table-responsive">
            <table class="table table-bordered table-striped mb-4">
                <thead>
                    <tr>
                        <th class="text-center">Server Name</th>
                        <th class="text-center">Members</th>
                        <th class="text-center">Channels</th>
                        <th class="text-center">Roles</th>
                        <th class="text-center">Recommendations</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>


                    @if(count($data['listed_servers']) > 0)
                    @foreach($data['listed_servers'] as $listed_server)
                    <tr>
                        <td>
                            <div class="d-flex">
                                <div class="usr-img-frame mr-2 rounded-circle">
                                    <img alt="avatar" class="img-fluid rounded-circle"
                                        src="https://cdn.discordapp.com/icons/{{ $listed_server->server_id }}/{{ $listed_server->icon }}"
                                        onerror="this.src='https://cdn.discordapp.com/avatars/288445693889085440/a_14bfd48ffc41e9366e6064feda36e412';this.onerror='';">
                                </div>
                                <p class="align-self-center mb-0">{{ $listed_server->name }}</p>
                            </div>
                        </td>
                        <td class="text-center">{{ count($listed_server->members) }}</td>
                        <td class="text-center">{{ count($listed_server->channels) }}</td>
                        <td class="text-center">{{ count($listed_server->roles) }}</td>
                        <td class="text-center">{{ count($listed_server->recommendations) }}</td>


                        @auth 
                        <td class="text-center">
                                @if(Auth::user()->canRecommend($listed_server->server_id))
                                <button class="btn btn-sm btn-primary mr-1 ml-1 mt-1 mb-1"
                                data-toggle="modal"
                                data-target="#recommendServer{{ $listed_server->server_id }}Modal">Recommend
                                Server</button>
                                <button class="btn btn-sm btn-primary mr-1 ml-1 mt-1 mb-1"
                                        data-toggle="modal"
                                        data-target="#joinServer{{ $listed_server->server_id }}Modal">Join
                                        Server</button>
                                @else 
                                <span class="badge badge-sm badge-success mr-1 ml-1 mt-1 mb-1">You Recommended This
                                    Server</span>

                                    <button class="btn btn-sm btn-primary mr-1 ml-1 mt-1 mb-1"
                                    data-toggle="modal"
                                    data-target="#joinServer{{ $listed_server->server_id }}Modal">Join
                                    Server</button>
                                @endif
                                </td>
                            @else 
                            <td class="text-center">
                            <button class="btn btn-sm btn-primary mr-1 ml-1 mt-1 mb-1 bs-tooltip" data-toggle="tooltip" data-html="false" title="You must be authenticated to recommend servers." disable="">Recommend Server</button>
                            <button class="btn btn-sm btn-primary mr-1 ml-1 mt-1 mb-1"
                            data-toggle="modal"
                            data-target="#joinServer{{ $listed_server->server_id }}Modal">Join
                            Server</button>
                            </td>
                            @endauth
                    <tr>
                        @endforeach
                        @else
                    <tr>
                        <td>

                        </td>

                        <td class="text-center">No listenings currently,</td>
                        <td class="text-center">be the first.</td>
                        <td class="text-center">
                        <td class="text-center">

                        </td>
                    <tr>
                        @endif
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>

@foreach($data['listed_servers'] as $listed_server)
@include('features.server.recommend', ['server' => $listed_server])
@include('features.server.join', ['server' => $listed_server])
@endforeach

@endsection