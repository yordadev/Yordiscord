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
        @foreach($errors->all() as $error)
        <div class="alert alert-arrow-right alert-icon-right alert-light-primary mb-4" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
            <svg> ... </svg>
            <strong>Great news!</strong> {{ Session::get('success') }}.
        </div>
        @endforeach
    </div>
</div>
@endif

<div class="row" style="padding-top:30px">
    <div class="col-12 text-center" style="padding-bottom:30px">
        <h2>Advertise Your Discord Server</h2>
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
                    <p class="info-text">Share your server with Yordiscord.</p>

                    @auth
                    <a class="info-link" href="{{ route('home')}} ">List Server <svg
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-arrow-right">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg></a>

                    @else
                    <a class="info-link" href="{{ route('discord.login')}} ">Authenticate <svg
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
</div>


<div class="row">
    <div class="col-12 text-center" style="padding-bottom:30px">
        <h2>Featured Servers</h2>
    </div>
    @if($data['featured_servers']->count() < 1) <div class="col-lg-6 offset-lg-3">

        <p class="text-muted text-center">
            Not featuring any servers currently.
        </p>
</div>
@else

<div class="col-lg-4">
    <div class="card component-card_8">
        <div class="card-body">

            <div class="progress-order">
                <div class="progress-order-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-12">
                            <h6>Server Name</h6>
                        </div>
                        <div class="col-md-6 pl-0 col-sm-6 col-12 text-right">
                            <span class="badge badge-info">Category</span>
                        </div>
                    </div>
                </div>

                <div class="progress-order-body">
                    <div class="row mt-4">
                        <div class="col-md-12 text-left" style="padding-bottom:10px">
                            <span class=" p-o-percentage mr-4">Recommended by</span>
                        </div>
                        <div class="col-md-12">
                            <ul class="list-inline badge-collapsed-img mb-0 mb-3">
                                <li class="list-inline-item chat-online-usr">
                                    <img alt="avatar" src="{{ asset('assets/img/200x200.jpg') }}" class="ml-0">
                                </li>
                                <li class="list-inline-item chat-online-usr">
                                    <img alt="avatar" src="{{ asset('assets/img/200x200.jpg') }}">
                                </li>
                                <li class="list-inline-item chat-online-usr">
                                    <img alt="avatar" src="{{ asset('assets/img/200x200.jpg') }}">
                                </li>
                                <li class="list-inline-item chat-online-usr">
                                    <img alt="avatar" src="{{ asset('assets/img/200x200.jpg') }}">
                                </li>
                                <li class="list-inline-item badge-notify mr-0">
                                    <div class="notification">
                                        <span class="badge badge-info badge-pill">+5 more</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-12 text-center">
                            <span class=" p-o-percentage mr-4"><a href="#"><button
                                        class="btn btn-sm btn-primary">Recommend Server</button></a></span>
                            <span class=" p-o-percentage mr-4"><a href="#"><button class="btn btn-sm btn-primary">Join
                                        Server</button></a></span>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endif

</div>
@if($data['featured_servers']->count() < 1) <div class="row mt-4">
    @else
    <div class="row">
        @endif
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
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>

                            @if(count($data['listed_servers']) > 0)
                            @foreach($data['listed_servers'] as $listed_server)
                            <td>
                                <div class="d-flex">
                                    <div class="usr-img-frame mr-2 rounded-circle">
                                        <img alt="avatar" class="img-fluid rounded-circle"
                                            src="https://cdn.discordapp.com/icons/{{ $listed_server->server_id }}/{{ $listed_server->icon }}">
                                    </div>
                                    <p class="align-self-center mb-0">{{ $listed_server->name }}</p>
                                </div>
                            </td>
                            <td class="text-center">{{ count($listed_server->members) }}</td>
                            <td class="text-center">{{ count($listed_server->channels) }}</td>
                            <td class="text-center">{{ count($listed_server->roles) }}</td>

                            <td class="text-center"><a href="#" class=""><button
                                        class="btn btn-sm btn-primary mr-1 ml-1 mt-1 mb-1" data-toggle="modal" data-target="#recommendServerModal">Recommend Server</button></a>
                                <a href="#"><button class="btn btn-sm btn-primary mr-1 ml-1 mt-1 mb-1" data-toggle="modal" data-target="#joinServerModal">Join
                                        Server</button></a>
                            </td>
                            @endforeach
                            @else

                            <td>

                            </td>
                            
                            <td class="text-center">No listenings currently,</td>
                            <td class="text-center">be the first.</td>
                            <td class="text-center">
                                <td class="text-center">

                            </td>

                            @endif
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @foreach($data['listed_servers'] as $listed_server)
        @include('features.server.recommend', ['server' => $listed_server])
    @endforeach

    @endsection