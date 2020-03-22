<div class="row justify-content-center mb-3">

    <div class="col-12 text-center" style="padding-bottom:30px">
        <h2>Featured Servers</h2>
    </div>

    @foreach($data['featured_servers'] as $featured) <div class="col-lg-4">
   
        <div class="card component-card_8">
            <div class="card-body">

                <div class="progress-order">
                    <div class="progress-order-header">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-12">
                                <h6>{{ $featured->information->name }}</h6>
                            </div>
                            <div class="col-md-6 pl-0 col-sm-6 col-12 text-right">
                                @foreach($featured->information->tags as $item)
                                <span class="badge badge-info">{{ ucfirst(strtolower($item->tag)) }}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="progress-order-body">
                                          
                        <div class="row mt-4">
                            @if($featured->information->recommendations->count() > 0)
                            <div class="col-md-12 text-left" style="padding-bottom:10px">
                                <span class=" p-o-percentage mr-4">Recommended by</span>
                            </div>
                            @endif
                            <div class="col-md-12">

                                @if($featured->information->recommendations->count() < 1)
                                <p class="text-muted">No one has recommended your server yet.</p>

                                @else 
                                <ul class="list-inline badge-collapsed-img mb-0 mb-3">

                                    @if($featured->information->recommendations->count() > 6)

                                    @foreach($featured->information->recommendations as $user)
                                    <li class="list-inline-item chat-online-usr">
                                        <img alt="avatar"
                                        src="https://cdn.discordapp.com/avatars/{{ $user->discord_id }}/{{ $user->avatar }}"
                                        class="ml-0">
                                    </li>
                                    @endforeach
                                    
                                    
                                    <li class="list-inline-item badge-notify mr-0">
                                        <div class="notification">
                                            <span
                                            class="badge badge-info badge-pill">{{ ($featured->information->recommendations->count() - 6)}}
                                            more</span>
                                        </div>
                                    </li>
                                    @else
                                    @foreach($featured->information->recommendations as $user)
                                    
                                    <li class="list-inline-item chat-online-usr">
                                        <img alt="avatar"
                                            src="https://cdn.discordapp.com/avatars/{{ $user->discordUser->discord_id }}/{{ $user->discordUser->avatar }}"
                                            class="ml-0  bs-tooltip" data-toggle="tooltip" data-html="false" title="{{ $user->discordUser->username }}">
                                    </li>
                                    @endforeach


                                    @endif
                                </ul>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            @auth 

                                @if(Auth::user()->canRecommend($featured->server_id))
                                <button class="btn btn-sm btn-primary mr-1 ml-1 mt-1 mb-1"
                                data-toggle="modal"
                                data-target="#recommendServer{{ $featured->server_id }}Modal">Recommend
                                Server</button>
                                <button class="btn btn-sm btn-primary mr-1 ml-1 mt-1 mb-1"
                                        data-toggle="modal"
                                        data-target="#joinServer{{ $featured->server_id }}Modal">Join
                                        Server</button>
                                @else 
                                <span class="badge badge-sm badge-success mr-1 ml-1 mt-1 mb-1">You Recommended This
                                    Server</span>

                                    <button class="btn btn-sm btn-primary mr-1 ml-1 mt-1 mb-1"
                                    data-toggle="modal"
                                    data-target="#joinServer{{ $featured->server_id }}Modal">Join
                                    Server</button>
                                @endif
                            @else 
                            <button class="btn btn-sm btn-primary mr-1 ml-1 mt-1 mb-1 bs-tooltip" data-toggle="tooltip" data-html="false" title="You must be authenticated to recommend servers." disable="">Recommend Server</button>
                            <button class="btn btn-sm btn-primary mr-1 ml-1 mt-1 mb-1"
                            data-toggle="modal"
                            data-target="#joinServer{{ $featured->server_id }}Modal">Join
                            Server</button>
                            
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @endforeach


</div>