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
                                        <div class="col-lg-6 col-md-5 col-sm-12 col-12">
                                            <h6 class="text-primary">{{ $listed->name ?? ' ' }}</h6>                                            
                                        </div>
                                        <div class="col-lg-6 col-md-7 pl-0 col-sm-12 col-12 text-center">
                                            @foreach($listed->tags as $item)

                                            <span
                                                class="badge badge-sm badge-info mt-1">{{ ucfirst(strtolower($item->info->tag)) }}</span>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <p class="text-muted"> {{ $listed->description }}</p>
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

                                            @if($listed->recommendations->count() < 1) <p class="text-muted">No one has
                                                recommended your server yet.</p>

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
                                                            class="ml-0  bs-tooltip" data-toggle="tooltip"
                                                            data-html="false"
                                                            title="{{ $user->discordUser->username }}">
                                                    </li>
                                                    @endforeach


                                                    @endif
                                                </ul>
                                                @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-center">
                                        <button class="btn btn-sm btn-outline-warning" data-toggle="modal"
                                            data-target="#update{{ $listed->server_id }}Modal">Update Listing</button>
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