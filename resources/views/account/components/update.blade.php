<div class="modal fade login-modal" id="update{{ $server->server_id }}Modal" tabindex="-1" role="dialog"
    aria-labelledby="update{{ $server->server_id }}ModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header" id="update{{ $server->server_id }}ModalLabel">
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
                <form action="{{ route('update.server') }}" method="POST" class="mt-0">
                    @csrf
                    <input type="hidden" value="{{ $server->name }}" name="name" id="name">
                    <div class="form-group">
                        <p>Write a <code>short</code> public description <code>introducing</code> your server.</p>
                        <label for="description" class="sr-only">Server Description</label>
                        <input type="text" class="form-control" id="description" name="description"
                            aria-describedby="description" value="{{ $server->description }} ">
                    </div>
                    <div class="form-group">
                        <p>Enter a valid <code>invite code</code> to your server.</p>
                        <label for="tags" class="sr-only">Invite Code</label>
                        <input type="text" class="form-control" id="code" name="code" aria-describedby="code"
                            value="{{ $server->code }}">
                        <div class="mt-1">
                            <span class="badge badge-info">
                                <small id="stags" class="form-text mt-0">For information on how to get this, see <a href="https://steemit.com/discord/@dynamicrypto/how-to-create-a-permanent-discord-link"><b>this
                                        article</b></a>.</small>
                            </span>
                        </div>

                    </div>
                    <div class="card component-card_9 shadow-sm mb-3">
                        <div class="card-header">
                            <img src="{{ $server->banner_url }}"  onerror="this.src='https://wallpaperaccess.com/full/1338370.jpg';this.onerror='" class="img-fluid" style="max-width: 800px; max-height:300px; height:100%; width:100%" alt="Listing Banner Image">
                        </div>
                    </div>
                    <div class="form-group">
                        <p> We will display a banner image for your listing.</p>
                        <label for="banner_url" class="sr-only">Banner URL</label>
                        <input type="text" class="form-control" id="banner_url" name="banner_url" aria-describedby="banner_url"
                            value="{{ $server->banner_url ?? 'https://wallpaperaccess.com/full/1338370.jpg' }}">

                    </div>

                    <div class="form-group">
                        <label for="tags" class="sr-only">Server Tags</label>
                        <input type="hidden" value="{{ $server->server_id }}" id="server_id" name="server_id">
                        <input type="hidden" value="{{ $server->name}}" id="name" name="name">

                        <div class="form-group">
                            <label for="primary_tag"><strong>Primary</strong> Tag</label>
                            <select class="form-control" id="primary_tag" name="primary_tag">
                                @if(is_null(Auth::user()->server($server->server_id)->primary_tag())))
                                <option>Select a Primary Tag</option>
                                @foreach($data['tags'] as $tag)

                                <option value="{{ $tag->tag_id }}"> {{ $tag->tag }}</option>

                                @endforeach
                                @else
                                <option value="{{ Auth::user()->server($server->server_id)->primary_tag()->tag_id }}">
                                    {{ Auth::user()->server($server->server_id)->primary_tag()->info->tag }}</option>
                                @foreach($data['tags'] as $tag)
                                @if($tag->tag_id === Auth::user()->server($server->server_id)->primary_tag()->tag_id)
                                @else

                                <option value="{{ $tag->tag_id }}"> {{ $tag->tag }}</option>
                                @endif

                                @endforeach
                                @endif

                            </select>
                            <p class="mt-1">Add <code>tags</code> to your server to help <code>others</code> find it.
                            </p>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="bonus_additional_1"><strong>Optional</strong> Tag</label>
                                    <select class="form-control" id="bonus_additional_1" name="bonus_additional_1">

                                        @foreach($data['tags'] as $tag)
                                        @if($tag->tag_id === Auth::user()->server($server->server_id)->primary_tag()->tag_id)
                                        @else



                                            @if(Auth::user()->server($server->server_id)->has_additional_tags())

                                                @if(Auth::user()->server($server->server_id)->additional_tags()->count() === 1)
                                                    @if($tag->tag_id === Auth::user()->server($server->server_id)->additional_tags()[0]->tag_id)
                                                    <option value="{{ $tag->tag_id }}"> {{ $tag->tag }}</option>
                                                    @break
                                                    @endif
                                                @else 
                                                @endif
                                                    @if($tag->tag_id === Auth::user()->server($server->server_id)->additional_tags()[0]->tag_id)
                                                    <option value="{{ $tag->tag_id }}"> {{ $tag->tag }}</option>
                                                    @break
                                                    @endif
                                                @else
                                                
                                                <option>Select an Optional Tag</option>
                                            @endif
                                        @endif
                                        @endforeach

                                        
                                        @foreach($data['tags'] as $tag)
                                        @if($tag->tag_id === Auth::user()->server($server->server_id)->primary_tag()->tag_id)
                                        @else



                                            @if(Auth::user()->server($server->server_id)->has_additional_tags())

                                                @if(Auth::user()->server($server->server_id)->additional_tags()->count() === 1)
                                                    @if($tag->tag_id === Auth::user()->server($server->server_id)->additional_tags()[0]->tag_id)
                                                    @break
                                                    @else 
                                                    <option value="{{ $tag->tag_id }}"> {{ $tag->tag }}</option>
                                                    @endif
                                                @else 
                                                    @if($tag->tag_id === Auth::user()->server($server->server_id)->additional_tags()[0]->tag_id)
                                                    @break
                                                    @else 
                                                    <option value="{{ $tag->tag_id }}"> {{ $tag->tag }}</option>
                                                    @endif
                                                @endif
                                            @else
                                            <option value="{{ $tag->tag_id }}"> {{ $tag->tag }}</option>
                                            @endif
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="bonus_additional_2"><strong>Optional</strong> Tag</label>
                                    <select class="form-control" id="bonus_additional_2" name="bonus_additional_2">
                                        @foreach($data['tags'] as $tag)
                                        @if($tag->tag_id === Auth::user()->server($server->server_id)->primary_tag()->tag_id)
                                        @else



                                            @if(Auth::user()->server($server->server_id)->has_additional_tags())

                                                @if(Auth::user()->server($server->server_id)->additional_tags()->count() === 2)
                                                    @if($tag->tag_id === Auth::user()->server($server->server_id)->additional_tags()[1]->tag_id)
                                                    <option value="{{ $tag->tag_id }}"> {{ $tag->tag }}</option>
                                                    @break
                                                    @endif
                                                @else 
                                                <option>Select an Optional Tag</option>
                                                @break
                                                @endif
                                                @else
                                                
                                            @endif
                                        @endif
                                        @endforeach

                                        
                                        @foreach($data['tags'] as $tag)
                                        @if($tag->tag_id === Auth::user()->server($server->server_id)->primary_tag()->tag_id)
                                        @else



                                            @if(Auth::user()->server($server->server_id)->has_additional_tags())

                                                @if(Auth::user()->server($server->server_id)->additional_tags()->count() === 2)
                                                    @if($tag->tag_id === Auth::user()->server($server->server_id)->additional_tags()[1]->tag_id)
                                                    @break
                                                    @else 
                                                    <option value="{{ $tag->tag_id }}"> {{ $tag->tag }}</option>
                                                    @endif
                                                @else 

                                                <option value="{{ $tag->tag_id }}"> {{ $tag->tag }}</option>
                                                @endif
                                            @else
                                            <option value="{{ $tag->tag_id }}"> {{ $tag->tag }}</option>
                                            @endif
                                        @endif
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                        </div>





                        <div class="mt-1">
                            <span class="badge badge-warning">
                                <small id="stags" class="form-text mt-0">Do not select the same Tags <b>MORE</b> than
                                    once.</small>
                            </span>
                        </div>
                        <div class="mt-1">
                            <span class="badge badge-info">
                                <small id="stags" class="form-text mt-0">Only (3) Three Tags Allowed.</small>
                            </span>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2 mb-2 btn-block">Update the Server</button>
                </form>
            </div>

        </div>
    </div>
</div>