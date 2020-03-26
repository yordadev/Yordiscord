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

    <div class="col-12">
        <div class="app-note-container">

            <div class="app-note-overlay"></div>

            <div class="tab-title">
                <div class="row">

                    <div class="col-md-12 col-sm-12 col-12 mt-5">
                        <ul class="nav nav-pills d-block" id="pills-tab3" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link list-actions active" id="all-tags"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-edit">
                                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                    </svg> All Servers</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link list-actions text-primary " id="tag-featured"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-star">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                        </polygon>
                                    </svg> Featured Servers</a>
                            </li>
                        </ul>

                        <hr>

                        <p class="group-section"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-tag">
                                <path
                                    d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z">
                                </path>
                                <line x1="7" y1="7" x2="7" y2="7"></line>
                            </svg> Tags</p>

                        <ul class="nav nav-pills d-block group-list" id="pills-tab" role="tablist">
                            @foreach($data['tags'] as $tag)
                            <li class="nav-item">
                                @if($tag->count > 0)
                                <a class="nav-link list-actions g-dot-primary" id="tag-{{ $tag->tag }}"> {{ $tag->tag }}
                                </a>
                                @else
                                <a class="nav-link list-actions g-dot-danger" id="tag-{{ $tag->tag }}"> {{ $tag->tag }}
                                </a>
                                @endif
                            </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>


            <div id="ct" class="note-container note-grid text-center">


                <h1 class="text-center">Public Discord Servers</h3>
                <hr>
                @foreach($data['listed_servers'] as $server)

                <div class="note-item {{$server->taggers}}" style="">

                    <div class="note-inner-content">
                        <div class="note-content">
                            <p class="note-title">{{ $server->name }}</p>
                            <p class="meta-time">Updated {{ $server->updated_at->diffForHumans() }}</p>
                            <div class="note-description-content">
                                <p class="note-description" data-notedescription="{{ $server->description }}">
                                    {{ $server->description }}</p>
                            </div>
                        </div>
                        <div class="note-action">
                            <div class="row mt-4">
                                @if($server->recommendations->count() > 0)
                                <div class="col-md-12 text-left" style="padding-bottom:10px">
                                    <span class=" p-o-percentage mr-4">Recommended by</span>
                                </div>
                                @endif
                                <div class="col-md-12 mb-3">

                                    @if($server->recommendations->count() < 1) <p class="text-muted mt-4 mb-4 pb-3">No
                                        one has recommended this server yet.</p>

                                        @else
                                        <ul class="list-inline badge-collapsed-img mb-0 mb-3">

                                            @if($server->recommendations->count() > 6)

                                            @foreach($server->recommendations as $user)
                                            <li class="list-inline-item chat-online-usr">
                                                <img alt="avatar"
                                                    src="https://cdn.discordapp.com/avatars/{{ $user->discord_id }}/{{ $user->avatar }}"
                                                    class="ml-0">
                                            </li>
                                            @endforeach


                                            <li class="list-inline-item badge-notify mr-0">
                                                <div class="notification">
                                                    <span
                                                        class="badge badge-info badge-pill">{{ ($server->recommendations->count() - 6)}}
                                                        more</span>
                                                </div>
                                            </li>
                                            @else
                                            @foreach($server->recommendations as $user)

                                            <li class="list-inline-item chat-online-usr">
                                                <img alt="avatar"
                                                    src="https://cdn.discordapp.com/avatars/{{ $user->discordUser->discord_id }}/{{ $user->discordUser->avatar }}"
                                                    class="ml-0  bs-tooltip" data-toggle="tooltip" data-html="false"
                                                    title="{{ $user->discordUser->username }}">
                                            </li>
                                            @endforeach


                                            @endif
                                        </ul>
                                        @endif
                                </div>
                                <div class="col-md-12 text-center">
                                    @auth

                                    @if(Auth::user()->canRecommend($server->server_id))
                                    <button class="btn btn-sm btn-primary mr-1 ml-1 mt-1 mb-1" data-toggle="modal"
                                        data-target="#recommendServer{{ $server->server_id }}Modal">Recommend
                                        Server</button>
                                    <button class="btn btn-sm btn-primary mr-1 ml-1 mt-1 mb-1" data-toggle="modal"
                                        data-target="#joinServer{{ $server->server_id }}Modal">View Server</button>
                                    @else
                                    <span class="badge badge-sm badge-success mr-1 ml-1 mt-1 mb-1">You Recommended This
                                        Server</span>

                                    <button class="btn btn-sm btn-primary mr-1 ml-1 mt-1 mb-1" data-toggle="modal"
                                        data-target="#joinServer{{ $server->server_id }}Modal">View Server</button>
                                    @endif
                                    @else
                                    <button class="btn btn-sm btn-primary mr-1 ml-1 mt-1 mb-1 bs-tooltip"
                                        data-toggle="tooltip" data-html="false"
                                        title="You must be authenticated to recommend servers." disable="">Recommend
                                        Server</button>
                                    <button class="btn btn-sm btn-primary mr-1 ml-1 mt-1 mb-1" data-toggle="modal"
                                        data-target="#joinServer{{ $server->server_id }}Modal">View Server</button>

                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="note-footer">
                            <div class="tags-selector btn-group">

                                <div class="dropdown-menu dropdown-menu-right d-icon-menu">
                                    <a class="note-personal label-group-item label-personal dropdown-item position-relative g-dot-personal"
                                        href="javascript:void(0);"> View Details</a>
                                    <a class="note-work label-group-item label-work dropdown-item position-relative g-dot-work"
                                        href="javascript:void(0);"> Recommend Server</a>
                                    <a class="note-social label-group-item label-social dropdown-item position-relative g-dot-social"
                                        href="javascript:void(0);"> Join Server</a>
                                    <a class="note-important label-group-item label-important dropdown-item position-relative g-dot-important"
                                        href="javascript:void(0);"> Report Server</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                @endforeach

                <div class="note-item {{ $data['empty-tagger'] }}" style="display: none;">

                    <div class="note-inner-content">
                        <div class="note-content text-center">
                            
                            <div class="note-description-content mt-2">
                                <p class="note-description">There are no server listings for this tag.<br>Be the first
                                    and list your server!</p>
                            </div>
                        </div>

                        <div class="row mt-4">

                            <div class="col-sm-12 mt-4 text-center">
                                @auth


                                <a href="{{ route('home') }}"><button
                                        class="btn btn-sm btn-primary mr-1 ml-1 mt-1 mb-1">List a Server</button></a>

                                @else
                                <a href="{{ route('discord.login') }}"><button
                                        class="btn btn-sm btn-primary mr-1 ml-1 mt-1 mb-1" data-toggle="tooltip"
                                        data-html="false" title="You must be authenticated to recommend servers.">List a
                                        Server</button></a>

                                @endif
                            </div>

                        </div>
                    </div>
                </div>


            </div>

        </div>
    </div>


</div>



@foreach($data['listed_servers'] as $listed_server)
@include('features.server.recommend', ['server' => $listed_server])
@include('features.server.join', ['server' => $listed_server])
@endforeach

@endsection