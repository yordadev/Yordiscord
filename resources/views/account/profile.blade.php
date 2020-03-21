@extends('layouts.app')

@section('content')
@if($errors->any())
<div class="row mt-5">
    <div class="col-xl-8 offset-xl-2 col-md-6 offset-md 3 text-center">
        @foreach($errors->all() as $error)
        <div class="alert alert-arrow-right alert-icon-right alert-light-danger mb-4" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
            <svg> ... </svg>
            <strong>Uhoh!</strong> {{ $error }}.
        </div>
        @endforeach
    </div>
</div>
@endif

@if(Session::has('success'))
<div class="row mt-5">
    <div class="col-xl-8 offset-xl-2 col-md-6 offset-md 3 text-center">

        <div class="alert alert-arrow-right alert-icon-right alert-light-success mb-4" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
            <svg> ... </svg>
            <strong class="text-black">Great news!</strong> <span class="text-black">{{ Session::get('success') }}</span>.
        </div>
      
    </div>
</div>
@endif
<div class="row layout-spacing">

    <!-- Content -->
    <div class="col-xl-4 col-lg-6 col-md-5 col-sm-12 layout-top-spacing">

        <div class="user-profile layout-spacing">
            <div class="widget-content widget-content-area">
                <div class="d-flex justify-content-between">
                    <h3 class="">Info</h3>
                    <a href="#" class="mt-2 edit-profile"> <svg xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3">
                            <path d="M12 20h9"></path>
                            <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                        </svg></a>
                </div>
                <div class="text-center user-info">
                    <img src="https://cdn.discordapp.com/avatars/{{ Auth::user()->discord_id }}/{{ Auth::user()->avatar }}"
                        alt="avatar">
                    <p class="">{{ Auth::user()->username }}#{{ Auth::user()->discriminator }}</p>
                </div>

            </div>
        </div>

        <div class="education layout-spacing ">
            <div class="widget-content widget-content-area">
                <h3 class="">Recommend History</h3>
                <div class="timeline-alter">

                    @if(count($data['recommended']) > 0)
                    @foreach($data['recommended'] as $recommend)
                    <div class="item-timeline">
                        <div class="t-meta-date">
                            <p class="">{{ $recommend->created_at->diffForHumans() }}</p>
                        </div>
                        <div class="t-dot" data-original-title="" title="">
                        </div>
                        <div class="t-text">
                            @if($recommend->recommended)
                            <p>Upvoted {{ $recommend->server->name }}</p>
                            @else
                            <p>Downvoted {{ $recommend->server->name }}</p>
                            @endif
                            <p class="text-muted">{{ $recommend->testimony ?? null}}</p>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="item-timeline">
                        <div class="t-meta-date">

                        </div>
                        <div class="t-dot" data-original-title="" title="">
                        </div>
                        <div class="t-text">

                            <p class="text-muted">You have not recommended any servers.</p>
                        </div>
                    </div>


                    @endif

                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-8 col-lg-6 col-md-7 col-sm-12 layout-top-spacing">





        <div class="bio layout-spacing ">
            <div class="widget-content widget-content-area">
                <h3 class="">Listed Servers</h3>
                @if(count($data['listed_servers']) > 0)
                <p>Here are your servers that are currently listed.</p>
                @else
                <p>You have no listed any servers yet, you should list your first one!</p>

                @endif
                <div class="bio-skill-box">

                    <div class="row">

                        @if(count($data['listed_servers']) > 0)
                        @foreach($data['listed_servers'] as $listed)
                        <div class="col-12 col-xl-6 col-lg-12 mb-xl-5 mb-5 ">

                            <div class="card component-card_8">
                                <div class="card-body">

                                    <div class="progress-order">
                                        <div class="progress-order-header">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-12">
                                                    <h6 class="text-primary">{{ $listed->name ?? ' ' }}</h6>
                                                    <p class="text-muted"> {{ $listed->description }}</p>
                                                </div>
                                                <div class="col-md-6 pl-0 col-sm-6 col-12 text-right">
                                                    @foreach($listed->tags as $item)
                                                    <span class="badge badge-info">{{ ucfirst(strtolower($item->tag)) }}</span>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>

                                        <div class="progress-order-body">
                                            <div class="row mt-4">
                                                @if($listed->recommendations->count() > 0)
                                                <div class="col-md-12 text-left" style="padding-bottom:10px">
                                                    <span class=" p-o-percentage mr-4">Recommended by</span>
                                                </div>
                                                @endif
                                                <div class="col-md-12">

                                                    @if($listed->recommendations->count() < 1)
                                                    <p class="text-muted">No one has recommended your server yet.</p>

                                                    @else 
                                                    <ul class="list-inline badge-collapsed-img mb-0 mb-3">

                                                        @if($listed->recommendations->count() > 6)

                                                        @foreach($listed->recommendations as $user)
                                                        <li class="list-inline-item chat-online-usr">
                                                            <img alt="avatar"
                                                            src="https://cdn.discordapp.com/avatars/{{ $user->discord_id }}/{{ $user->avatar }}"
                                                            class="ml-0">
                                                        </li>
                                                        @endforeach
                                                        
                                                        
                                                        <li class="list-inline-item badge-notify mr-0">
                                                            <div class="notification">
                                                                <span
                                                                class="badge badge-info badge-pill">{{ ($listed->recommendations->count() - 6)}}
                                                                more</span>
                                                            </div>
                                                        </li>
                                                        @else
                                                        @foreach($listed->recommendations as $user)
                                                        
                                                        <li class="list-inline-item chat-online-usr">
                                                            <img alt="avatar"
                                                                src="https://cdn.discordapp.com/avatars/{{ $user->discordUser->discord_id }}/{{ $user->discordUser->avatar }}"
                                                                class="ml-0">
                                                        </li>
                                                        @endforeach


                                                        @endif
                                                    </ul>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                        @endforeach

                        @endif


                    </div>

                </div>

            </div>
        </div>





        <div class="skills layout-spacing ">
            <div class="widget-content widget-content-area">
                <h3 class="">Servers</h3>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped mb-4">
                        <thead>
                            <tr>
                                <th class="text-center">Server Name</th>
                                <th class="text-center">Owner</th>
                                <th class="text-center">Permissions</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @if(count($data['servers']) > 1)



                            @foreach($data['servers'] as $server)

                            <tr>
                                <td>
                                    <div class="d-flex">
                                        <div class="usr-img-frame mr-2 rounded-circle">
                                            <img alt="avatar" class="img-fluid rounded-circle"
                                                src="https://cdn.discordapp.com/icons/{{ $server->id }}/{{ $server->icon }}">
                                        </div>
                                        <p class="align-self-center mb-0">{{ $server->name }}</p>
                                    </div>
                                </td>
                                @if($server->owner)
                                <td class="text-center"><span
                                        class="badge outline-badge-success shadow-none">True</span></td>
                                <td class="text-center">{{ $server->permissions }}</td>

                                <td class="text-center"><a href="#" class=""><button
                                            class="btn btn-sm btn-primary mr-1 ml-1 mt-1 mb-1" data-toggle="modal"
                                            data-target="#listServerModal">List
                                            Server</button></a>
                                </td>

                                @else
                                <td class="text-center"><span
                                        class="badge outline-badge-danger shadow-none">False</span></td>
                                <td class="text-center">{{ $server->permissions }}</td>

                                @if($server->recommended)
                                <td class="text-center"><span
                                            class="badge badge-success mr-1 ml-1 mt-1 mb-1" disabled="">Recommended
                                            Server</span>
                                </td>
                                @else
                                <td class="text-center"><a href="#" class=""><button
                                            class="btn btn-sm btn-success mr-1 ml-1 mt-1 mb-1">Recommend
                                            Server</button></a>
                                </td>
                                @endif
                                @endif
                            </tr>
                            @endforeach

                            @else


                            <tr>

                                <td>

                                </td>
                                <td class="text-center">You are not in any servers,</td>
                                <td class="text-center">you should join one!</td>
                                <td class="text-center">
                                </td>
                            </tr>
                            @endif


                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>

</div>



@foreach($data['servers'] as $server)
@if($server->owner)
@include('account.components.list_server', ['server' => $server])
@endif

@endforeach
@endsection