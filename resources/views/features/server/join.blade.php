<div class="modal fade login-modal" id="joinServer{{ $server->server_id }}Modal" tabindex="-1" role="dialog"
    aria-labelledby="joinServerModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header" id="joinServerModalLabel">
                <h4 class="modal-title">{{ $server->name }} Listing</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><svg aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">

                        <div class="card component-card_9 mb-3">

                            <div class="card-body">

                                <div class="row">
                                    <div class="col-lg-4 col-md-12 mb-3 text-center">
                                        <div class="card component-card_7">
                                            <div class="card-body">
                                                <h5 class="card-text">Members</h5>
                                                <h6 class="rating-count"> {{ count($server->members) }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12 mb-3 text-center">
                                        <div class="card component-card_7">
                                            <div class="card-body">
                                                <h5 class="card-text">Channels</h5>
                                                <h6 class="rating-count">{{ count($server->channels) }}</h6>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12 mb-3 text-center">
                                        <div class="card component-card_7">
                                            <div class="card-body">
                                                <h5 class="card-text">Roles</h5>
                                                <h6 class="rating-count">{{ count($server->roles) }}</h6>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card component-card_9">
                            <div class="card component-card_9 shadow-sm mb-3">
                                <div class="card-header">
                                    <img src="{{ $server->banner_url }}"  onerror="this.src='https://wallpaperaccess.com/full/1338370.jpg';this.onerror='" class="img-fluid" style="max-width: 800px; max-height:350px; height:100%; width:100%" alt="Listing Banner Image">
                                </div>
                            </div>
                            <div class="card-body">


                                <h5 class="card-title">Server Recommendations</h5>
                                <div class="meta-info">
                                    <div class="mt-container mx-auto">
                                        <div class="timeline-alter">
                                            @if($server->recommendations->count() < 1) <div class="item-timeline">



                                                <div class="t-text">
                                                    <p>No one has left any testimonies on this server yet. Be the first
                                                        recommendation!</p>
                                                </div>

                                        </div>
        
                                        @endif
                                        @foreach($server->recommendations as $recommendation)
                                        <div class="item-timeline">

                                            <div class="t-img">
                                                <img alt="avatar"
                                                    src="https://cdn.discordapp.com/avatars/{{ $recommendation->discordUser->discord_id }}/{{ $recommendation->discordUser->avatar }}"
                                                    class="ml-0  bs-tooltip" data-toggle="tooltip" data-html="false"
                                                    title="{{ $recommendation->discordUser->username }}">
                                            </div>
                                            <div class="t-meta-time">
                                                <p class="">{{ $recommendation->created_at->diffForHumans() }}</p>
                                            </div>

                                            <div class="t-text">
                                                <p>{{ $recommendation->testimony ?? 'User left no testimony.'}}.</p>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>


                            </div>

                        </div>
                    </div>








                </div>
            </div>






        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Close</button>
            @auth

            @if(Auth::user()->canRecommend($server->server_id))
            <button class="btn  btn-primary"
                data-toggle="modal"
                data-dismiss="modal"
                data-target="#recommendServer{{ $server->server_id }}Modal">Recommend
                Server</button>
           
            @else
            <span class="badge badge-sm badge-success">You
                Recommended This
                Server</span>


            @endif
            @else
            <button
                class="btn btn-primary  bs-tooltip"
                data-toggle="tooltip" data-html="false"
                title="You must be authenticated to recommend servers."
                disable="">Recommend Server</button>
           
            @endif
            <form action="{{ route('join.server', ['server_id' => $server->server_id]) }}" target="_blank" method="POST"
                class="mt-0">
                @csrf
                <input type="hidden" value="{{ $server->server_id}}" name="server_id" id="server_id">
                
                <button type="submit" class="btn btn-primary">Join Server</button>
            </form>


        </div>

    </div>
</div>
</div>