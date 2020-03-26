<div class="modal fade login-modal" id="listServer{{ $server->id }}Modal" tabindex="-1" role="dialog"
    aria-labelledby="listServerModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header" id="listServerModalLabel">
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
                <form action="{{ route('list.server') }}" method="POST" class="mt-0">
                    @csrf
                    <input type="hidden" value="{{ $server->name }}" name="name" id="name">
                    <div class="form-group">
                        <p>Write a <code>short</code> public description <code>introducing</code> your server.</p>
                        <label for="description" class="sr-only">Server Description</label>
                        <input type="text" class="form-control" id="description" name="description"
                            aria-describedby="description" placeholder="">
                    </div>
                    <div class="form-group">
                        <p>Enter a valid <code>invite code</code> to your server.</p>
                        <label for="tags" class="sr-only">Invite Code</label>
                        <input type="text" class="form-control" id="code" name="code" aria-describedby="code"
                            placeholder="">
                        <div class="mt-1">
                            <span class="badge badge-info">
                                <small id="stags" class="form-text mt-0">For information on how to get this, see <a href="https://steemit.com/discord/@dynamicrypto/how-to-create-a-permanent-discord-link" target="_blank"><b>this
                                        article</b></a>.</small>
                            </span>
                        </div>

                    </div>
                    <div class="form-group">
                        <p> We will display a banner image for your listing</p>
                        <label for="banner_url" class="sr-only">Banner URL</label>
                        <input type="text" class="form-control" id="banner_url" name="banner_url" aria-describedby="banner_url"
                            placeholder="Enter a img url..">
                        <div class="mt-1">
                            <span class="badge badge-info">
                                <small id="stags" class="form-text mt-0">Please provide a valid image url</small>
                            </span>
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="tags" class="sr-only">Server Tags</label>
                        <input type="hidden" value="{{ $server->id }}" id="server_id" name="server_id">
                        <input type="hidden" value="{{ $server->name}}" id="name" name="name">

                        <div class="form-group">
                            <label for="primary_tag">Primary Tag</label>
                            <select class="form-control" id="primary_tag" name="primary_tag">
                                <option>Select a Primary Tag</option>
                                @foreach($data['tags'] as $tag)
                                <option value="{{ $tag->tag_id }}"> {{ $tag->tag }}</option>
                                @endforeach
                            </select>
                            <p class="mt-1">Add <code>tags</code> to your server to help <code>others</code> find it.
                            </p>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="bonus_additional_1">Optional Tag</label>
                                    <select class="form-control" id="bonus_additional_1" name="bonus_additional_1">
                                        <option>Select an Optional Tag</option>
                                        @foreach($data['tags'] as $tag)
                                        <option value="{{ $tag->tag_id }}"> {{ $tag->tag }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="bonus_additional_2">Optional Tag</label>
                                    <select class="form-control" id="bonus_additional_2" name="bonus_additional_2">
                                        <option>Select an Optional Tag</option>
                                        @foreach($data['tags'] as $tag)
                                        <option value="{{ $tag->tag_id }}"> {{ $tag->tag }}</option>
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
                    <button type="submit" class="btn btn-primary mt-2 mb-2 btn-block">List the Server</button>
                </form>
            </div>

        </div>
    </div>
</div>