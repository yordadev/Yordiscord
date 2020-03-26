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


<div id="ct" class="note-container note-grid mt-3 pt-1 text-center">


    <h3 class="text-center">Search Results For Query: {{ $q }}</h3>
    <hr>

    @if(count($results) < 1)

    <div class="note-item">

        <div class="note-inner-content">
            <div class="note-content text-center">
                
                <div class="note-description-content mt-4 pt-5">
                    <p class="note-description">Your search query returned no results.</p>
                </div>
            </div>

           
        </div>
    </div>
    @endif

    @foreach($results as $server)

    <div class="note-item {{$server->taggers}}" style="">

        <div class="note-inner-content">
            <div class="note-content">
                <p class="note-title">{{ $server->name }}</p>
                <p class="meta-time">Updated {{ $server->updated_at->diffForHumans() }}</p>
                <div class="note-description-content">
                    <p class="note-description" data-notedescription="{{ $server->description }}">
                        {{ $server->description }}</p>
                    <div class="pl-0 col-sm-12 text-center">
                        @foreach($server->tags as $item)

                        <span class="badge badge-sm badge-info mt-1">{{ ucfirst(strtolower($item->info->tag)) }}</span>
                        @endforeach
                    </div>
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
                        <button class="btn btn-sm btn-primary mr-1 ml-1 mt-1 mb-1 bs-tooltip" data-toggle="tooltip"
                            data-html="false" title="You must be authenticated to recommend servers."
                            disable="">Recommend
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


</div>

@foreach($results as $listed_server)

@include('features.server.recommend', ['server' => $listed_server])
@include('features.server.join', ['server' => $listed_server])
@endforeach

@endsection